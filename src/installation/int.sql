DROP DATABASE IF EXISTS `db_admin_panel`;
CREATE DATABASE `db_admin_panel`;
USE `db_admin_panel`;

CREATE TABLE IF NOT EXISTS `tbl_users` (
    `id` INT(11) AUTO_INCREMENT NOT NULL,
    `username` TINYTEXT NOT NULL,
    `email` TINYTEXT NOT NULL,
    `password` LONGTEXT NOT NULL,
    PRIMARY KEY (`id`)
)engine=innodb;

/*
    username - admin
    email - admin@panel.co.uk  
    password - Password123.
*/

INSERT INTO `tbl_users` VALUES (NULL, 'admin', 'admin@panel.co.uk', '$2y$10$3786HoCTKMszVf1WojbdyuNQeYK0Iaq60aP.XJMUkn8TYiWRJZIZ2');

CREATE TABLE IF NOT EXISTS `tbl_login_log` (
    `id` INT(11) AUTO_INCREMENT NOT NULL,
    `username` TINYTEXT NOT NULL,
    `event` TINYTEXT NOT NULL,               /* events - login success, login declined */
    `add_info` TINYTEXT,                     /* add_info - incorrect password, incorrect username */
    `c_browser` TINYTEXT NOT NULL,
    `c_os` TINYTEXT NOT NULL,
    `c_ip` TINYTEXT NOT NULL,
    `datetime` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
)engine=innodb;

INSERT INTO `tbl_login_log` VALUES (NULL, 'admin', 'SUCCESS', 'Login successful', 'Google Chrome', 'Windows 10', '127.0.0.1', NOW());
INSERT INTO `tbl_login_log` VALUES (NULL, 'admin', 'SUCCESS', 'Login successful', 'Google Chrome', 'Windows 10', '::1', NOW());
INSERT INTO `tbl_login_log` VALUES (NULL, 'admin', 'SUCCESS', 'Login successful', 'Google Chrome', 'Windows 10', '::1', NOW());
INSERT INTO `tbl_login_log` VALUES (NULL, 'ryan', 'SUCCESS', 'Login successful', 'Google Chrome', 'Windows 10', '::1', NOW());
INSERT INTO `tbl_login_log` VALUES (NULL, 'admin', 'SUCCESS', 'Login successful', 'Google Chrome', 'Windows 10', '::1', NOW());
INSERT INTO `tbl_login_log` VALUES (NULL, 'ryan', 'SUCCESS', 'Login successful', 'Safari', 'Windows 10', '::1', NOW());
INSERT INTO `tbl_login_log` VALUES (NULL, 'admin', 'SUCCESS', 'Login successful', 'Google Chrome', 'Windows 10', '::1', NOW());
INSERT INTO `tbl_login_log` VALUES (NULL, 'admin', 'SUCCESS', 'Login successful', 'Google Chrome', 'Windows 10', '::1', NOW());
INSERT INTO `tbl_login_log` VALUES (NULL, 'admin', 'SUCCESS', 'Login successful', 'Google Chrome', 'Windows 10', '::1', NOW());
INSERT INTO `tbl_login_log` VALUES (NULL, 'ryan', 'SUCCESS', 'Login successful', 'Google Chrome', 'Windows 10', '::1', NOW());
INSERT INTO `tbl_login_log` VALUES (NULL, 'admin', 'SUCCESS', 'Login successful', 'Google Chrome', 'Windows 10', '::1', NOW());
INSERT INTO `tbl_login_log` VALUES (NULL, 'admin', 'SUCCESS', 'Login successful', 'Google Chrome', 'Windows 10', '::1', NOW());
INSERT INTO `tbl_login_log` VALUES (NULL, 'ryan', 'SUCCESS', 'Login successful', 'Safari', 'Windows 10', '::1', NOW());
INSERT INTO `tbl_login_log` VALUES (NULL, 'admin', 'SUCCESS', 'Login successful', 'Google Chrome', 'Windows 10', '::1', NOW());
INSERT INTO `tbl_login_log` VALUES (NULL, 'admin', 'SUCCESS', 'Login successful', 'Google Chrome', 'Windows 10', '::1', NOW());
INSERT INTO `tbl_login_log` VALUES (NULL, 'admin', 'SUCCESS', 'Login successful', 'Google Chrome', 'Windows 10', '::1', NOW());
INSERT INTO `tbl_login_log` VALUES (NULL, 'admin', 'SUCCESS', 'Login successful', 'Google Chrome', 'Windows 10', '::1', NOW());
INSERT INTO `tbl_login_log` VALUES (NULL, 'admin', 'SUCCESS', 'Login successful', 'Google Chrome', 'Windows 10', '::1', NOW());
INSERT INTO `tbl_login_log` VALUES (NULL, 'admin', 'SUCCESS', 'Login successful', 'Google Chrome', 'Windows 10', '::1', NOW());

CREATE TABLE IF NOT EXISTS `tbl_errors` (
    `id` INT(11) AUTO_INCREMENT NOT NULL,
    `event` TINYTEXT NOT NULL,               /* events - db error, script error */
    `full_error` LONGTEXT NOT NULL,
    `datetime` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
)engine=innodb;

INSERT INTO `tbl_errors` VALUES (NULL, 'LOGIN_ERROR', 'Incorrect username', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'LOGIN_ERROR', 'Incorrect password', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'LOGIN_ERROR', 'Incorrect username', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'LOGIN_ERROR', 'Incorrect username', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'SIGNUP_ERROR', 'Username already taken: ryan', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'SIGNUP_ERROR', 'Username already taken: admin', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'LOGIN_ERROR', 'Incorrect username', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'LOGIN_ERROR', 'Incorrect username', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'LOGIN_ERROR', 'Incorrect password', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'LOGIN_ERROR', 'Incorrect password', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'SIGNUP_ERROR', 'Username already taken: ryan', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'SIGNUP_ERROR', 'Username already taken: ryan', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'LOGIN_ERROR', 'Incorrect username', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'LOGIN_ERROR', 'Incorrect username', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'SIGNUP_ERROR', 'Username already taken: ryan', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'LOGIN_ERROR', 'Incorrect password', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'LOGIN_ERROR', 'Incorrect password', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'LOGIN_ERROR', 'Incorrect password', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'LOGIN_ERROR', 'Incorrect password', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'LOGIN_ERROR', 'Incorrect password', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'LOGIN_ERROR', 'Incorrect password', NOW());
INSERT INTO `tbl_errors` VALUES (NULL, 'LOGIN_ERROR', 'Incorrect password', NOW());