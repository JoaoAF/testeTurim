/*Por favor, rodar estes comando no SGBD*/
CREATE DATABASE turim;

USE turim;

CREATE TABLE pessoa (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome varchar(255) NOT NULL
);

CREATE TABLE filhos (
    id int NOT NULL AUTO_INCREMENT,
    id_pessoa int NOT NULL,
    nome VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);
