<?php
	// Connexion au serveur
	try {
		$dns = 'mysql:host=localhost;dbname=iphonecash';
		$utilisateur = 'root';
		$motDePasse = '';
		$connection = new PDO( $dns, $utilisateur, $motDePasse );
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch ( Exception $e ) {
	  	echo "Connection à MySQL impossible : ", $e->getMessage();
	  	die();
	}

?>