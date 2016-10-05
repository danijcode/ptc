-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jun 25, 2013 as 06:08 PM
-- Versão do Servidor: 5.1.53
-- Versão do PHP: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `ptc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `ide_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `ide_professor` int(11) NOT NULL,
  `matricula` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `data_nascimento` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  `academia` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ide_aluno`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`ide_aluno`, `ide_professor`, `matricula`, `nome`, `email`, `sexo`, `data_nascimento`, `telefone`, `endereco`, `token`, `status`, `academia`) VALUES
(1, 2, '00012013', 'CARINA VALLADARES', 'bu592@hotmail.com', 'F', '19890317', '7130137867', 'Rua Jose Duarte', 'zs2tUfXa', 'A', 'F4'),
(2, 2, '00022013', 'LUANA BARROS PINTO', 'luanabarros@hotmail.com', 'F', '19930828', '7130137689', 'RUA JOSE DUARTE, AP 11', 'HO6A6zyy', 'A', 'BIO TIPO'),
(3, 2, '00032013', 'MARCOS VINICIOS', 'marcos@gmail.com', 'M', '19840520', '7133568954', 'RUA B', 'JlwPu87J', 'A', 'ACADEMIA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_treinamento`
--

CREATE TABLE IF NOT EXISTS `aluno_treinamento` (
  `ide_aluno_treinamento` int(11) NOT NULL AUTO_INCREMENT,
  `aluno` int(11) NOT NULL,
  `data_treino` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ide_aluno_treinamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `aluno_treinamento`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE IF NOT EXISTS `atividade` (
  `ide_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `ide_treino` int(11) NOT NULL,
  `exercicio` int(11) NOT NULL,
  `serie` int(11) NOT NULL,
  `repeticoes` int(11) NOT NULL,
  `carga` int(11) NOT NULL,
  PRIMARY KEY (`ide_atividade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`ide_atividade`, `ide_treino`, `exercicio`, `serie`, `repeticoes`, `carga`) VALUES
(1, 1, 9, 3, 12, 40),
(2, 1, 8, 3, 10, 20),
(3, 0, 5, 3, 8, 20),
(4, 2, 6, 3, 23, 70),
(5, 3, 4, 3, 20, 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE IF NOT EXISTS `avaliacao` (
  `ide_avaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `peso` decimal(11,2) NOT NULL,
  `altura` decimal(10,2) NOT NULL,
  `peitoral` decimal(11,2) NOT NULL,
  `cintura` decimal(11,2) NOT NULL,
  `abdomen` decimal(11,2) NOT NULL,
  `quadril` decimal(11,2) DEFAULT NULL,
  `data` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ide_aluno` int(11) DEFAULT NULL,
  PRIMARY KEY (`ide_avaliacao`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`ide_avaliacao`, `peso`, `altura`, `peitoral`, `cintura`, `abdomen`, `quadril`, `data`, `ide_aluno`) VALUES
(2, '60.00', '1.70', '40.00', '40.00', '40.00', '40.00', '20170623', 1),
(3, '79.00', '2.00', '40.00', '40.00', '40.00', '40.00', '20140912', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicio`
--

CREATE TABLE IF NOT EXISTS `exercicio` (
  `ide_exercicio` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `grupo_muscular` int(11) NOT NULL,
  PRIMARY KEY (`ide_exercicio`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `exercicio`
--

INSERT INTO `exercicio` (`ide_exercicio`, `nome`, `grupo_muscular`) VALUES
(1, 'Remada Alta', 1),
(2, 'Elevação Frontal', 1),
(3, 'Elevação Lateral', 1),
(4, 'Supino Inclinado', 2),
(5, 'Supino Reto', 2),
(6, 'Remada Unilateral', 3),
(7, 'Puxada na Frente com Polia Alta', 3),
(8, 'Puxada Alta com Braços Estendidos', 3),
(9, 'Elevação de Pernas', 7),
(10, 'Frontal', 7),
(11, 'Bike', 7),
(12, 'Com Inversão', 7),
(13, 'Abdominal Reto', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo_muscular`
--

CREATE TABLE IF NOT EXISTS `grupo_muscular` (
  `ide_grupo_muscular` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ide_grupo_muscular`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `grupo_muscular`
--

INSERT INTO `grupo_muscular` (`ide_grupo_muscular`, `nome`) VALUES
(7, 'Abdominal'),
(6, 'Antebraço'),
(4, 'Bíceps'),
(3, 'Costas'),
(8, 'Coxa'),
(1, 'Ombro'),
(2, 'Peito'),
(9, 'Perna'),
(5, 'Tríceps');

-- --------------------------------------------------------

--
-- Estrutura da tabela `objetivo`
--

CREATE TABLE IF NOT EXISTS `objetivo` (
  `ide_objetivo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ide_objetivo`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `objetivo`
--

INSERT INTO `objetivo` (`ide_objetivo`, `nome`) VALUES
(2, 'Força'),
(1, 'Hipertrofia'),
(5, 'Outro'),
(4, 'Recuperação'),
(3, 'Resistencia Muscular');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `ide_professor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  PRIMARY KEY (`ide_professor`),
  UNIQUE KEY `login_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`ide_professor`, `nome`, `sexo`, `telefone`, `endereco`, `email`, `senha`, `status`) VALUES
(1, 'Igor da Hora Santos', 'M', '7186220139', 'Conjunto Vista Alegre', 'igordahora@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'A'),
(2, 'Carina Valladares', 'F', '7130137867', 'Rua Jose Duarte', 'bu592@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'A'),
(3, 'MARCIO EDUARDO', 'M', '7130137867', 'BARRA', 'marcio@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `treino`
--

CREATE TABLE IF NOT EXISTS `treino` (
  `ide_treino` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ide_aluno` int(11) NOT NULL,
  `objetivo` int(11) NOT NULL,
  `observacao` text COLLATE utf8_unicode_ci,
  `sessoes` int(11) NOT NULL,
  `sessoes_feitas` int(11) DEFAULT NULL,
  `data_atualizacao` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  `data_treino` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ide_treino`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `treino`
--

INSERT INTO `treino` (`ide_treino`, `nome`, `ide_aluno`, `objetivo`, `observacao`, `sessoes`, `sessoes_feitas`, `data_atualizacao`, `status`, `data_treino`) VALUES
(1, 'A', 1, 1, ' ALTERNAR TREINO', 26, NULL, NULL, 'A', '20180621'),
(2, 'A', 2, 1, ' ', 20, NULL, NULL, 'A', '20130706'),
(3, 'B', 1, 1, ' ', 20, NULL, NULL, 'A', '20130724');
