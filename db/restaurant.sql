/*
 Navicat Premium Data Transfer

 Source Server         : MySQL XAMPP
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : restaurant

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 18/07/2022 21:48:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes`  (
  `cedula` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `genero` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fechNacimiento` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cedula`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for login
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login`  (
  `cedula` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `genero` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cedula`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for platos
-- ----------------------------
DROP TABLE IF EXISTS `platos`;
CREATE TABLE `platos`  (
  `idPlato` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombrePlato` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `precioPlato` double(3, 2) NOT NULL,
  `tipoPlato` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idPlato`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ventas
-- ----------------------------
DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas`  (
  `idVenta` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idPlato` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cedCliente` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cedUsuario` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `discapacidad` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mayorEdad` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cantidad` int NOT NULL,
  `tipoPago` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descuento` double(5, 2) NOT NULL,
  `subtotal` double(5, 2) NOT NULL,
  `iva` double(5, 2) NOT NULL,
  `total` double(5, 2) NOT NULL,
  PRIMARY KEY (`idVenta`) USING BTREE,
  INDEX `frk_Usuario`(`cedUsuario`) USING BTREE,
  INDEX `frk_Cliente`(`cedCliente`) USING BTREE,
  INDEX `frk_Plato`(`idPlato`) USING BTREE,
  CONSTRAINT `frk_Usuario` FOREIGN KEY (`cedUsuario`) REFERENCES `login` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `frk_Cliente` FOREIGN KEY (`cedCliente`) REFERENCES `clientes` (`cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `frk_Plato` FOREIGN KEY (`idPlato`) REFERENCES `platos` (`idPlato`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
