from flask import Flask, render_template, url_for, request
from numpy import empty
from model import summarizations
from model import getData
app = Flask(__name__)
app.jinja_env.auto_reload = True
app.config['TEMPLATES_AUTO_RELOAD'] = True

@app.route('/', methods=['POST','GET'])

def index():
    length = 30
    try:
        input = request.args.get('input')
            
        length = request.args.get('length')
        output = summarizations(input, int(length))
    except:
        input = ""
        output = ""
    
    return render_template("index.html", input=input, output=output, length=length)            


if __name__ == "__main__":
    app.run(debug=True)