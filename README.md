# TestforMe

## Setup

### Python Dependencies (Debian/Ubuntu)
You will need to install Python 3 and MySQL development headers and libraries in order to proceed:

```bash
sudo apt install python3 python-dev python3-dev build-essential libssl-dev libffi-dev libxml2-dev libxslt1-dev zlib1g-dev python-pip default-libmysqlclient-dev
```

### Install using pip3:

Flask:
```bash
pip3 install -U Flask
```

Bootstrap 4:
```bash
pip3 install Flask-Bootstrap4
```

RAKE-NLTK:
```bash
pip3 install rake-nltk
```

MySQL Client
```bash
pip3 install mysqlclient
```

Flask-MySQLdb
```bash
pip3 install flask-mysqldb
```

## Hosting

#### Hosting Locally
```
if __name__ == "__main__":
    # Debug mode is useful to catch errors.
    app.run(debug=true)
```

#### Hosting on AWS Ubuntu Server
```
if __name__ == "__main__":
    app.run(host="0.0.0.0", port=80)
```
Make sure HTTP port 80 is open on your server.