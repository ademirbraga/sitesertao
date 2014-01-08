<?php

class Formulario {
	var $tplConteudo = "";
	var $tplMenu = "";
	var $objModulo = NULL;
	var $chave = '';
	var $nome_modulo = "aaa";
	
	function __construct() {
	}
	
	function getConteudo() {
		return $this->tplConteudo;
	}
	function getMenu() {
		return $this->tplMenu;
	}
	function getModulo() {
		return $this->objModulo;
	}
	function getArquivo() {
		return $this->arquivo;
	} // Portais
	function getChave() {
		return $this->chave;
	}
	function getNomeModulo() {
		return $this->nome_modulo;
	}
	
	function getTemplate($objPrincipal, $acao, $id, $index_form = 0, &$extras = array()) {
		global $TipAjuda,$Linguagem;
		if (empty ( $id ))
			$acao = CADASTRAR;
		switch ($acao) {
			case CADASTRAR :
				$display_cadastro = "style='display:inline;' ";
				$display_form = "style='display:inline;' ";
				$display_form_edit = "style='display:inline;' ";
				$display_info = "style='display:none;' ";
				$display_info_edit = "style='display:none;' ";
				$display_atualiza = "style='display:none;' ";
				break;
			//	case SALVAR:
			case EDITAR :
				$display_form = "style='display:inline;' ";
				$display_form_edit = "style='display:none;' ";
				$display_info = "style='display:none;' ";
				$display_info_edit = "style='display:inline;' ";
				$display_cadastro = "style='display:none;' ";
				$display_atualiza = "style='display:inline;' ";
				break;
			case VISUALIZAR :
				$display_form = "style='display:none;' disabled='true' ";
				$display_form_edit = "style='display:none;' disabled='true' ";
				$display_info = "style='display:inline;' ";
				$display_info_edit = "style='display:inline;' ";
				$display_cadastro = "style='display:none;' ";
				$display_atualiza = "style='display:none;' ";
				break;
			default :
				$display_form = "style='display:none;' disabled='true' ";
				$display_form_edit = "style='display:none;' disabled='true' ";
				$display_info = "style='display:inline;' ";
				$display_info_edit = "style='display:inline;' ";
				$display_cadastro = "style='display:none;' ";
				$display_atualiza = "style='display:none;' ";
				break;
		}
		
		include_once (PATH_APP . "/" . $objPrincipal->getaplicativo ());
		$this->chave = $objPrincipal->getKey ();
		$this->objModulo = $objPrincipal;
		$this->tplConteudo = isset ( $tplConteudo ) ? $tplConteudo : '';
		$this->tplMenu = isset ( $tplMenu ) ? $tplMenu : '';
		$this->arquivo = isset ( $this->arquivo ) ? $this->arquivo : ''; // Portais
		return $tplConteudo;
	}
}

?>