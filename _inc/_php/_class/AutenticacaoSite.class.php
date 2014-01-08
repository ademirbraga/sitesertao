<?php
//$_SESSION['debug'] = SQL;

class AutenticacaoSite {

	private $_cadastroRef;

	private $_expirado;

	private $_autenticado;

	private $_timestamp;

	private $_ip;

	private $_login;

	private $_senha;

	private $_redirect = "";

	private $_tipoRedir;

	

	function __construct(TabCliente &$cadastro = NULL, $login = NULL, $senha = NULL, $tipoRedir = PHP_REDIR, $cod_cliente_tipo = NULL) {

	    	    
		$this->_tipoRedir = $tipoRedir;		

		$this->_cadastroRef = $cadastro;

		$this->_timestamp = time ();

		$this->_ip = REMOTE_ADDR;		

		$erro = $this->validaSessao ();
		

		if ($erro) {
			

			if (! empty ( $login ) && ! empty ( $senha )) {
				

				$this->setLogin ( $login );

				$this->setSenha ( $senha );
				

				$where_str = "nom_login_acesso = '" . $this->_login . "' and  nom_senha_acesso = md5('" . $this->_senha . "') and cod_cliente_tipo = ".$cod_cliente_tipo;
				

				$dadosUsuario = $this->_cadastroRef->listar ( "*", $where_str )->getDados ();
			
				$this->_cadastroRef->setNomCliente ( $dadosUsuario [0] ['nom_cliente'] );				

				$this->_autenticado = count ( $dadosUsuario ) ? true : false;
				
					

				if ($this->_cadastroRef->isCancelado ()){				    

					$this->redirect ( ERRO_ACESSO_CANCELADO );
				}

				if ($this->_autenticado) {

					$this->setSessao ( $dadosUsuario [0] );

					$this->_cadastroRef->logon ();

				} elseif (! $this->_autenticado) {

					$this->redirect ( ERRO_LOGIN );

					return;

				} elseif (! $this->_autenticado and $ja_logado == true) {

					$this->redirect ( ERRO_LOGADO );

					return;

				}

			} else {

				$this->redirect ( ERRO_VAZIO );

			}

		} else {

			$this->_cadastroRef->populate ( $_SESSION ['usr'] );

			$this->_autenticado = true;

		}

		

		return $this->redirect ();

	}

	

	function setLogin($login) {

		$this->_login = $login;

	}

	function setSenha($senha) {

		$this->_senha = $senha;

	}

	function setTipoRedir($tipoRedir) {

		$this->_tipoRedir = $tipoRedir;

	}

	function logoff() {

		$this->_cadastroRef->logoff ();

	}

	

	function isAutenticado() {

		return $this->_autenticado;

	}

	

	function validaSessao() {

		

		$autenticacao = @$_SESSION ['autenticacao'];

		$nome = $autenticacao ['nom_cliente'];

		$ip = $autenticacao ['ip'];

		$hora = $autenticacao ['hora'];

		$chave = $autenticacao ['chave'];

		if ($chave != md5 ( $nome . CHAVE_AUTENTICACAO . $ip . $hora )) {

			return ERRO_ACESSO_NEGADO;

		}

		if ($hora + (60 * 60) < time ()) {

			$this->redirect ( ERRO_ACESSO_EXPIRADO );

		}

		$hora = time ();

		//recria a chave

		$chave = md5 ( $nome . CHAVE_AUTENTICACAO . $ip . $hora );

		$aut ['nom_cliente'] = $nome;

		$aut ['ip'] = $ip;

		$aut ['hora'] = $hora;

		$aut ['chave'] = $chave;

		$_SESSION ['autenticacao'] = $aut;

		return 0;

	

	}

	

	function redirect($opt = 0, $xajax = false) {

		

		$redirect = false;

		if (isset ( $_SERVER ['REQUEST_URI'] )) {

			$next = $_SERVER ['REQUEST_URI'];

		}

		if ($opt) {

			$this->_redirect = "clientesHome.php";

			$redirect = true;

		}

		/*if ($redirect) {
		    header('Location: '.$this->_redirect);
		    exit();			
		}*/

	}

	

	function getRedirect() {

		return $this->_redirect;

	}

	

	function setSessao($dadosUsuario) {

		$arr_usuario = array ();

		$nom_cliente = $this->_cadastroRef->getNomCliente ();

		$cod_cadastro = $this->_cadastroRef->setCodCliente ( $dadosUsuario ['cod_cliente'] );

		$arr_usuario = $dadosUsuario;

		$arr_usuario ['IP'] = $this->_ip;

		$ip = REMOTE_ADDR;

		$hora = time ();

		$chave = md5 ( $nom_cliente . CHAVE_AUTENTICACAO . $ip . $hora );

		

		//			print_r($arr_usuario);

		//			die();

		//BUSCANDO AS CONFIGURAÇÕES DA EQUIPE 

		$autenticacao ['nom_cliente'] = $nom_cliente;

		$autenticacao ['ip'] = $ip;

		$autenticacao ['hora'] = $hora;

		$autenticacao ['chave'] = $chave;

		$autenticacao ['app'] = APLICACAO;

		

		$_SESSION ['autenticacao'] = $autenticacao;

		$_SESSION ['usr'] = $arr_usuario;

	

	}



}