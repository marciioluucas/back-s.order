SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_sorder`
--
CREATE DATABASE IF NOT EXISTS `bd_sorder` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_sorder`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `nome_cliente` varchar(50) NOT NULL,
  `is_levar` tinyint(1) NOT NULL DEFAULT '0',
  `is_pronto` tinyint(1) NOT NULL DEFAULT '0',
  `ativado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `ativado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_has_pedido`
--

CREATE TABLE `produto_has_pedido` (
  `produto_id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_has_propriedades_produto`
--

CREATE TABLE `produto_has_propriedades_produto` (
  `produto_id` int(11) NOT NULL,
  `propriedades_produto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `propriedades_produto`
--

CREATE TABLE `propriedades_produto` (
  `id` int(11) NOT NULL,
  `tamanho` varchar(45) NOT NULL,
  `preco` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
  (1, 'terter', 'asodashd@gmail.com', 'dsadasd'),
  (2, 'Marcio Lucas', 'marciioluucas@gmail.com', 'jabuticaba123'),
  (3, 'dasdas', 'asdasd@fiodfs.com', 'asdasdasd'),
  (4, 'Joao', 'dasilva@gmail.com', 'jose'),
  (5, 'Pamonh', 'dasoid@fgo.com', 'asdoi'),
  (6, 'dsad', '123123@dasda.com', 'asdasd'),
  (7, 'Teste2', 'dasod@gmail.com', 'dsaodjas'),
  (8, 'undefined', 'undefined', 'undefined'),
  (9, 'undefined', 'undefined', 'undefined'),
  (10, 'undefined', 'undefined', 'undefined'),
  (11, 'AÃ§aÃ­ universitario', 'doaisjds@ioa.com', 'dsaoijdaso'),
  (12, 'undefined', 'undefined', 'undefined'),
  (13, 'undefined', 'undefined', 'undefined'),
  (14, 'undefined', 'undefined', 'undefined'),
  (15, 'undefined', 'undefined', 'undefined'),
  (16, 'undefined', 'undefined', 'undefined'),
  (17, 'undefined', 'undefined', 'undefined'),
  (18, 'undefined', 'undefined', 'undefined'),
  (19, 'undefined', 'undefined', 'undefined'),
  (20, 'undefined', 'undefined', 'undefined'),
  (21, 'Marcio', 'dasds@fdsa.com', 'dasoijdsa'),
  (22, 'fsfsdfs', 'sdfsdf@gmail.com', 'fsdfsdf'),
  (23, 'aaaaa', 'aaaaa', 'aaaa'),
  (24, 'Marcio', 'qweqwe@dad.com', 'qweqwe'),
  (25, 'Marcio', '12312@fsdfok.com', 'dasdas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto_has_pedido`
--
ALTER TABLE `produto_has_pedido`
  ADD PRIMARY KEY (`produto_id`,`pedido_id`),
  ADD KEY `fk_produto_has_pedido_pedido1_idx` (`pedido_id`),
  ADD KEY `fk_produto_has_pedido_produto_idx` (`produto_id`);

--
-- Indexes for table `produto_has_propriedades_produto`
--
ALTER TABLE `produto_has_propriedades_produto`
  ADD PRIMARY KEY (`produto_id`,`propriedades_produto_id`),
  ADD KEY `fk_produto_has_propriedades_produto_propriedades_produto1_idx` (`propriedades_produto_id`),
  ADD KEY `fk_produto_has_propriedades_produto_produto1_idx` (`produto_id`);

--
-- Indexes for table `propriedades_produto`
--
ALTER TABLE `propriedades_produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `produto_has_pedido`
--
ALTER TABLE `produto_has_pedido`
  ADD CONSTRAINT `fk_produto_has_pedido_pedido1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produto_has_pedido_produto` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produto_has_propriedades_produto`
--
ALTER TABLE `produto_has_propriedades_produto`
  ADD CONSTRAINT `fk_produto_has_propriedades_produto_produto1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produto_has_propriedades_produto_propriedades_produto1` FOREIGN KEY (`propriedades_produto_id`) REFERENCES `propriedades_produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
