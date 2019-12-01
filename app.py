from flask import Flask, request, render_template, redirect, url_for, session, abort
from flask_bootstrap import Bootstrap
from rake_nltk import Metric, Rake
from flask_mysqldb import MySQL
import MySQLdb.cursors
import re
import os

app = Flask(__name__)
Bootstrap(app)
mysql = MySQL(app)

# Database information for connecting to local/remote database.
app.config['MYSQL_HOST'] = '127.0.0.1'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'pythonlogin'


@app.route('/', methods=['GET', 'POST'])
def login():
    msg = ''
    # Check if the "username" and "password" POST requests exist (from the user submitted form).
    if request.method == 'POST' and 'username' in request.form and 'password' in request.form:
        # Request variables from form.
        username = request.form['username']
        password = request.form['password']
        # Check if account exists in MySQL Database.
        cursor = mysql.connection.cursor(MySQLdb.cursors.DictCursor)
        cursor.execute(
            'SELECT * FROM accounts WHERE username = %s AND password = %s', (username, password))
        # Fetch one record and return result.
        account = cursor.fetchone()
        # Check if user exists in the database.
        if account:
            # Create session data (Can be accessed in other routes).
            session['loggedin'] = True
            session['id'] = account['id']
            session['username'] = account['username']
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
    if 'loggedin' in session:
        # Choice section.
        choice = request.form['choice']

        # Performance section.
        perf = request.form['performance']
        r = Rake(stopwords=None, punctuations=[';', ',', '"', '/', "?"])
        # Extraction text from form.
        r.extract_keywords_from_sentences(perf)
        # Convert the extraction to string.
        perf_score = str(r.get_ranked_phrases_with_scores())
        # Extract score (as float) from text (string).
        perf_score = [float(s) for s in re.findall(r'-?\d+\.?\d*', perf_score)]
        # Get the sum of all the values extracted.
        perf_total_score = sum(perf_score)

        # Installation section.
        install = request.form['installation']
        r = Rake(stopwords=None, punctuations=[';', ',', '"', '/', "?"])
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
        func = request.form['functionality']
        r = Rake(stopwords=None, punctuations=[';', ',', '"', '/', "?"])
        # Extraction text from form.
        r.extract_keywords_from_sentences(func)
        # Convert the extraction to string.
        func_score = str(r.get_ranked_phrases_with_scores())
        # Extract score (as float) from text (string).
        func_score = [float(s) for s in re.findall(r'-?\d+\.?\d*', func_score)]
        # Get the sum of all the values extracted.
        func_total_score = sum(func_score)

        # Experience section
        exp = request.form['experience']
        r = Rake(stopwords=None, punctuations=[';', ',', '"', '/', "?"])
        # Extraction text from form.
        r.extract_keywords_from_sentences(exp)
        # Convert the extraction to string.
        exp_score = str(r.get_ranked_phrases_with_scores())
        # Extract score (as float) from text (string).
        exp_score = [float(s) for s in re.findall(r'-?\d+\.?\d*', exp_score)]
        # Get the sum of all the values extracted.
        exp_total_score = sum(exp_score)

        # # If the user is logged in show them the results page.
        return render_template('result.html', perf_total_score=perf_total_score, install_total_score=install_total_score, func_total_score=func_total_score, exp_total_score=exp_total_score, username=session['username'], choice=choice)
    
    return redirect(url_for('login'))
    

if __name__ == "__main__":
    # Generate random secret key (for extra protection).
    app.secret_key = os.urandom(12)
    app.run(debug=True)
    # host="0.0.0.0", port=80
