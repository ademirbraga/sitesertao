INSERT INTO `sis_equipe` (`cod_equipe`, `nom_equipe`, `bol_ambiente`, `dat_cadastro`, `dat_cancelamento`, `cod_equipe_superior`, `bol_ambiente_produto`, `bol_ambiente_pagamentos`, `bol_ambiente_conta`) VALUES (1, 'Administrador', 2.0, now(), NULL, NULL, 0.0, 0.0, 0.0);

INSERT INTO `sis_equipe_config` (`cod_sis_equipe_config`, `nom_logo`, `cod_equipe`, `nom_empresa`, `num_cnpj`) VALUES (1, 'logo_cliente.png', 1, "F3TEC", "1234567890");

INSERT INTO `sis_departamento` (`cod_sis_departamento`, `nom_departamento`, `cod_equipe`) VALUES (1, 'Principal', 1);

INSERT INTO `sis_perfil` (`cod_perfil`, `nom_perfil`, `cod_equipe`, `dsc_perfil`, `dat_criacao`, `dat_cancelamento`) VALUES (1, 'Administrador', 1, 'Todos Modulos', now(), NULL);

INSERT INTO `sis_acoes` (`cod_acao`, `nom_acao`) VALUES
(1, 'visualizar'),
(2, 'listar'),
(4, 'inserir'),
(8, 'editar'),
(16, 'excluir'),
(32, 'cancelar'),
(64, 'importar'),
(128, 'exportar');

INSERT INTO `sis_usuario` (`cod_usuario`, `cod_equipe`, `nom_usuario`, `nom_login`, `nom_senha`, `nom_email`, `dat_cadastro`, `dat_termino`, `cod_perfil`, `cod_sis_departamento`) VALUES 
  (1, 1, 'admin', 'admin', 'b1ef56a986b84e03847fb219871c8ea3', 'contato@webtupi.com.br', '2011-11-18 12:24:28', NULL, 1, 1);


insert into sis_permissoes values (1,'TABAUDITCLASSIFICACAO');
insert into sis_perfil_permissoes values (255,1,1);
insert into sis_permissoes_has_sis_acoes values (1,1);
insert into sis_permissoes_has_sis_acoes values (1,2);
insert into sis_permissoes_has_sis_acoes values (1,4);
insert into sis_permissoes_has_sis_acoes values (1,8);
insert into sis_permissoes_has_sis_acoes values (1,16);
insert into sis_permissoes_has_sis_acoes values (1,32);
insert into sis_permissoes_has_sis_acoes values (1,64);
insert into sis_permissoes_has_sis_acoes values (1,128);
insert into sis_permissoes values (2,'TABCLASSIFPESSOA');

