-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/09/2025 às 14:49
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `petshop`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `animal` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `raca` varchar(100) NOT NULL,
  `porte` varchar(100) NOT NULL,
  `idade` int(11) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `castrado` varchar(100) NOT NULL,
  `observacao` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pets`
--

INSERT INTO `pets` (`id`, `animal`, `nome`, `raca`, `porte`, `idade`, `sexo`, `castrado`, `observacao`) VALUES
(1, 'Cachorro', 'Dora Alice', 'SRD', 'Médio', 'Nove anos', 'Fêmea', 'Sim', 'Querida, doce, mas medrosa'),
(2, 'Cachorro', 'Shakira', 'SRD', 'Grande', 'Dezoito Anos', 'Fêmea', 'Não', 'Receosa, educada, obediente.'),
(3, 'Cachorro', 'Godzilla', 'SRD', 'Grande', 'Doze anos', 'Macho', 'Sim', 'Mimoso, simpático'),
(4, 'Cachorro', 'Nina', 'Pitbull', 'Grande', 'Um ano', 'Fêmea', 'Não', 'Brincalhona, esperta, dócil'),
(5, 'Gato', 'Mel', 'SRD', 'Pequeno', 'Cinco anos', 'Fêmea', 'Sim', 'Mansa, caseira, calma');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  senha_hash VARCHAR(255) NOT NULL,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO usuarios (nome, email, senha_hash)
VALUES (
  'Admin',
  'admin@petshop.com',
  '$2y$10$Zxg7/RjHtFZ64IymrA/JHukM5H3w4r3J3eHc4rgrHfPjNqzngdKWS'
);
-- senha: senha123
