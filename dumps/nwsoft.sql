-- phpMyAdmin SQL Dump
-- version 5.2.1-1.fc38
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 29/04/2024 às 18:55
-- Versão do servidor: 10.5.23-MariaDB
-- Versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nwsoft`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrar_usuario` (IN `p_cpf` VARCHAR(14), IN `p_nome` VARCHAR(100), IN `p_senha` VARCHAR(100), IN `p_perfil` VARCHAR(20), IN `p_email` VARCHAR(100), OUT `p_resultado` VARCHAR(100))   BEGIN
    IF p_cpf IS NULL OR p_nome IS NULL OR p_senha IS NULL OR p_email IS NULL THEN
        SET p_resultado = 'Todos os campos sao obrigatorios';
    ELSEIF EXISTS (SELECT 1 FROM nwsoft.usuarios WHERE cpf = p_cpf) THEN
        SET p_resultado = 'CPF ja cadastrado';
    ELSEIF EXISTS (SELECT 1 FROM nwsoft.usuarios WHERE email = p_email) THEN
        SET p_resultado = 'E-mail ja cadastrado';
    ELSE
        INSERT INTO nwsoft.usuarios (cpf, senha, perfil, nome, email)
        VALUES (p_cpf, p_nome, p_senha, p_perfil, p_email);
        SET p_resultado = 'Usuario cadastrado com sucesso';
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estoque`
--

INSERT INTO `estoque` (`id`, `nome`, `tipo`, `valor`) VALUES
(122, 'cabo', 'produto', 50),
(127, 'smartphone', 'produto', 750),
(128, 'smartphone', 'produto', 750),
(129, 'smartphone', 'produto', 750),
(130, 'smartphone', 'produto', 750),
(131, 'smartphone', 'produto', 750),
(132, 'smartphone', 'produto', 750),
(133, 'smartphone', 'produto', 750),
(134, 'smartphone', 'produto', 750),
(136, 'tela', 'produto', 10),
(137, 'tela', 'produto', 10),
(138, 'tela', 'produto', 10),
(139, 'tela', 'produto', 10),
(140, 'tela', 'produto', 10),
(141, 'tela', 'produto', 10),
(142, 'tela', 'produto', 10),
(143, 'tela', 'produto', 10),
(144, 'tela', 'produto', 10),
(146, 'notebook', 'produto', 11000),
(147, 'notebook', 'produto', 11000),
(148, 'notebook', 'produto', 11000),
(149, 'notebook', 'produto', 11000),
(150, 'notebook', 'produto', 11000),
(151, 'notebook', 'produto', 11000),
(154, 'capinha', 'produto', 5),
(155, 'capinha', 'produto', 5),
(156, 'capinha', 'produto', 5),
(157, 'capinha', 'produto', 5),
(158, 'capinha', 'produto', 5),
(159, 'capinha', 'produto', 5),
(160, 'capinha', 'produto', 5),
(161, 'capinha', 'produto', 5),
(162, 'capinha', 'produto', 5),
(163, 'capinha', 'produto', 5),
(166, 'instalacao', 'serviço', 300),
(167, 'instalacao', 'serviço', 300),
(168, 'instalacao', 'serviço', 300),
(169, 'instalacao', 'serviço', 300),
(170, 'instalacao', 'serviço', 300),
(171, 'instalacao', 'serviço', 300),
(172, 'instalacao', 'serviço', 300),
(173, 'instalacao', 'serviço', 300),
(174, 'instalacao', 'serviço', 300),
(177, 'manutencao', 'serviço', 300),
(178, 'manutencao', 'serviço', 300),
(179, 'manutencao', 'serviço', 300),
(180, 'manutencao', 'serviço', 300),
(181, 'manutencao', 'serviço', 300),
(182, 'manutencao', 'serviço', 300),
(183, 'manutencao', 'serviço', 300),
(184, 'manutencao', 'serviço', 300),
(186, 'pintura', 'serviço', 300),
(187, 'pintura', 'serviço', 300),
(188, 'pintura', 'serviço', 300),
(189, 'pintura', 'serviço', 300),
(190, 'pintura', 'serviço', 300),
(191, 'pintura', 'serviço', 300),
(192, 'pintura', 'serviço', 300),
(193, 'entrega', 'serviço', 100),
(194, 'entrega', 'serviço', 100),
(195, 'entrega', 'serviço', 100),
(196, 'entrega', 'serviço', 100),
(197, 'entrega', 'serviço', 100);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `perfil` varchar(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `cpf`, `senha`, `perfil`, `nome`, `email`) VALUES
(5, '06630436385', '123456', 'admin', 'luan Araujo', 'luan.info3@gmai..com'),
(32, '03988266337', 'jesusebom', 'estoquista', 'Keke', 'kednafrancis@arquitetura.ufc.br'),
(33, '02266585788', '123456', 'estoquista', 'estoquista ', 'estoque@gmail.com'),
(34, '26589659996', '123456', 'vendedor', 'vendedor', 'vendedor@gmail.com'),
(35, '00000000000', '123456', 'admin', 'Elesson Hunter', 'hunter@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `pedido` int(50) NOT NULL,
  `valor_total` double NOT NULL,
  `vendedor` varchar(50) NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`payload`)),
  `vendido` bigint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`id`, `pedido`, `valor_total`, `vendedor`, `payload`, `vendido`) VALUES
(22, 411384664, 50, '5', '{\"nome\":[\"notebook\",\"tela\",\"smartphone\",\"Garrafa tu00e9rmica\",\"capinha\",\"cabo\"],\"valor\":[11000,10,750,50,5,50]}', 1),
(23, 1784177599, 50, '34', '{\"nome\":[\"manutencao\",\"entrega\",\"cabo\"],\"valor\":[300,100,50]}', 0),
(24, 860249093, 50, '33', '{\"nome\":\"cabo\",\"valor\":50}', 0);

--
-- Acionadores `vendas`
--
DELIMITER $$
CREATE TRIGGER `verifica_perfil_estoque` BEFORE INSERT ON `vendas` FOR EACH ROW BEGIN
    DECLARE v_perfil VARCHAR(20);

    SELECT perfil INTO v_perfil FROM nwsoft.usuarios WHERE id = NEW.vendedor;

    IF v_perfil = 'estoquista' THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Não é permitido inserir vendas para vendedores com perfil de estoque.{retorno da trigger}';
    END IF;
END
$$
DELIMITER ;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
