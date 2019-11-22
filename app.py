from flask import Flask, request, render_template, redirect, url_for, session, abort
from flask_bootstrap import Bootstrap
from rake_nltk import Metric, Rake
import re
import os

app = Flask(__name__)
Bootstrap(app)


@app.route('/login', methods=['POST'])
def login():
    error = None
    if request.method == 'POST':
        if request.form['username'] != 'admin' or request.form['password'] != 'admin':
            error = 'Invalid Credentials. Please try again.'
        else:
            session['logged_in'] = True
            return redirect(url_for('user_form'))
    return render_template('login.html', error=error)


@app.route("/logout")
def logout():
    session['logged_in'] = False
    return login()


@app.route("/")
def user_form():
    if not session.get('logged_in'):
        return render_template('login.html')
    else:
        return render_template("index.html")


@app.route("/", methods=['POST'])
def user_result():
    # Performance
    perf = request.form['performance']
    r = Rake(stopwords=None, punctuations=';')
    r.extract_keywords_from_sentences(perf)
    perf_score = str(r.get_ranked_phrases_with_scores())
    perf_score = [float(s) for s in re.findall(r'-?\d+\.?\d*', perf_score)]
    perf_total_score = sum(perf_score)

    # Installation
    install = request.form['installation']
    r = Rake(stopwords=None, punctuations=';')
    r.extract_keywords_from_sentences(install)
    install_score = str(r.get_ranked_phrases_with_scores())
    install_score = [float(s)
                     for s in re.findall(r'-?\d+\.?\d*', install_score)]
    install_total_score = sum(install_score)

    # Functionality
    func = request.form['functionality']
    r = Rake(stopwords=None, punctuations=';')
    r.extract_keywords_from_sentences(func)
    func_score = str(r.get_ranked_phrases_with_scores())
    func_score = [float(s) for s in re.findall(r'-?\d+\.?\d*', func_score)]
    func_total_score = sum(func_score)

    # Experience
    exp = request.form['experience']
    r = Rake(stopwords=None, punctuations=';')
    r.extract_keywords_from_sentences(exp)
    exp_score = str(r.get_ranked_phrases_with_scores())
    exp_score = [float(s) for s in re.findall(r'-?\d+\.?\d*', exp_score)]
    exp_total_score = sum(exp_score)

    return render_template('result.html', perf_total_score=perf_total_score, install_total_score=install_total_score, func_total_score=func_total_score, exp_total_score=exp_total_score)


if __name__ == "__main__":
    app.secret_key = os.urandom(12)
    app.run(debug=True)
    # host="0.0.0.0", port=80
