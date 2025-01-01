CREATE DATABASE IF NOT EXISTS atest;

USE atest;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name TEXT NOT NULL,  
);

INSERT INTO books (name) VALUES
    ('The Catcher in the Rye', 15.00),
    ('To Kill a Mockingbird', 20.00),
    ('1984', 18.00),
    ('The Great Gatsby', 25.00),
    ('Moby Dick', 22.00),
    ('War and Peace', 30.00),
    ('Pride and Prejudice', 18.00),
    ('The Hobbit', 10.00),
    ('Ulysses', 35.00),
    ('Hamlet', 12.00);

INSERT INTO books (name,) VALUES
    ('EncryptedBookName1'),
    ('EncryptedBookName2');

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email TEXT NOT NULL,
    password TEXT NOT NULL
);
