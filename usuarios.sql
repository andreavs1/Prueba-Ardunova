-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2026 a las 07:41:10
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ardunova`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

 CREATE TABLE usuarios (
    -> id_usuarios INT AUTO_INCREMENT PRIMARY KEY,
    -> nombre VARCHAR(100) NOT NULL,
    -> email VARCHAR(150) NOT NULL UNIQUE,
    -> password VARCHAR(255) NOT NULL,
    -> );
--

-- Creamos la tabla tutoriale spara poder cargarlos en la base de datos de forma id
> CREATE TABLE tutoriales (
    -> id_tutorial INT AUTO_INCREMENT PRIMARY KEY,
    -> categoria_t VARCHAR(20) NOT NULL
    -> );
--

--
-- Tabla intermedia 
-- Creamos la tabla de progreso para que cada tutorial completado de cada usuario se guarde en la base de datos 
CREATE TABLE progreso (
    -> id_progreso INT AUTO_INCREMENT PRIMARY KEY,
    -> id_usuarios INT NOT NULL,
    -> id_tutorial INT NOT NULL,
    -> completado BOOLEAN NOT NULL DEFAULT FALSE,
    --
    --
    --
    -- Hacemos la conexion de las tablas 
    -> FOREIGN KEY (id_usuarios)
    -> REFERENCES usuarios(id_usuarios)
    -> ON DELETE CASCADE
    -> ON UPDATE CASCADE,
    --
    --
    --

    -> FOREIGN KEY (id_tutorial)
    -> REFERENCES tutoriales(id_tutorial)
    -> ON DELETE RESTRICT
    -> ON UPDATE CASCADE,
    -> UNIQUE (id_usuarios, id_tutorial),

    -- En la base de datos se duarda en 0 y 1
    -- 1 = completado 
    -- 0 = no completado 
    -> CHECK (completado IN (0, 1)) 
    -> );
-- cargamos las categoria de los tutoriales 
 insert into tutoriales (id_tutorial, categoria_t) values
    -> (1, 'Principiante'),
    -> (2, 'Principiante'),
    -> (3, 'Principiante'),
    -> (4, 'Principiante'),
    -> (5, 'Principiante'),
    -> (6, 'Principiante'),
    -> (7, 'Principiante'),
    -> (8, 'Principiante');
