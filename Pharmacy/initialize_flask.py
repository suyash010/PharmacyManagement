# app/__init__.py
from flask import Flask
from flask_mysqldb import MySQL
from app.config import Config

app = Flask(__name__)
app.config.from_object(Config)

mysql = MySQL(app)

from app import routes
