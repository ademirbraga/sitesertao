<?php
//!-----------------------------------------------------------------
// @class      SimpleXmlParser
// @desc       Cria um parser que constr�i uma estrutura de dados
//             a partir de um arquivo XML
// @author     Marcos Pont
//!-----------------------------------------------------------------
class SimpleXmlParser
{
     var $root;                    // @var root    (object)       Objecto XmlNode raiz da �rvore XML
     var $parser;                  // @var parser  (resource)     Objeto xml_parser criado
     var $data;                    // @var data    (string)       Dados XML a serem interpretados pelo parser
     var $vals;                    // @var vals    (array)        Vetor de valores capturados do arquivo XML
     var $index;                   // @var index   (array)        Vetor de �ndices da �rvore XML
     var $charset = "ISO-8859-1";  // @var charset (string)       Conjunto de caracteres definido para a cria��o do parser XML

     //!-----------------------------------------------------------------
     // @function        SimpleXmlParser::SimpleXmlParser
     // @desc            Construtor do XML Parser. Parseia o conte�do XML.
     // @access          public
     // @param           fileName  (string)       Nome do arquivo XML a ser processado
     // @param           data      (string)       Dados XML, se fileName = ""
     //!-----------------------------------------------------------------
     function SimpleXmlParser($fileName='', $data='', $charset='') {
          if ($data == "") {
               if (!file_exists($fileName)) $this->_raiseError("Can't open file ".$fileName);
               $this->data = implode("",file($fileName));
          } else {
               $this->data = $data;
          }
          $this->data = str_replace(">"."[[:space:]]+"."<","><",$this->data); //$this->data = eregi_replace(">"."[[:space:]]+"."<","><",$this->data);
          $this->charset = ($charset != '') ? $charset : $this->charset;
          
		  		  $this->_parseFile();
		  
     }

     //!-----------------------------------------------------------------
     // @function        SimpleXmlParser::getRoot
     // @desc            Retorna a raiz da �rvore XML criada pelo parser
     // @access          public
     // @returns         Raiz da �rvore XML
     //!-----------------------------------------------------------------
     function getRoot() {
          return $this->root;
     }

     //!-----------------------------------------------------------------
     // @function        SimpleXmlParser::_parseFile
     // @desc            Inicializa o parser XML, setando suas op��es de
     //                  configura��o e executa a fun��o de interpreta��o
     //                  do parser armazenando os resultados em uma estrutura
     //                  de �rvore
     // @access          private
     //!-----------------------------------------------------------------
     function _parseFile() {
          $this->parser = xml_parser_create($this->charset);
          xml_parser_set_option($this->parser, XML_OPTION_TARGET_ENCODING, $this->charset);
          xml_parser_set_option($this->parser, XML_OPTION_SKIP_WHITE, 1);
          if (!@xml_parse_into_struct($this->parser,$this->data,&$this->vals,&$this->index)) {
               $this->_raiseError("Error while parsing XML File: ".xml_error_string(xml_get_error_code($this->parser))." at line ".xml_get_current_line_number($this->parser));
          }
          xml_parser_free($this->parser);
          $this->_buildRoot(0);
     }

     //!-----------------------------------------------------------------
     // @function        SimpleXmlParser::_buildRoot
     // @desc            Cria o apontador da raiz da �rvore XML a partir
     //                  do primeiro valor do vetor $this->vals. Inicia a
     //                  execu��o recursiva para montagem da �rvore
     // @access          private
     // @see             PHP2Go::_getChildren
     //!-----------------------------------------------------------------
     function _buildRoot() {
          $i = 0;
          $this->root = new XmlNode($this->vals[$i]['tag'],
                                     (isset($this->vals[$i]['attributes'])) ? $this->vals[$i]['attributes'] : NULL,
                                       $this->_getChildren($this->vals, $i),
                                         (isset($this->vals[$i]['value'])) ? $this->vals[$i]['value'] : NULL);
     }

