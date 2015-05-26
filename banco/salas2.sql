-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Maio-2015 às 23:54
-- Versão do servidor: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `salas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id_area` int(11) NOT NULL,
  `nome_area` varchar(30) NOT NULL,
  `sigla_area` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`id_area`, `nome_area`, `sigla_area`) VALUES
(1, 'SECOMP', 'SECOMP'),
(2, 'CAL', 'CAL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_sala`
--

CREATE TABLE IF NOT EXISTS `categoria_sala` (
  `id_categoria_sala` int(11) NOT NULL,
  `nome_categoria_sala` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria_sala`
--

INSERT INTO `categoria_sala` (`id_categoria_sala`, `nome_categoria_sala`) VALUES
(1, 'teórica'),
(2, 'Laboratório');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dia_semana`
--

CREATE TABLE IF NOT EXISTS `dia_semana` (
  `id_dia_semana` int(11) NOT NULL,
  `nome_dia_semana` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dia_semana`
--

INSERT INTO `dia_semana` (`id_dia_semana`, `nome_dia_semana`) VALUES
(1, 'Segunda'),
(2, 'Terça'),
(3, 'Domingo'),
(4, 'Quarta'),
(5, 'Quinta'),
(6, 'Sexta'),
(7, 'Sábado'),
(8, 'Domingo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE IF NOT EXISTS `disciplina` (
  `cod_disciplina` varchar(10) NOT NULL,
  `nome_disciplina` varchar(30) NOT NULL,
  `carga_horaria_disciplina` float NOT NULL,
  `id_area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`cod_disciplina`, `nome_disciplina`, `carga_horaria_disciplina`, `id_area`) VALUES
('1', 'Desenvolvimento Web', 68, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `horario_turma`
--

CREATE TABLE IF NOT EXISTS `horario_turma` (
  `id_horario` int(11) NOT NULL,
  `id_dia_semana` int(11) NOT NULL,
  `horario_inicial` time NOT NULL,
  `horario_final` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `horario_turma`
--

INSERT INTO `horario_turma` (`id_horario`, `id_dia_semana`, `horario_inicial`, `horario_final`) VALUES
(1, 2, '08:00:00', '10:00:00'),
(2, 3, '18:30:00', '20:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pavilhao`
--

CREATE TABLE IF NOT EXISTS `pavilhao` (
  `id_pavilhao` int(11) NOT NULL,
  `nome_pavilhao` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pavilhao`
--

INSERT INTO `pavilhao` (`id_pavilhao`, `nome_pavilhao`) VALUES
(1, 'PVA1'),
(2, 'PVA2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `siape_professor` varchar(30) NOT NULL,
  `id_area` int(11) NOT NULL,
  `tel_professor` varchar(10) DEFAULT NULL,
  `nome_professor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`siape_professor`, `id_area`, `tel_professor`, `nome_professor`) VALUES
('123', 1, '7500000000', 'Tiago Pagano');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE IF NOT EXISTS `sala` (
  `id_sala` int(11) NOT NULL,
  `id_pavilhao` int(11) NOT NULL,
  `numero_sala` int(11) NOT NULL,
  `capacidade_sala` int(11) NOT NULL,
  `id_categoria_sala` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`id_sala`, `id_pavilhao`, `numero_sala`, `capacidade_sala`, `id_categoria_sala`) VALUES
(1, 1, 3, 45, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `semestre`
--

CREATE TABLE IF NOT EXISTS `semestre` (
  `nome_semestre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `semestre`
--

INSERT INTO `semestre` (`nome_semestre`) VALUES
('2014.2'),
('2015.1'),
('2015.2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE IF NOT EXISTS `turma` (
  `id_turma` int(11) NOT NULL,
  `nome_turma` varchar(20) DEFAULT NULL,
  `nome_semestre` varchar(10) NOT NULL,
  `siape_professor` varchar(30) NOT NULL,
  `cod_disciplina` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `nome_turma`, `nome_semestre`, `siape_professor`, `cod_disciplina`) VALUES
(1, 'T01', '2014.2', '123', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_sala`
--

CREATE TABLE IF NOT EXISTS `turma_sala` (
  `id_turma` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma_sala`
--

INSERT INTO `turma_sala` (`id_turma`, `id_sala`, `id_horario`) VALUES
(1, 1, 1),
(1, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `login` varchar(20) NOT NULL,
  `senha` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`login`, `senha`) VALUES
('admin1', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `categoria_sala`
--
ALTER TABLE `categoria_sala`
  ADD PRIMARY KEY (`id_categoria_sala`);

--
-- Indexes for table `dia_semana`
--
ALTER TABLE `dia_semana`
  ADD PRIMARY KEY (`id_dia_semana`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`cod_disciplina`), ADD KEY `id_area` (`id_area`);

--
-- Indexes for table `horario_turma`
--
ALTER TABLE `horario_turma`
  ADD PRIMARY KEY (`id_horario`), ADD KEY `id_dia_semana` (`id_dia_semana`);

--
-- Indexes for table `pavilhao`
--
ALTER TABLE `pavilhao`
  ADD PRIMARY KEY (`id_pavilhao`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`siape_professor`), ADD KEY `professor_area_1` (`id_area`);

--
-- Indexes for table `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`), ADD KEY `id_pavilhao` (`id_pavilhao`), ADD KEY `id_categoria_sala` (`id_categoria_sala`);

--
-- Indexes for table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`nome_semestre`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`), ADD KEY `turma_disciplina_3` (`cod_disciplina`), ADD KEY `turma_semestre_2` (`nome_semestre`), ADD KEY `turma_professor_2` (`siape_professor`);

--
-- Indexes for table `turma_sala`
--
ALTER TABLE `turma_sala`
  ADD PRIMARY KEY (`id_turma`,`id_sala`,`id_horario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categoria_sala`
--
ALTER TABLE `categoria_sala`
  MODIFY `id_categoria_sala` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dia_semana`
--
ALTER TABLE `dia_semana`
  MODIFY `id_dia_semana` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `horario_turma`
--
ALTER TABLE `horario_turma`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pavilhao`
--
ALTER TABLE `pavilhao`
  MODIFY `id_pavilhao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `disciplina`
--
ALTER TABLE `disciplina`
ADD CONSTRAINT `disciplina_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`);

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
ADD CONSTRAINT `professor_area_1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`);

--
-- Limitadores para a tabela `sala`
--
ALTER TABLE `sala`
ADD CONSTRAINT `sala_ibfk_1` FOREIGN KEY (`id_pavilhao`) REFERENCES `pavilhao` (`id_pavilhao`),
ADD CONSTRAINT `sala_ibfk_2` FOREIGN KEY (`id_categoria_sala`) REFERENCES `categoria_sala` (`id_categoria_sala`);

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
ADD CONSTRAINT `turma_disciplina_3` FOREIGN KEY (`cod_disciplina`) REFERENCES `disciplina` (`cod_disciplina`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `turma_ibfk_3` FOREIGN KEY (`cod_disciplina`) REFERENCES `disciplina` (`cod_disciplina`),
ADD CONSTRAINT `turma_professor_2` FOREIGN KEY (`siape_professor`) REFERENCES `professor` (`siape_professor`),
ADD CONSTRAINT `turma_semestre_2` FOREIGN KEY (`nome_semestre`) REFERENCES `semestre` (`nome_semestre`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
