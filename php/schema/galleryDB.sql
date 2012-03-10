-- README 
-- This SQL script will create database for the ITECH3224-6224 `gallery` assignment
-- You can run this script from the phpMyAdmin (or any other MySQL admin front end)
-- or from the mysql command line  as: mysql -u root -p < galleryDB.sql
-- NOTE* This script will destroy any old version of the `gallery` database
-- Before you run this script please make sure that you back up any old version of the `gallery` database 
-- For backing up your DB you can use 
-- 'mysqldump' from the command line as: mysqldump -u root -p --databases gallery > gallery.backup.sql
-- or use phpMyAdmin/Export from the web browser

-- Create Database if does not exist: `gallery`
DROP DATABASE IF EXISTS `gallery`;
CREATE DATABASE `gallery`;
USE `gallery`;

-- Table structure for table `admin` used for admin login
CREATE TABLE IF NOT EXISTS `admin` (
  `login` varchar(10) NOT NULL COMMENT 'Login Name',
  `passwd` varchar(50) NOT NULL COMMENT 'MD5 hashed password',
  PRIMARY KEY (`login`)
) ENGINE=MyISAM COMMENT='Administrator Access';

-- Insert data into `admin` table used for admin access
-- please note that the passwd is MD5 hashed 
-- the pasword value is 'admin2010'
INSERT INTO `admin` (`login`, `passwd`) VALUES
('admin', 'a8c49fa294f8dd057631e95c6a01a23e');

-- Table structure for table `artist` used to store artist information
-- Please note that email has 'unique' constraint meaning that two artists cannot have the same email address 
CREATE TABLE IF NOT EXISTS `artist` (
  `artist_id` smallint(3) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `bibliography` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`artist_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB COMMENT='Artist Records';

-- Table structure for table `art` used to store art details
CREATE TABLE IF NOT EXISTS `art` (
  `art_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `price` int(8) NOT NULL DEFAULT '0',
  `artist_id` smallint(3) unsigned NOT NULL,
  PRIMARY KEY (`art_id`),
  KEY `artist_id` (`artist_id`)
) ENGINE=InnoDB COMMENT='Art Displayed in the Gallery';



-- Constraints for table `art`
-- This is actual foreign key that links art and artist table
-- Each art piece is associated with one and only one artist
ALTER TABLE `art`
ADD CONSTRAINT `fk_artist` FOREIGN KEY (`artist_id`) 
REFERENCES `artist` (`artist_id`) 
ON DELETE CASCADE ON UPDATE CASCADE;

-- Finally we create a DB user called 'gallery_user' with 'gallery2010' password
-- This username and password will be used in the mysql_connect() function to connect to MySQL server. 
-- We give this user data management permissions only on the `gallery` database (all tables)
GRANT SELECT,INSERT,UPDATE,DELETE ON gallery.* TO 'gallery_user'@'localhost' IDENTIFIED BY 'gallery2010' ;
