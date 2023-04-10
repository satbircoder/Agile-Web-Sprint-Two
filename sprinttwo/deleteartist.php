<?php
	session_start();
	include_once('connection.php');

	if(isset($_GET['idArtist'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM artisttable WHERE idArtist = '".$_GET['idArtist']."'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Artist deleted successfully' : 'Something went wrong. Cannot delete Artists';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//close connection
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Select Artist to delete first';
	}
	header('location: customartist.php');
?>