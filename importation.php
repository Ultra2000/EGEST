<?php 
	// include('functions.php');
	// $pdo = pdo_connect_mysql();
	$connection  = mysqli_connect('localhost', 'root', '', 'egest');
	$msg = '';
	session_start();
	
	$filename = 'BD/egest.sql';
	$handle = fopen($filename, "r+");
	$contents = fread($handle,filesize($filename));

	$sql = explode(';', $contents);

	foreach($sql as $query){
		$result = mysqli_query($connection,$query);
		if($result){
			$msg = 'successfuly import';
			header('Location:import_bd.php');
		}
	}
	fclose($handle);
	
?>