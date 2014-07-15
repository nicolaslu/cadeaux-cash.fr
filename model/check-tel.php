<?php

	
	if(isset( $_GET['tel']))
	{
		$tel = $_GET['tel'];
		require_once 'connect.inc.php';
		$req = $connection->query("SELECT prospect_telephone FROM prospects WHERE prospect_telephone='$tel' limit 1");

		// On déroule la liste
		$chk_tel = $req->fetch(PDO::FETCH_ASSOC);

		if($chk_tel >= 1)
		{
			echo '1';
		}
		else
		{
			echo '0';
		}
	}
?>