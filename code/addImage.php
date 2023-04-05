<?php
	session_start();
	include_once('connection.php');
	if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$type1=$_POST['name'];
			$photo= fopen($_FILES[image][tmp_name], 'rb');
			$query="INSERT INTO paintingstable (idPaintings, imagePaintings)
    		Values (:id, :image1)";
			$step=$db->prepare($query);
			$step->bindParam(':id',$type1,PDO::PARAM_INT, 20);
			$step->bindParam(':image1',$photo,PDO::PARAM_LOB);
			if($step->execute()){
				echo " Data with Image is added to newThing";
			}
			else{
			echo " Not able to add data please contact Admin ";
				}
			}
			catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
			}

		//close connection
		$database->close();
	}

	else{
		$_SESSION['message'] = 'Fill up Add form first';
	}

	header('location: custom.php');
	
?>