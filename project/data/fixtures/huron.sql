-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-07-2010 a las 14:30:50
-- Versión del servidor: 5.1.37
-- Versión de PHP: 5.2.10-2ubuntu6.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `huron`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cuit` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `client`
--

INSERT INTO `client` (`id`, `name`, `address`, `phone`, `cuit`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Petrolera el Trebol S.A.', '', '', '', '', '2010-06-28 19:18:55', '2010-06-28 19:18:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client_contact`
--

CREATE TABLE IF NOT EXISTS `client_contact` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `movil` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locality_id` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id_idx` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `client_contact`
--

INSERT INTO `client_contact` (`id`, `client_id`, `first_name`, `last_name`, `position`, `phone`, `movil`, `email`, `address`, `address_2`, `locality_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Julio', 'Alvarez', '', '', '', '', '', '', NULL, '2010-07-01 12:09:36', '2010-07-01 12:09:36'),
(2, 1, 'Guillermo', 'Díaz', '', '', '', '', '', '', NULL, '2010-07-01 12:09:48', '2010-07-01 12:09:48'),
(3, 1, 'Raul ', 'Lahoz', '', '', '', '', '', '', NULL, '2010-07-01 12:09:59', '2010-07-01 12:09:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `config`
--

INSERT INTO `config` (`id`, `name`, `value`, `description`, `created_at`, `updated_at`) VALUES
(1, 'lugar_origen', 'Mendoza', 'Este el el lugar desde donde se emiten las propuestas. ', '2010-07-01 11:46:44', '2010-07-01 11:46:44'),
(2, 'texto_cabecera', 'De nuestra mayor consideración, nos dirigimos a ustedes con el proposito de ofrecerles los trabajos /materiales que a continuación se detallan:', 'Texto que aparece al inicio de la propuesta comencial', '2010-07-01 11:54:32', '2010-07-01 11:54:32'),
(3, 'titulo_propuesta', 'Propuesta Comercial', 'Título principal de la propuesta comercial', '2010-07-01 12:02:47', '2010-07-01 12:02:47'),
(4, 'saludo_final', 'Atentamente,', 'Saludo que aparece al final de la propuesta', '2010-07-01 12:04:27', '2010-07-01 12:04:27'),
(5, 'remitente', 'Anibal Salinas\r\nGVS Argentina S.A.\r\nCel: 154-549814', 'Remitente de la propuesta', '2010-07-01 12:04:54', '2010-07-01 12:16:13'),
(6, 'pie_izquierdo', 'Dirección Administrativa:\r\nAvda. San Martin 1035 Piso 11 - Of. 49\r\nTel.: 0054-261-5246692 - Código Postal 5500\r\nMendoza Capital - Argentina\r\nCorreo: info@gvsargentina.com', 'Texto que se muestra en el pie de la propuesta a la izquierda. ', '2010-07-01 12:19:18', '2010-07-14 13:24:15'),
(7, 'pie_derecho', 'Dirección de Base de Operaciones:\r\nLateral Este Acceso Sur, km. 23\r\nTel.: 0054-261-3509730\r\nCódigo Postal 5509', 'Texto que se muestra en el pie de la propuesta a la derecha. ', '2010-07-01 12:20:43', '2010-07-01 12:21:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `proposal_id` bigint(20) DEFAULT NULL,
  `service_id` bigint(20) DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `unit_cost` decimal(10,2) DEFAULT NULL,
  `comments` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `proposal_id_idx` (`proposal_id`),
  KEY `service_id_idx` (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `item`
--

INSERT INTO `item` (`id`, `proposal_id`, `service_id`, `amount`, `unit_cost`, `comments`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 866.00, '', '2010-07-01 11:19:07', '2010-07-01 11:39:17'),
(2, 1, 2, 1, 0.00, 'Provisto por PETSA', '2010-07-01 11:19:19', '2010-07-01 11:39:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mdgalledy_album`
--

CREATE TABLE IF NOT EXISTS `mdgalledy_album` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` longtext,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id_idx` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `mdgalledy_album`
--

INSERT INTO `mdgalledy_album` (`id`, `author_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Family Album', 'My familiar album', '2010-06-28 19:18:16', '2010-06-28 19:18:16'),
(2, NULL, 'Family Album', 'My familiar album', '2010-07-01 12:15:27', '2010-07-01 12:15:27'),
(3, NULL, 'Family Album', 'My familiar album', '2010-07-15 14:28:11', '2010-07-15 14:28:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mdgalledy_album_gallery`
--

CREATE TABLE IF NOT EXISTS `mdgalledy_album_gallery` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `gallery_id` bigint(20) DEFAULT NULL,
  `album_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `album_id_idx` (`album_id`),
  KEY `gallery_id_idx` (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `mdgalledy_album_gallery`
--

INSERT INTO `mdgalledy_album_gallery` (`id`, `gallery_id`, `album_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mdgalledy_category`
--

CREATE TABLE IF NOT EXISTS `mdgalledy_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` longtext,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `mdgalledy_category`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mdgalledy_gallery`
--

CREATE TABLE IF NOT EXISTS `mdgalledy_gallery` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` longtext,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id_idx` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `mdgalledy_gallery`
--

INSERT INTO `mdgalledy_gallery` (`id`, `author_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Summer 92', 'Beach vacation', '2010-06-28 19:18:15', '2010-06-28 19:18:15'),
(2, NULL, 'Summer 92', 'Beach vacation', '2010-07-01 12:15:27', '2010-07-01 12:15:27'),
(3, NULL, 'Summer 92', 'Beach vacation', '2010-07-15 14:28:11', '2010-07-15 14:28:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mdgalledy_gallery_photo`
--

CREATE TABLE IF NOT EXISTS `mdgalledy_gallery_photo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `gallery_id` bigint(20) DEFAULT NULL,
  `photo_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_id_idx` (`gallery_id`),
  KEY `photo_id_idx` (`photo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `mdgalledy_gallery_photo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mdgalledy_photo`
--

CREATE TABLE IF NOT EXISTS `mdgalledy_photo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` longtext,
  `photo` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author_id_idx` (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `mdgalledy_photo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sf_guard_user_id` int(11) DEFAULT NULL,
  `membership_number` bigint(20) DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `documment_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'dni',
  `documment_number` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `movil` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locality_id` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sf_guard_user_id_idx` (`sf_guard_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `profile`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proposal`
--

CREATE TABLE IF NOT EXISTS `proposal` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `number` bigint(20) DEFAULT NULL,
  `comments` text COLLATE utf8_unicode_ci,
  `currency` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bid_validity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_term` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id_idx` (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `proposal`
--

INSERT INTO `proposal` (`id`, `client_id`, `date`, `description`, `number`, `comments`, `currency`, `delivery`, `bid_validity`, `payment_term`, `created_at`, `updated_at`) VALUES
(1, 1, '2009-11-12 00:00:00', 'Cambio de cuplo en polea impulsora AIB Lufkin MII 912-365-168 pozo T 71', 130, '', 'Los precios señalados son en dolares estadounidences, netos y sin IVA', '1 día a partir de la recepción de la Orden de Compra', '30 días a partir de la fecha', '30 días fecha de factura', '2010-06-29 16:12:14', '2010-07-01 11:39:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `description` longtext COLLATE utf8_unicode_ci,
  `unit_cost` decimal(10,2) DEFAULT NULL,
  `measurement_unit` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'labor',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `service`
--

INSERT INTO `service` (`id`, `description`, `unit_cost`, `measurement_unit`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Sacar polea impulsora, con extractor hidraulico en AIB Lufkin MII 912-365-168 y reemplazar cuplo partido por uno nuevo, montar polea y ajustar.', 866.00, 'global', 'labor', '2010-07-01 10:49:46', '2010-07-01 10:49:46'),
(2, 'Cuplo nuevo.', 1.00, 'unidad', 'replacement', '2010-07-01 10:50:18', '2010-07-01 11:40:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `sf_guard_group`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_group_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group_permission` (
  `group_id` int(11) NOT NULL DEFAULT '0',
  `permission_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `sf_guard_group_permission`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `sf_guard_permission`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_remember_key`
--

CREATE TABLE IF NOT EXISTS `sf_guard_remember_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`,`ip_address`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `sf_guard_remember_key`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_user`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1',
  `salt` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `sf_guard_user`
--

INSERT INTO `sf_guard_user` (`id`, `username`, `algorithm`, `salt`, `password`, `is_active`, `is_super_admin`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'sha1', '65925a5bfcdadf8ac0442577638b0efa', 'd77ee501bdace85b0238d42e80d4340fcb1fa687', 1, 1, '2010-07-15 13:45:51', '2010-06-28 19:18:15', '2010-07-15 13:45:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_user_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_group` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `sf_guard_user_group`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sf_guard_user_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_permission` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `permission_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `sf_guard_user_permission`
--


--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `client_contact`
--
ALTER TABLE `client_contact`
  ADD CONSTRAINT `client_contact_client_id_client_id` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Filtros para la tabla `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_proposal_id_proposal_id` FOREIGN KEY (`proposal_id`) REFERENCES `proposal` (`id`),
  ADD CONSTRAINT `item_service_id_service_id` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`);

--
-- Filtros para la tabla `mdgalledy_album`
--
ALTER TABLE `mdgalledy_album`
  ADD CONSTRAINT `mdgalledy_album_author_id_sf_guard_user_id` FOREIGN KEY (`author_id`) REFERENCES `sf_guard_user` (`id`);

--
-- Filtros para la tabla `mdgalledy_album_gallery`
--
ALTER TABLE `mdgalledy_album_gallery`
  ADD CONSTRAINT `mdgalledy_album_gallery_album_id_mdgalledy_album_id` FOREIGN KEY (`album_id`) REFERENCES `mdgalledy_album` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mdgalledy_album_gallery_gallery_id_mdgalledy_gallery_id` FOREIGN KEY (`gallery_id`) REFERENCES `mdgalledy_gallery` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mdgalledy_gallery`
--
ALTER TABLE `mdgalledy_gallery`
  ADD CONSTRAINT `mdgalledy_gallery_author_id_sf_guard_user_id` FOREIGN KEY (`author_id`) REFERENCES `sf_guard_user` (`id`);

--
-- Filtros para la tabla `mdgalledy_gallery_photo`
--
ALTER TABLE `mdgalledy_gallery_photo`
  ADD CONSTRAINT `mdgalledy_gallery_photo_gallery_id_mdgalledy_gallery_id` FOREIGN KEY (`gallery_id`) REFERENCES `mdgalledy_gallery` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mdgalledy_gallery_photo_photo_id_mdgalledy_photo_id` FOREIGN KEY (`photo_id`) REFERENCES `mdgalledy_photo` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `mdgalledy_photo`
--
ALTER TABLE `mdgalledy_photo`
  ADD CONSTRAINT `mdgalledy_photo_author_id_sf_guard_user_id` FOREIGN KEY (`author_id`) REFERENCES `sf_guard_user` (`id`);

--
-- Filtros para la tabla `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_sf_guard_user_id_sf_guard_user_id` FOREIGN KEY (`sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_client_id_client_id` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Filtros para la tabla `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
  ADD CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
  ADD CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
  ADD CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
  ADD CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;
