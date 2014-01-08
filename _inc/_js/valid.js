//$Id: valid.js,v 1.0 2013/01/26 20:16:27 claudia Exp $
// ------------------- General Object related methods ---------------------- //
/**

 * Excludes selected data from module and refresh the grid

*/

function delListData(modulo){

    var dados = new Array();

    $('#listGrid :checkbox:checked').each(function(e,grid){	
        dados.unshift($(grid).parent().find('input:checkbox').attr('id'));		
    });

    
    if(dados == ''){
	alert('Favor selecionar pelo menos um registro!');
	
    }else{   

	if(confirm('Deseja realmente excluir os dados selecionados ?')){	

	    $.post('../_ax/axRequest.php',{

		modulo:modulo,

		method:'excluir',

		args:[dados]

		},function(data){

			if( typeof data == 'object' && data.response.Error ) {		
				if( data.response.Error.code == '42000')
				    alert('Nao foi possivel remover registro. Erro no sistema');
				else{
				    if( data.response.Error.code == '23000')
					alert('Nao foi possovel excluir estes registros, existem outras informacoes associadas a ele. \nPor favor remover as dependencias e tentar novamente.');			
				}
			    }else{
				alert('Registros removidos com sucesso!');
				location.reload();
			    }

	    });
	}
   
    }
}

/**

 * 

 */

var FORM = {

        element: {},
        data: {},
        async: false,
        stop: false,
        reloadHTML: true,
        button: {},
        afterAction: 'edit', // edit, new, redirect
        cancel: function(){
            this.stop = true;
        },
        enviaFrm: function(frm, afterAction, button){
            this.stop = false;
            this.button = button||{};
            this.afterAction = afterAction||'edit';
            this.element = $( '#' + frm );		
            
            if(!this.element.find('#f_reload')[0]){
                var html_freload = '<input type="hidden" id="f_reload" name="f_reload" value="1" />';
                this.element.append(html_freload);
            }
            if( this.afterAction == 'redirect' ) {
                this.element.find('#f_reload').val('0');
            }
            this.data = this.element.serializeArray();
            this.actionCode = this.element.find('#f_action').val();
            //aviso( 'Aviso', 'Validando os dados', '500' );	
            
            //alert(this.data('#nom_caminho_img').val() );
            //alert(this.element.find('#nom_caminho_img').val() );exit();
            
            // tratamento antes do envio dos dados
            FORM.beforeSend(this.element);		

            // Parada passada pelo usuario
            if(this.stop){
                return false;
            }
            if( $( "#" + frm + " input[name='APC_UPLOAD_PROGRESS']" )[0] ) {
                $( "#" + frm ).submit();
                return true;
            }

            if( this.element.find('#f_reload')[0] && this.element.find('#f_reload').val() == 0 ) {

                this.reloadHTML = false;
            } else {
                this.reloadHTML = true;
            }	
            $.ajax({

                url: '../_ax/axCadastrar.php',
                type: 'post',
                dataType: 'json',
                async: FORM.async,
                data: $.param(FORM.data),
                success: function(response){
                                        
                    // callback passado pela tela
                    FORM.onSuccess(response);			
                    $("#debug").html(response.dbg);

                    if(response.resposta=='yes') { // if correct detail					

                        $('.alert-success').html('Registro cadastrado com sucesso!').show();
                            if( FORM.afterAction == 'edit' ){

                                if(window.location.href.search('&id=') == -1){
                                    window.location.hash = '#id='+response.id;
                                }							

                                if( FORM.reloadHTML ) {								

                                    $( "#page-content" ).empty();
                                    $( "#page-content" ).html(response.content);
                                    //aplMask();
                                }												

                            } else if ( FORM.afterAction == 'new' ) {
                                window.location = window.location.href.replace('&id='+response.id, '');

                            } else if ( FORM.afterAction == 'redirect' ) {
                                var redirect = 	window.location.href
                                .replace('Visualiza', 'Lista')
                                .replace('&id='+response.id, '')
                                .replace('#id='+response.id, '');

                                window.location = redirect;										
                            }			
                        
                    } else {
                        $('.alert-error').html('Falha ao cadastrar registro').show();                        
                    }
                }
            });
        },
        
        onSuccess: function(response){
            return response;
        },
        beforeSend: function(data){
            return data;
        },
        disableButton: function( button ){
            $('#form-button-'+button).hide();
        }
    };

function axDebug(){

    $("#debug").show();

    $("#debug").load("../_ax/axDebug.php");

}



