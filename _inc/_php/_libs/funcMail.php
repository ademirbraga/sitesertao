<?php
	date_default_timezone_set("America/Sao_Paulo");
	
	require (INCLUDE_PHP_LIB . "/Mail/email_message.php");	
	require (INCLUDE_PHP_LIB . "/Mail/smtp_message.php");	
	require (INCLUDE_PHP_LIB . "/Mail/smtp.php");
	
	
	function enviarNotificacao( $from_name = '', $subject = 'Comunicado', $Mensagem = '', $to = '' ) {
		
		if(empty($from_name))
			$from_name = "Itacéu Tecnologia";
			
		$from = "notificacaoitaceu@itaceutecnologia.com.br";
		$to_name = "Acompanhamento";
		
		if( empty ( $to ) )
			$to = "saintclair.sousa@itaceutecnologia.com.br";
		
		$reply_name = $from_name;
		$reply_address = $from;
		$error_delivery_name = $from_name;
		$error_delivery_address = $from;
		
		$smtp = new smtp_message_class ();
		
		$smtp->localhost = "localhost";
		$smtp->smtp_host = "mail.itaceutecnologia.com.br";
		$smtp->smtp_user = $from;
		$smtp->smtp_password = "TXcL;4KfKvlF";
		$smtp->smtp_pop3_auth_host = "mail.itaceutecnologia.com.br";
		
		$smtp->SetEncodedEmailHeader ( "To", $to, $to_name );
		$smtp->SetEncodedEmailHeader ( "From", $from, $from_name );
		$smtp->SetEncodedEmailHeader ( "Reply-To", $reply_address, $reply_name );
		$smtp->SetHeader ( "Return-Path", $error_delivery_address );
		$smtp->SetEncodedEmailHeader ( "Errors-To", $error_delivery_address, $error_delivery_name );
		
		$html_message = "<html>
		<head><title>{$subject}</title>	</head>
		<body>
		<div class='principal'>
			<h1>{$subject}</h1>
			<div><p>$Mensagem</p></div>
		</div>
		</body>
		</html>";
	
		
		$smtp->CreateQuotedPrintableHTMLPart ( $html_message, "", $html_part );
		$alternative_parts = array( $html_part );
		$smtp->AddRelatedMultipart( $alternative_parts );
		
		$smtp->SetEncodedHeader ( "Subject", $subject );
		
		$error = $smtp->Send ();
		
		if( strcmp( $error, "" ) )
			error_log ( "A mensagem não pode ser enviada para $to.\nError: " . $error . "\n" );
	
	}

?>