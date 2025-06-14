-- Create users table
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(100) NOT NULL UNIQUE
);

-- Create doctors table
CREATE TABLE IF NOT EXISTS doctors (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  specialty VARCHAR(100) NOT NULL
);

-- Create appointments table
CREATE TABLE IF NOT EXISTS appointments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  specialty VARCHAR(100) NOT NULL,
  doctor_id INT NOT NULL,
  user_id INT,
  time_slot DATETIME NOT NULL,
  FOREIGN KEY (doctor_id) REFERENCES doctors(id),
  FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Create medical_records table
CREATE TABLE IF NOT EXISTS medical_records (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  doctor_id INT NOT NULL,
  diagnosis VARCHAR(255),
  treatment TEXT,
  record_date DATE,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (doctor_id) REFERENCES doctors(id)
);

INSERT INTO users (email, name) VALUES ('alice@example.com', 'Alice')
ON DUPLICATE KEY UPDATE name = VALUES(name);

SELECT DISTINCT email FROM users;

DELETE t1 FROM users t1
INNER JOIN users t2 
WHERE t1.id > t2.id AND t1.email = t2.email;