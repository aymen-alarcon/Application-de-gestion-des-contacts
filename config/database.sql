CREATE DATABASE application_de_gestion_des_contacts;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(25), 
    lastName VARCHAR(25), 
    email VARCHAR(25), 
    password VARCHAR(25),
    profilePicture	varchar(255),
    dateInscription TIMESTAMP
);

CREATE TABLE contacts (
 	id INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(25),
    lastName VARCHAR(25),
    phone VARCHAR(25),
    email VARCHAR(25),
    city VARCHAR (25),
    country VARCHAR (25),
	restOfAddress VARCHAR(25),    
    userId int,
    FOREIGN KEY (userId) REFERENCES users(id)
)