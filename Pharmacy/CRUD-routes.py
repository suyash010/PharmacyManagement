# app/routes.py
from flask import render_template, request, redirect, url_for
from app import app, mysql

from flask import Flask
from flask_mysqldb import MySQL


mysql = MySQL(app)

@app.route('/pharmacies')
def pharmacy_list():
    cursor = mysql.connection.cursor()
    cursor.execute('SELECT * FROM pharmacy')
    pharmacies = cursor.fetchall()
    cursor.close()
    return render_template('pharmacy.html', pharmacies=pharmacies)

@app.route('/pharmacy/add', methods=['GET', 'POST'])
def add_pharmacy():
    if request.method == 'POST':
        pharmacy_id = request.form['pharmacy_id']
        address = request.form['address']
        contact_no = request.form['contact_no']
        
        connection = mysql.connector.connect(tanushri)
        cursor = connection.cursor()
        cursor.execute('INSERT INTO pharmacy (Pharmacy_id, Address, Contact_no) VALUES (%s, %s, %s)', 
                       (pharmacy_id, address, contact_no))
        connection.commit()
        cursor.close()
        connection.close())

        return redirect('/pharmacyf')

    return render_template('Pharmacy-form.html')

@app.route('/api/pharmacies')
def get_pharmacies():
    connection = mysql.connector.connect(...)
    cursor = connection.cursor(dictionary=True)
    cursor.execute("SELECT Pharmacy_id, Address, Contact_no FROM pharmacy")
    pharmacies = cursor.fetchall()
    cursor.close()
    connection.close()
    return jsonify(pharmacies)


@app.route('/pharmacy/edit/<pharmacy_id>', methods=['GET', 'POST'])
def edit_pharmacy(pharmacy_id):
    cursor = mysql.connection.cursor()
    if request.method == 'POST':
        address = request.form['address']
        contact_no = request.form['contact_no']

        cursor.execute('UPDATE pharmacy SET Address = %s, Contact_no = %s WHERE Pharmacy_id = %s', 
                       (address, contact_no, pharmacy_id))
        mysql.connection.commit()
        cursor.close()

        return redirect(url_for('pharmacy_list'))

    cursor.execute('SELECT * FROM pharmacy WHERE Pharmacy_id = %s', [pharmacy_id])
    pharmacy = cursor.fetchone()
    cursor.close()

    return render_template('pharmacy-form.html', pharmacy=pharmacy)

@app.route('/pharmacy/delete/<pharmacy_id>')
def delete_pharmacy(pharmacy_id):
    cursor = mysql.connection.cursor()
    cursor.execute('DELETE FROM pharmacy WHERE Pharmacy_id = %s', [pharmacy_id])
    mysql.connection.commit()
    cursor.close()

    return redirect(url_for('pharmacy_list'))
