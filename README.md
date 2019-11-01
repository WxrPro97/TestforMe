# TestforMe

## Setup

### Install and update using pip:

Flask:
```bash
pip install -U Flask
```

Bootstrap 4:
```bash
pip install Flask-Bootstrap4
```

RAKE-NLTK:
```bash
pip install rake-nltk
```

## Hosting

#### Hosting Locally
```
if __name__ == "__main__":
    app.run()
```

#### Hosting on Server
```
if __name__ == "__main__":
    app.run(host="0.0.0.0", port=80)
```
Make sure HTTP port 80 is open on your server.