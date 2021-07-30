-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jul 30, 2021 at 11:23 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `bici`
--
CREATE DATABASE IF NOT EXISTS `bici` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `bici`;

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE `personas` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_paterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_materno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `curp` varchar(18) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cp` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `calle` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `numero_exterior` int(5) NOT NULL,
  `numero_interior` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `foto_bici` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `identificacion` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `identificacion_menor` varchar(256) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IX_CURP` (`curp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;
