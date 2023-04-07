<?php
	session_start();
	include_once('connection.php');
	if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$type1=$_POST['idPaintings'];
			$type2=$_POST['title'];
			$type3=$_POST['finished'];
			$type4=$_POST['media'];
			$type5=$_POST['artistFK'];
			$type6=$_POST['style'];
			$photo= fopen($_FILES[image][tmp_name], 'rb');
			$query="Insert Into paintingstable (idPaintings, title, finished, media, artistFK, style, image)
    		Values (:id, :title, :finished, :media, :artist, :style, :image)";
			$step=$db->prepare($query);
			$step->bindParam(':id',$type1,PDO::PARAM_INT, 20);
			$step->bindParam(':title',$type2,PDO::PARAM_STR, 20);
			$step->bindParam(':finished',$type3,PDO::PARAM_INT, 20);
			$step->bindParam(':media',$type4,PDO::PARAM_STR, 20);
			$step->bindParam(':artist',$type5,PDO::PARAM_STR, 20);
			$step->bindParam(':style',$type6,PDO::PARAM_STR, 20);
			$step->bindParam(':image',$photo,PDO::PARAM_LOB);
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