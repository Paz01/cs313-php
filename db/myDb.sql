------------ ACME DATABASE ---------------------

DROP TABLE IF EXISTS customer;
DROP TABLE IF EXISTS product;
DROP TABLE IF EXISTS order;

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
CREATE TABLE product 
(
    product_id SERIAL NOT NULL PRIMARY KEY,
    cut_lawn VARCHAR (80) NOT NULL,
    debris_removal VARCHAR (80) NOT NULL,
    leaves_removal VARCHAR (80) NOT NULL
);
------------------------------------------------
CREATE TABLE order
(
    order_id SERIAL NOT NULL PRIMARY KEY,s
    notes TEXT NOT NULL,
    price NUMERIC (10,2) NOT NULL,
    customer_id INT REFERENCES customer (customer_id),
    product_id INT REFERENCES product (product_id)
);
