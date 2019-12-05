from flask import Flask, request, render_template, redirect, url_for, session, abort
from flask_bootstrap import Bootstrap
from rake_nltk import Metric, Rake
from flask_mysqldb import MySQL
import MySQLdb.cursors
import hashlib
from hashlib import md5
from statistics import mean
import re
import os

app = Flask(__name__)
Bootstrap(app)
mysql = MySQL(app)

# Database information for connecting to local/remote database.
app.config['MYSQL_HOST'] = ''
app.config['MYSQL_USER'] = ''
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = ''


@app.route('/', methods=['GET', 'POST'])
def login():
    msg = ''
    # Check if the "username" and "password" POST requests exist (from the user submitted form).
    if request.method == 'POST' and 'username' in request.form and 'password' in request.form:
        # Request variables from form.
        username = request.form['username']
        password = request.form['password']
        # Convert password to MD5 hash.
        hashed_password = hashlib.md5(password.encode('utf-8')).hexdigest()
        # Check if user exists in MySQL Database.
        cursor = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
        cursor.execute(
            'SELECT * FROM users WHERE username = %s AND password = %s', (username, hashed_password))
        # Fetch one record and return result.
        user = cursor.fetchone()
        # Check if user exists in the database.
        if user:
            # Create session data (Can be accessed in other routes).
            session['loggedin'] = True
            session['id'] = user['id']
            session['username'] = user['username']
            # Redirect to review page.
            return redirect(url_for('user_form'))
        else:
            # Message to alert that user doesnt exist or username/password is incorrect.
            msg = 'Incorrect username/password!'
    # Show the login form with message (if login is unsuccessful w/ error message).
    return render_template('index.html', msg=msg)


@app.route("/logout")
def logout():
    # Remove the session data to log the user out.
    session.pop('loggedin', None)
    session.pop('id', None)
    session.pop('username', None)
    # Redirect to login page.
    return redirect(url_for('login'))


@app.route("/review")
def user_form():
    if 'loggedin' in session:
        cursor = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
        # Select the table and required values.
        cursor.execute('SELECT name FROM jobs')
        # Fetch all results from the table.
        jobs = cursor.fetchall()
        # If the user is logged in show them the review page.
        return render_template('review.html', username=session['username'], jobs=jobs)
    # If the user is not logged in then redirect the user back to the login page.
    return redirect(url_for('login'))


@app.route("/result", methods=['GET', 'POST'])
def user_result():
    success = ''
    error = ''
    if 'loggedin' in session:
        # Choice section.
        # Create variables for easy access
        choice = request.form['choice']

        # Performance section.
        # Create variables for easy access.
        perf = request.form['performance']
        # Use all stopwords for english from NLTK, and all puntuation characters.
        r = Rake()
        # Extraction text from form.
        r.extract_keywords_from_sentences(perf)
        # Convert the extraction to string.
        perf_score = str(r.get_ranked_phrases_with_scores())
        # Extract score (as float) from text (string).
        perf_score = [float(s) for s in re.findall(r'-?\d+\.?\d*', perf_score)]
        # Get the sum of all the values extracted.
        perf_total_score = sum(perf_score)

        # Installation section.
        # Create variables for easy access
        install = request.form['installation']
        # Use all stopwords for english from NLTK, and all puntuation characters.
        r = Rake()
        # Extraction text from form.
        r.extract_keywords_from_sentences(install)
        # Convert the extraction to string.
        install_score = str(r.get_ranked_phrases_with_scores())
        # Extract score (as float) from text (string).
        install_score = [float(s)
                         for s in re.findall(r'-?\d+\.?\d*', install_score)]
        # Get the sum of all the values extracted.
        install_total_score = sum(install_score)

        # Functionality section.
        # Create variables for easy access
        func = request.form['functionality']
        # Use all stopwords for english from NLTK, and all puntuation characters.
        r = Rake()
        # Extraction text from form.
        r.extract_keywords_from_sentences(func)
        # Convert the extraction to string.
        func_score = str(r.get_ranked_phrases_with_scores())
        # Extract score (as float) from text (string).
        func_score = [float(s) for s in re.findall(r'-?\d+\.?\d*', func_score)]
        # Get the sum of all the values extracted.
        func_total_score = sum(func_score)

        # Experience section
        # Create variables for easy access
        exp = request.form['experience']
        # Use all stopwords for english from NLTK, and all puntuation characters.
        r = Rake()
        # Extraction text from form.
        r.extract_keywords_from_sentences(exp)
        # Convert the extraction to string.
        exp_score = str(r.get_ranked_phrases_with_scores())
        # Extract score (as float) from text (string).
        exp_score = [float(s) for s in re.findall(r'-?\d+\.?\d*', exp_score)]
        # Get the sum of all the values extracted.
        exp_total_score = sum(exp_score)

        # Calculate the average (mean) of all the scores.
        lst = [perf_total_score, install_total_score,
               func_total_score, exp_total_score]
        avg = mean(lst)

        # Only add to database if average score is greater than 15.
        if avg >= 15:
            # Message to alert the user the review has been submitted.
            success = '<hr class="my-4"><div class="alert alert-primary text-center" role="alert">Success! Review has been submitted</div>'
            cursor = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
            # Stage records (scores) to be inserted into database.
            cursor.execute(
                'INSERT INTO reviews VALUES (NULL, %s, %s, %s, %s, %s, %s, %s)', (perf_total_score, install_total_score, func_total_score, exp_total_score, avg, choice, session['id']))
            # Finalize and commit record to the database.
            mysql.connection.commit()

            # Stage records (text from form) to be inserted into database.
            cursor.execute('INSERT INTO reviews_text VALUES (NULL, %s, %s, %s, %s, %s, %s)',
                           (perf, install, func, exp, choice, session['id']))
            # Finalize and commit record to the database.
            mysql.connection.commit()
        else:
            # Message to alert the user of poor score.
            error = '<hr class="my-4"><div class="alert alert-danger text-center" role="alert">Warning! Poor Average, Please try again</div>'

        # If the user is logged in show them the results page.
        return render_template('result.html', perf_total_score=perf_total_score, install_total_score=install_total_score, func_total_score=func_total_score, exp_total_score=exp_total_score, username=session['username'], choice=choice, success=success, error=error, avg=avg)

    # If the user is not logged in then redirect the user back to the login page.
    return redirect(url_for('login'))


if __name__ == "__main__":
    # Generate random secret key (for extra protection).
    app.secret_key = os.urandom(12)
    app.run(debug=True)
    # host="0.0.0.0", port=80
