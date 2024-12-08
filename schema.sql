CREATE DATABASE dolphin_crm;
USE dolphin_crm;

CREATE TABLE Users (
    id INT NOT NULL AUTO_INCREMENT,
    firstname varchar(255),
    lastname varchar(255),
    password varchar(255),
    email varchar(255),
    PRIMARY KEY (id)
);

CREATE TABLE Contacts (
    id INT NOT NULL AUTO_INCREMENT,
    title varchar(255),
    firstname varchar(255),
    lastname varchar(255),
    email varchar(255),
    telephone varchar(255),
    company varchar(255),
    type varchar(10),
    assigned_to varchar(200),
    created_by varchar(150),
    created_at datetime(6),
    updated_at datetime(6),
    PRIMARY KEY (id)
);

CREATE TABLE Notes (
    id INT NOT NULL AUTO_INCREMENT,
    contact_id int(150),
    comment text(255),
    created_by int(255),
    created_at datetime(6),
    PRIMARY KEY (id)
);

INSERT INTO USERS (password, email) VALUES (md5('password123'), "adminproject2.com");

