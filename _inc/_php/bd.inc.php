<?php

/**
* File:    bd.inc.php
** @autor Claudia Matos <claudiarfm@yahoo.com.br>
* @version 1.0.0
* @package 
*
* -------------------------------------------------------
* Gerada em:        17.11.2011
* Arquivo:          bd.inc.php
* Comentarios:		arquivo com informacoes de conexao
* -------------------------------------------------------	
*/

if (!defined('TSISUSUARIO'))
    define('TSISUSUARIO', 'sis_usuario');

if (!defined('TSISPERFILPERMISSOES'))
    define('TSISPERFILPERMISSOES', 'sis_perfil_permissoes');

if (!defined('TSISPERFIL'))
    define('TSISPERFIL', 'sis_perfil');

if (!defined('TSISPERMISSOES'))
    define('TSISPERMISSOES', 'sis_permissoes');

if (!defined('TSISACOES'))
    define('TSISACOES', 'sis_acoes');

if (!defined('TSISEQUIPE'))
    define('TSISEQUIPE', 'sis_equipe');

if (!defined('TSISEQUIPECONFIGURACOES'))
    define('TSISEQUIPECONFIGURACOES', 'sis_equipe_config');

if (!defined('TSISPERMISSOESHASSISACOES'))
    define('TSISPERMISSOESHASSISACOES', 'sis_permissoes_has_sis_acoes');

if (!defined('TSISUSUARIOCONFIGS'))
    define('TSISUSUARIOCONFIGS', 'sis_usuario_configs');

if(!defined('TSISLIMITACOES'))
	define('TSISLIMITACOES','sis_limitacoes');		

if(!defined('TCONTRATO'))
	define('TCONTRATO','contrato');	

if(!defined('TCONTRATOEQUIPE'))
	define('TCONTRATOEQUIPE','contrato_equipe');	

if(!defined('TSISMENU'))
	define('TSISMENU','sis_menu');

if(!defined('TTABAUDITCLASSIFICACAO'))
	define('TTABAUDITCLASSIFICACAO','tab_audit_classificacao');	
if(!defined('TTABCLASSIFPESSOA'))
	define('TTABCLASSIFPESSOA','tab_classif_pessoa');	
if(!defined('TTABCUPOM'))
	define('TTABCUPOM','tab_cupom');	
if(!defined('TTABCUPOMXPESSOA'))
	define('TTABCUPOMXPESSOA','tab_cupom_x_pessoa');	
if(!defined('TTABCUPOMXTIPOSERVICO'))
	define('TTABCUPOMXTIPOSERVICO','tab_cupom_x_tipo_servico');	
if(!defined('TTABEMAIL'))
	define('TTABEMAIL','tab_email');	
if(!defined('TTABEMAILPESSOA'))
	define('TTABEMAILPESSOA','tab_email_pessoa');	
if(!defined('TTABENVIOEMAIL'))
	define('TTABENVIOEMAIL','tab_envio_email');	
if(!defined('TTABENVIOSMS'))
	define('TTABENVIOSMS','tab_envio_sms');	
if(!defined('TTABPESSOA'))
	define('TTABPESSOA','tab_pessoa');	
if(!defined('TTABPLANOCONTAS'))
	define('TTABPLANOCONTAS','tab_plano_contas');	
if(!defined('TTABPLANOPROPRIEDADES'))
	define('TTABPLANOPROPRIEDADES','tab_plano_propriedades');	
if(!defined('TTABPROPRCLASSIFPESSOA'))
	define('TTABPROPRCLASSIFPESSOA','tab_propr_classif_pessoa');	
if(!defined('TTABSMS'))
	define('TTABSMS','tab_sms');	
if(!defined('TTABSTATUSCUPOM'))
	define('TTABSTATUSCUPOM','tab_status_cupom');	
if(!defined('TTABTELEFONELOJA'))
	define('TTABTELEFONELOJA','tab_telefone_loja');	
if(!defined('TTABTIPOSERVICO'))
	define('TTABTIPOSERVICO','tab_tipo_servico');	
if(!defined('TTABTIPOTELEFONE'))
	define('TTABTIPOTELEFONE','tab_tipo_telefone');	
if(!defined('TTABTRANSACAO'))
	define('TTABTRANSACAO','tab_transacao');	

//---------------------------------------------------------------------------
if(!defined('TTABAGENDACOMPROMISSO'))
	define('TTABAGENDACOMPROMISSO','tab_agenda_compromisso');	

if(!defined('TTABATIVIDADEPROFISSIONAL'))
	define('TTABATIVIDADEPROFISSIONAL','tab_atividade_profissional');	

if(!defined('TTABCBHPM'))
	define('TTABCBHPM','tab_cbhpm');	

if(!defined('TTABCERTIFICACAOESPECIALIZACAO'))
	define('TTABCERTIFICACAOESPECIALIZACAO','tab_certificacao_especializacao');	

if(!defined('TTABCERTIFICACAOHASPROFISSIONAL'))
	define('TTABCERTIFICACAOHASPROFISSIONAL','tab_certificacao_has_profissional');	

if(!defined('TTABCID'))
	define('TTABCID','tab_cid');	

if(!defined('TTABCLIENTE'))
	define('TTABCLIENTE','tab_cliente');	

if(!defined('TTABCLIENTECARDIO'))
	define('TTABCLIENTECARDIO','tab_cliente_cardio');	

if(!defined('TTABCLIENTEOBS'))
	define('TTABCLIENTEOBS','tab_cliente_obs');	

if(!defined('TTABCLIENTETIPO'))
	define('TTABCLIENTETIPO','tab_cliente_tipo');	

