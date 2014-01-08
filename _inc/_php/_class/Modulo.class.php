<?php

class Modulo {

    var $_modulo = 0;

    function __construct($modulo = 0) {

        $this->_modulo = $modulo;
    }

    function getObj($modulo = 0, $conexao = NULL) {

        $obj = NULL;



        switch ((int) $modulo) {

            // INICIO DAS DEFINIï¿½OES DE MODULOS



            case MODULO_SISACOES :

                $obj = new SisAcoes ();

                break;



            case MODULO_SISEQUIPE :

                $obj = new SisEquipe ();

                break;



            case MODULO_SISEQUIPECONFIGURACOES :

                $obj = new SisEquipeConfiguracoes ();

                break;



            case MODULO_SISPERFIL :

                $obj = new SisPerfil ();

                break;



            case MODULO_SISPERFILPERMISSOES :

                $obj = new SisPerfilPermissoes ();

                break;



            case MODULO_SISPERMISSOES :

                $obj = new SisPermissoes ();

                break;



            case MODULO_SISPERMISSOESHASSISACOES :

                $obj = new SisPermissoesHasSisAcoes ();

                break;



            case MODULO_SISUSUARIO :

                $obj = new SisUsuario ();

                break;



            case MODULO_SISUSUARIOCONFIGS :

                $obj = new SisUsuarioConfigs ();

                break;



            case MODULO_FAVORITOS:

                $obj = new Favoritos();

                break;

           
            case MODULO_UPLOADCLIENTES:

                $obj = new UploadCliente();

                break;

            case MODULO_RELATORIO :

                $obj = new Relatorio();

                break;

           

            case MODULO_TABAUDITCLASSIFICACAO :
                $obj = new TabAuditClassificacao ();
                break;


            case MODULO_TABCLASSIFPESSOA:
                $obj = new TabClassifPessoa ();
                break;
            case MODULO_TABCUPOM:
                $obj = new TabCupom ();
                break;
            case MODULO_TABCUPOMXPESSOA:
                $obj = new TabCupomXPessoa ();
                break;
            case MODULO_TABCUPOMXTIPOSERVICO:
                $obj = new TabCupomXTipoServico();
                break;
            case MODULO_TABEMAIL:
                $obj = new TabEmail ();
                break;
            case MODULO_TABEMAILPESSOA:
                $obj = new TabEmailPessoa ();
                break;
            case MODULO_TABENVIOEMAIL:
                $obj = new TabEnvioEmail ();
                break;
            case MODULO_TABENVIOSMS:
                $obj = new TabEnvioSms ();
                break;
	    
            case MODULO_TABPESSOA:
                $obj = new TabPessoa ();
                break;
            case MODULO_TABPLANOCONTAS:
                $obj = new TabPlanoContas ();
                break;
            case MODULO_TABPLANOPROPRIEDADES:
                $obj = new TabPlanoPropriedades ();
                break;
	    
            case MODULO_TABPROPRCLASSIFPESSOA:
                $obj = new TabProprClassifPessoa ();
                break;
            case MODULO_TABSMS:
                $obj = new TabSms ();
                break;
            case MODULO_TABSTATUSCUPOM:
                $obj = new TabStatusCupom ();
                break;
	    
            case MODULO_TABTELEFONELOJA:
                $obj = new TabTelefoneLoja ();
                break;
            case MODULO_TABTIPOSERVICO:
                $obj = new TabTipoServico ();
                break;
            case MODULO_TABTIPOTELEFONE:
                $obj = new TabTipoTelefone ();
                break;
            case MODULO_TABTRANSACAO:
                $obj = new TabTransacao ();
                break;

            default :

                die('(Classe: ' . __CLASS__ . ') Erro Fatal: Modulo ( ' . $modulo . ' )n&atilde;o disponivel');

                break;

            // FIM DAS DEFINIï¿½OES DE MODULOS
        } // DO switch(modulo)

        return $obj;
    }

// DA funcao getObj($modulo = 0,$conexao=NULL)
}

// DA CLASSE
?>