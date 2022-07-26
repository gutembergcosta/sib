-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26-Jul-2022 às 13:14
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sib`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `perfil` varchar(15) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `perfil`, `nome`) VALUES
(1, 'admin@admin.com.br', '0102', 'Administrador', 'Fulano da Silva'),
(3, 'bertol5075@uorak.com', '0104', 'Administrador', 'Vivian Amorim Chiles\n'),
(4, 'sohayla3471@uorak.com', '0105', 'Usuário', 'Iára Antonio Saldanha\n'),
(5, 'weijian7136@uorak.com', '0105', 'Administrador', 'Jhonas Mata Barboza\n'),
(8, 'derick8387@uorak.com', 'value-3', 'Usuário', 'Laysa Nepomuceno Albergaria\n'),
(11, 'sadako5373@uorak.com', '0105', 'Administrador', 'Vicente Pessoa Sarmento\n'),
(12, 'chenyu4372@uorak.com', '0105', 'Administrador', 'Nara Montilla Branco\n'),
(14, 'hacen8630@uorak.com', '0102', 'Administrador', 'Otoniel Gouveia Donato\n');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
