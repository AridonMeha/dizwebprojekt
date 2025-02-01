CREATE DATABASE car_sellingg;

USE car_selling;

CREATE TABLE cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    horsepower INT NOT NULL,
    image_path VARCHAR(255) NOT NULL
);
