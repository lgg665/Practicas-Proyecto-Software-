CREATE DATABASE tp_php;

USE tp_php;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    edad INT NOT NULL
);

INSERT INTO usuarios
(nombre, apellido, correo, edad)
VALUES
('Homero', 'Simpson', 'homero@gmail.com', 42),
('Steve', 'Jobs', 'sjobs@gmail.com', 57),
('Marta', 'Gomez', 'marta_gomez@gmail.com', 36);