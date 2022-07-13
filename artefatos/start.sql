
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `idTenant` int(11) NOT NULL,
  `idUserGroup` int(11) NOT NULL,
  `createDate` datetime DEFAULT NULL,
  `updateDate` datetime DEFAULT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idUser`),
  KEY `fk_usuario_empresa1_idx` (`idTenant`),
  KEY `fk_user_userGroup1_idx` (`idUserGroup`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `user` (`idUser`, `idTenant`, `idUserGroup`, `createDate`, `updateDate`, `firstName`, `lastName`, `email`, `password`, `active`) VALUES
(1, 0, 2, '2016-04-15 22:00:19', '2016-04-15 22:00:19', 'Alavanca', ' Sites e Sistemas', 'atendimento@alavanca.digital', '81762bd86d1563482406af027b470f0e', '1');

CREATE TABLE IF NOT EXISTS `usergroup` (
  `idUserGroup` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `permissions` text,
  PRIMARY KEY (`idUserGroup`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


INSERT INTO `usergroup` (`idUserGroup`, `name`, `permissions`) VALUES
(2, 'Administrador', '{"banner":["view","create","update","delete","ativar","desativar","index"],"dica":["view","create","update","delete","ativar","desativar","index"],"frota":["view","create","update","delete","ativar","desativar","index"],"links":["view","create","update","delete","ativar","desativar","index"],"servico":["view","create","update","delete","ativar","desativar","index"],"site":["getcidades","index","error","login","logout","enviar_link_senha"],"trabalhe":["view","create","update","delete","ativar","desativar","index"],"user":["view","create","update","delete","me","password","index"],"usergroup":["view","create","update","delete","index"],"userlog":["view","create","update","delete","index"]}');

CREATE TABLE IF NOT EXISTS `userlog` (
  `idUserLog` int(11) NOT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `userName` varchar(100) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `controller` varchar(100) DEFAULT NULL,
  `action` varchar(100) DEFAULT NULL,
  `get` text,
  `post` text,
  `accessStatus` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `garbage` (
  `idGarbage` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `userName` varchar(100) DEFAULT NULL,
  `table` varchar(100) DEFAULT NULL,
  `id` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `data` text,
  `sqlInsert` text,
  `hash` varchar(100) DEFAULT NULL,
  `active` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idGarbage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


