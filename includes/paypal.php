<?php 



require 'paypal/autoload.php';

define('URL_SITIO', 'http://localhost/tech-conference/');


$apiContext = new \PayPal\Rest\ApiContext(
	new \PayPal\Auth\OAuthTokenCredential(
		'AVnxIWlfErCqIR0xm-XveW4BWR1gPSa8-cnp0gLFk3WLSfXL9RP0leb5P5vg2vrqxOgGhzq2QUYe1i31',     // ClientID
		'EOwqL_oIOgSGFw-cvhAtuaMNT0k4qPg179Pbzz01BylloLAI66xQcfg0l-kcm0NsTt5uAr9fr8FMqo6q'      // ClientSecret
	)
);