insert into sis_perfil_permissoes values (255,1,2);
insert into sis_permissoes_has_sis_acoes values (2,1);
insert into sis_permissoes_has_sis_acoes values (2,2);
insert into sis_permissoes_has_sis_acoes values (2,4);
insert into sis_permissoes_has_sis_acoes values (2,8);
insert into sis_permissoes_has_sis_acoes values (2,16);
insert into sis_permissoes_has_sis_acoes values (2,32);
insert into sis_permissoes_has_sis_acoes values (2,64);
insert into sis_permissoes_has_sis_acoes values (2,128);
insert into sis_permissoes values (3,'TABCUPOM');
insert into sis_perfil_permissoes values (255,1,3);
insert into sis_permissoes_has_sis_acoes values (3,1);
insert into sis_permissoes_has_sis_acoes values (3,2);
insert into sis_permissoes_has_sis_acoes values (3,4);
insert into sis_permissoes_has_sis_acoes values (3,8);
insert into sis_permissoes_has_sis_acoes values (3,16);
insert into sis_permissoes_has_sis_acoes values (3,32);
insert into sis_permissoes_has_sis_acoes values (3,64);
insert into sis_permissoes_has_sis_acoes values (3,128);
insert into sis_permissoes values (4,'TABCUPOMXPESSOA');
insert into sis_perfil_permissoes values (255,1,4);
insert into sis_permissoes_has_sis_acoes values (4,1);
insert into sis_permissoes_has_sis_acoes values (4,2);
insert into sis_permissoes_has_sis_acoes values (4,4);
insert into sis_permissoes_has_sis_acoes values (4,8);
insert into sis_permissoes_has_sis_acoes values (4,16);
insert into sis_permissoes_has_sis_acoes values (4,32);
insert into sis_permissoes_has_sis_acoes values (4,64);
insert into sis_permissoes_has_sis_acoes values (4,128);
insert into sis_permissoes values (5,'TABCUPOMXTIPOSERVICO');
insert into sis_perfil_permissoes values (255,1,5);
insert into sis_permissoes_has_sis_acoes values (5,1);
insert into sis_permissoes_has_sis_acoes values (5,2);
insert into sis_permissoes_has_sis_acoes values (5,4);
insert into sis_permissoes_has_sis_acoes values (5,8);
insert into sis_permissoes_has_sis_acoes values (5,16);
insert into sis_permissoes_has_sis_acoes values (5,32);
insert into sis_permissoes_has_sis_acoes values (5,64);
insert into sis_permissoes_has_sis_acoes values (5,128);
insert into sis_permissoes values (6,'TABEMAIL');
insert into sis_perfil_permissoes values (255,1,6);
insert into sis_permissoes_has_sis_acoes values (6,1);
insert into sis_permissoes_has_sis_acoes values (6,2);
insert into sis_permissoes_has_sis_acoes values (6,4);
insert into sis_permissoes_has_sis_acoes values (6,8);
insert into sis_permissoes_has_sis_acoes values (6,16);
insert into sis_permissoes_has_sis_acoes values (6,32);
insert into sis_permissoes_has_sis_acoes values (6,64);
insert into sis_permissoes_has_sis_acoes values (6,128);
insert into sis_permissoes values (7,'TABEMAILPESSOA');
insert into sis_perfil_permissoes values (255,1,7);
insert into sis_permissoes_has_sis_acoes values (7,1);
insert into sis_permissoes_has_sis_acoes values (7,2);
insert into sis_permissoes_has_sis_acoes values (7,4);
insert into sis_permissoes_has_sis_acoes values (7,8);
insert into sis_permissoes_has_sis_acoes values (7,16);
insert into sis_permissoes_has_sis_acoes values (7,32);
insert into sis_permissoes_has_sis_acoes values (7,64);
insert into sis_permissoes_has_sis_acoes values (7,128);
insert into sis_permissoes values (8,'TABENVIOEMAIL');
insert into sis_perfil_permissoes values (255,1,8);
insert into sis_permissoes_has_sis_acoes values (8,1);
insert into sis_permissoes_has_sis_acoes values (8,2);
insert into sis_permissoes_has_sis_acoes values (8,4);
insert into sis_permissoes_has_sis_acoes values (8,8);
insert into sis_permissoes_has_sis_acoes values (8,16);
insert into sis_permissoes_has_sis_acoes values (8,32);
insert into sis_permissoes_has_sis_acoes values (8,64);
insert into sis_permissoes_has_sis_acoes values (8,128);
insert into sis_permissoes values (9,'TABENVIOSMS');
insert into sis_perfil_permissoes values (255,1,9);
insert into sis_permissoes_has_sis_acoes values (9,1);
insert into sis_permissoes_has_sis_acoes values (9,2);
insert into sis_permissoes_has_sis_acoes values (9,4);
insert into sis_permissoes_has_sis_acoes values (9,8);
insert into sis_permissoes_has_sis_acoes values (9,16);
insert into sis_permissoes_has_sis_acoes values (9,32);
insert into sis_permissoes_has_sis_acoes values (9,64);
insert into sis_permissoes_has_sis_acoes values (9,128);
insert into sis_permissoes values (10,'TABPESSOA');
insert into sis_perfil_permissoes values (255,1,10);
insert into sis_permissoes_has_sis_acoes values (10,1);
insert into sis_permissoes_has_sis_acoes values (10,2);
insert into sis_permissoes_has_sis_acoes values (10,4);
insert into sis_permissoes_has_sis_acoes values (10,8);
insert into sis_permissoes_has_sis_acoes values (10,16);
insert into sis_permissoes_has_sis_acoes values (10,32);
insert into sis_permissoes_has_sis_acoes values (10,64);
insert into sis_permissoes_has_sis_acoes values (10,128);
insert into sis_permissoes values (11,'TABPLANOCONTAS');
insert into sis_perfil_permissoes values (255,1,11);
insert into sis_permissoes_has_sis_acoes values (11,1);
insert into sis_permissoes_has_sis_acoes values (11,2);
insert into sis_permissoes_has_sis_acoes values (11,4);
insert into sis_permissoes_has_sis_acoes values (11,8);
insert into sis_permissoes_has_sis_acoes values (11,16);
insert into sis_permissoes_has_sis_acoes values (11,32);
insert into sis_permissoes_has_sis_acoes values (11,64);
insert into sis_permissoes_has_sis_acoes values (11,128);
insert into sis_permissoes values (12,'TABPLANOPROPRIEDADES');
insert into sis_perfil_permissoes values (255,1,12);
insert into sis_permissoes_has_sis_acoes values (12,1);
insert into sis_permissoes_has_sis_acoes values (12,2);
insert into sis_permissoes_has_sis_acoes values (12,4);
insert into sis_permissoes_has_sis_acoes values (12,8);
insert into sis_permissoes_has_sis_acoes values (12,16);
insert into sis_permissoes_has_sis_acoes values (12,32);
insert into sis_permissoes_has_sis_acoes values (12,64);
insert into sis_permissoes_has_sis_acoes values (12,128);
insert into sis_permissoes values (13,'TABPROPRCLASSIFPESSOA');
insert into sis_perfil_permissoes values (255,1,13);
insert into sis_permissoes_has_sis_acoes values (13,1);
insert into sis_permissoes_has_sis_acoes values (13,2);
insert into sis_permissoes_has_sis_acoes values (13,4);
insert into sis_permissoes_has_sis_acoes values (13,8);
insert into sis_permissoes_has_sis_acoes values (13,16);
insert into sis_permissoes_has_sis_acoes values (13,32);
insert into sis_permissoes_has_sis_acoes values (13,64);
insert into sis_permissoes_has_sis_acoes values (13,128);
insert into sis_permissoes values (14,'TABSMS');
insert into sis_perfil_permissoes values (255,1,14);
insert into sis_permissoes_has_sis_acoes values (14,1);
insert into sis_permissoes_has_sis_acoes values (14,2);
insert into sis_permissoes_has_sis_acoes values (14,4);
insert into sis_permissoes_has_sis_acoes values (14,8);
insert into sis_permissoes_has_sis_acoes values (14,16);
insert into sis_permissoes_has_sis_acoes values (14,32);
insert into sis_permissoes_has_sis_acoes values (14,64);
insert into sis_permissoes_has_sis_acoes values (14,128);
insert into sis_permissoes values (15,'TABSTATUSCUPOM');
insert into sis_perfil_permissoes values (255,1,15);
insert into sis_permissoes_has_sis_acoes values (15,1);
insert into sis_permissoes_has_sis_acoes values (15,2);
insert into sis_permissoes_has_sis_acoes values (15,4);
insert into sis_permissoes_has_sis_acoes values (15,8);
insert into sis_permissoes_has_sis_acoes values (15,16);
insert into sis_permissoes_has_sis_acoes values (15,32);
insert into sis_permissoes_has_sis_acoes values (15,64);
insert into sis_permissoes_has_sis_acoes values (15,128);
insert into sis_permissoes values (16,'TABTELEFONELOJA');
insert into sis_perfil_permissoes values (255,1,16);
insert into sis_permissoes_has_sis_acoes values (16,1);
insert into sis_permissoes_has_sis_acoes values (16,2);
insert into sis_permissoes_has_sis_acoes values (16,4);
insert into sis_permissoes_has_sis_acoes values (16,8);
insert into sis_permissoes_has_sis_acoes values (16,16);
insert into sis_permissoes_has_sis_acoes values (16,32);
insert into sis_permissoes_has_sis_acoes values (16,64);
insert into sis_permissoes_has_sis_acoes values (16,128);
insert into sis_permissoes values (17,'TABTIPOSERVICO');
insert into sis_perfil_permissoes values (255,1,17);
insert into sis_permissoes_has_sis_acoes values (17,1);
insert into sis_permissoes_has_sis_acoes values (17,2);
insert into sis_permissoes_has_sis_acoes values (17,4);
insert into sis_permissoes_has_sis_acoes values (17,8);
insert into sis_permissoes_has_sis_acoes values (17,16);
insert into sis_permissoes_has_sis_acoes values (17,32);
insert into sis_permissoes_has_sis_acoes values (17,64);
insert into sis_permissoes_has_sis_acoes values (17,128);
insert into sis_permissoes values (18,'TABTIPOTELEFONE');
insert into sis_perfil_permissoes values (255,1,18);
insert into sis_permissoes_has_sis_acoes values (18,1);
insert into sis_permissoes_has_sis_acoes values (18,2);
insert into sis_permissoes_has_sis_acoes values (18,4);
insert into sis_permissoes_has_sis_acoes values (18,8);
insert into sis_permissoes_has_sis_acoes values (18,16);
insert into sis_permissoes_has_sis_acoes values (18,32);
insert into sis_permissoes_has_sis_acoes values (18,64);
insert into sis_permissoes_has_sis_acoes values (18,128);
insert into sis_permissoes values (19,'TABTRANSACAO');
insert into sis_perfil_permissoes values (255,1,19);
insert into sis_permissoes_has_sis_acoes values (19,1);
insert into sis_permissoes_has_sis_acoes values (19,2);
insert into sis_permissoes_has_sis_acoes values (19,4);
insert into sis_permissoes_has_sis_acoes values (19,8);
insert into sis_permissoes_has_sis_acoes values (19,16);
insert into sis_permissoes_has_sis_acoes values (19,32);
insert into sis_permissoes_has_sis_acoes values (19,64);
insert into sis_permissoes_has_sis_acoes values (19,128);


