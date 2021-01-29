-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 16-Ago-2020 às 15:06
-- Versão do servidor: 5.6.45-log
-- versão do PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shcombr_appmanager`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_billet_detached`
--

CREATE TABLE `tab_billet_detached` (
  `id` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `billet_value` decimal(10,2) DEFAULT NULL,
  `billet_due_date` date DEFAULT NULL,
  `billet_send_mail_client` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_billet_detached`
--

INSERT INTO `tab_billet_detached` (`id`, `id_client`, `billet_value`, `billet_due_date`, `billet_send_mail_client`) VALUES
(1, 17, 0.00, '2020-02-29', 1),
(2, 18, 0.00, '2020-02-29', 1),
(3, 19, 0.00, '2020-02-29', 1),
(4, 17, 1.20, '2020-02-19', 1),
(5, 15, 1233.11, '2020-02-12', 1),
(6, 19, 1233.56, '2020-02-12', 1),
(7, 19, 1233.77, '2020-02-29', 1),
(8, 12, 1333.44, '2020-03-27', 1),
(9, 16, 122.77, '2020-03-27', 1),
(10, 12, 1332.22, '2020-04-25', 1),
(11, 14, 144.25, '2020-02-12', 1),
(12, 14, 555.24, '2020-02-10', 1),
(14, 0, 0.00, '0000-00-00', 1),
(15, 0, 0.00, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_clients`
--

CREATE TABLE `tab_clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `corporate_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `dt_created` datetime DEFAULT NULL,
  `dt_update` datetime DEFAULT NULL,
  `zip_code` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `number` decimal(10,0) DEFAULT NULL,
  `county` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `neighbordhood` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `state` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `phone1` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `phone2` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `phone3` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `cpf` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `cnpj` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `rg` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `type_cli` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `type_for` varchar(100) DEFAULT NULL,
  `type_col` varchar(100) DEFAULT NULL,
  `email1` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `email2` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `site` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `obs` longtext,
  `active` int(11) DEFAULT NULL,
  `responsible` varchar(100) DEFAULT NULL,
  `complement` varchar(200) DEFAULT NULL,
  `state_registration` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `municipal_registration` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_clients`
--

INSERT INTO `tab_clients` (`id`, `name`, `corporate_name`, `dt_created`, `dt_update`, `zip_code`, `address`, `number`, `county`, `city`, `neighbordhood`, `state`, `phone1`, `phone2`, `phone3`, `cpf`, `cnpj`, `rg`, `type_cli`, `type_for`, `type_col`, `email1`, `email2`, `site`, `obs`, `active`, `responsible`, `complement`, `state_registration`, `municipal_registration`) VALUES
(92, 'André Corazim', 'SystemHope', '2020-03-03 02:03:47', '2020-03-03 02:03:47', '09920650', 'Rua Orense', 41, '', 'Diadema', 'Parque das Jabuticabeiras', 'SP', '+55 (11) 11111-1111', '+55 (11) 11111-1111', '+55 (11) 11111-1111', '', '07.522.448/0001-14', '25.342.522-0', '', 'for', '', 'andrecorazim@gmail.com', 'andrecorazim@outlook.com', 'www.systemhope.com.br', '', 1, 'Corazim', 'sala 210', 'ISENTO', '2522'),
(94, 'JULIANA GOMES DA COSTA FABREGAS', 'FIRMA NOSSA', '2020-07-07 10:07:30', '2020-07-07 10:07:30', '09941-630', 'Rua Onze de Junho', 15, '', '', 'Jardim Canhema', 'SP', '+55 (11) 11111-1111', '+55 (22) 22222-2222', '+55 (33) 33333-3333', '353.426.288-30', '', '000000', 'cli', '', '', 'julianagomes@gmail.com', '', '', '', 1, 'Juliana gomes', 'CASA', 'ISENTO', '0000'),
(95, 'PAULO CORAZIM ME.', 'PAULO CORAZIM ME.', '2020-03-20 08:03:56', '2020-03-20 08:03:56', '09941630', 'Rua Onze de Junho', 15, 'Diadema', 'Diadema', 'Jardim Canhema', 'SP', '+55 (11) 11111-1111', '+55 (11) 11111-1111', '+55 (11) 11111-1111', '514.187.308-07', '', '50557934-0', '', '', '--', 'email@1.com.br', 'email@2.com.br', 'www.systemhope.com.br', '', 1, '', 'NAO TEM', 'ISENTO', '00'),
(96, 'ConnectorPlaces', 'SystemHope', '2020-02-27 03:02:42', '2020-02-27 03:02:42', '09941630', 'Rua Onze de Junho', 16, '', NULL, 'Jardim Canhema', 'SP', '+55 (11) 11111-1111', '+55 (11) 11111-1111', '+55 (11) 11111-1111', '', '', '25.342.522-0', '', '', 'col', 'email@1.com.br', 'email@2.com.br', 'www.systemhope.com.br', '', 1, 'André Corazim', '', 'ISENTO', '23222'),
(97, 'JULIANA GOMES DA COSTA FABREGAS', 'CASA FLORA', '2020-03-20 08:03:43', '2020-03-20 08:03:43', '09941-630', 'Rua Onze de Junho', 15, 'SP', '', 'Jardim Canhema', 'SP', '+5511983498605', '', '', '166.825.458-19', '', '25.342.522-0', '', '', 'col', 'andre@ystemhope.com.br', 'andre@ystemhope.com.br', '', '', 1, 'André Corazim', 'aa', 'ISENTO', '23222');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_clients_billet_detached`
--

CREATE TABLE `tab_clients_billet_detached` (
  `id` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `billet_value` decimal(10,2) DEFAULT NULL,
  `billet_due_date` date DEFAULT NULL,
  `billet_send_mail_client` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_clients_billet_detached`
--

INSERT INTO `tab_clients_billet_detached` (`id`, `id_client`, `billet_value`, `billet_due_date`, `billet_send_mail_client`) VALUES
(1, 17, 0.00, '2020-02-29', 1),
(2, 18, 0.00, '2020-02-29', 1),
(3, 19, 0.00, '2020-02-29', 1),
(4, 17, 1.20, '2020-02-19', 1),
(5, 15, 1233.11, '2020-02-12', 1),
(6, 19, 1233.56, '2020-02-12', 1),
(7, 19, 1233.77, '2020-02-29', 1),
(8, 12, 1333.44, '2020-03-27', 1),
(9, 16, 122.77, '2020-03-27', 1),
(10, 12, 1332.22, '2020-04-25', 1),
(11, 14, 144.25, '2020-02-12', 1),
(12, 14, 555.24, '2020-02-10', 1),
(14, 0, 0.00, '0000-00-00', 1),
(15, 0, 0.00, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_clients_savings`
--

CREATE TABLE `tab_clients_savings` (
  `id` int(11) NOT NULL,
  `saving_id_client` int(11) NOT NULL,
  `saving_value` decimal(10,2) DEFAULT NULL,
  `saving_date` date DEFAULT NULL,
  `saving_number` varchar(100) DEFAULT NULL,
  `saving_bank` varchar(100) DEFAULT NULL,
  `saving_filename` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_clients_savings`
--

INSERT INTO `tab_clients_savings` (`id`, `saving_id_client`, `saving_value`, `saving_date`, `saving_number`, `saving_bank`, `saving_filename`) VALUES
(34, 94, 1200.33, '2020-03-05', '6655-9', 'ITAU', '2020-03-05.png'),
(35, 92, 1200.99, '2020-03-09', '66564-6', 'ITAU', '2020-03-09.png'),
(36, 95, 200.00, '2020-03-20', '665646', 'itau', '2020-03-20.pdf'),
(37, 94, 12111.11, '2020-07-20', '121221', 'ITAU', '2020-07-20.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_contract`
--

CREATE TABLE `tab_contract` (
  `id` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_property` int(11) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_renew` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `start_value` decimal(10,2) DEFAULT NULL,
  `renew_value` decimal(10,2) DEFAULT NULL,
  `current_value` decimal(10,2) DEFAULT NULL,
  `adjustment_percentage` int(11) DEFAULT NULL,
  `adjustment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_modules`
--

CREATE TABLE `tab_modules` (
  `id` int(11) NOT NULL,
  `name_app` varchar(100) NOT NULL,
  `name_link` varchar(100) NOT NULL,
  `icone_fas_fa` varchar(100) DEFAULT NULL,
  `name_module` varchar(100) NOT NULL,
  `dt_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tab_modules`
--

INSERT INTO `tab_modules` (`id`, `name_app`, `name_link`, `icone_fas_fa`, `name_module`, `dt_created`) VALUES
(2, 'manager.billets.php', 'Boletos', 'fas fa-barcode', 'mBoleto', '2019-12-31 00:00:00'),
(3, 'manager.clients.php', 'Clientes', 'fas fa-users', 'mClients', '2019-12-31 00:00:00'),
(4, 'manager.users.php', 'Usuários', 'fas fa-user-friends', 'mUsuários', '2020-01-04 12:00:00'),
(6, 'manager.bloquetos.php', 'Bôderos', 'fas fa-file-invoice', 'mBoderos', '2020-01-09 15:16:28'),
(8, 'manager.properties.php', 'Imóveis', 'fas fa-building', 'mImoveis', '2020-01-09 15:17:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_modules_sub`
--

CREATE TABLE `tab_modules_sub` (
  `id` int(11) NOT NULL,
  `id_module` int(11) DEFAULT NULL,
  `name_sub_app` varchar(100) DEFAULT NULL,
  `name_sub_link` varchar(100) DEFAULT NULL,
  `name_sub_module` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_modules_sub`
--

INSERT INTO `tab_modules_sub` (`id`, `id_module`, `name_sub_app`, `name_sub_link`, `name_sub_module`) VALUES
(1, 2, 'manager.billets.php?insert=true', 'Cadastros', NULL),
(3, 2, 'manager.billets.php?report=true&type=bc', 'Relatório B:C', NULL),
(4, 2, 'manager.billets.php?report=true&type=bv', 'Relatório B:V', NULL),
(5, 3, 'manager.clients.php?insert=true', 'Cadastros', NULL),
(8, 3, 'manager.clients.inspections.php', 'Vistorias', NULL),
(10, 3, 'manager.clients.readjustments.php', 'Reajustes', NULL),
(11, 3, 'manager.clients.planm2.php', 'Planilha M2', NULL),
(12, 4, 'manager.users.php?insert=true', 'Cadastros', NULL),
(13, 4, 'manager.users.php?user_report=true', 'Relatórios', NULL),
(14, 8, 'manager.properties.php', 'Cadastros', NULL),
(15, 9, 'manager.clients.contracts.php', 'Cadastros', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_permissions`
--

CREATE TABLE `tab_permissions` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `type` char(1) NOT NULL,
  `dt_created` datetime NOT NULL,
  `dt_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tab_permissions`
--

INSERT INTO `tab_permissions` (`id`, `id_user`, `id_module`, `type`, `dt_created`, `dt_update`) VALUES
(382, 20, 2, 'I', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(383, 20, 2, 'S', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(384, 20, 2, 'U', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(385, 20, 2, 'D', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(386, 20, 3, 'I', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(387, 20, 3, 'S', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(388, 20, 3, 'U', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(389, 20, 3, 'D', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(390, 20, 5, 'I', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(391, 20, 5, 'S', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(392, 20, 5, 'U', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(393, 20, 5, 'D', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(394, 20, 6, 'I', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(395, 20, 6, 'S', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(396, 20, 6, 'U', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(397, 20, 6, 'D', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(402, 20, 8, 'I', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(403, 20, 8, 'S', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(404, 20, 8, 'U', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(405, 20, 8, 'D', '2020-01-31 04:01:24', '0000-00-00 00:00:00'),
(406, 17, 2, 'I', '0000-00-00 00:00:00', '2020-08-09 07:08:32'),
(407, 17, 2, 'S', '0000-00-00 00:00:00', '2020-08-09 07:08:32'),
(408, 17, 2, 'U', '0000-00-00 00:00:00', '2020-08-09 07:08:32'),
(409, 17, 2, 'D', '0000-00-00 00:00:00', '2020-08-09 07:08:32'),
(410, 17, 3, 'I', '0000-00-00 00:00:00', '2020-08-09 07:08:32'),
(411, 17, 3, 'S', '0000-00-00 00:00:00', '2020-08-09 07:08:32'),
(412, 17, 3, 'U', '0000-00-00 00:00:00', '2020-08-09 07:08:32'),
(413, 17, 3, 'D', '0000-00-00 00:00:00', '2020-08-09 07:08:32'),
(414, 17, 6, 'I', '0000-00-00 00:00:00', '2020-08-09 07:08:32'),
(415, 17, 6, 'S', '0000-00-00 00:00:00', '2020-08-09 07:08:32'),
(416, 17, 6, 'U', '0000-00-00 00:00:00', '2020-08-09 07:08:32'),
(417, 17, 6, 'D', '0000-00-00 00:00:00', '2020-08-09 07:08:32'),
(418, 17, 8, 'I', '0000-00-00 00:00:00', '2020-08-09 07:08:32'),
(419, 17, 8, 'S', '0000-00-00 00:00:00', '2020-08-09 07:08:32'),
(420, 17, 8, 'U', '0000-00-00 00:00:00', '2020-08-09 07:08:32'),
(421, 17, 8, 'D', '0000-00-00 00:00:00', '2020-08-09 07:08:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_properties`
--

CREATE TABLE `tab_properties` (
  `id` int(11) NOT NULL,
  `property_client_id` int(11) DEFAULT NULL,
  `property_type` varchar(100) DEFAULT NULL,
  `property_destination` varchar(100) DEFAULT NULL,
  `property_usefull_area` int(11) DEFAULT NULL,
  `property_usefull_built` int(11) DEFAULT NULL,
  `property_ground` int(11) DEFAULT NULL,
  `property_value` decimal(10,2) DEFAULT NULL,
  `property_value_location` decimal(10,2) DEFAULT NULL,
  `property_value_iptu` decimal(10,2) DEFAULT NULL,
  `property_value_condo` decimal(10,2) DEFAULT NULL,
  `property_amount_dorm` int(11) DEFAULT NULL,
  `property_amount_suite` int(11) DEFAULT NULL,
  `property_amount_room` int(11) DEFAULT NULL,
  `property_amount_bathroom` int(11) DEFAULT NULL,
  `property_amount_floors` int(11) DEFAULT NULL,
  `property_amount_vague_garage` int(11) DEFAULT NULL,
  `property_amount_vague_visitor` int(11) DEFAULT NULL,
  `property_amount_deposit` int(11) DEFAULT NULL,
  `property_amount_elevators` int(11) DEFAULT NULL,
  `property_age` int(11) DEFAULT NULL,
  `property_cep` varchar(100) DEFAULT NULL,
  `property_address` varchar(200) DEFAULT NULL,
  `property_number` varchar(100) DEFAULT NULL,
  `property_number_apto` varchar(100) DEFAULT NULL,
  `property_county` varchar(100) DEFAULT NULL,
  `property_city` varchar(100) DEFAULT NULL,
  `property_state` varchar(100) DEFAULT NULL,
  `property_neighbordhood` varchar(100) DEFAULT NULL,
  `property_complement` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_properties`
--

INSERT INTO `tab_properties` (`id`, `property_client_id`, `property_type`, `property_destination`, `property_usefull_area`, `property_usefull_built`, `property_ground`, `property_value`, `property_value_location`, `property_value_iptu`, `property_value_condo`, `property_amount_dorm`, `property_amount_suite`, `property_amount_room`, `property_amount_bathroom`, `property_amount_floors`, `property_amount_vague_garage`, `property_amount_vague_visitor`, `property_amount_deposit`, `property_amount_elevators`, `property_age`, `property_cep`, `property_address`, `property_number`, `property_number_apto`, `property_county`, `property_city`, `property_state`, `property_neighbordhood`, `property_complement`) VALUES
(28, 0, 'Apartamento', 'Locacao', 78, 70, 80, 450000.00, 2000.00, 200.00, 250.00, 0, 0, 2, 0, 0, 2, NULL, 0, 2, 1, '09920-500', 'Rua Turmalinas', '42', '210', '', 'Diadema', 'SP', 'Jardim Donini', 'NT'),
(29, 0, 'Apartamento', 'Locacao', 78, 70, 80, 450000.00, 2000.00, 200.00, 250.00, 0, 0, 2, 0, 0, 2, NULL, 0, 2, 1, '09920-500', 'Rua Turmalinas', '42', '211', '', 'Diadema', 'SP', 'Jardim Donini', 'NT'),
(30, 0, 'Apartamento', 'Locacao', 78, 70, 80, 450000.00, 2000.00, 200.00, 250.00, 0, 0, 2, 0, 0, 2, NULL, 0, 2, 1, '09920-500', 'Rua Turmalinas', '42', '212', '', 'Diadema', 'SP', 'Jardim Donini', 'NT'),
(31, 0, 'Apartamento', 'Locacao', 78, 70, 80, 450000.00, 2000.00, 200.00, 250.00, 0, 0, 2, 0, 0, 2, NULL, 0, 2, 1, '09920-500', 'Rua Turmalinas', '42', '213', '', 'Diadema', 'SP', 'Jardim Donini', 'NT'),
(32, 0, 'Apartamento', 'Locacao', 78, 70, 80, 450000.00, 2000.00, 200.00, 250.00, 0, 0, 2, 0, 0, 2, NULL, 0, 2, 1, '04747-090', 'Rua Padre Chico', '100', '101', 'SP', 'São Paulo', 'SP', 'Santo Amaro', 'NT'),
(33, 0, 'Apartamento', 'Locacao', 78, 70, 80, 450000.00, 2000.00, 200.00, 250.00, 0, 0, 2, 0, 0, 2, NULL, 0, 2, 1, '04747-090', 'Rua Padre Chico', '100', '99', 'SP', 'São Paulo', 'SP', 'Santo Amaro', 'NT'),
(34, 0, 'Apartamento', 'Locacao', 78, 70, 80, 450000.00, 2000.00, 200.00, 250.00, 0, 0, 2, 0, 0, 2, NULL, 0, 2, 1, '04747-090', 'Rua Padre Chico', '100', '109', 'SP', 'São Paulo', 'SP', 'Santo Amaro', 'NT'),
(35, 0, 'Apartamento', 'Locacao', 78, 70, 80, 450000.00, 2000.00, 200.00, 250.00, 0, 0, 2, 0, 0, 2, NULL, 0, 2, 1, '04747-090', 'Rua Padre Chico', '100', '104', 'SP', 'São Paulo', 'SP', 'Santo Amaro', 'NT'),
(37, 0, 'Apartamento', 'Locacao', 220, 220, 200, 350000.00, 2500.00, 100.00, 200.00, 1, 1, 1, 1, 1, 1, NULL, 1, 1, 10, '09920-500', 'Rua Turmalinas', '42', '333', '', 'Diadema', 'SP', 'Jardim Donini', ''),
(38, 0, 'Apartamento', 'Locacao', 190, 190, 200, 350000.00, 3500.00, 1000.00, 389.99, 3, 2, 1, 3, 0, 2, NULL, 1, 2, 12, '09941710', 'Rua Sergipe', '23', '110', '', 'Diadema', 'SP', 'Vila Oriental', ''),
(39, 0, 'Apartamento', 'Locacao', 1200, 1000, 1000, 150000.00, 2300.00, 150.00, 50.00, 1, 2, 2, 1, 1, 1, NULL, 1, 1, 0, '09941630', 'Rua Onze de Junho', '15', '12', '', 'Diadema', 'SP', 'Jardim Canhema', 'nao tem'),
(40, 0, 'Apartamento', 'Locacao', 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, '09941630', 'Rua Onze de Junho', '15', '', '', 'Diadema', 'SP', 'Jardim Canhema', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_users`
--

CREATE TABLE `tab_users` (
  `id` int(11) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` longtext NOT NULL,
  `confirm_passwd` varchar(100) NOT NULL,
  `dt_created` datetime NOT NULL,
  `dt_update` datetime NOT NULL,
  `type` varchar(50) NOT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tab_users`
--

INSERT INTO `tab_users` (`id`, `cpf`, `name`, `email`, `password`, `confirm_passwd`, `dt_created`, `dt_update`, `type`, `active`) VALUES
(1, '166.825.458-20', 'André Corazim', 'andrecorazim@gmail.com', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '2019-12-28 00:00:00', '2020-02-03 14:02:20', 'master', 1),
(6, '166.585.145-81', 'Paulo Corazim', 'paulocorazim22@gmail.com', '6a0d8f756dfa9c1cd69fed28423ec8ca', '6a0d8f756dfa9c1cd69fed28423ec8ca', '2019-12-28 00:00:00', '2020-01-25 04:01:00', 'master', 1),
(17, '353.266.288-30', 'Marcos França', 'marcos@sepher.com.br', '433fbc2874b3d7e50fdf9bf3821b89bb', '433fbc2874b3d7e50fdf9bf3821b89bb', '2020-01-21 11:01:30', '2020-08-09 07:08:32', 'basic', 1),
(19, '353.426.288-30', 'Juliana Gomes da Costa Fabregas', 'julianagomes@gmail.com', '7363a0d0604902af7b70b271a0b96480', '7363a0d0604902af7b70b271a0b96480', '2020-01-25 05:01:14', '2020-01-27 07:01:08', 'basic', 1),
(20, '225.362.514-1', 'Eduardo', 'comercial@grupocastanheiro.com.br', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '2020-01-31 04:01:24', '2020-01-31 04:01:24', 'basic', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_billet_detached`
--
ALTER TABLE `tab_billet_detached`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_clients`
--
ALTER TABLE `tab_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_clients_billet_detached`
--
ALTER TABLE `tab_clients_billet_detached`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_clients_savings`
--
ALTER TABLE `tab_clients_savings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `table_client_savings_id_uindex` (`id`);

--
-- Indexes for table `tab_contract`
--
ALTER TABLE `tab_contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_modules`
--
ALTER TABLE `tab_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_modules_sub`
--
ALTER TABLE `tab_modules_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_permissions`
--
ALTER TABLE `tab_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_module` (`id_module`);

--
-- Indexes for table `tab_properties`
--
ALTER TABLE `tab_properties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tab_properties_property_address_IDX` (`property_address`,`property_number`,`property_number_apto`) USING BTREE;

--
-- Indexes for table `tab_users`
--
ALTER TABLE `tab_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tab_users_cpf_uindex` (`cpf`),
  ADD UNIQUE KEY `tab_users_email_uindex` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab_billet_detached`
--
ALTER TABLE `tab_billet_detached`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tab_clients`
--
ALTER TABLE `tab_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `tab_clients_billet_detached`
--
ALTER TABLE `tab_clients_billet_detached`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tab_clients_savings`
--
ALTER TABLE `tab_clients_savings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tab_contract`
--
ALTER TABLE `tab_contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tab_modules`
--
ALTER TABLE `tab_modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tab_modules_sub`
--
ALTER TABLE `tab_modules_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tab_permissions`
--
ALTER TABLE `tab_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=422;

--
-- AUTO_INCREMENT for table `tab_properties`
--
ALTER TABLE `tab_properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tab_users`
--
ALTER TABLE `tab_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tab_permissions`
--
ALTER TABLE `tab_permissions`
  ADD CONSTRAINT `tab_permissions_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tab_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