if(!defined('TTABCONHECIMENTOHASPROFISSIONAL'))
	define('TTABCONHECIMENTOHASPROFISSIONAL','tab_conhecimento_has_profissional');	

if(!defined('TTABCONHECIMENTOTECNICO'))
	define('TTABCONHECIMENTOTECNICO','tab_conhecimento_tecnico');	

if(!defined('TTABDEBITOAUTOMATICO'))
	define('TTABDEBITOAUTOMATICO','tab_debito_automatico');	

if(!defined('TTABDUVIDA'))
	define('TTABDUVIDA','tab_duvida');	

if(!defined('TTABENQUETE'))
	define('TTABENQUETE','tab_enquete');	

if(!defined('TTABENQUETEALTERNATIVA'))
	define('TTABENQUETEALTERNATIVA','tab_enquete_alternativa');	

if(!defined('TTABENQUETEPERMITIDO'))
	define('TTABENQUETEPERMITIDO','tab_enquete_permitido');	

if(!defined('TTABENQUETEVOTACAO'))
	define('TTABENQUETEVOTACAO','tab_enquete_votacao');	

if(!defined('TTABEVENTO'))
	define('TTABEVENTO','tab_evento');	

if(!defined('TTABEVENTOIMAGEM'))
	define('TTABEVENTOIMAGEM','tab_evento_imagem');	

if(!defined('TTABEVENTOIMAGEMPERMITIDO'))
	define('TTABEVENTOIMAGEMPERMITIDO','tab_evento_imagem_permitido');	

if(!defined('TTABEVENTOPERMITIDO'))
	define('TTABEVENTOPERMITIDO','tab_evento_permitido');	

if(!defined('TTABEVENTOTIPO'))
	define('TTABEVENTOTIPO','tab_evento_tipo');	


if(!defined('TTABEVENTOUPLOAD'))
	define('TTABEVENTOUPLOAD','tab_evento_upload');	

if(!defined('TTABEXTRACURRICULAR'))
	define('TTABEXTRACURRICULAR','tab_extra_curricular');	

if(!defined('TTABEXTRACURRICULARHASPROFISSIONAL'))
	define('TTABEXTRACURRICULARHASPROFISSIONAL','tab_extra_curricular_has_profissional');	

if(!defined('TTABFORMACAO'))
	define('TTABFORMACAO','tab_formacao');	

if(!defined('TTABFORUM'))
	define('TTABFORUM','tab_forum');	

if(!defined('TTABFORUMCOMENTARIO'))
	define('TTABFORUMCOMENTARIO','tab_forum_comentario');	

if(!defined('TTABHILUM'))
	define('TTABHILUM','tab_hilum');	

if(!defined('TTABJORNAL'))
	define('TTABJORNAL','tab_jornal');	

if(!defined('TTABJORNALIMAGEM'))
	define('TTABJORNALIMAGEM','tab_jornal_imagem');	

if(!defined('TTABJORNALPERMITIDO'))
	define('TTABJORNALPERMITIDO','tab_jornal_permitido');	

if(!defined('TTABMANUALCOOPERADO'))
	define('TTABMANUALCOOPERADO','tab_manual_cooperado');	

if(!defined('TTABNOTICIA'))
	define('TTABNOTICIA','tab_noticia');	

if(!defined('TTABNOTICIAIMAGEM'))
	define('TTABNOTICIAIMAGEM','tab_noticia_imagem');	

if(!defined('TTABPRODUCAOMEDICA'))
	define('TTABPRODUCAOMEDICA','tab_producao_medica');	

if(!defined('TTABREDESSOCIAIS'))
	define('TTABREDESSOCIAIS','tab_redes_sociais');	

if(!defined('TTABSAC'))
	define('TTABSAC','tab_sac');	

if(!defined('TTABSACATENDIMENTOS'))
	define('TTABSACATENDIMENTOS','tab_sac_atendimentos');	

if(!defined('TTABSACSITE'))
	define('TTABSACSITE','tab_sac_site');	

if(!defined('TTABSINISTROMETRO'))
	define('TTABSINISTROMETRO','tab_sinistrometro');	

if(!defined('TTABSOLICITABOLETO'))
	define('TTABSOLICITABOLETO','tab_solicita_boleto');	

if(!defined('TTABSOLICITACARTAO'))
	define('TTABSOLICITACARTAO','tab_solicita_cartao');	

if(!defined('TTABTISS'))
	define('TTABTISS','tab_tiss');	

if(!defined('TTABTRABALHECONOSCO'))
	define('TTABTRABALHECONOSCO','tab_trabalhe_conosco');	

if(!defined('TTABTRABALHEHASATIVIDADE'))
	define('TTABTRABALHEHASATIVIDADE','tab_trabalhe_has_atividade');	

if(!defined('TTABTUSS'))
	define('TTABTUSS','tab_tuss');	

if(!defined('TTABBANNER'))
	define('TTABBANNER','tab_banner');	

if(!defined('TTABBANNERTIPO'))
	define('TTABBANNERTIPO','tab_banner_tipo');

if(!defined('TTABBANNERIMAGEM'))
	define('TTABBANNERIMAGEM','tab_banner_imagem');

if(!defined('TTABTNUMM'))
	define('TTABTNUMM','tab_TNUMM');

if(!defined('TTABINDICACAOARTIGO'))
	define('TTABINDICACAOARTIGO','tab_indicacao_artigo');

if(!defined('TTABTIPOPESSOA'))
	define('TTABTIPOPESSOA','tab_tipo_pessoa');

if(!defined('TTABUSUARIOSITE'))
	define('TTABUSUARIOSITE','tab_usuario_site');


?>