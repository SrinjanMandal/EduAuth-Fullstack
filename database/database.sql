
-- Database schema for EduAuth Fullstack

-- auth_user table
CREATE TABLE auth_user (
    id SERIAL PRIMARY KEY,
    email VARCHAR(100) UNIQUE NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- teachers table
CREATE TABLE teachers (
    id SERIAL PRIMARY KEY,
    user_id INT UNIQUE NOT NULL,
    university_name VARCHAR(150) NOT NULL,
    gender VARCHAR(10) NOT NULL,
    year_joined INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES auth_user(id) ON DELETE CASCADE
);

-- Sample data
INSERT INTO auth_user (email, first_name, last_name, password)
VALUES ('john.doe@example.com', 'John', 'Doe', 'hashedpassword123');

INSERT INTO teachers (user_id, university_name, gender, year_joined)
VALUES (1, 'KIIT University', 'Male', 2020);
