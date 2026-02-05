-- Migration to add emp_desc column to users table
-- Run this SQL command in your MySQL database to add the employee description field

ALTER TABLE users ADD COLUMN emp_desc TEXT DEFAULT NULL;
