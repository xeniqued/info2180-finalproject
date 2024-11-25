CREATE DATABASE dolpin_crm;

CREATE TABLE Users(
    id int;
    firstname varchar;
    lastname varchar;
    password varchar;
    email varchar;
)

CREATE TABLE Contacts(
    id int AUTO_INCREMENT PRIMARY KEY;
    title varchar;
    firstname varchar;
    lastname varchar;
    email varchar;
    telephone varchar;
    company varchar;
    type varchar;
    assigned_to varchar;
    created_by varchar;
    created_at datetime;
    updated_at datetime;

)

CREATE TABLE Notes(
    id int AUTO_INCREMENT PRIMARY KEY;
    contact_id int;
    comment text;
    created_by int;
    created_at datetime;
    
)