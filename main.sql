CREATE TABLE users (
    user_id SERIAL PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password_hash VARCHAR(255) NOT NULL
);

CREATE TABLE tokens (
    token_id SERIAL PRIMARY KEY,
    user_id INT REFERENCES users(user_id),
    token VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Function to get user information based on token
CREATE OR REPLACE FUNCTION get_user_info(token_input VARCHAR)
RETURNS TABLE(user_id INT, username VARCHAR, email VARCHAR) AS $$
BEGIN
    RETURN QUERY
    SELECT u.user_id, u.username, u.email
    FROM users u
    JOIN tokens t ON u.user_id = t.user_id
    WHERE t.token = token_input;
END;
$$ LANGUAGE plpgsql;

-- Example usage:
-- SELECT * FROM get_user_info('your_token_here');