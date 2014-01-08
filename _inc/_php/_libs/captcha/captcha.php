<?php

	session_start();		
	
	$captcha = imagecreate(160,50);
	
	imagecolorallocate( $captcha,0,0,0 );
	
	

	$text = str_shuffle( substr( md5( uniqid('') ),-9,9) );

	$_SESSION['txt_captcha'] = $text;
	
	$font = "akbar.ttf"; ///usr/share/fonts/TTF/
	
	$color = imagecolorallocate($captcha,255,255,255);
	

	
	imagettftext( $captcha,20,0,15,35,$color,$font, $text );
	
	header ("Content-type: image/png");
	
	imagepng( $captcha );
	
	imagedestroy( $captcha );
	
	
	
	
?>

