<<<<<<< Updated upstream:CREATE DATABASE car selling.sql

CREATE DATABASE IF NOT EXISTS car_selling;
=======
CREATE DATABASE car_sellingg;
>>>>>>> Stashed changes:CREATE DATABASE car_selling.sql

USE car_selling;

CREATE TABLE IF NOT EXISTS cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    horsepower INT NOT NULL,
    image_path VARCHAR(255) NOT NULL
);
DROP TABLE IF EXISTS cars;
SHOW TABLES;


