CREATE DATABASE webshop;

use webshop;

CREATE TABLE tshirts (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	type VARCHAR(15) NOT NULL,
	color VARCHAR(15) NOT NULL,
	size VARCHAR(10) NOT NULL,
	text VARCHAR(14) NOT NULL,
	quantity INT(3),
	date TIMESTAMP
);
