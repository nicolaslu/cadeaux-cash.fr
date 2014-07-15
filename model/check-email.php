<?php

	
	if(isset( $_GET['email']))
	{
		$email = $_GET['email'];
		require_once 'connect.inc.php';
		$req = $connection->query("SELECT prospect_email FROM prospects WHERE prospect_email='$email' limit 1");

		// On déroule la liste
		$chk_email = $req->fetch(PDO::FETCH_ASSOC);

		if($chk_email >= 1)
		{
			echo '1';
		}
		else
		{
			echo '0';
		}
	}
?>