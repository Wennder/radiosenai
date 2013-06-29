CREATE DATABASE radiosenai;

USE radiosenai;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS `integrantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(500) DEFAULT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

INSERT INTO `integrantes` (`id`, `imagem`, `nome`, `descricao`) VALUES
(5, 'img/672013215659.png', 'VinÃ­cius Almeida dos Santos', 'Integrante programador do site'),
(6, 'img/1482013001502.jpeg', 'Fernando henrique Faoro', 'Ajudante e manuseador'),
(7, 'img/692013185009.jpeg', 'Gabriel Afonso Costacurta', 'Ajudante e manuseadorÂ².');

CREATE TABLE IF NOT EXISTS `paginas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `conteudo` varchar(10000) NOT NULL,
  `inicial` smallint(1) NOT NULL DEFAULT '0',
  `ordem_menu` int(2) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

INSERT INTO `paginas` (`id`, `nome`, `conteudo`, `inicial`, `ordem_menu`) VALUES
(1, 'PÃ¡gina inicial', '<h2>RÃ¡dio Senai - Uma nova proposta</h2>\r\n<hr />\r\n<p>\r\nA RÃ¡dio SENAI tÃªve esse ano uma nova proposta: fazer um site que transmita simultaneamente a rÃ¡dio online, com um site onde seja possÃ­vel fazer tambÃ©m pedidos de mÃºsicas e recados.\r\n</p>\r\n<p>\r\nA maior importÃ¢ncia da rÃ¡dio Ã© transmitir algumas informaÃ§Ãµes sobre a Feira do Conhecimento e o Mundo Senai, eventos nos quais o tempo de operaÃ§Ã£o da RÃ¡dio SENAI fica em funcionamento.\r\n</p>\r\n<h3>Veja aqui um vÃ­deo feito durante a montagem dos stands do Mundo Senai:</h3>\r\n<object width="425" height="355"><param name="movie" value="http://www.youtube.com/v/watch?v=kYtGl1dX5qI"></param><param name="wmode" value="transparent"></param><embed src="http://www.youtube.com/v/watch?v=kYtGl1dX5qI" type="application/x-shockwave-flash" wmode="transparent" width="425" height="355"></embed></object>', 1, 1),
(2, 'Sobre a rÃ¡dio', 'PÃ¡gina da rÃ¡dio senai --Desenvolvendo--', 0, 2);

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `musica` varchar(40) NOT NULL,
  `artista` varchar(40) DEFAULT NULL,
  `recado` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;