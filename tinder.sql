-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Jun-2022 às 05:16
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tinder`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chat`
--

INSERT INTO `chat` (`id`, `user`, `message`) VALUES
(32, 'Faisal Imtiaz', 'olá'),
(33, 'Faisal Imtiaz', 'olá'),
(34, 'Faisal Imtiaz', 'tudo bem ?'),
(35, 'Faisal Imtiaz', 'ok'),
(36, 'Faisal Imtiaz', 'oii'),
(37, 'Faisal Imtiaz', 'oii');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dist_usuarios`
--

CREATE TABLE `dist_usuarios` (
  `id` int(11) NOT NULL,
  `dist` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `likes`
--

INSERT INTO `likes` (`id`, `user_from`, `user_to`, `action`) VALUES
(1, 671, 674, 1),
(2, 671, 673, 1),
(5, 673, 671, 1),
(6, 671, 677, 1),
(7, 677, 671, 1),
(11, 678, 671, 1),
(12, 671, 678, 1),
(13, 675, 678, 1),
(14, 678, 675, 1),
(15, 673, 675, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `localização` varchar(100) NOT NULL,
  `Estado` char(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `perfil` varchar(100) NOT NULL,
  `idade` int(100) NOT NULL,
  `descrição` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `senha`, `nome`, `sexo`, `localização`, `Estado`, `latitude`, `longitude`, `perfil`, `idade`, `descrição`) VALUES
(671, 'sergiovinnicius123@hotmail.com', '1711', 'Sérgio Sousa', 'masculino', 'Lucas do Rio Verde', 'MT', '-13.0948517', '-55.9063107', '61c79a7b1d1aa.jpg', 29, 'Amo estar em contato com a natureza.'),
(673, 'ketlyn@hotmail.com', '1325', 'Ketlyn de Godoy', 'feminino', 'Lucas do Rio Verde', 'MT', '-13.0783739', '-55.9067794', '61c79c3380cbc.png', 24, 'Amo estar em contato com a natureza'),
(674, 'melissa@hotmail.com', '1325', 'Melissa', 'feminino', 'Lucas do Rio Verde', 'MT', '-99.5489', '-6.6388 ', '61c7b9b8b9937.jpg', 24, ''),
(675, 'jose@hotmail.com', '1325', 'José', 'masculino', 'Lucas do Rio Verde', 'MT', '-23.5489', '-46.6388 ', '61c7ba5a1a42e.jpg', 23, ''),
(676, 'roberto@hotmail.com', '1325', 'roberto silva', 'masculino', 'Lucas do Rio Verde', 'MT', '', '', '61c7bbc363559.jpeg', 28, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the '),
(677, 'camila@hotmail.com', '1325', 'Camila Silva', 'feminino', 'Rio de Janeiro', 'Rio de Janeiro', '-53.5489', '-36.6388 ', '61c8cccb15299.jpg', 28, 'Lorem Ipsum domolo domset rameq slah '),
(678, 'aurora@hotmail.com', '1325', 'Aurora Khaleesi', 'feminino', 'Lucas do Rio Verde', 'Mato Grosso', '-13.078558', '-55.9068271', '61d64b504e249.png', 1, 'Sem muita paciência, mas sou um amorzinho.'),
(679, 'Clementino@hotmail.com', '1325', 'Clementino Silva', 'masculino', 'São Paulo', 'São Paulo', '-23.5489', '-46.638', '', 27, 'Lorem Iosum domoeooe');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `dist_usuarios`
--
ALTER TABLE `dist_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `dist_usuarios`
--
ALTER TABLE `dist_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=680;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
