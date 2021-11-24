# PJI-Galeria
Projeto de PJI para o último bimestre

#Banco: artonhaul

CREATE TABLE `artonhaul`.`usuarios` ( 
  `usuario_id` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(200) NOT NULL,
  usuario_nome char(50) not null,
  `senha` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`usuario_id`));
  
    
  CREATE TABLE `artes` (
  `id_arte` int NOT NULL AUTO_INCREMENT,
  `autor` varchar(45) NOT NULL,
  `arte_nome` varchar(45) DEFAULT 'Arte sem nome',
  `data_post` varchar(16) DEFAULT NULL,
  `desc` text NOT NULL,
  `extensao` varchar(5) DEFAULT NULL,
  `fk_usuario_id` int NOT NULL,
  PRIMARY KEY (`id_arte`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

