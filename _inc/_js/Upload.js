/**
 * Prepara o formulário para envio de arquivos
 * exibindo uma barra de progresso
 * 
 * Este objeto é dependente da jquery
 * e da jquery.progressbar
 * 
 * Ex.:
 * Upload.init({
 *	form: 'f_musica', // id do form
 *	app: 'appUpload.php', // app que será chamada no form
 *	progresskey: progress_key, // valor uniqid gerado pelo php
 *	reload: false, // recarregar a página
 *	posUpload: function( data ) {
 *		// por default a função posUpload tem em seu escopo um alert com a mensagem retornada pela app
 *		// porém é possível sobrescrever esse metodo dando o tratamento que você precisar em sua página
 *
 *		retorno = $.parseJSON( data );
 *
 *		aviso( 'Alerta', retorno.mensagem, '600' );
 *
 *		if( retorno.cod === 'sucesso' ) {
 *
 *			var table = $( "#tabs-1" ).find( "table" );
 *
 *			var tr = "<tr id='musica_" + retorno.id + "'>";
 *			tr += "<td>" + retorno.id + "</td>";
 *			tr += "<td>" + retorno.fileInfo.name + "." + retorno.fileInfo.ext + "</td>";
 *			tr += "<td>" + retorno.fileInfo.name_original + "</td>";
 *			tr += "<td><a href='javascript:void(0);' rel='delMusicas'><img src='../_img/delete.png' /></a></td>";
 *			tr += "</tr>";
 *
 *			table.append( tr );
 *
 *			$( "#tabs" ).tabs( 'select', 0 );
 *
 *			// reinicia o objeto para que o formulario esteja preparado para um novo envio
 *			Upload.reinit();
 *
 *		}
 *
 *	}
 * });
 * 
 * @author Thiago França
 * @author Daniel França
 */

var Upload = {

		options_default: { 
			modulo: '',
			form: '',
			app: '',
			progresskey: '',
			progressbar: 'uploadprogressbar',
			reload: false,
			posUpload: function() {
				alert( 'Upload concluído com sucesso' );
				Upload.reinit();
			}
		},
		options: {},
		objForm: {},
		interval: null,
		documento: document,
		identifier: 'APC_UPLOAD_PROGRESS',
		init:function( options ) {

			this.options = $.extend( this.options_default, options );
			
			if( this.options.modulo == '' ) {
				alert( 'módulo não informado' );
				return false;
			}

			if( this.options.form == '' ) {
				alert( 'form não informado' );
				return false;
			}

			if( this.options.app == '' ) {
				alert( 'app não informada' );
				return false;
			}

			if( this.options.progresskey == '' ) {
				alert( 'progresskey não informada!' );
				return false;
			}

			if( !$( "#"+this.options.progressbar ).attr( 'id' ) ) {
				$( "#"+this.options.form ).append( '<span id="uploadprogressbar"></span>' );
			}

			$( "#"+this.options.progressbar ).progressBar();
			$( "#"+this.options.progressbar ).hide();

			this.objForm = $( "#"+this.options.form );

			Upload.objForm
				.attr( 'target', 'progressFrame' )
				.attr( 'action', Upload.options.app )
				.attr( 'enctype', 'multipart/form-data' )
				.bind( 'submit', function() { 
					Upload.onSubmit();
				});

			if( $( "input[name='"+this.identifier+"']" ).attr( 'name' ) == undefined )
				this.objForm.prepend( '<input type="hidden" name="'+this.identifier+'" value="'+this.options.progresskey+'" />' );

			if( $( "input[name='UPLOAD_MODULO']" ).attr( 'name' ) == undefined )
				this.objForm.find( 'input[name="'+this.identifier+'"]' ).after( '<input type="hidden" name="UPLOAD_MODULO" value="'+this.options.modulo+'" />' );

			$( "#if_box_upload" ).remove();

			$( this.documento.body ).append( '<iframe style="display: none;" id="if_box_upload" name="progressFrame"></iframe>' );

		},
		onSubmit: function() {

			Upload.objForm.find( "input[type='submit']" ).hide();

			$( "#"+this.options.progressbar ).show();

			Upload.interval = setInterval( 'Upload.submitHandler()', '1000' );

		},
		submitHandler: function() {

			$.ajax({
				url:Upload.options.app + "?progress_key=" + Upload.options.progresskey,
				async:false,
				dataType: 'json',
				type: 'get',
				success: function( data ) {

					if ( data == null || data == false ) {

						clearInterval( Upload.interval );

						alert( 'Erro ao efetuar upload!' );

						if( Upload.options.reload )
							location.reload( true );

						return;

					}

			       	// Método de porcentagem utilizado em conjunto com uploadprogress PHP
					// var porcentagem = Math.floor( 100 * parseInt( data.bytes_uploaded ) / parseInt( data.bytes_total ) );
	
					// Método de porcentagem utilizado em conjunto com APC PHP
					var porcentagem = Math.floor( 100 * parseInt( data.current ) / parseInt( data.total ) );

					$( "#"+Upload.options.progressbar ).progressBar( porcentagem );

					if( data.done == 1 )
						Upload.pb_callback( data );

				}

			});

		},
		pb_callback: function() {

			var retorno = $( "#if_box_upload" ).contents().find( "#retornoUploadJson" ).html();

			clearInterval( Upload.interval );

			Upload.options.posUpload( retorno );

			if( Upload.options.reload )
				location.reload( true );

		},
		renewProgressKey: function() {

			$.ajax({
				url: Upload.options.app + "?regenerate_key=true",
				async:false,
				dataType: 'json',
				type: 'get',
				success: function( data ) {

					if( data != "" && null != data )
						Upload.options.progresskey = data;

				}
			});

		},
		reinit: function() {

			this.objForm.get(0).reset();

			this.objForm.find( "input[type='submit']" ).show();

			this.renewProgressKey();

			$( "#"+this.options.progressbar ).progressBar().hide();

			$( "input[name='"+Upload.identifier+"']" ).val( this.options.progresskey );

		}

};