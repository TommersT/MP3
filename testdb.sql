-- phpMyAdmin SQL Dump
-- Database: `test`

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_admin` int(1) NOT NULL DEFAULT 0,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `emp_desc` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `users` (`is_admin`, `first_name`, `last_name`, `username`, `email`, `password`, `mobile`, `emp_desc`) VALUES

(1, 'Philip', 'Ante', 'fajr42', 'fajr42@yahoo.com', '12345', '343434343434', 'Administrator'),
(0, 'John', 'Doe', '', 'johnny@yahoo.com', 'test', '67775554322', 'General Employee'),
(0, 'Clark', 'Kent', 'sup123', 'superman@gmail.com', '123', '1234567888', 'Reporter'),
(1, 'Love', 'Ofmylife', 'mylove123', 'mylove@gmail.com', 'love', '9744554222', 'Manager'),

(0, 'Alice', 'Smith', 'alice_s', 'alice@example.com', 'pass123', '09123456701', 'Senior Developer'),
(0, 'Robert', 'Downey', 'robert_d', 'robert@example.com', 'pass123', '09123456702', 'Project Manager'),
(0, 'Charlie', 'Brown', 'charlie_b', 'charlie@example.com', 'pass123', '09123456703', 'UI/UX Designer'),
(0, 'Diana', 'Prince', 'diana_p', 'diana@example.com', 'pass123', '09123456704', 'Quality Assurance'),
(0, 'Edward', 'Norton', 'edward_n', 'edward@example.com', 'pass123', '09123456705', 'System Analyst'),
(1, 'Fiona', 'Gallagher', 'fiona_g', 'fiona@example.com', 'admin456', '09123456706', 'HR Manager'),
(0, 'George', 'Miller', 'george_m', 'george@example.com', 'pass123', '09123456707', 'Technical Support'),
(0, 'Hannah', 'Baker', 'hannah_b', 'hannah@example.com', 'pass123', '09123456708', 'Frontend Developer'),
(0, 'Ian', 'Somerhalder', 'ian_s', 'ian@example.com', 'pass123', '09123456709', 'Marketing Specialist');

COMMIT;