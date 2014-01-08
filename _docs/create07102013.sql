SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `bd_mysql_sertao` ;
CREATE SCHEMA IF NOT EXISTS `bd_mysql_sertao` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `bd_mysql_sertao` ;

-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tracking`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tracking` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tracking` (
  `cod_tracking` INT NOT NULL ,
  `dat_tracking` TIMESTAMP NOT NULL ,
  `nom_acao` VARCHAR(125) NOT NULL ,
  `nom_tabela` VARCHAR(125) NOT NULL ,
  `nom_modulo` VARCHAR(125) NOT NULL ,
  `nom_descricao` VARCHAR(125) NOT NULL ,
  PRIMARY KEY (`cod_tracking`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tab_status_cupom`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tab_status_cupom` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tab_status_cupom` (
  `cod_status` INT NOT NULL AUTO_INCREMENT ,
  `nom_status` VARCHAR(45) NULL ,
  PRIMARY KEY (`cod_status`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`sis_equipe`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`sis_equipe` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`sis_equipe` (
  `cod_equipe` INT NOT NULL AUTO_INCREMENT ,
  `cod_equipe_superior` INT NULL ,
  `nom_equipe` VARCHAR(100) NOT NULL ,
  `bol_ambiente` TINYINT NOT NULL DEFAULT 0 ,
  `dat_cadastro` TIMESTAMP NOT NULL ,
  `dat_cancelamento` TIMESTAMP NULL ,
  `bol_ambiente_produto` TINYINT NOT NULL DEFAULT 0 ,
  `bol_ambiente_pagamentos` TINYINT NOT NULL DEFAULT 0 ,
  `bol_ambiente_conta` TINYINT NOT NULL DEFAULT 0 ,
  `num_telefone` VARCHAR(11) NULL ,
  `dat_alteracao` TIMESTAMP NULL ,
  `nom_proprietario` VARCHAR(45) NULL ,
  `nom_gerente` VARCHAR(45) NULL ,
  `num_celular_gerente` VARCHAR(11) NULL ,
  `bol_ativo` TINYINT NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`cod_equipe`) ,
  INDEX `fk_sis_equipe_sis_equipe1_idx` (`cod_equipe_superior` ASC) ,
  CONSTRAINT `fk_sis_equipe_sis_equipe1`
    FOREIGN KEY (`cod_equipe_superior` )
    REFERENCES `bd_mysql_sertao`.`sis_equipe` (`cod_equipe` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`sis_perfil`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`sis_perfil` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`sis_perfil` (
  `cod_perfil` INT NOT NULL AUTO_INCREMENT ,
  `cod_equipe` INT NOT NULL ,
  `nom_perfil` VARCHAR(100) NOT NULL ,
  `dsc_perfil` VARCHAR(50) NOT NULL ,
  `dat_criacao` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `dat_cancelamento` TIMESTAMP NULL ,
  PRIMARY KEY (`cod_perfil`) ,
  INDEX `fk_sis_perfil_sis_equipe1_idx` (`cod_equipe` ASC) ,
  CONSTRAINT `fk_sis_perfil_sis_equipe1`
    FOREIGN KEY (`cod_equipe` )
    REFERENCES `bd_mysql_sertao`.`sis_equipe` (`cod_equipe` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`sis_departamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`sis_departamento` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`sis_departamento` (
  `cod_sis_departamento` INT NOT NULL AUTO_INCREMENT ,
  `cod_equipe` INT NOT NULL ,
  `nom_departamento` VARCHAR(60) NULL ,
  PRIMARY KEY (`cod_sis_departamento`) ,
  INDEX `fk_sis_departamento_sis_equipe1_idx` (`cod_equipe` ASC) ,
  CONSTRAINT `fk_sis_departamento_sis_equipe1`
    FOREIGN KEY (`cod_equipe` )
    REFERENCES `bd_mysql_sertao`.`sis_equipe` (`cod_equipe` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`sis_usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`sis_usuario` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`sis_usuario` (
  `cod_usuario` INT NOT NULL AUTO_INCREMENT ,
  `cod_equipe` INT NOT NULL ,
  `cod_perfil` INT NOT NULL ,
  `cod_sis_departamento` INT NOT NULL ,
  `nom_usuario` VARCHAR(120) NOT NULL ,
  `nom_login` VARCHAR(45) NOT NULL ,
  `nom_senha` VARCHAR(45) NOT NULL ,
  `nom_email` VARCHAR(150) NULL ,
  `dat_cadastro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `dat_termino` TIMESTAMP NULL ,
  `bol_aceitacao_contrato` TINYINT NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`cod_usuario`) ,
  INDEX `fk_sis_usuario_sis_equipe1_idx` (`cod_equipe` ASC) ,
  INDEX `fk_sis_usuario_sis_perfil1_idx` (`cod_perfil` ASC) ,
  INDEX `fk_sis_usuario_sis_departamento1_idx` (`cod_sis_departamento` ASC) ,
  CONSTRAINT `fk_sis_usuario_sis_equipe1`
    FOREIGN KEY (`cod_equipe` )
    REFERENCES `bd_mysql_sertao`.`sis_equipe` (`cod_equipe` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sis_usuario_sis_perfil1`
    FOREIGN KEY (`cod_perfil` )
    REFERENCES `bd_mysql_sertao`.`sis_perfil` (`cod_perfil` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sis_usuario_sis_departamento1`
    FOREIGN KEY (`cod_sis_departamento` )
    REFERENCES `bd_mysql_sertao`.`sis_departamento` (`cod_sis_departamento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tab_cupom`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tab_cupom` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tab_cupom` (
  `cod_cupom` INT NOT NULL AUTO_INCREMENT ,
  `cod_usuario` INT NULL ,
  `cod_equipe` INT NULL ,
  `cod_status_cupom` INT NULL ,
  `nom_cupom` VARCHAR(45) NULL ,
  `dat_cadastro` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `dat_inicio_validade` DATETIME NULL ,
  `dat_fim_validade` DATETIME NULL ,
  `cod_tipo_cupom` INT NULL ,
  `vlr_meta` DECIMAL(10,2) NULL ,
  `vlr_resgate` DECIMAL(10,2) NULL ,
  PRIMARY KEY (`cod_cupom`) ,
  INDEX `fk_status_cupom_idx` (`cod_status_cupom` ASC) ,
  INDEX `fk_tab_cupom_sis_equipe1_idx` (`cod_equipe` ASC) ,
  INDEX `fk_tab_cupom_sis_usuario1_idx` (`cod_usuario` ASC) ,
  CONSTRAINT `fk_status_cupom`
    FOREIGN KEY (`cod_status_cupom` )
    REFERENCES `bd_mysql_sertao`.`tab_status_cupom` (`cod_status` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_cupom_sis_equipe1`
    FOREIGN KEY (`cod_equipe` )
    REFERENCES `bd_mysql_sertao`.`sis_equipe` (`cod_equipe` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_cupom_sis_usuario1`
    FOREIGN KEY (`cod_usuario` )
    REFERENCES `bd_mysql_sertao`.`sis_usuario` (`cod_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tab_classif_pessoa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tab_classif_pessoa` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tab_classif_pessoa` (
  `cod_classif_pessoa` INT NOT NULL AUTO_INCREMENT ,
  `nom_classif_cliente` VARCHAR(45) NULL ,
  PRIMARY KEY (`cod_classif_pessoa`) )
ENGINE = InnoDB
AUTO_INCREMENT = 1
DELAY_KEY_WRITE = 1;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tab_pessoa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tab_pessoa` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tab_pessoa` (
  `cod_pessoa` INT NOT NULL AUTO_INCREMENT ,
  `cod_usuario` INT NOT NULL ,
  `cod_classif_pessoa` INT NULL ,
  `nom_pessoa` VARCHAR(60) NULL ,
  `cod_cpf` DECIMAL(11) NULL ,
  `des_endereco` VARCHAR(60) NULL ,
  `des_nro_endereco` INT NULL ,
  `des_complemento` VARCHAR(50) NULL ,
  `des_nro_celular` VARCHAR(15) NULL ,
  `des_nro_celular_2` VARCHAR(15) NULL ,
  `dat_aniversario` DATETIME NULL ,
  `des_sexo` VARCHAR(10) NULL ,
  `bol_ativo` TINYINT NULL ,
  `dat_cadastro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `dat_alteracao` TIMESTAMP NULL ,
  `qtd_filhos` INT NULL ,
  `bol_utiliza_crm` TINYINT NULL ,
  PRIMARY KEY (`cod_pessoa`) ,
  INDEX `fk_classif_pessoa_02_idx` (`cod_classif_pessoa` ASC) ,
  INDEX `fk_tab_pessoa_sis_usuario1_idx` (`cod_usuario` ASC) ,
  CONSTRAINT `fk_classif_pessoa_02`
    FOREIGN KEY (`cod_classif_pessoa` )
    REFERENCES `bd_mysql_sertao`.`tab_classif_pessoa` (`cod_classif_pessoa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_pessoa_sis_usuario1`
    FOREIGN KEY (`cod_usuario` )
    REFERENCES `bd_mysql_sertao`.`sis_usuario` (`cod_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tab_tipo_telefone`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tab_tipo_telefone` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tab_tipo_telefone` (
  `cod_tipo_telefone` INT NULL AUTO_INCREMENT ,
  `des_tipo_telefone` VARCHAR(45) NULL ,
  PRIMARY KEY (`cod_tipo_telefone`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tab_telefone_loja`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tab_telefone_loja` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tab_telefone_loja` (
  `cod_telefone_loja` INT NOT NULL AUTO_INCREMENT ,
  `cod_equipe` INT NULL ,
  `cod_tipo_telefone` INT NULL ,
  `des_nro_telefone` VARCHAR(15) NULL ,
  PRIMARY KEY (`cod_telefone_loja`) ,
  INDEX `fk_tipo_telefone_idx` (`cod_tipo_telefone` ASC) ,
  INDEX `fk_tab_telefone_loja_sis_equipe1_idx` (`cod_equipe` ASC) ,
  CONSTRAINT `fk_tipo_telefone`
    FOREIGN KEY (`cod_tipo_telefone` )
    REFERENCES `bd_mysql_sertao`.`tab_tipo_telefone` (`cod_tipo_telefone` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_telefone_loja_sis_equipe1`
    FOREIGN KEY (`cod_equipe` )
    REFERENCES `bd_mysql_sertao`.`sis_equipe` (`cod_equipe` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tab_email_pessoa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tab_email_pessoa` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tab_email_pessoa` (
  `cod_email_pessoa` INT NOT NULL AUTO_INCREMENT ,
  `cod_pessoa` INT NULL ,
  `des_email_pessoa` VARCHAR(100) NULL ,
  `bol_ativo` TINYINT NULL ,
  PRIMARY KEY (`cod_email_pessoa`) ,
  INDEX `fk_pessoa_email_idx` (`cod_pessoa` ASC) ,
  CONSTRAINT `fk_pessoa_email`
    FOREIGN KEY (`cod_pessoa` )
    REFERENCES `bd_mysql_sertao`.`tab_pessoa` (`cod_pessoa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tab_sms`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tab_sms` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tab_sms` (
  `cod_sms` INT NOT NULL AUTO_INCREMENT ,
  `cod_usuario` INT NOT NULL ,
  `des_sms` VARCHAR(140) NOT NULL ,
  `bol_ativo` TINYINT NOT NULL DEFAULT 0 ,
  `bol_enviada` TINYINT NULL ,
  `dat_inicio_envio` DATETIME NULL ,
  `dat_fim_envio` DATETIME NULL ,
  `dat_cadastro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `dat_termino` TIMESTAMP NULL ,
  PRIMARY KEY (`cod_sms`) ,
  INDEX `fk_tab_sms_sis_usuario1_idx` (`cod_usuario` ASC) ,
  CONSTRAINT `fk_tab_sms_sis_usuario1`
    FOREIGN KEY (`cod_usuario` )
    REFERENCES `bd_mysql_sertao`.`sis_usuario` (`cod_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tab_envio_sms`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tab_envio_sms` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tab_envio_sms` (
  `cod_sms` INT NULL ,
  `cod_pessoa` INT NULL ,
  `bol_enviada_sucesso` TINYINT NULL ,
  INDEX `fk_sms_idx` (`cod_sms` ASC) ,
  INDEX `fk_sms_pessoa_idx` (`cod_pessoa` ASC) ,
  CONSTRAINT `fk_sms`
    FOREIGN KEY (`cod_sms` )
    REFERENCES `bd_mysql_sertao`.`tab_sms` (`cod_sms` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sms_pessoa`
    FOREIGN KEY (`cod_pessoa` )
    REFERENCES `bd_mysql_sertao`.`tab_pessoa` (`cod_pessoa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tab_email`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tab_email` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tab_email` (
  `cod_email` INT NOT NULL AUTO_INCREMENT ,
  `cod_usuario` INT NOT NULL ,
  `des_titulo_email` VARCHAR(100) NOT NULL ,
  `des_corpo_email` VARCHAR(5000) NOT NULL ,
  `dat_cadastro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `dat_inicio_envio` DATETIME NULL ,
  `dat_fim_envio` DATETIME NULL ,
  `dat_termino` TIMESTAMP NULL ,
  PRIMARY KEY (`cod_email`) ,
  INDEX `fk_tab_email_sis_usuario1_idx` (`cod_usuario` ASC) ,
  CONSTRAINT `fk_tab_email_sis_usuario1`
    FOREIGN KEY (`cod_usuario` )
    REFERENCES `bd_mysql_sertao`.`sis_usuario` (`cod_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tab_envio_email`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tab_envio_email` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tab_envio_email` (
  `cod_email` INT NULL ,
  `cod_email_pessoa` INT NULL ,
  `dat_envio` DATETIME NULL ,
  `bol_enviado` TINYINT NULL ,
  INDEX `fk_email_pessoa_idx` (`cod_email` ASC) ,
  CONSTRAINT `fk_email_pessoa`
    FOREIGN KEY (`cod_email` )
    REFERENCES `bd_mysql_sertao`.`tab_email_pessoa` (`cod_email_pessoa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_email`
    FOREIGN KEY (`cod_email` )
    REFERENCES `bd_mysql_sertao`.`tab_email` (`cod_email` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tab_plano_contas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tab_plano_contas` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tab_plano_contas` (
  `cod_plano_contas` INT NOT NULL AUTO_INCREMENT ,
  `nom_plano_contas` VARCHAR(45) NOT NULL ,
  `bol_ativo` TINYINT NOT NULL DEFAULT 0 ,
  `dat_cadastro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`cod_plano_contas`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tab_tipo_servico`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tab_tipo_servico` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tab_tipo_servico` (
  `cod_tipo_servico` INT NULL AUTO_INCREMENT ,
  `nom_tipo_servico` VARCHAR(45) NOT NULL ,
  `bol_ativo` VARCHAR(45) NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`cod_tipo_servico`) )
ENGINE = InnoDB
AUTO_INCREMENT = 1;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tab_plano_propriedades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tab_plano_propriedades` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tab_plano_propriedades` (
  `cod_plano_propriedade` INT NOT NULL AUTO_INCREMENT ,
  `cod_equipe` INT NOT NULL ,
  `cod_plano_contas` INT NULL ,
  `cod_tipo_servico` INT NULL ,
  `qtd_itens_servico` INT NULL ,
  `vlr_plano` DECIMAL(10,2) NULL ,
  `dat_inicio_plano` DATETIME NULL ,
  `dat_fim_plano` DATETIME NULL ,
  `bol_ativo` TINYINT NOT NULL DEFAULT 0 ,
  `dat_cadastro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `dat_termino` TIMESTAMP NULL ,
  PRIMARY KEY (`cod_plano_propriedade`) ,
  INDEX `fk_tipo_svc_propr_idx` (`cod_tipo_servico` ASC) ,
  INDEX `fk_plano_propr_idx` (`cod_plano_contas` ASC) ,
  INDEX `fk_tab_plano_propriedades_sis_equipe1_idx` (`cod_equipe` ASC) ,
  CONSTRAINT `fk_tipo_svc_propr`
    FOREIGN KEY (`cod_tipo_servico` )
    REFERENCES `bd_mysql_sertao`.`tab_tipo_servico` (`cod_tipo_servico` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_plano_propr`
    FOREIGN KEY (`cod_plano_contas` )
    REFERENCES `bd_mysql_sertao`.`tab_plano_contas` (`cod_plano_contas` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_plano_propriedades_sis_equipe1`
    FOREIGN KEY (`cod_equipe` )
    REFERENCES `bd_mysql_sertao`.`sis_equipe` (`cod_equipe` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tab_cupom_x_pessoa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tab_cupom_x_pessoa` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tab_cupom_x_pessoa` (
  `cod_cupom` INT NULL ,
  `cod_pessoa` INT NULL ,
  `bol_resgate` TINYINT NULL ,
  `dat_resgate` DATETIME NULL ,
  INDEX `fk_cupom_x_pessoa_01_idx` (`cod_cupom` ASC) ,
  INDEX `fk_cupom_x_pessoa_02_idx` (`cod_pessoa` ASC) ,
  CONSTRAINT `fk_cupom_x_pessoa_01`
    FOREIGN KEY (`cod_cupom` )
    REFERENCES `bd_mysql_sertao`.`tab_cupom` (`cod_cupom` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cupom_x_pessoa_02`
    FOREIGN KEY (`cod_pessoa` )
    REFERENCES `bd_mysql_sertao`.`tab_pessoa` (`cod_pessoa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tab_cupom_x_tipo_servico`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tab_cupom_x_tipo_servico` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tab_cupom_x_tipo_servico` (
  `cod_cupom` INT NOT NULL ,
  `cod_sms_email` INT NOT NULL )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tab_transacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tab_transacao` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tab_transacao` (
  `cod_transacao` INT NOT NULL AUTO_INCREMENT ,
  `cod_equipe` INT NULL ,
  `cod_pessoa` INT NULL ,
  `dat_compra` DATETIME NULL ,
  `vlr_compra` DECIMAL(20,10) NULL ,
  `nom_tipo_pagamento` VARCHAR(50) NULL ,
  `cod_usuario` INT NULL ,
  `dat_importacao` DATETIME NULL ,
  PRIMARY KEY (`cod_transacao`) ,
  INDEX `fk_tab_transacao_sis_equipe1_idx` (`cod_equipe` ASC) ,
  CONSTRAINT `fk_tab_transacao_sis_equipe1`
    FOREIGN KEY (`cod_equipe` )
    REFERENCES `bd_mysql_sertao`.`sis_equipe` (`cod_equipe` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tab_propr_classif_pessoa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tab_propr_classif_pessoa` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tab_propr_classif_pessoa` (
  `cod_propr_classif_pessoa` INT NOT NULL AUTO_INCREMENT ,
  `cod_classif_pessoa` INT NULL ,
  `qtd_vendas` INT NULL ,
  `vlr_vendas` DECIMAL(10,2) NULL ,
  `bol_ativo` TINYINT NULL ,
  `dat_cadastro` DATETIME NULL ,
  PRIMARY KEY (`cod_propr_classif_pessoa`) ,
  INDEX `fk_classif_cliente_idx` (`cod_classif_pessoa` ASC) ,
  CONSTRAINT `fk_classif_pessoa`
    FOREIGN KEY (`cod_classif_pessoa` )
    REFERENCES `bd_mysql_sertao`.`tab_classif_pessoa` (`cod_classif_pessoa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DELAY_KEY_WRITE = 1;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`tab_audit_classificacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`tab_audit_classificacao` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`tab_audit_classificacao` (
  `cod_audit_classificacao` INT NOT NULL AUTO_INCREMENT ,
  `cod_propr_classif` INT NULL ,
  `dat_desativacao` DATETIME NULL ,
  `cod_usuario` INT NULL ,
  PRIMARY KEY (`cod_audit_classificacao`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`sis_acoes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`sis_acoes` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`sis_acoes` (
  `cod_acao` INT NOT NULL AUTO_INCREMENT ,
  `nom_acao` VARCHAR(60) NOT NULL ,
  PRIMARY KEY (`cod_acao`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`sis_equipe_config`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`sis_equipe_config` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`sis_equipe_config` (
  `cod_sis_equipe_config` INT NOT NULL AUTO_INCREMENT ,
  `cod_equipe` INT NOT NULL ,
  `nom_logo` VARCHAR(60) NOT NULL DEFAULT 'xxx' ,
  `nom_empresa` VARCHAR(120) NOT NULL DEFAULT 'F3TEC' ,
  `num_cnpj` INT(11) NOT NULL DEFAULT 01 ,
  `nom_endereco` VARCHAR(225) NULL ,
  `num_numero` INT(11) NULL ,
  `nom_cidade` VARCHAR(120) NULL ,
  `sig_uf` VARCHAR(2) NULL ,
  `nom_bairro` VARCHAR(120) NULL ,
  `num_cep` VARCHAR(11) NULL ,
  PRIMARY KEY (`cod_sis_equipe_config`, `cod_equipe`) ,
  INDEX `fk_sis_equipe_config_sis_equipe1_idx` (`cod_equipe` ASC) ,
  CONSTRAINT `fk_sis_equipe_config_sis_equipe1`
    FOREIGN KEY (`cod_equipe` )
    REFERENCES `bd_mysql_sertao`.`sis_equipe` (`cod_equipe` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`sis_permissoes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`sis_permissoes` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`sis_permissoes` (
  `cod_permissao` INT NOT NULL AUTO_INCREMENT ,
  `dsc_permissao` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`cod_permissao`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`sis_menu`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`sis_menu` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`sis_menu` (
  `cod_menu` INT NOT NULL AUTO_INCREMENT ,
  `cod_menu_superior` INT NULL ,
  `cod_permissao` INT NOT NULL ,
  `nom_menu` VARCHAR(50) NOT NULL ,
  `nom_aplicativo` VARCHAR(100) NOT NULL ,
  `nom_img` VARCHAR(60) NULL ,
  `bol_ativo` TINYINT NOT NULL DEFAULT 0 ,
  `bol_visualiza` TINYINT NOT NULL DEFAULT 0 ,
  `dat_criacao` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`cod_menu`) ,
  INDEX `fk_sis_menu_sis_menu1_idx` (`cod_menu_superior` ASC) ,
  INDEX `fk_sis_menu_sis_permissoes1_idx` (`cod_permissao` ASC) ,
  CONSTRAINT `fk_sis_menu_sis_menu1`
    FOREIGN KEY (`cod_menu_superior` )
    REFERENCES `bd_mysql_sertao`.`sis_menu` (`cod_menu` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sis_menu_sis_permissoes1`
    FOREIGN KEY (`cod_permissao` )
    REFERENCES `bd_mysql_sertao`.`sis_permissoes` (`cod_permissao` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`sis_perfil_permissoes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`sis_perfil_permissoes` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`sis_perfil_permissoes` (
  `num_nivel_permissao` INT(11) NOT NULL ,
  `cod_perfil` INT NOT NULL ,
  `cod_permissao` INT NOT NULL ,
  INDEX `fk_sis_perfil_permissoes_sis_perfil1_idx` (`cod_perfil` ASC) ,
  INDEX `fk_sis_perfil_permissoes_sis_permissoes1_idx` (`cod_permissao` ASC) ,
  PRIMARY KEY (`cod_perfil`, `cod_permissao`) ,
  CONSTRAINT `fk_sis_perfil_permissoes_sis_perfil1`
    FOREIGN KEY (`cod_perfil` )
    REFERENCES `bd_mysql_sertao`.`sis_perfil` (`cod_perfil` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sis_perfil_permissoes_sis_permissoes1`
    FOREIGN KEY (`cod_permissao` )
    REFERENCES `bd_mysql_sertao`.`sis_permissoes` (`cod_permissao` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`sis_permissoes_has_sis_acoes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`sis_permissoes_has_sis_acoes` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`sis_permissoes_has_sis_acoes` (
  `cod_permissao` INT NOT NULL ,
  `cod_acao` INT NOT NULL ,
  INDEX `fk_sis_permissoes_has_sis_acoes_sis_permissoes1_idx` (`cod_permissao` ASC) ,
  PRIMARY KEY (`cod_acao`, `cod_permissao`) ,
  CONSTRAINT `fk_sis_permissoes_has_sis_acoes_sis_permissoes1`
    FOREIGN KEY (`cod_permissao` )
    REFERENCES `bd_mysql_sertao`.`sis_permissoes` (`cod_permissao` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sis_permissoes_has_sis_acoes_sis_acoes1`
    FOREIGN KEY (`cod_acao` )
    REFERENCES `bd_mysql_sertao`.`sis_acoes` (`cod_acao` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_mysql_sertao`.`sis_usuario_configs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_mysql_sertao`.`sis_usuario_configs` ;

CREATE  TABLE IF NOT EXISTS `bd_mysql_sertao`.`sis_usuario_configs` (
  `cod_sis_usuario_configs` INT NOT NULL AUTO_INCREMENT ,
  `num_registro_pagina` INT(11) NULL DEFAULT 20 ,
  `num_casas_decimais` INT(11) NULL DEFAULT 2 ,
  `nom_moeda` VARCHAR(3) NULL DEFAULT 'R$' ,
  `bol_formata_tempo` TINYINT(4) NULL DEFAULT 1 ,
  `bol_minutos` TINYINT(4) NULL DEFAULT 0 ,
  `cod_usuario` INT NOT NULL ,
  `cod_equipe` INT NOT NULL ,
  PRIMARY KEY (`cod_sis_usuario_configs`) ,
  INDEX `fk_sis_usuario_configs_sis_usuario1_idx` (`cod_usuario` ASC) ,
  INDEX `fk_sis_usuario_configs_sis_equipe1_idx` (`cod_equipe` ASC) ,
  CONSTRAINT `fk_sis_usuario_configs_sis_usuario1`
    FOREIGN KEY (`cod_usuario` )
    REFERENCES `bd_mysql_sertao`.`sis_usuario` (`cod_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sis_usuario_configs_sis_equipe1`
    FOREIGN KEY (`cod_equipe` )
    REFERENCES `bd_mysql_sertao`.`sis_equipe` (`cod_equipe` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `bd_mysql_sertao` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `bd_mysql_sertao`.`tab_tipo_servico`
-- -----------------------------------------------------
START TRANSACTION;
USE `bd_mysql_sertao`;
INSERT INTO `bd_mysql_sertao`.`tab_tipo_servico` (`cod_tipo_servico`, `nom_tipo_servico`, `bol_ativo`) VALUES (NULL, 'SMS', '1');
INSERT INTO `bd_mysql_sertao`.`tab_tipo_servico` (`cod_tipo_servico`, `nom_tipo_servico`, `bol_ativo`) VALUES (NULL, 'EMAIL', '1');
INSERT INTO `bd_mysql_sertao`.`tab_tipo_servico` (`cod_tipo_servico`, `nom_tipo_servico`, `bol_ativo`) VALUES (NULL, 'VOICE EMAIL', '1');

COMMIT;
