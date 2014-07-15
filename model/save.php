<?php
	require_once 'connect.inc.php';

	$prenom = $_POST['prenom'];;
	$nom = $_POST['nom'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];

	$kdo = $_POST['kdo'];
	$date = date('Y-m-d');
	if(isset($_POST['rue']))
		$rue = $_POST['rue'];
	else
		$rue = null;
	if(isset($_POST['cp']))
		$cp = $_POST['cp'];
	else
		$cp = null;
	if(isset($_POST['ville']))
		$ville = $_POST['ville'];
	else
		$ville = null;

	$insert = $connection->prepare('INSERT INTO prospects (prospect_firstname,prospect_name,prospect_email,prospect_telephone,prospect_gift,registration_date,prospect_street, prospect_zipcode, prospect_city) 
		VALUES(:prospect_firstname, :prospect_name, :prospect_email, :prospect_telephone, :prospect_gift, :registration_date, :prospect_street, :prospect_zipcode, :prospect_city)');
	try {
	  		// On rempli les paramètres
			$insert->bindParam(':prospect_firstname', $prenom, PDO::PARAM_STR, 50);
			$insert->bindParam(':prospect_name', $nom, PDO::PARAM_STR, 50);
			$insert->bindParam(':prospect_email', $email,PDO::PARAM_STR, 100);
			$insert->bindParam(':prospect_telephone', $tel, PDO::PARAM_STR, 10);
			$insert->bindParam(':prospect_gift', $kdo , PDO::PARAM_STR, 255);
			$insert->bindParam(':registration_date', $date , PDO::PARAM_STR);
			$insert->bindParam(':prospect_street', $rue , PDO::PARAM_STR, 255);
			$insert->bindParam(':prospect_zipcode', $cp , PDO::PARAM_INT);
			$insert->bindParam(':prospect_city', $ville , PDO::PARAM_STR, 255);

		  	// On exécute
		  	$success = $insert->execute();
	   
	  	if( $success ) {
	    	header('location:../index.html');
	  	}  
	  	else
	  	{
	  		echo "Enregistrement echoue";
	  	}
	}catch( Exception $e ){
	  	echo 'Erreur de requète : ', $e->getMessage();
	}
?>