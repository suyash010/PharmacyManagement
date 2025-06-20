from flask import Flask, render_template, request, jsonify
import mysql.connector
from mysql.connector import Error

app = Flask(__name__)

# MySQL Database connection details
host = "localhost"  # or the IP address of your MySQL server
database = "your_database_name"
user = "your_mysql_username"
password = "your_mysql_password"

def get_db_connection():
    connection = mysql.connector.connect(
        host=host,
        database=database,
        user=user,
        password=password
    )
    return connection

@app.route('/')
def index():
    return render_template('pharmacy.html')

# Route to fetch all pharmacies
@app.route('/pharmacies', methods=['GET'])
def get_pharmacies():
    try:
        connection = get_db_connection()
        cursor = connection.cursor(dictionary=True)
        cursor.execute('SELECT * FROM pharmacy')
        pharmacies = cursor.fetchall()
        cursor.close()
        connection.close()
        return jsonify(pharmacies)
    except Error as e:
        return jsonify({"message": f"Error: {e}"}), 500

# Route to add a pharmacy
@app.route('/pharmacies', methods=['POST'])
def add_pharmacy():
    try:
        data = request.json
        connection = get_db_connection()
        cursor = connection.cursor()
        cursor.execute("""
            INSERT INTO pharmacy (Pharmacy_id, address, contact_no)
            VALUES (%s, %s, %s)
        """, (data['Pharmacy_id'], data['address'], data['contact_no']))
        connection.commit()
        cursor.close()
        connection.close()
        return jsonify({"message": "Pharmacy added successfully"}), 201
    except Error as e:
        return jsonify({"message": f"Error: {e}"}), 500

# Route to update a pharmacy
@app.route('/pharmacies/<pharmacy_id>', methods=['PUT'])
def update_pharmacy(pharmacy_id):
    try:
        data = request.json
        connection = get_db_connection()
        cursor = connection.cursor()
        cursor.execute("""
            UPDATE pharmacy
            SET address = %s, contact_no = %s
            WHERE Pharmacy_id = %s
        """, (data['address'], data['contact_no'], pharmacy_id))
        connection.commit()
        cursor.close()
        connection.close()
        return jsonify({"message": "Pharmacy updated successfully"})
    except Error as e:
        return jsonify({"message": f"Error: {e}"}), 500

# Route to delete a pharmacy
@app.route('/pharmacies/<pharmacy_id>', methods=['DELETE'])
def delete_pharmacy(pharmacy_id):
    try:
        connection = get_db_connection()
        cursor = connection.cursor()
        cursor.execute("""
            DELETE FROM pharmacy WHERE Pharmacy_id = %s
        """, (pharmacy_id,))
        connection.commit()
        cursor.close()
        connection.close()
        return jsonify({"message": "Pharmacy deleted successfully"})
    except Error as e:
        return jsonify({"message": f"Error: {e}"}), 500

if __name__ == '__main__':
    app.run(debug=True)
