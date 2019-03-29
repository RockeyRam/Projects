from flask import *
from flask_sqlalchemy import *
app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI']='postgresql+psycopg2://postgres:postgres@localhost/Itube'
app.config['SQLALCHEMY_TRACE_MODIFICATION']=False

db=SQLAlchemy(app)

class Users (db.Model):
    __tablename__="Users"
    title=db.Column(db.String(50))
    username=db.Column(db.String(50),primary_key=True)
    email=db.Column(db.String(50),unique=True)
    password=db.Column(db.String(50))
    company=db.Column(db.String(50))

    def __init__(self,title,username,email,password,company):
        self.title=title
        self.username=username
        self.email=email
        self.password=password
        self.company=company

class AdminCredential(db.Model):
    __tablename__="AdminCredential"
    email=db.Column(db.String(50),primary_key=True)
    password=db.Column(db.String(50))

    def __init__(self,email,password):
        self.email=email
        self.password=password

class Media(db.Model):
    __tablename__="Media"
    id=db.Column(db.Integer,primary_key=True,autoincrement=True)
    title=db.Column(db.String(50))
    video=db.Column(db.LargeBinary)
    description=db.Column(db.String(50))

    def __init__(self,title,video,description):
        self.title=title
        self.video=video
        self.description=description


@app.route('/')
def index():
    return render_template('Login.html')

@app.route('/signup')
def Signup():
    return render_template('Register.html')

@app.route('/LoginValidation',methods=['POST'])
def LoginValidation():
    if request.method=="POST":
        # Default Admin email id: admin@infiniti.com , Password:admin
        if request.form['email']=='admin@infiniti.com':
            Admindata = AdminCredential.query.filter_by(email=request.form['email']).first()
            if Admindata.email=='admin@infiniti.com' and Admindata.password=='admin':
                return render_template('Upload.html')
        else:
            data = Users.query.filter_by(email=request.form['email']).first()
            if data.email== request.form['email'] and data.password==request.form['password']:
                return render_template('PlayVideo.html')
            else:
                return "The Credentials are Invalid"


@app.route('/RegisterValidation',methods=['POST'])
def RegisterValidation():
    if request.method=='POST':
        if request.form['Password']==request.form['ConfirmPassword']:
            RegisterData=Users(request.form['title'],request.form['Username'],request.form['Email'],request.form['Password'],request.form['Company'])
            db.session.add(RegisterData)
            db.session.commit()
            return request.form['title']
        else:
            return "Password Did not match"


@app.route('/Upload',methods=['POST'])
def Upload():
    if request.method=="POST":
        file=request.files['upload_file']
        newFile=Media(title=file.filename, video=file.read(), description=request.form['desc'])
        db.session.add(newFile)
        db.session.commit()
        return "Video inserted Successfully <a href=''>< Go Back</a>"

@app.route('/Play')
def play():
    data=Media.query.filter_by(id=1).first()
    a=send_file(data,attachment_filename='video.mkv')
    return render_template('Test.html',video=a)


if __name__ == '__main__':
    app.run(debug=True)
    db.create_all()