insert into sis_permissoes values (20,'SISACOES');
insert into sis_perfil_permissoes values (255,1,20);
insert into sis_permissoes_has_sis_acoes values (20,1);
insert into sis_permissoes_has_sis_acoes values (20,2);
insert into sis_permissoes_has_sis_acoes values (20,4);
insert into sis_permissoes_has_sis_acoes values (20,8);
insert into sis_permissoes_has_sis_acoes values (20,16);
insert into sis_permissoes_has_sis_acoes values (20,32);
insert into sis_permissoes_has_sis_acoes values (20,64);
insert into sis_permissoes_has_sis_acoes values (20,128);
insert into sis_permissoes values (21,'SISEQUIPE');
insert into sis_perfil_permissoes values (255,1,21);
insert into sis_permissoes_has_sis_acoes values (21,1);
insert into sis_permissoes_has_sis_acoes values (21,2);
insert into sis_permissoes_has_sis_acoes values (21,4);
insert into sis_permissoes_has_sis_acoes values (21,8);
insert into sis_permissoes_has_sis_acoes values (21,16);
insert into sis_permissoes_has_sis_acoes values (21,32);
insert into sis_permissoes_has_sis_acoes values (21,64);
insert into sis_permissoes_has_sis_acoes values (21,128);

insert into sis_permissoes values (22,'SISEQUIPECONFIGURACOES');
insert into sis_perfil_permissoes values (255,1,22);
insert into sis_permissoes_has_sis_acoes values (22,1);
insert into sis_permissoes_has_sis_acoes values (22,2);
insert into sis_permissoes_has_sis_acoes values (22,4);
insert into sis_permissoes_has_sis_acoes values (22,8);
insert into sis_permissoes_has_sis_acoes values (22,16);
insert into sis_permissoes_has_sis_acoes values (22,32);
insert into sis_permissoes_has_sis_acoes values (22,64);
insert into sis_permissoes_has_sis_acoes values (22,128);
insert into sis_permissoes values (23,'SISPERFIL');
insert into sis_perfil_permissoes values (255,1,23);
insert into sis_permissoes_has_sis_acoes values (23,1);
insert into sis_permissoes_has_sis_acoes values (23,2);
insert into sis_permissoes_has_sis_acoes values (23,4);
insert into sis_permissoes_has_sis_acoes values (23,8);
insert into sis_permissoes_has_sis_acoes values (23,16);
insert into sis_permissoes_has_sis_acoes values (23,32);
insert into sis_permissoes_has_sis_acoes values (23,64);
insert into sis_permissoes_has_sis_acoes values (23,128);
insert into sis_permissoes values (24,'SISPERMISSOES');
insert into sis_perfil_permissoes values (255,1,24);
insert into sis_permissoes_has_sis_acoes values (24,1);
insert into sis_permissoes_has_sis_acoes values (24,2);
insert into sis_permissoes_has_sis_acoes values (24,4);
insert into sis_permissoes_has_sis_acoes values (24,8);
insert into sis_permissoes_has_sis_acoes values (24,16);
insert into sis_permissoes_has_sis_acoes values (24,32);
insert into sis_permissoes_has_sis_acoes values (24,64);
insert into sis_permissoes_has_sis_acoes values (24,128);
insert into sis_permissoes values (25,'SISPERMISSOESHASSISACOES');
insert into sis_perfil_permissoes values (255,1,25);
insert into sis_permissoes_has_sis_acoes values (25,1);
insert into sis_permissoes_has_sis_acoes values (25,2);
insert into sis_permissoes_has_sis_acoes values (25,4);
insert into sis_permissoes_has_sis_acoes values (25,8);
insert into sis_permissoes_has_sis_acoes values (25,16);
insert into sis_permissoes_has_sis_acoes values (25,32);
insert into sis_permissoes_has_sis_acoes values (25,64);
insert into sis_permissoes_has_sis_acoes values (25,128);
insert into sis_permissoes values (26,'SISUSUARIO');
insert into sis_perfil_permissoes values (255,1,26);
insert into sis_permissoes_has_sis_acoes values (26,1);
insert into sis_permissoes_has_sis_acoes values (26,2);
insert into sis_permissoes_has_sis_acoes values (26,4);
insert into sis_permissoes_has_sis_acoes values (26,8);
insert into sis_permissoes_has_sis_acoes values (26,16);
insert into sis_permissoes_has_sis_acoes values (26,32);
insert into sis_permissoes_has_sis_acoes values (26,64);
insert into sis_permissoes_has_sis_acoes values (26,128);
insert into sis_permissoes values (27,'SISUSUARIOCONFIGS');
insert into sis_perfil_permissoes values (255,1,27);
insert into sis_permissoes_has_sis_acoes values (27,1);
insert into sis_permissoes_has_sis_acoes values (27,2);
insert into sis_permissoes_has_sis_acoes values (27,4);
insert into sis_permissoes_has_sis_acoes values (27,8);
insert into sis_permissoes_has_sis_acoes values (27,16);
insert into sis_permissoes_has_sis_acoes values (27,32);
insert into sis_permissoes_has_sis_acoes values (27,64);
insert into sis_permissoes_has_sis_acoes values (27,128);

COMMIT;