     //!-----------------------------------------------------------------
     // @function        SimpleXmlParser::_getChildren
     // @desc            Fun��o recursiva para a montagem da �rvore XML
     // @access          private
     // @param           vals (array)        vetor de valores do arquivo
     // @param           i    (int)          �ndice atual do vetor de valores
     // @see             PHP2Go::_getRoot
     //!-----------------------------------------------------------------
	function _getChildren( $vals, &$i ) {

		$children = array();

		while( ++$i < sizeof( $vals ) ) {

			// current tag
			$tag   = isset( $vals[ $i ]['tag'] ) ? $vals[ $i ]['tag'] : NULL;

			// current attribute
			$attr  = isset( $vals[ $i ]['attributes'] ) ? $vals[ $i ]['attributes'] : NULL;

			// current value
			$value = isset( $vals[ $i ]['value'] ) ? $vals[ $i ]['value'] : NULL;

			switch( $vals[$i]['type'] ) {

				case 'cdata':       
					array_push( $children, $value );
					break;

				case 'complete':    
					array_push( $children, new XmlNode( $tag, $attr , NULL, $value ) );
					break;

				case 'open':
					array_push( $children, new XmlNode( $tag, $attr, $this->_getChildren( $vals, $i ), $value ) );
					break;

				case 'close':
					return $children;

               }

          }

     }

     //!-----------------------------------------------------------------
     // @function        SimpleXmlParser::_raiseError
     // @desc            Tratamento de erros da classe
     // @access          private
     // @param           errorMsg (string)   Mensagem de erro
     //!-----------------------------------------------------------------
     function _raiseError($errorMsg) {
          trigger_error($errorMsg, E_USER_ERROR);
     }
}

//!-----------------------------------------------------------------
// @class      XmlNode
// @desc       Cria um nodo de �rvore XML
// @author     Marcos Pont
//!-----------------------------------------------------------------
class XmlNode
{
	var $tag;			// @var tag (string)		Tag correspondente ao nodo
	var $attrs; 		// @var attrs (array)		Vetor de atributos do nodo
	var $children; 		// @var children (array)	Vetor de filhos do nodo
	var $childrenCount; // @var childrenCount (int)	N�mero de filhos do nodo
	var $value; 		// @var value (mixed)		Valor CDATA do nodo XML

	//!-----------------------------------------------------------------
	// @function	XmlNode::XmlNode
	// @desc		Construtor do objeto XmlNode
	// @access		public
	// @param		nodeTag (string)		Tag do nodo
	// @param		nodeAttrs (array)		Vetor de atributos do nodo
	// @param 		nodeChildren (array)	Vetor de filhos do nodo, padr�o � NULL
	// @param 		nodeValue (mixed)		Valor CDATA do nodo XML, padr�o � NULL
	//!-----------------------------------------------------------------
	function XmlNode($nodeTag, $nodeAttrs, $nodeChildren = NULL, $nodeValue = NULL) {
		$this->tag = $nodeTag;
		$this->attrs = $nodeAttrs;
		$this->children = $nodeChildren;
		$this->childrenCount = is_array($nodeChildren) ? sizeOf($nodeChildren) : 0;
		$this->value = $nodeValue;
	}

	//!-----------------------------------------------------------------
	// @function	XmlNode::hasChildren
	// @desc		Verifica se o nodo XML possui filhos
	// @access		public
	// @returns		TRUE ou FALSE
	//!-----------------------------------------------------------------
	function hasChildren() {
		return ($this->childrenCount > 0);
	}

	//!-----------------------------------------------------------------
	// @function	XmlNode::getChildrenCount
	// @desc 		Retorna o n�mero de filhos do nodo XML
	// @access 		public
	// @returns 	N�mero de filhos do nodo
	//!-----------------------------------------------------------------
	function getChildrenCount() {
		return $this->childrenCount;
	}

	//!-----------------------------------------------------------------
	// @function	XmlNode::getChildren
	// @desc 		Retorna o filho de �ndice $index do nodo, se existir
	// @param 		index (int)		�ndice do nodo buscado
	// @returns 	Filho de �ndice $index ou FALSE se ele n�o existir
	//!-----------------------------------------------------------------
	function &getChildren($index) {
		return (isset($this->children[$index]) ? $this->children[$index] : FALSE);
	}

	//!-----------------------------------------------------------------
	// @function	XmlNode::getChildrenTagsArray
	// @desc 		Retorna os filhos do nodo listados em um
	// 				vetor associativo indexado pelas TAGS
	// @access 		public
	// @returns 	Vetor associativo no formato Children1Tag=>Children1Object,
	// 				Children2Tag=>Children2Object, ...
	// @note		Esta fun��o n�o deve ser utilizada quando uma TAG XML
	//				possui filhos com TAGS repetidas
	//!-----------------------------------------------------------------
	function getChildrenTagsArray() {
		if (!$this->children) {
			return FALSE;
		} else {
			$childrenArr = array();
			foreach($this->children as $children) {
				$childrenArr[$children->tag] = $children;
			}
			return $childrenArr;
		}
	}
}
?>