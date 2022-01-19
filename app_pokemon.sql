DROP DATABASE IF EXISTS app_pokemon;
CREATE DATABASE app_pokemon;

USE app_pokemon;

CREATE TABLE pokemons(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre varchar(30) NOT NULL,
    tipo varchar(20) NOT NULL,
    altura int NOT NULL,
    peso int NOT NULL
);
