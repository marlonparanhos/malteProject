/*
Navicat MySQL Data Transfer

Source Server         : Marlon
Source Server Version : 100113
Source Host           : localhost:3306
Source Database       : malte

Target Server Type    : MYSQL
Target Server Version : 100113
File Encoding         : 65001

Date: 2018-07-12 11:37:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `genero` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
