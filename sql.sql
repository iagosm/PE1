CREATE DATABASE `pe1`;

CREATE TABLE IF NOT EXISTS `evento` (
  `id_evento` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `subtitulo` text NOT NULL,
  `descricao` text NOT NULL,
  `onde` text NOT NULL,
  `quando` date NOT NULL,
  `atracoes` text NOT NULL,
  `classificacao` int NOT NULL,
  `realizacao` varchar(255) NOT NULL,
  `contato` varchar(12) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;