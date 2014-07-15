<?php
	if(isset( $_GET['email']) && isset( $_GET['tel']))
	{
		$email = $_GET['email'];
		$tel =  $_GET['tel'];
		require_once 'connect.inc.php';
		$req1 = $connection->query("SELECT prospect_email FROM prospects WHERE prospect_email='$email' limit 1");
		$req2 = $connection->query("SELECT prospect_telephone FROM prospects WHERE prospect_telephone='$tel' limit 1");

		// On déroule la liste
		$chk_email = $req1->fetch(PDO::FETCH_ASSOC);
		$chk_tel = $req2->fetch(PDO::FETCH_ASSOC);

		if($chk_email >= 1 || $chk_tel >= 1)
		{
			echo '1';
		}
		else
		{
			echo '0';
		}
	}
?>