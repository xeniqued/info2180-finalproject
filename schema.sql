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

INSERT INTO Users (firstname, lastname, password, email, role, created_at) VALUES
('Michael', 'Scott', 'worldsbestboss123', 'michael.scott@dundermifflin.com', 'admin', '2024-06-06 08:00:00'),
('Jim', 'Halpert', 'big_tuna456', 'jim.halpert@dundermifflin.com', 'user', '2024-06-06 09:00:00'),
('Pam', 'Beesly', 'pam1234secure', 'pam.beesly@dundermifflin.com', 'editor', '2024-06-06 10:00:00'),
('Dwight', 'Schrute', 'beetsbears123', 'dwight.schrute@dundermifflin.com', 'admin', '2024-06-06 11:00:00'),
('Angela', 'Martin', 'sprinkles789', 'angela.martin@dundermifflin.com', 'user', '2024-06-06 12:00:00'),
('Kevin', 'Malone', 'chili4life', 'kevin.malone@dundermifflin.com', 'user', '2024-06-06 13:00:00'),
('Oscar', 'Martinez', 'accountingpro123', 'oscar.martinez@dundermifflin.com', 'editor', '2024-06-06 14:00:00'),
('Stanley', 'Hudson', 'crosswordking456', 'stanley.hudson@dundermifflin.com', 'user', '2024-06-06 15:00:00'),
('Ryan', 'Howard', 'temp2024', 'ryan.howard@dundermifflin.com', 'editor', '2024-06-06 16:00:00'),
('Kelly', 'Kapoor', 'fashionicon789', 'kelly.kapoor@dundermifflin.com', 'user', '2024-06-06 17:00:00'),
('Toby', 'Flenderson', 'hrforever321', 'toby.flenderson@dundermifflin.com', 'editor', '2024-06-06 18:00:00'),
('Meredith', 'Palmer', 'partyqueen123', 'meredith.palmer@dundermifflin.com', 'user', '2024-06-06 19:00:00'),
('Andy', 'Bernard', 'cornellrules456', 'andy.bernard@dundermifflin.com', 'user', '2024-06-06 20:00:00'),
('Jan', 'Levinson', 'exboss123', 'jan.levinson@dundermifflin.com', 'admin', '2024-06-06 21:00:00'),
('Erin', 'Hannon', 'receptionist456', 'erin.hannon@dundermifflin.com', 'user', '2024-06-06 22:00:00');


INSERT INTO Contacts (title, firstname, lastname, email, telephone, company, type, assigned_to, created_by, created_at, updated_at) VALUES
('Mr.', 'Michael', 'Scott', 'michael.scott@dundermifflin.com', '555-1234', 'Dunder Mifflin Paper Co.', 'Sales Lead', 1, 3, '2024-06-06 08:00:00', '2024-06-06 09:30:00'),
('Mr.', 'Dwight', 'Schrute', 'dwight.schrute@schrute-farms.com', '555-2345', 'Schrute Farms', 'Support', 4, 1, '2024-06-06 09:00:00', '2024-06-06 09:45:00'),
('Ms.', 'Pam', 'Beesly', 'pam.beesly@dundermifflin.com', '555-3456', 'Dunder Mifflin Paper Co.', 'Sales Lead', 1, 4, '2024-06-06 10:30:00', '2024-06-06 11:15:00'),
('Mr.', 'Jim', 'Halpert', 'jim.halpert@dundermifflin.com', '555-4567', 'Dunder Mifflin Paper Co.', 'Support', 3, 1, '2024-06-06 11:00:00', '2024-06-06 12:00:00'),
('Ms.', 'Angela', 'Martin', 'angela.martin@dundermifflin.com', '555-5678', 'Dunder Mifflin Paper Co.', 'Sales Lead', 7, 3, '2024-06-06 12:30:00', '2024-06-06 13:00:00'),
('Mr.', 'Kevin', 'Malone', 'kevin.malone@dundermifflin.com', '555-6789', 'Dunder Mifflin Paper Co.', 'Support', 8, 9, '2024-06-06 14:00:00', '2024-06-06 15:00:00'),
('Mr.', 'Stanley', 'Hudson', 'stanley.hudson@dundermifflin.com', '555-7890', 'Dunder Mifflin Paper Co.', 'Sales Lead', 1, 3, '2024-06-06 15:30:00', '2024-06-06 16:00:00'),
('Ms.', 'Kelly', 'Kapoor', 'kelly.kapoor@dundermifflin.com', '555-8901', 'Dunder Mifflin Paper Co.', 'Sales Lead', 9, 1, '2024-06-06 16:45:00', '2024-06-06 17:30:00'),
('Mr.', 'Ryan', 'Howard', 'ryan.howard@temp.com', '555-9012', 'Temp Agency', 'Support', 1, 10, '2024-06-06 17:45:00', '2024-06-06 18:00:00'),
('Ms.', 'Jan', 'Levinson', 'jan.levinson@corporate.com', '555-0123', 'Dunder Mifflin Corporate', 'Sales Lead', 1, 9, '2024-06-06 18:30:00', '2024-06-06 19:00:00'),
('Mr.', 'Creed', 'Bratton', 'creed.bratton@dundermifflin.com', '555-1111', 'Dunder Mifflin Paper Co.', 'Support', 3, 4, '2024-06-06 19:30:00', '2024-06-06 20:00:00');

INSERT INTO Notes (contact_id, comment, created_by, created_at) VALUES
(1, 'Followed up with Michael regarding bulk paper order. He mentioned needing time to decide.', 3, '2024-06-06 09:45:00'),
(2, 'Dwight expressed interest in additional beet supplies for his farm.', 4, '2024-06-06 10:00:00'),
(3, 'Pam is exploring new designs for the company letterhead. Awaiting feedback.', 1, '2024-06-06 11:30:00'),
(4, 'Jim confirmed the next client meeting for Friday at 3 PM.', 3, '2024-06-06 12:15:00'),
(5, 'Angela approved the latest expense reports but requested additional receipts.', 7, '2024-06-06 13:30:00'),
(6, 'Kevin asked for a follow-up on his outstanding invoice for catering services.', 9, '2024-06-06 14:20:00'),
(7, 'Stanley is uninterested in attending the sales seminar but will reconsider next month.', 1, '2024-06-06 15:00:00'),
(8, 'Kelly suggested a new marketing plan but is waiting for Ryan’s approval.', 9, '2024-06-06 16:30:00'),
(9, 'Ryan provided an updated report on the Temp Agency’s recent performance.', 10, '2024-06-06 17:00:00'),
(10, 'Jan discussed restructuring plans for the corporate office. Notes sent to Michael for review.', 1, '2024-06-06 18:30:00'),
(11, 'Creed shared an unusual request for paper delivery—no further details provided.', 4, '2024-06-06 19:15:00');
