-- Insert sample users
INSERT INTO users (name, email, phone, role, password) VALUES
('Alice Patient', 'alice@example.com', '1234567890', 'patient', 'password1'),
('Bob Doctor', 'bob@example.com', '0987654321', 'doctor', 'password2');

-- Insert sample doctors
INSERT INTO doctors (name, specialty) VALUES
('Dr. John Akafor', 'General'),
('Dr. Jane Atem', 'Cardiology'),
('Dr. Emily Ashly', 'Dermatology');

-- Insert sample appointments
INSERT INTO appointments (doctor_id, time_slot) VALUES
(1, '2025-06-15 10:00:00'),
(2, '2025-06-16 14:30:00');

-- Insert sample medical records
INSERT INTO medical_records (user_id, doctor_id, diagnosis, treatment, record_date) VALUES
(1, 1, 'Hypertension', 'Prescribed medication and lifestyle changes.', '2025-06-01'),
(1, 2, 'Mild Arrhythmia', 'Recommended further tests and follow-up.', '2025-06-10'),
(2, 1, 'Routine Checkup', 'All vitals normal.', '2025-06-05');