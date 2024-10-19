from flask import Flask, request, jsonify
import psycopg2
from werkzeug.security import check_password_hash, generate_password_hash
from flask_cors import CORS

app = Flask(__name__)
CORS(app)  # Enable CORS if needed

# Database connection
def get_db_connection():
    conn = psycopg2.connect(
        dbname='your_db_name',
        user='your_db_user',
        password='your_password',
        host='your_db_host',
        port='5432'
    )
    return conn

@app.route('/login', methods=['POST'])
def login():
    data = request.get_json()
    username = data.get('username')
    password = data.get('password')
    
    conn = get_db_connection()
    cur = conn.cursor()
    cur.execute("SELECT user_id, username, email, password_hash FROM users WHERE username = %s", (username,))
    user = cur.fetchone()
    cur.close()
    conn.close()
    
    if user and check_password_hash(user[3], password):
        # Password is correct, generate token and return user info
        token = 'generated_token'  # Replace with actual token generation logic
        return jsonify({
            'user_id': user[0],
            'username': user[1],
            'email': user[2],
            'token': token
        })
    else:
        return jsonify({'error': 'Invalid credentials'}), 401

if __name__ == '__main__':
    app.run(debug=True)
