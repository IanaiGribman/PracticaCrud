CREATE DATABASE test_bd_ianai
CHARACTER SET utf8 
COLLATE utf8_unicode_ci;

CREATE USER 'test_user_ianai'@'localhost' IDENTIFIED BY '12345';

GRANT ALL PRIVILEGES ON test_bd_ianai.* TO 'test_user_ianai'@'localhost';

FLUSH PRIVILEGES;​

USE test_bd_ianai;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    birth_date DATE NOT NULL
) ENGINE=INNODB;

/*Insertar algunos datos de prueba*/
INSERT INTO students (first_name, last_name, email, birth_date) VALUES
('Ianai', 'Gribman', 'ianai@email.com', '2006-02-15'),
('Mauro', 'Scardamaglia', 'mauro@email.com', '2006-10-10'),
('Marina', 'Díaz', 'marina@email.com', '2004-06-20');


/*VOLVER TODO A CERO, BORRAR BASE DE DATOS Y USUARIO (SE DEBERÍA EJECUTAR COMO ROOT)*/
REVOKE ALL PRIVILEGES, GRANT OPTION FROM 'test_user_ianai'@'localhost';
DROP USER 'test_user_ianai'@'localhost';
DROP DATABASE test_bd_ianai;