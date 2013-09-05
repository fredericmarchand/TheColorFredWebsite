-- Comp2405 Assignment 4 database
-- ====================================

CREATE DATABASE IF NOT EXISTS db_comp2405;
USE db_comp2405;

DROP TABLE IF EXISTS images;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS orders;

-- Create database tables
-- ======================

CREATE TABLE images(
	image_id int(11) NOT NULL AUTO_INCREMENT,
	image_path varchar(150) NOT NULL,
	image_name varchar(40) NOT NULL,
	primary key (image_id)
);

CREATE TABLE users(
	user_id varchar(30) NOT NULL,
	password varchar(20) NOT NULL,
	name varchar(50) NOT NULL,
	street varchar(60) NOT NULL,
	city varchar(30)NOT NULL,
	province varchar(30) NOT NULL,
	postal_code varchar(7) NOT NULL,
	email varchar(60) NOT NULL,
	primary key (user_id)
	
);

CREATE TABLE orders(
	invoice int(11) NOT NULL AUTO_INCREMENT,
  	user_id varchar(30) NOT NULL,
  	image varchar(50) NOT NULL,
  	dimension int(11) NOT NULL,
	price int(11) NOT NULL,
  	primary key (invoice)
);


-- Insert data into tables
-- =======================

INSERT INTO images (image_id, image_path, image_name) VALUES(1000, 'images/American Airlines Arena.jpg', 'American Airlines Arena');
INSERT INTO images (image_id, image_path, image_name) VALUES(1001, 'images/Audi R8.jpg', 'Audi R8');
INSERT INTO images (image_id, image_path, image_name) VALUES(1002, 'images/Big Boat.jpg', 'Big Boat');
INSERT INTO images (image_id, image_path, image_name) VALUES(1003, 'images/Biggest Miami Mansion.jpg','Biggest Miami Mansion');
INSERT INTO images (image_id, image_path, image_name) VALUES(1004, 'images/Ferrari 458 Italia.jpg', 'Ferrari 458 Italia');
INSERT INTO images (image_id, image_path, image_name) VALUES(1005, 'images/Ford GT.jpg','Ford GT');
INSERT INTO images (image_id, image_path, image_name) VALUES(1006, 'images/Gator Teeth.jpg','Gator Teeth');
INSERT INTO images (image_id, image_path, image_name) VALUES(1007, 'images/Indianapolis 500 Corvette.jpg','Indianapolis 500 Corvette');
INSERT INTO images (image_id, image_path, image_name) VALUES(1008, 'images/Lamborghinis.jpg','Lamborghinis');
INSERT INTO images (image_id, image_path, image_name) VALUES(1009, 'images/Lamborgnini Miami.jpg','Lamborghini Miami');
INSERT INTO images (image_id, image_path, image_name) VALUES(1010, 'images/Lotus Evora.jpg','Lotus Evora');
INSERT INTO images (image_id, image_path, image_name) VALUES(1011, 'images/Mercedes Benz SLR AMG McLaren.jpg','Mercedes Benz SLR AMG McLaren');
INSERT INTO images (image_id, image_path, image_name) VALUES(1012, 'images/Mercedes Benz SLS AMG.jpg','Mercedes Benz SLS AMG');
INSERT INTO images (image_id, image_path, image_name) VALUES(1013, 'images/Miami Mansion.jpg','Miami Mansion');
INSERT INTO images (image_id, image_path, image_name) VALUES(1014, 'images/Miami Vice Mansion.jpg','Miami Vice Mansion');
INSERT INTO images (image_id, image_path, image_name) VALUES(1015, 'images/Pose with Alligator.jpg','Pose with Alligator');
INSERT INTO images (image_id, image_path, image_name) VALUES(1016, 'images/Rolls Royces.jpg','Rolls Royces');
INSERT INTO images (image_id, image_path, image_name) VALUES(1017, 'images/South Beach Paradise.jpg','South Beach Paradise');
INSERT INTO images (image_id, image_path, image_name) VALUES(1018, 'images/Super Alligator Wrestling.jpg','Super Alligator Wrestling');
INSERT INTO images (image_id, image_path, image_name) VALUES(1019, 'images/Wrestling.jpg','Wrestling');
	
	
INSERT INTO users (user_id, password, name, street, city, province, postal_code, email) VALUES('fred_marchand', 'basketball', 'Frederic Marchand', '3636 Downpatrick', 'Ottawa', 'ON', 'K1V-8Y9', 'fmarchan@connect.carleton.ca');


INSERT INTO orders (invoice, user_id, image, dimension, price) VALUES(1000, 'fred_marchand', 'images/Audi R8.jpg', 150, 10);