from flask import Flask, request, render_template
from flask_bootstrap import Bootstrap
from rake_nltk import Rake
import re

app = Flask(__name__)
Bootstrap(app)

@app.route("/")
def user_form():
    return render_template("index.html")

@app.route("/", methods=['POST'])
def user_result():
    review = request.form['review']
    r = Rake()
    r.extract_keywords_from_text(review)
    score = str(r.get_ranked_phrases_with_scores())
    score = [float(s) for s in re.findall(r'-?\d+\.?\d*', score)]
    total_score = sum(score)
    return render_template('result.html', total_score=total_score)

if __name__ == "__main__":
    app.run(debug=True)