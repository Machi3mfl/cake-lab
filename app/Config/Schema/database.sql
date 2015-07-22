SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `laboratorio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `laboratorio`;

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint(20) unsigned NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `categoria_superficies` (
  `id` int(11) NOT NULL,
  `categoria_id` bigint(20) unsigned NOT NULL,
  `superficie_id` bigint(20) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` bigint(20) unsigned NOT NULL COMMENT 'id auto incremental',
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `calle` varchar(40) NOT NULL,
  `numero` int(10) NOT NULL,
  `piso` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `provincia` varchar(40) NOT NULL,
  `localidad` varchar(40) NOT NULL,
  `codigo_postal` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `copias` (
  `id` bigint(20) unsigned NOT NULL,
  `cantidad` int(40) NOT NULL,
  `borde` tinyint(1) NOT NULL,
  `precio` float NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `upload_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `listas` (
  `id` bigint(20) unsigned NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `localidades` (
  `cod_loc` int(11) NOT NULL,
  `cod_prov` int(11) NOT NULL,
  `nom_loc` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` bigint(20) unsigned NOT NULL,
  `fecha` datetime NOT NULL,
  `importe` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `sucursal` varchar(50) NOT NULL,
  `forma_pago` varchar(100) NOT NULL,
  `observaciones` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `precios` (
  `id` bigint(20) unsigned NOT NULL,
  `precio` float NOT NULL,
  `lista_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint(20) unsigned NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `superficie_id` int(11) NOT NULL,
  `tamano_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `promociones` (
  `id` bigint(20) unsigned NOT NULL,
  `max` int(11) NOT NULL,
  `descuento_en` varchar(255) NOT NULL,
  `tipo_descuento` varchar(255) NOT NULL,
  `descuento` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `min` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `provincias` (
  `cod_prov` int(10) NOT NULL,
  `nom_prov` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `superficies` (
  `id` bigint(20) unsigned NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tamanos` (
  `id` bigint(20) unsigned NOT NULL,
  `tamano` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(10) unsigned NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_dir` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` tinytext COLLATE utf8_unicode_ci COMMENT 'full url to avatar image file',
  `language` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `aros`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `aros_acos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`);

ALTER TABLE `categorias`
  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `categoria_superficies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categoria_id_2` (`categoria_id`,`superficie_id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `papel_id` (`superficie_id`);

ALTER TABLE `clientes`
  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `copias`
  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `listas`
  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `localidades`
  ADD PRIMARY KEY (`cod_loc`);

ALTER TABLE `pedidos`
  ADD UNIQUE KEY `numero` (`id`);

ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `precios`
  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `provincias`
  ADD PRIMARY KEY (`cod_prov`);

ALTER TABLE `superficies`
  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `tamanos`
  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `acos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
ALTER TABLE `aros`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
ALTER TABLE `aros_acos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
ALTER TABLE `categoria_superficies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id auto incremental';
ALTER TABLE `copias`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `listas`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
ALTER TABLE `localidades`
  MODIFY `cod_loc` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
ALTER TABLE `precios`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
ALTER TABLE `productos`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
ALTER TABLE `promociones`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
ALTER TABLE `provincias`
  MODIFY `cod_prov` int(10) NOT NULL AUTO_INCREMENT;
ALTER TABLE `superficies`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
ALTER TABLE `tamanos`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
ALTER TABLE `uploads`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `categoria_superficies`
  ADD CONSTRAINT `categoria_superficies_categoria_fk` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `categoria_superficies_superficie_fk` FOREIGN KEY (`superficie_id`) REFERENCES `superficies` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;