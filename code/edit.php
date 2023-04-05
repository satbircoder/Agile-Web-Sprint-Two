<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$type1=$_POST['id'];
			$type2=$_POST['title'];
			$type3=$_POST['finished'];
			$type4=$_POST['media'];
			$type5=$_POST['artist'];
			$type6=$_POST['style'];
			$photo= fopen($_FILES[image][tmp_name], 'rb');

			$sql = "UPDATE paintingstable
            SET id = ':id',
            title = ':title',
            finished = ':finished',
            media = ':media',
            artist = ':artist',
            style = ':style',
            image = ':image'
            WHERE id = ':id'";
			$step=$db->prepare($sql);
			$step->bindParam(':id',$type1,PDO::PARAM_INT, 20);
			$step->bindParam(':title',$type2,PDO::PARAM_STR, 20);
			$step->bindParam(':finished',$type3,PDO::PARAM_INT, 20);
			$step->bindParam(':media',$type4,PDO::PARAM_STR, 20);
			$step->bindParam(':artist',$type5,PDO::PARAM_STR, 20);
			$step->bindParam(':style',$type6,PDO::PARAM_STR, 20);
			$step->bindParam(':image',$photo,PDO::PARAM_LOB);
			if($step->execute()){
				echo " Data has been updated";
			}
			else{
			echo " Not able to update data please contact Admin ";
				}
			
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//close connection
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Fill up update details first';
	}

	header('location: custom.php');

?>