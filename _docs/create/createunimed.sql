/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50524
Source Host           : localhost:3306
Source Database       : bd_unimed

Target Server Type    : MYSQL
Target Server Version : 50524
File Encoding         : 65001

Date: 2013-10-17 10:28:14
*/
SET FOREIGN_KEY_CHECKS=0;

DROP SCHEMA IF EXISTS `bdunimed` ;
CREATE SCHEMA IF NOT EXISTS `bdunimed` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `bdunimed` ;

-- ----------------------------
-- Table structure for `sis_acoes`
-- ----------------------------
DROP TABLE IF EXISTS `sis_acoes`;
CREATE TABLE `sis_acoes` (
  `cod_acao` int(11) NOT NULL AUTO_INCREMENT,
  `nom_acao` varchar(60) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`cod_acao`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Table structure for `sis_departamento`
-- ----------------------------
DROP TABLE IF EXISTS `sis_departamento`;
CREATE TABLE `sis_departamento` (
  `cod_sis_departamento` int(11) NOT NULL AUTO_INCREMENT,
  `nom_departamento` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `cod_equipe` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_sis_departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Table structure for `sis_equipe`
-- ----------------------------
DROP TABLE IF EXISTS `sis_equipe`;
CREATE TABLE `sis_equipe` (
  `cod_equipe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_equipe` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `bol_ambiente` tinyint(1) NOT NULL DEFAULT '0',
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_cancelamento` timestamp NULL DEFAULT NULL,
  `cod_equipe_superior` int(11) DEFAULT NULL,
  `bol_ambiente_produtos` tinyint(4) NOT NULL DEFAULT '0',
  `bol_ambiente_pagamentos` tinyint(4) NOT NULL DEFAULT '0',
  `bol_ambiente_conta` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cod_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Table structure for `sis_equipe_config`
-- ----------------------------
DROP TABLE IF EXISTS `sis_equipe_config`;
CREATE TABLE `sis_equipe_config` (
  `cod_sis_equipe_config` int(11) NOT NULL AUTO_INCREMENT,
  `nom_logo` varchar(60) COLLATE latin1_general_ci NOT NULL DEFAULT 'xxx',
  `cod_equipe` int(11) NOT NULL,
  `nom_empresa` varchar(120) COLLATE latin1_general_ci NOT NULL,
  `num_cnpj` int(11) NOT NULL,
  `nom_endereco` varchar(120) COLLATE latin1_general_ci DEFAULT NULL,
  `num_numero` int(11) DEFAULT NULL,
  `nom_cidade` varchar(120) COLLATE latin1_general_ci DEFAULT NULL,
  `sig_uf` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `nom_bairro` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `num_cep` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`cod_sis_equipe_config`,`cod_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


-- ----------------------------
-- Table structure for `sis_menu`
-- ----------------------------
DROP TABLE IF EXISTS `sis_menu`;
CREATE TABLE `sis_menu` (
  `cod_menu` int(11) NOT NULL AUTO_INCREMENT,
  `cod_menu_superior` int(11) DEFAULT NULL,
  `cod_permissao` int(11) NOT NULL,
  `nom_menu` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nom_aplicativo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nom_img` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `bol_ativo` tinyint(4) NOT NULL DEFAULT '0',
  `bol_visualiza` tinyint(4) NOT NULL DEFAULT '0',
  `dat_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Table structure for `sis_perfil`
-- ----------------------------
DROP TABLE IF EXISTS `sis_perfil`;
CREATE TABLE `sis_perfil` (
  `cod_perfil` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_perfil` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `cod_equipe` int(11) NOT NULL,
  `dsc_perfil` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `dat_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_cancelamento` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Table structure for `sis_perfil_permissoes`
-- ----------------------------
DROP TABLE IF EXISTS `sis_perfil_permissoes`;
CREATE TABLE `sis_perfil_permissoes` (
  `num_nivel_permissao` int(11) NOT NULL DEFAULT '0',
  `cod_perfil` int(10) unsigned NOT NULL,
  `cod_permissao` int(11) NOT NULL,
  PRIMARY KEY (`cod_perfil`,`cod_permissao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Table structure for `sis_permissoes`
-- ----------------------------
DROP TABLE IF EXISTS `sis_permissoes`;
CREATE TABLE `sis_permissoes` (
  `cod_permissao` int(11) NOT NULL,
  `dsc_permissao` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `bol_visualizar` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`cod_permissao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Table structure for `sis_permissoes_equipe`
-- ----------------------------
DROP TABLE IF EXISTS `sis_permissoes_equipe`;
CREATE TABLE `sis_permissoes_equipe` (
  `num_nivel_permissao` int(11) NOT NULL DEFAULT '31',
  `cod_equipe` int(11) NOT NULL,
  `cod_permissao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of sis_permissoes_equipe
-- ----------------------------

-- ----------------------------
-- Table structure for `sis_permissoes_has_sis_acoes`
-- ----------------------------
DROP TABLE IF EXISTS `sis_permissoes_has_sis_acoes`;
CREATE TABLE `sis_permissoes_has_sis_acoes` (
  `cod_permissao` int(11) NOT NULL,
  `cod_acao` int(11) NOT NULL,
  PRIMARY KEY (`cod_permissao`,`cod_acao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Table structure for `sis_usuario`
-- ----------------------------
DROP TABLE IF EXISTS `sis_usuario`;
CREATE TABLE `sis_usuario` (
  `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `cod_equipe` int(11) NOT NULL,
  `nom_usuario` varchar(120) COLLATE latin1_general_ci NOT NULL,
  `nom_login` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `nom_senha` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `nom_email` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_termino` timestamp NULL DEFAULT NULL,
  `cod_perfil` int(10) unsigned NOT NULL,
  `cod_sis_departamento` int(11) NOT NULL,
  `bol_aceitacao_contrato` tinyint(4) NOT NULL DEFAULT '0',
  `dat_ultimo_login` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_usuario`,`cod_equipe`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Table structure for `sis_usuario_configs`
-- ----------------------------
DROP TABLE IF EXISTS `sis_usuario_configs`;
CREATE TABLE `sis_usuario_configs` (
  `cod_sis_usuario_configs` int(11) NOT NULL AUTO_INCREMENT,
  `num_registro_pagina` int(11) DEFAULT '20',
  `num_casas_decimais` int(11) DEFAULT '2',
  `nom_moeda` varchar(3) COLLATE latin1_general_ci DEFAULT 'R$',
  `bol_formata_tempo` tinyint(4) DEFAULT '1',
  `bol_minutos` tinyint(4) DEFAULT '0',
  `cod_usuario` int(11) NOT NULL,
  `cod_equipe` int(11) NOT NULL,
  PRIMARY KEY (`cod_sis_usuario_configs`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Table structure for `tab_agenda_compromisso`
-- ----------------------------
DROP TABLE IF EXISTS `tab_agenda_compromisso`;
CREATE TABLE `tab_agenda_compromisso` (
  `cod_agenda_compromisso` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `nom_arq_agenda` varchar(225) COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_agenda_compromisso`),
  KEY `fk_tab_agenda_compromisso_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_agenda_compromisso_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_atividade_profissional`
-- ----------------------------
DROP TABLE IF EXISTS `tab_atividade_profissional`;
CREATE TABLE `tab_atividade_profissional` (
  `cod_atividade_profissional` int(11) NOT NULL AUTO_INCREMENT,
  `nom_empresa` varchar(125) COLLATE utf8_bin NOT NULL,
  `dat_inicio_profissional` date NOT NULL,
  `dat_fim_profissional` date NOT NULL,
  `dsc_profissional` double NOT NULL,
  `val_salario` decimal(10,0) DEFAULT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_atividade_profissional`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tab_atividade_profissional
-- ----------------------------

-- ----------------------------
-- Table structure for `tab_banner`
-- ----------------------------
DROP TABLE IF EXISTS `tab_banner`;
CREATE TABLE `tab_banner` (
  `cod_banner` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `cod_banner_tipo` int(11) NOT NULL,
  `nom_titulo_banner` varchar(125) COLLATE utf8_bin NOT NULL,
  `dsc_banner` text COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_inicio` timestamp NULL DEFAULT NULL,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  `dat_termino` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_banner`),
  KEY `fk_tab_banner_sis_usuario1_idx` (`cod_usuario`),
  KEY `fk_tab_banner_tab_banner_tipo1_idx` (`cod_banner_tipo`),
  CONSTRAINT `fk_tab_banner_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_banner_tab_banner_tipo1` FOREIGN KEY (`cod_banner_tipo`) REFERENCES `tab_banner_tipo` (`cod_banner_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_banner_imagem`
-- ----------------------------
DROP TABLE IF EXISTS `tab_banner_imagem`;
CREATE TABLE `tab_banner_imagem` (
  `cod_banner_imagem` int(11) NOT NULL AUTO_INCREMENT,
  `cod_banner` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `nom_banner_imagem` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_banner_imagem`),
  KEY `fk_tab_banner_imagem_tab_banner1_idx` (`cod_banner`),
  KEY `fk_tab_banner_imagem_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_banner_imagem_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_banner_imagem_tab_banner1` FOREIGN KEY (`cod_banner`) REFERENCES `tab_banner` (`cod_banner`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for `tab_banner_tipo`
-- ----------------------------
DROP TABLE IF EXISTS `tab_banner_tipo`;
CREATE TABLE `tab_banner_tipo` (
  `cod_banner_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `nom_tipo_banner` varchar(125) COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_banner_tipo`),
  KEY `fk_tab_banner_tipo_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_banner_tipo_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_cbhpm`
-- ----------------------------
DROP TABLE IF EXISTS `tab_cbhpm`;
CREATE TABLE `tab_cbhpm` (
  `cod_CBHPM` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `nom_arq_CBHPM` varchar(225) COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_CBHPM`),
  KEY `fk_tab_CBHPM_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_CBHPM_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_certificacao_especializacao`
-- ----------------------------
DROP TABLE IF EXISTS `tab_certificacao_especializacao`;
CREATE TABLE `tab_certificacao_especializacao` (
  `cod_certificacao_especializacao` int(11) NOT NULL AUTO_INCREMENT,
  `nom_certificacao` varchar(225) COLLATE utf8_bin NOT NULL,
  `dsc_certificacao` varchar(225) COLLATE utf8_bin NOT NULL,
  `dat_certificacao` date NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_certificacao_especializacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tab_certificacao_especializacao
-- ----------------------------

-- ----------------------------
-- Table structure for `tab_certificacao_has_profissional`
-- ----------------------------
DROP TABLE IF EXISTS `tab_certificacao_has_profissional`;
CREATE TABLE `tab_certificacao_has_profissional` (
  `cod_certificacao_has_profissional` int(11) NOT NULL AUTO_INCREMENT,
  `cod_trabalhe_conosco` int(11) NOT NULL,
  `cod_certificacao_especializacao` int(11) NOT NULL,
  PRIMARY KEY (`cod_certificacao_has_profissional`,`cod_trabalhe_conosco`,`cod_certificacao_especializacao`),
  KEY `fk_tab_certificacao_has_profissional_tab_trabalhe_conosco1_idx` (`cod_trabalhe_conosco`),
  KEY `fk_tab_certificacao_has_profissional_tab_certificacao_espec_idx` (`cod_certificacao_especializacao`),
  CONSTRAINT `fk_tab_certificacao_has_profissional_tab_certificacao_especia1` FOREIGN KEY (`cod_certificacao_especializacao`) REFERENCES `tab_certificacao_especializacao` (`cod_certificacao_especializacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_certificacao_has_profissional_tab_trabalhe_conosco1` FOREIGN KEY (`cod_trabalhe_conosco`) REFERENCES `tab_trabalhe_conosco` (`cod_trabalhe_conosco`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tab_certificacao_has_profissional
-- ----------------------------

-- ----------------------------
-- Table structure for `tab_cid`
-- ----------------------------
DROP TABLE IF EXISTS `tab_cid`;
CREATE TABLE `tab_cid` (
  `cod_CID` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `nom_arq_CID` varchar(225) COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_CID`),
  KEY `fk_tab_CID_sis_usuario2_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_CID_sis_usuario2` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_cliente`
-- ----------------------------
DROP TABLE IF EXISTS `tab_cliente`;
CREATE TABLE `tab_cliente` (
  `cod_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `cod_cliente_tipo` int(11) NOT NULL,
  `nom_cliente` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `num_cpf_cnpj` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_email` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `num_telefone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_celular` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_rg` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_rg_orgao` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_rg_data` date DEFAULT NULL,
  `nom_login_acesso` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom_senha_acesso` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_cartao` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_cancelamento` timestamp NULL DEFAULT NULL,
  `cod_tipo_pessoa` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_cliente`),
  KEY `fk_tab_cliente_sis_usuario1_idx` (`cod_usuario`),
  KEY `fk_tab_cliente_tab_cliente_tipo1_idx` (`cod_cliente_tipo`),
  KEY `fk_tab_cliente_tab_tipo_pessoa1_idx` (`cod_tipo_pessoa`),
  CONSTRAINT `fk_tab_cliente_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_cliente_tab_cliente_tipo1` FOREIGN KEY (`cod_cliente_tipo`) REFERENCES `tab_cliente_tipo` (`cod_cliente_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_cliente_tab_tipo_pessoa1` FOREIGN KEY (`cod_tipo_pessoa`) REFERENCES `tab_tipo_pessoa` (`cod_tipo_pessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for `tab_cliente_cardio`
-- ----------------------------
DROP TABLE IF EXISTS `tab_cliente_cardio`;
CREATE TABLE `tab_cliente_cardio` (
  `cod_cliente_cardio` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) DEFAULT NULL,
  `nom_endereco` varchar(225) COLLATE utf8_bin NOT NULL,
  `num_endereco` int(11) NOT NULL,
  `nom_complemento` varchar(125) COLLATE utf8_bin DEFAULT NULL,
  `nom_bairro` varchar(125) COLLATE utf8_bin NOT NULL,
  `nom_cidade` varchar(225) COLLATE utf8_bin NOT NULL,
  `nom_estado` varchar(225) COLLATE utf8_bin NOT NULL,
  `nom_email` varchar(125) COLLATE utf8_bin NOT NULL,
  `num_telefone` varchar(45) COLLATE utf8_bin NOT NULL,
  `num_celular` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_cliente_cardio`),
  KEY `fk_tab_cliente_cardio_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_cliente_cardio_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tab_cliente_cardio
-- ----------------------------

-- ----------------------------
-- Table structure for `tab_cliente_obs`
-- ----------------------------
DROP TABLE IF EXISTS `tab_cliente_obs`;
CREATE TABLE `tab_cliente_obs` (
  `cod_cliente_obs` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cliente` int(11) NOT NULL,
  `dsc_obs` text COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_cliente_obs`),
  KEY `fk_tab_cliente_obs_tab_cliente1_idx` (`cod_cliente`),
  CONSTRAINT `fk_tab_cliente_obs_tab_cliente1` FOREIGN KEY (`cod_cliente`) REFERENCES `tab_cliente` (`cod_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_cliente_tipo`
-- ----------------------------
DROP TABLE IF EXISTS `tab_cliente_tipo`;
CREATE TABLE `tab_cliente_tipo` (
  `cod_cliente_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cliente_tipo` varchar(125) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`cod_cliente_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_conhecimento_has_profissional`
-- ----------------------------
DROP TABLE IF EXISTS `tab_conhecimento_has_profissional`;
CREATE TABLE `tab_conhecimento_has_profissional` (
  `cod_conhecimento_has_profissional` int(11) NOT NULL AUTO_INCREMENT,
  `cod_conhecimento_tecnico` int(11) NOT NULL,
  `cod_trabalhe_conosco` int(11) NOT NULL,
  PRIMARY KEY (`cod_conhecimento_has_profissional`,`cod_conhecimento_tecnico`,`cod_trabalhe_conosco`),
  KEY `fk_tab_conhecimento_profissional_tab_conhecimento_tecnico1_idx` (`cod_conhecimento_tecnico`),
  KEY `fk_tab_conhecimento_profissional_tab_trabalhe_conosco1_idx` (`cod_trabalhe_conosco`),
  CONSTRAINT `fk_tab_conhecimento_profissional_tab_conhecimento_tecnico1` FOREIGN KEY (`cod_conhecimento_tecnico`) REFERENCES `tab_conhecimento_tecnico` (`cod_conhecimento_tecnico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_conhecimento_profissional_tab_trabalhe_conosco1` FOREIGN KEY (`cod_trabalhe_conosco`) REFERENCES `tab_trabalhe_conosco` (`cod_trabalhe_conosco`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_conhecimento_tecnico`
-- ----------------------------
DROP TABLE IF EXISTS `tab_conhecimento_tecnico`;
CREATE TABLE `tab_conhecimento_tecnico` (
  `cod_conhecimento_tecnico` int(11) NOT NULL AUTO_INCREMENT,
  `cod_formacao` int(11) NOT NULL,
  `nom_instituicao` varchar(225) COLLATE utf8_bin NOT NULL,
  `nom_curso` varchar(225) COLLATE utf8_bin NOT NULL,
  `flg_cursando` tinyint(4) NOT NULL DEFAULT '0',
  `dat_inicio` date NOT NULL,
  `dat_fim` date NOT NULL,
  PRIMARY KEY (`cod_conhecimento_tecnico`),
  KEY `fk_tab_conhecimento_tecnico_tab_formacao1_idx` (`cod_formacao`),
  CONSTRAINT `fk_tab_conhecimento_tecnico_tab_formacao1` FOREIGN KEY (`cod_formacao`) REFERENCES `tab_formacao` (`cod_formacao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_debito_automatico`
-- ----------------------------
DROP TABLE IF EXISTS `tab_debito_automatico`;
CREATE TABLE `tab_debito_automatico` (
  `cod_debito_automatico` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `nom_titular_conta` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `num_agencia_conta` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  `num_cartao_conta` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_cc_conta` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cod_debito_automatico`),
  KEY `fk_tab_debito_automatico_tab_cliente1_idx` (`cod_cliente`),
  KEY `fk_tab_debito_automatico_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_debito_automatico_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_debito_automatico_tab_cliente1` FOREIGN KEY (`cod_cliente`) REFERENCES `tab_cliente` (`cod_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for `tab_duvida`
-- ----------------------------
DROP TABLE IF EXISTS `tab_duvida`;
CREATE TABLE `tab_duvida` (
  `cod_duvida` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `nom_pergunta_duvida` text COLLATE utf8_bin NOT NULL,
  `nom_resposta_duvida` text COLLATE utf8_bin NOT NULL,
  `num_acesso` int(11) NOT NULL DEFAULT '0',
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_duvida`),
  KEY `fk_tab_duvida_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_duvida_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_enquete`
-- ----------------------------
DROP TABLE IF EXISTS `tab_enquete`;
CREATE TABLE `tab_enquete` (
  `cod_enquete` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `nom_titulo` varchar(225) COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_inicio` timestamp NULL DEFAULT NULL,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  `dat_termino` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_enquete`),
  KEY `fk_tab_enquete_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_enquete_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_enquete_alternativa`
-- ----------------------------
DROP TABLE IF EXISTS `tab_enquete_alternativa`;
CREATE TABLE `tab_enquete_alternativa` (
  `cod_enquete_alternativa` int(11) NOT NULL AUTO_INCREMENT,
  `cod_enquete` int(11) NOT NULL,
  `nom_enquete_alternativa` varchar(125) COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_enquete_alternativa`),
  KEY `fk_tab_enquete_alternativa_tab_enquete1_idx` (`cod_enquete`),
  CONSTRAINT `fk_tab_enquete_alternativa_tab_enquete1` FOREIGN KEY (`cod_enquete`) REFERENCES `tab_enquete` (`cod_enquete`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_enquete_permitido`
-- ----------------------------
DROP TABLE IF EXISTS `tab_enquete_permitido`;
CREATE TABLE `tab_enquete_permitido` (
  `cod_enquete_permitido` int(11) NOT NULL AUTO_INCREMENT,
  `cod_enquete` int(11) NOT NULL,
  `cod_perfil` int(11) NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_enquete_permitido`),
  KEY `fk_tab_enquete_permitido_tab_enquete1_idx` (`cod_enquete`),
  CONSTRAINT `fk_tab_enquete_permitido_tab_enquete1` FOREIGN KEY (`cod_enquete`) REFERENCES `tab_enquete` (`cod_enquete`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_enquete_votacao`
-- ----------------------------
DROP TABLE IF EXISTS `tab_enquete_votacao`;
CREATE TABLE `tab_enquete_votacao` (
  `cod_enquete_votacao` int(11) NOT NULL AUTO_INCREMENT,
  `cod_enquete_alternativa` int(11) NOT NULL,
  `cod_cliente` int(11) DEFAULT NULL,
  `cod_usuario` int(11) DEFAULT NULL,
  `num_votacao` int(11) NOT NULL DEFAULT '1',
  `num_ip` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`cod_enquete_votacao`),
  KEY `fk_tab_enquete_votacao_tab_enquete_alternativa1_idx` (`cod_enquete_alternativa`),
  KEY `fk_tab_enquete_votacao_sis_usuario1_idx` (`cod_usuario`),
  KEY `fk_tab_enquete_votacao_tab_cliente1_idx` (`cod_cliente`),
  CONSTRAINT `fk_tab_enquete_votacao_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_enquete_votacao_tab_cliente1` FOREIGN KEY (`cod_cliente`) REFERENCES `tab_cliente` (`cod_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_enquete_votacao_tab_enquete_alternativa1` FOREIGN KEY (`cod_enquete_alternativa`) REFERENCES `tab_enquete_alternativa` (`cod_enquete_alternativa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_evento`
-- ----------------------------
DROP TABLE IF EXISTS `tab_evento`;
CREATE TABLE `tab_evento` (
  `cod_evento` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `cod_evento_tipo` int(11) NOT NULL,
  `nom_evento` varchar(225) COLLATE utf8_bin NOT NULL,
  `dsc_evento` text COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_inicio` timestamp NULL DEFAULT NULL,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  `dat_termino` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_evento`),
  KEY `fk_tab_evento_sis_usuario1_idx` (`cod_usuario`),
  KEY `fk_tab_evento_tab_evento_tipo1_idx` (`cod_evento_tipo`),
  CONSTRAINT `fk_tab_evento_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_evento_tab_evento_tipo1` FOREIGN KEY (`cod_evento_tipo`) REFERENCES `tab_evento_tipo` (`cod_evento_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_evento_imagem`
-- ----------------------------
DROP TABLE IF EXISTS `tab_evento_imagem`;
CREATE TABLE `tab_evento_imagem` (
  `cod_evento_imagem` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `nom_evento_imagem` varchar(125) COLLATE utf8_bin NOT NULL,
  `dsc_evento_imagem` text COLLATE utf8_bin NOT NULL,
  `dat_evento` date NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_inicio` timestamp NULL DEFAULT NULL,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  `dat_termino` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_evento_imagem`),
  KEY `fk_tab_evento_imagem_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_evento_imagem_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_evento_imagem_permitido`
-- ----------------------------
DROP TABLE IF EXISTS `tab_evento_imagem_permitido`;
CREATE TABLE `tab_evento_imagem_permitido` (
  `cod_evento_imagem_permitido` int(11) NOT NULL AUTO_INCREMENT,
  `cod_evento_imagem` int(11) NOT NULL,
  `cod_perfil` int(11) NOT NULL,
  PRIMARY KEY (`cod_evento_imagem_permitido`),
  KEY `fk_tab_evento_imagem_permitido_tab_evento_imagem1_idx` (`cod_evento_imagem`),
  CONSTRAINT `fk_tab_evento_imagem_permitido_tab_evento_imagem1` FOREIGN KEY (`cod_evento_imagem`) REFERENCES `tab_evento_imagem` (`cod_evento_imagem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_evento_permitido`
-- ----------------------------
DROP TABLE IF EXISTS `tab_evento_permitido`;
CREATE TABLE `tab_evento_permitido` (
  `cod_evento_permitido` int(11) NOT NULL AUTO_INCREMENT,
  `cod_evento` int(11) NOT NULL,
  `cod_perfil` int(11) NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_evento_permitido`),
  KEY `fk_tab_evento_permitido_tab_evento1_idx` (`cod_evento`),
  CONSTRAINT `fk_tab_evento_permitido_tab_evento1` FOREIGN KEY (`cod_evento`) REFERENCES `tab_evento` (`cod_evento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_evento_tipo`
-- ----------------------------
DROP TABLE IF EXISTS `tab_evento_tipo`;
CREATE TABLE `tab_evento_tipo` (
  `cod_evento_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nom_evento_tipo` varchar(125) COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_evento_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_evento_upload`
-- ----------------------------
DROP TABLE IF EXISTS `tab_evento_upload`;
CREATE TABLE `tab_evento_upload` (
  `cod_evento_upload` int(11) NOT NULL AUTO_INCREMENT,
  `cod_evento_imagem` int(11) NOT NULL,
  `nom_caminho_imagem` varchar(125) COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_evento_upload`),
  KEY `fk_tab_evento_upload_tab_evento_imagem1_idx` (`cod_evento_imagem`),
  CONSTRAINT `fk_tab_evento_upload_tab_evento_imagem1` FOREIGN KEY (`cod_evento_imagem`) REFERENCES `tab_evento_imagem` (`cod_evento_imagem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_extra_curricular`
-- ----------------------------
DROP TABLE IF EXISTS `tab_extra_curricular`;
CREATE TABLE `tab_extra_curricular` (
  `cod_extra_curricular` int(11) NOT NULL AUTO_INCREMENT,
  `nom_trabalho_extra` varchar(225) COLLATE utf8_bin NOT NULL,
  `dsc_trabalho_extra` varchar(225) COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_extra_curricular`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tab_extra_curricular
-- ----------------------------

-- ----------------------------
-- Table structure for `tab_extra_curricular_has_profissional`
-- ----------------------------
DROP TABLE IF EXISTS `tab_extra_curricular_has_profissional`;
CREATE TABLE `tab_extra_curricular_has_profissional` (
  `cod_extra_curricular_has_profissional` int(11) NOT NULL AUTO_INCREMENT,
  `cod_extra_curricular` int(11) NOT NULL,
  `cod_trabalhe_conosco` int(11) NOT NULL,
  PRIMARY KEY (`cod_extra_curricular_has_profissional`,`cod_extra_curricular`,`cod_trabalhe_conosco`),
  KEY `fk_tab_extra_curricular_has_profissional_tab_extra_curricul_idx` (`cod_extra_curricular`),
  KEY `fk_tab_extra_curricular_has_profissional_tab_trabalhe_conos_idx` (`cod_trabalhe_conosco`),
  CONSTRAINT `fk_tab_extra_curricular_has_profissional_tab_extra_curricular1` FOREIGN KEY (`cod_extra_curricular`) REFERENCES `tab_extra_curricular` (`cod_extra_curricular`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_extra_curricular_has_profissional_tab_trabalhe_conosco1` FOREIGN KEY (`cod_trabalhe_conosco`) REFERENCES `tab_trabalhe_conosco` (`cod_trabalhe_conosco`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_formacao`
-- ----------------------------
DROP TABLE IF EXISTS `tab_formacao`;
CREATE TABLE `tab_formacao` (
  `cod_formacao` int(11) NOT NULL AUTO_INCREMENT,
  `nom_formacao` varchar(225) COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_formacao`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_forum`
-- ----------------------------
DROP TABLE IF EXISTS `tab_forum`;
CREATE TABLE `tab_forum` (
  `cod_forum` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) DEFAULT NULL,
  `cod_cliente` int(11) DEFAULT NULL,
  `nom_titulo_forum` varchar(225) COLLATE utf8_bin NOT NULL,
  `dsc_forum` text COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_forum`),
  KEY `fk_tab_forum_sis_usuario1_idx` (`cod_usuario`),
  KEY `fk_tab_forum_tab_cliente1_idx` (`cod_cliente`),
  CONSTRAINT `fk_tab_forum_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_forum_tab_cliente1` FOREIGN KEY (`cod_cliente`) REFERENCES `tab_cliente` (`cod_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_forum_comentario`
-- ----------------------------
DROP TABLE IF EXISTS `tab_forum_comentario`;
CREATE TABLE `tab_forum_comentario` (
  `idtab_forum_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `cod_forum` int(11) NOT NULL,
  `cod_usuario` int(11) DEFAULT NULL,
  `cod_cliente` int(11) DEFAULT NULL,
  `dsc_forum_comentario` text COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idtab_forum_comentario`),
  KEY `fk_tab_forum_comentario_tab_forum1_idx` (`cod_forum`),
  KEY `fk_tab_forum_comentario_sis_usuario1_idx` (`cod_usuario`),
  KEY `fk_tab_forum_comentario_tab_cliente1_idx` (`cod_cliente`),
  CONSTRAINT `fk_tab_forum_comentario_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_forum_comentario_tab_cliente1` FOREIGN KEY (`cod_cliente`) REFERENCES `tab_cliente` (`cod_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_forum_comentario_tab_forum1` FOREIGN KEY (`cod_forum`) REFERENCES `tab_forum` (`cod_forum`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_hilum`
-- ----------------------------
DROP TABLE IF EXISTS `tab_hilum`;
CREATE TABLE `tab_hilum` (
  `cod_HILUM` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `nom_arq_HILUM` varchar(225) COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_HILUM`),
  KEY `fk_tab_HILUM_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_HILUM_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_indicacao_artigo`
-- ----------------------------
DROP TABLE IF EXISTS `tab_indicacao_artigo`;
CREATE TABLE `tab_indicacao_artigo` (
  `cod_indicacao_artigo` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `nom_arq_indicacao` varchar(225) NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_indicacao_artigo`),
  KEY `fk_tab_indicacao_artigo_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_indicacao_artigo_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `tab_jornal`
-- ----------------------------
DROP TABLE IF EXISTS `tab_jornal`;
CREATE TABLE `tab_jornal` (
  `cod_jornal` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `nom_jornal` varchar(225) COLLATE utf8_bin NOT NULL,
  `dsc_jornal` text COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_inicio` timestamp NULL DEFAULT NULL,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  `dat_termino` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_jornal`),
  KEY `fk_tab_jornal_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_jornal_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_jornal_imagem`
-- ----------------------------
DROP TABLE IF EXISTS `tab_jornal_imagem`;
CREATE TABLE `tab_jornal_imagem` (
  `cod_jornal_imagem` int(11) NOT NULL AUTO_INCREMENT,
  `cod_jornal` int(11) NOT NULL,
  `nom_caminho_jornal_img` varchar(225) COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_jornal_imagem`),
  KEY `fk_tab_jornal_imagem_tab_jornal1_idx` (`cod_jornal`),
  CONSTRAINT `fk_tab_jornal_imagem_tab_jornal1` FOREIGN KEY (`cod_jornal`) REFERENCES `tab_jornal` (`cod_jornal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_jornal_permitido`
-- ----------------------------
DROP TABLE IF EXISTS `tab_jornal_permitido`;
CREATE TABLE `tab_jornal_permitido` (
  `cod_jornal_permitido` int(11) NOT NULL AUTO_INCREMENT,
  `cod_jornal` int(11) NOT NULL,
  `cod_perfil` int(11) NOT NULL,
  PRIMARY KEY (`cod_jornal_permitido`),
  KEY `fk_tab_jornal_permitido_tab_jornal1_idx` (`cod_jornal`),
  CONSTRAINT `fk_tab_jornal_permitido_tab_jornal1` FOREIGN KEY (`cod_jornal`) REFERENCES `tab_jornal` (`cod_jornal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_manual_cooperado`
-- ----------------------------
DROP TABLE IF EXISTS `tab_manual_cooperado`;
CREATE TABLE `tab_manual_cooperado` (
  `cod_manual_cooperado` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `nom_arq_manual_cooperado` varchar(225) COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_manual_cooperado`),
  KEY `fk_tab_manual_cooperado_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_manual_cooperado_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_noticia`
-- ----------------------------
DROP TABLE IF EXISTS `tab_noticia`;
CREATE TABLE `tab_noticia` (
  `cod_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `nom_titulo` varchar(225) COLLATE utf8_bin NOT NULL,
  `dsc_noticia` text COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_inicio` timestamp NULL DEFAULT NULL,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  `dat_termino` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_noticia`),
  KEY `fk_tab_noticia_sis_usuario_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_noticia_sis_usuario` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


-- ----------------------------
-- Table structure for `tab_noticia_imagem`
-- ----------------------------
DROP TABLE IF EXISTS `tab_noticia_imagem`;
CREATE TABLE `tab_noticia_imagem` (
  `cod_noticia_imagem` int(11) NOT NULL AUTO_INCREMENT,
  `cod_noticia` int(11) NOT NULL,
  `nom_caminho_img` varchar(225) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `nom_caminho_img_peq` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_noticia_imagem`),
  KEY `fk_tab_noticia_imagem_tab_noticia_idx` (`cod_noticia`),
  CONSTRAINT `fk_tab_noticia_imagem_tab_noticia` FOREIGN KEY (`cod_noticia`) REFERENCES `tab_noticia` (`cod_noticia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_producao_medica`
-- ----------------------------
DROP TABLE IF EXISTS `tab_producao_medica`;
CREATE TABLE `tab_producao_medica` (
  `cod_producao_medica` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `nom_producao_medica` varchar(225) COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_producao_medica`),
  KEY `fk_tab_producao_medica_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_producao_medica_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_redes_sociais`
-- ----------------------------
DROP TABLE IF EXISTS `tab_redes_sociais`;
CREATE TABLE `tab_redes_sociais` (
  `cod_redes_sociais` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `nom_link_facebook` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  `nom_link_twitter` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  `nom_link_gmais` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_redes_sociais`),
  KEY `fk_tab_redes_sociais_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_redes_sociais_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_sac`
-- ----------------------------
DROP TABLE IF EXISTS `tab_sac`;
CREATE TABLE `tab_sac` (
  `cod_sac` int(11) NOT NULL AUTO_INCREMENT,
  `cod_protocolo` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `num_atendimento` int(11) NOT NULL DEFAULT '1',
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_sac`,`cod_protocolo`),
  KEY `fk_tab_sac_tab_cliente1_idx` (`cod_cliente`),
  CONSTRAINT `fk_tab_sac_tab_cliente1` FOREIGN KEY (`cod_cliente`) REFERENCES `tab_cliente` (`cod_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for `tab_sac_atendimentos`
-- ----------------------------
DROP TABLE IF EXISTS `tab_sac_atendimentos`;
CREATE TABLE `tab_sac_atendimentos` (
  `cod_sac_atendimentos` int(11) NOT NULL AUTO_INCREMENT,
  `cod_sac` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `nom_assunto` varchar(125) COLLATE utf8_bin NOT NULL,
  `dsc_observacao` text COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_sac_atendimentos`),
  KEY `fk_tab_sac_atendimentos_tab_sac1_idx` (`cod_sac`),
  KEY `fk_tab_sac_atendimentos_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_sac_atendimentos_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_sac_atendimentos_tab_sac1` FOREIGN KEY (`cod_sac`) REFERENCES `tab_sac` (`cod_sac`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_sac_site`
-- ----------------------------
DROP TABLE IF EXISTS `tab_sac_site`;
CREATE TABLE `tab_sac_site` (
  `cod_sac_site` int(11) NOT NULL AUTO_INCREMENT,
  `nom_visitante` varchar(125) COLLATE utf8_bin NOT NULL,
  `email_visitante` varchar(125) COLLATE utf8_bin NOT NULL,
  `nom_assunto_visitante` varchar(125) COLLATE utf8_bin NOT NULL,
  `dsc_assunto_visitante` text COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_sac_site`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_sinistrometro`
-- ----------------------------
DROP TABLE IF EXISTS `tab_sinistrometro`;
CREATE TABLE `tab_sinistrometro` (
  `cod_sinistrometro` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `val_sinistrometro` varchar(45) COLLATE utf8_bin NOT NULL,
  `dat_sinistrometro` date NOT NULL,
  `dat_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_sinistrometro`),
  KEY `fk_tab_sinistrometro_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_sinistrometro_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_solicita_boleto`
-- ----------------------------
DROP TABLE IF EXISTS `tab_solicita_boleto`;
CREATE TABLE `tab_solicita_boleto` (
  `cod_solicita_boleto` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cliente` int(11) NOT NULL,
  `nom_caminho_link` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_vencimento` date DEFAULT NULL,
  `dat_solicitacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_solicita_boleto`),
  KEY `fk_tab_solicita_boleto_tab_cliente1_idx` (`cod_cliente`),
  CONSTRAINT `fk_tab_solicita_boleto_tab_cliente1` FOREIGN KEY (`cod_cliente`) REFERENCES `tab_cliente` (`cod_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for `tab_solicita_cartao`
-- ----------------------------
DROP TABLE IF EXISTS `tab_solicita_cartao`;
CREATE TABLE `tab_solicita_cartao` (
  `cod_solicita_cartao` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `nom_solicita_cartao` varchar(225) COLLATE utf8_bin NOT NULL,
  `dat_nascimento_cartao` date NOT NULL,
  `num_cpf_cartao` varchar(45) COLLATE utf8_bin NOT NULL,
  `nom_titular_cartao` varchar(225) COLLATE utf8_bin NOT NULL,
  `num_titular_cartao` varchar(125) COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finaliza` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_solicita_cartao`),
  KEY `fk_tab_solicita_cartao_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_solicita_cartao_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_tipo_pessoa`
-- ----------------------------
DROP TABLE IF EXISTS `tab_tipo_pessoa`;
CREATE TABLE `tab_tipo_pessoa` (
  `cod_tipo_pessoa` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tipo_pessoa` varchar(45) NOT NULL,
  PRIMARY KEY (`cod_tipo_pessoa`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `tab_tiss`
-- ----------------------------
DROP TABLE IF EXISTS `tab_tiss`;
CREATE TABLE `tab_tiss` (
  `cod_TISS` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `nom_arq_TISS` varchar(225) COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_TISS`),
  KEY `fk_tab_TISS_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_TISS_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_tnumm`
-- ----------------------------
DROP TABLE IF EXISTS `tab_tnumm`;
CREATE TABLE `tab_tnumm` (
  `cod_TNUMM` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `nom_arq_TNUMM` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_TNUMM`),
  KEY `fk_tab_TNUMM_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_TNUMM_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for `tab_trabalhe_conosco`
-- ----------------------------
DROP TABLE IF EXISTS `tab_trabalhe_conosco`;
CREATE TABLE `tab_trabalhe_conosco` (
  `cod_trabalhe_conosco` int(11) NOT NULL AUTO_INCREMENT,
  `nom_profissional` varchar(125) COLLATE utf8_bin NOT NULL,
  `email_profissional` varchar(125) COLLATE utf8_bin NOT NULL,
  `num_cpf_profissional` varchar(45) COLLATE utf8_bin NOT NULL,
  `dat_nascimento` date NOT NULL,
  `num_tel_fixo` varchar(45) COLLATE utf8_bin NOT NULL,
  `num_tel_cel` varchar(45) COLLATE utf8_bin NOT NULL,
  `dsc_obj_profissional` double NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_trabalhe_conosco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_trabalhe_has_atividade`
-- ----------------------------
DROP TABLE IF EXISTS `tab_trabalhe_has_atividade`;
CREATE TABLE `tab_trabalhe_has_atividade` (
  `cod_trabalhe_has_atividade` int(11) NOT NULL AUTO_INCREMENT,
  `cod_trabalhe_conosco` int(11) NOT NULL,
  `cod_atividade_profissional` int(11) NOT NULL,
  PRIMARY KEY (`cod_trabalhe_has_atividade`,`cod_trabalhe_conosco`,`cod_atividade_profissional`),
  KEY `fk_tab_trabalhe_atividade_tab_trabalhe_conosco1_idx` (`cod_trabalhe_conosco`),
  KEY `fk_tab_trabalhe_atividade_tab_atividade_profissional1_idx` (`cod_atividade_profissional`),
  CONSTRAINT `fk_tab_trabalhe_atividade_tab_atividade_profissional1` FOREIGN KEY (`cod_atividade_profissional`) REFERENCES `tab_atividade_profissional` (`cod_atividade_profissional`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_trabalhe_atividade_tab_trabalhe_conosco1` FOREIGN KEY (`cod_trabalhe_conosco`) REFERENCES `tab_trabalhe_conosco` (`cod_trabalhe_conosco`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_tuss`
-- ----------------------------
DROP TABLE IF EXISTS `tab_tuss`;
CREATE TABLE `tab_tuss` (
  `cod_TUSS` int(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(11) NOT NULL,
  `nom_arq_TUSS` varchar(225) COLLATE utf8_bin NOT NULL,
  `dat_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_finalizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cod_TUSS`),
  KEY `fk_tab_TUSS_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_TUSS_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tab_usuario_site`
-- ----------------------------
DROP TABLE IF EXISTS `tab_usuario_site`;
CREATE TABLE `tab_usuario_site` (
  `cod_usuario_site` int(11) NOT NULL AUTO_INCREMENT,
  `cod_menu` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  PRIMARY KEY (`cod_usuario_site`),
  KEY `fk_tab_usuario_site_sis_menu1_idx` (`cod_menu`),
  KEY `fk_tab_usuario_site_sis_usuario1_idx` (`cod_usuario`),
  CONSTRAINT `fk_tab_usuario_site_sis_menu1` FOREIGN KEY (`cod_menu`) REFERENCES `sis_menu` (`cod_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_usuario_site_sis_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `sis_usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for `tracking`
-- ----------------------------
DROP TABLE IF EXISTS `tracking`;
CREATE TABLE `tracking` (
  `cod_tracking` int(11) NOT NULL AUTO_INCREMENT,
  `dat_tracking` timestamp NULL DEFAULT NULL,
  `nom_acao` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `nom_tabela` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `nom_modulo` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `nom_descricao` varchar(120) COLLATE latin1_general_ci DEFAULT NULL,
  `cod_usuario` int(11) NOT NULL,
  PRIMARY KEY (`cod_tracking`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;