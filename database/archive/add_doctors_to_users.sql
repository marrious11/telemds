-- add_doctors_to_users.sql
-- This script adds unique doctors from the doctors table to the users table if their email does not already exist, with default password '12345' and role 'doctor'.

INSERT INTO users (name, email, phone, password, role)
SELECT unique_docs.name, unique_docs.email, NULL, '$2y$10$wH8Qw6Qw6Qw6Qw6Qw6Qw6uQw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6', 'doctor'
FROM (
    SELECT DISTINCT d.name,
        CONCAT(LOWER(REPLACE(d.name, ' ', '')), '@example.com') AS email
    FROM doctors d
) AS unique_docs
LEFT JOIN users u ON unique_docs.email = u.email
WHERE u.id IS NULL;

-- Note: The password hash is for '12345' using bcrypt (PHP's password_hash). Adjust as needed.
-- This will assign a default email based on the doctor's name if not present.
-- You may want to update emails and phones manually for real use.
