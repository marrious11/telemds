-- Add urgency and attachment columns to appointments table
ALTER TABLE appointments
ADD COLUMN urgency ENUM('routine','soon','urgent') DEFAULT 'routine' AFTER specialty,
ADD COLUMN attachment VARCHAR(255) DEFAULT NULL AFTER urgency;
