/*                                     UPDATES.SQL
/*  Esse Arquivo Serve Como base de Atualizações no Banco de Dados aos Desenvolvedores
/*  Criado Por: Vinícius de Araújo Portela
*/


# UPDATE FROM COMMIT 'Telefone, Lista Telefone e Emails'
ALTER TABLE `contas` ADD `telefone` INT NULL AFTER `turma`;
ALTER TABLE `contas` ADD INDEX(`email`);


# UPDATE FROM COMMIT 'EQUIPES'
CREATE TABLE `equipes` (
  `ID` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `modalidade` varchar(4) NOT NULL,
  `capitao` int(11) NOT NULL,
  `logo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `equipes`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `equipes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `equipecontas` (
  `ID` int(11) NOT NULL,
  `equipe` int(11) NOT NULL,
  `conta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `equipecontas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_equipeconta_equipe` (`equipe`),
  ADD KEY `fk_equipeconta_conta` (`conta`);

ALTER TABLE `equipecontas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `equipecontas`
  ADD CONSTRAINT `fk_equipeconta_conta` FOREIGN KEY (`conta`) REFERENCES `contas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_equipeconta_equipe` FOREIGN KEY (`equipe`) REFERENCES `equipes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

ALTER TABLE `equipes` ADD CONSTRAINT `fk_equipes_contas` FOREIGN KEY (`capitao`) REFERENCES `contas`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE `requisicoes` (
  `ID` int(11) NOT NULL,
  `conta` int(11) NOT NULL,
  `equipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `requisicoes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_requisicoes_contas` (`conta`),
  ADD KEY `fk_requisicoes_equipe` (`equipe`);

ALTER TABLE `requisicoes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

ALTER TABLE `requisicoes`
  ADD CONSTRAINT `fk_requisicoes_contas` FOREIGN KEY (`conta`) REFERENCES `contas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_requisicoes_equipe` FOREIGN KEY (`equipe`) REFERENCES `equipes` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;