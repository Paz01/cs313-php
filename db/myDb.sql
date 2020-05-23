------------ ACME DATABASE ---------------------

DROP TABLE IF EXISTS job;
DROP TABLE IF EXISTS service;
DROP TABLE IF EXISTS customer;

------------CREATION -----------------------------
CREATE TABLE customer
(
    customer_id SERIAL NOT NULL PRIMARY KEY,
    first_Name VARCHAR(80) NOT NULL,
    last_Name VARCHAR(80)NOT NULL,
    phone VARCHAR (15) NOT NULL,
    email VARCHAR (50) NOT NULL
);
-------------------------------------------------
CREATE TABLE service 
(
    service_id SERIAL NOT NULL PRIMARY KEY,
    type_of_service VARCHAR (80) NOT NULL
);
------------------------------------------------
CREATE TABLE job
(
    job_id SERIAL NOT NULL PRIMARY KEY,
    notes TEXT NOT NULL,
    price NUMERIC (10,2) NOT NULL,
    customer_id INT REFERENCES customer (customer_id),
    service_id INT REFERENCES service (service_id)
);
------------------- INSERTION ----------------------
INSERT INTO customer (first_Name, last_Name, phone, email) VALUES ('John', 'Smith', '817-845-4574', 'Smith@gmail.com');
INSERT INTO customer (first_Name, last_Name, phone, email) VALUES ('Jane', 'Doe', '812-123-1528', 'Doe@gmail.com');
INSERT INTO customer (first_Name, last_Name, phone, email) VALUES ('Donald', 'Duck', '812-147-7814', 'Duck@gmail.com');

-------------------- INSERTION ---------------------
INSERT INTO service (type_of_service) VALUES ('Cut lawn');
INSERT INTO service (type_of_service) VALUES ('Debris removal'); 
INSERT INTO service (type_of_service) VALUES ('Leaves removal'); 

-------------------- INSERTION ---------------------
INSERT INTO job (notes, price, customer_id, service_id) VALUES ('The job went smooth', '75.00',1,1);
INSERT INTO job (notes, price, customer_id, service_id) VALUES ('The job went fine', '105.00',1,1);
INSERT INTO job (notes, price, customer_id, service_id) VALUES ('The job went ok', '50.00',1,2);
INSERT INTO job (notes, price, customer_id, service_id) VALUES ('Easy job', '150.00',1,2);

-------------------------- QUERIES ------------------------------------
/* This query will display the selected columns from customer table 
/* SELECT customer_id, first_name, last_name, phone FROM customer'; */

SELECT type_of_service FROM service;