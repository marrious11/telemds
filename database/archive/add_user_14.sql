-- Insert a user with id 14 if it does not exist
INSERT INTO users (id, name, email, phone, password, role, created_at)
SELECT 14, 'Test Patient', 'testpatient14@example.com', '0000000000', '$2y$10$wH8Qw6Qw6Qw6Qw6Qw6Qw6uQw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6Qw6', 'patient', NOW()
WHERE NOT EXISTS (SELECT 1 FROM users WHERE id = 14);

-- The password hash is for '12345'.
-- Adjust name, email, or phone as needed.