function axSetDebug(frm){

    $.post("../_ax/axDebug.php",$('#'+frm).serialize() ,function(data){

        $("#debug").html(data.dbg);

        if(data.resposta=='yes'){

            alert( 'Debug Ativado com sucesso');

        }else{

            alert( 'Debug nao pode ser ativado');

        }

    },'json');

}


/**

 * Objeto que trata os eventos e argumentos para a exporta��o de relat�rios

 */

Export = {

    _defaults: {

        url: 'Exportar.php',

        beforeRedirect: function(args){},	

        filterArgs : function (args){}

    },

    options: {},

    elements: {},

    args: {},

    convertTo: 'pdf',

    convertFrom: 'data',

    init: function( options ) {

		

        this.options = $.extend(true, this._defaults, options||{});

		

        this.args.querys = [];

        this.args.params = {};

		

        this.elements = $('.Export');

        var to = '';

		

        this.elements.each(function(){

			

            to = $(this).attr('rel');

            $(this).addClass('export-'+to);

        });

		

        this.elements.live('click', function() {		

			

            var link = $(this);

            var href = link.attr('href')

            .replace('javascript:void(0);', '')

            .replace('#', '');

			

            Export.addArgs( href );	

            Export.convertTo =  $(this).attr('rel') || $(this).attr('to');

            Export.convertFrom =  $(this).attr('from');

			

            Export.addArgs( {

                'convertTo' : Export.convertTo, 

                'convertFrom' : Export.convertFrom

            } );

			

            Export.redirect();

			

            return false;

        });

		

    },

    redirect: function() {

		

		

        //console.log(args);

		

        this.options.beforeRedirect( this.args );

		

        var args = this.buildQuery();

		

        var url = this.options.url;

		

        url += '?'+args;	

				

        window.location = url;

		

    },

    buildQuery: function() {

		

        var query = [];

			

        if( typeof this.args.querys != 'undefined' && this.args.querys.length ) {

            query.push( this.args.querys.join('&') );

        }		

		

        query.push( $.param(this.args.params) );

		

        return query.join('&');

    },

    /**

	 * Adiciona ou substitui os parametros da url

	 * @var object/string args

	 * @var boolean replace - se for verdadeira todos os parametros do redirecionamento ser�o substituidos

	 */

    addArgs: function( args , replace) {

		

        replace = replace||false;	

		

        if( replace ) {

            this.args = {};			

        }		

		

        if( args ) {

			

            if( typeof(args) == 'object' ) {				

                this.args.params = $.extend(this.args.params, this.parseSerializedArray( args ) ) ;

            } else if( typeof(args) == 'string' ) {

                this.args.querys.push( $.trim(args) );

            }

			

        }		

    },

    /**

	 * Purpose: Transforma array do tipo: [{ name : 'field_1', value : '1'}, { name : 'field_2', value : '1'}]

	 * @var object obj

	 * @return object/json obj

	 */

    parseSerializedArray: function ( obj ) {

		

        var json = {};

		

        if( $.isArray( obj ) ) {

			

            for (i in obj) {

                if( typeof obj[i].value != 'undefined' ) {

                    json[obj[i].name] = obj[i].value;

                }

            } 

			

            return json;

        }	

		

        return obj;		

    }

		

};



/**

 * Helpers - In�cio de uma id�ia para agrupar algumas fun��es javascript que utilizamos 

 * no nosso dia a dia e que n�o est�o em bibliotecas como jQuery

 */



HELPERS = {

    /**

	 * Retira a m�scara colocada nos valores dos campos

	 * @param string:integer Valor a ser "limpo"

	 * @param string Tipo de m�scara. ex.: decimal

	 * @return string

	 */

    Unmask: function( value_, pattern_  ) {

        switch( pattern_ )

        {

            case 'decimal':

                return parseFloat( value_.replace('.','').replace(',','.') );	

                break;

        }		

    },

    CheckAjaxError: function ( obj_, msg_ ) {

		

        if( typeof obj_ == 'object' && obj_.response.Error ) {

            var erro = obj_.response.Error;

            // Tipo: MySQL -  Existem depend�ncias para este registro

            if( erro.code == '23000') {

                msg_ = "Nao foi possovel excluir este registro, existem outras informacoes associadas a ele. \nPor favor remover as dependencias e tentar novamente.";

            }		

            alert( msg_||'Erro no sistema.' );

			

            HELPERS.Abort( msg_ );

			

            return true;

        }

		

        return false;		

    },

    Abort: function ( msg_ ) {

        throw new Error( msg_||'Erro no sistema.' );

    }

	

};


