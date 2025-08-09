-- migrations/001_init.sql
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(150) UNIQUE,
  password_hash VARCHAR(255),
  role ENUM('admin','therapist','staff') DEFAULT 'therapist',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE patients (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  birth DATE,
  notes TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE boards (
  id INT AUTO_INCREMENT PRIMARY KEY,
  patient_id INT NULL,
  title VARCHAR(150),
  config JSON,
  created_by INT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (patient_id) REFERENCES patients(id),
  FOREIGN KEY (created_by) REFERENCES users(id)
);

CREATE TABLE pictograms (
  id INT AUTO_INCREMENT PRIMARY KEY,
  board_id INT,
  label VARCHAR(150),
  image_path VARCHAR(255),
  pos_row INT,
  pos_col INT,
  sound_override VARCHAR(255) NULL,
  extra JSON NULL,
  FOREIGN KEY (board_id) REFERENCES boards(id) ON DELETE CASCADE
);

CREATE TABLE sessions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  patient_id INT,
  user_id INT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  transcript TEXT
);
