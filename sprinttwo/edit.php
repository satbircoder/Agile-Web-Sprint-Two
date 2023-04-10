<?php  
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
       
		try{
            $id = $_GET['idPaintings'];
			$title = $_POST['title'];
			$finished = $_POST['finished'];
			$media = $_POST['media'];
			$artistFK = $_POST['artistFK'];
			$style = $_POST['style'];
			$photo= fopen($_FILES[imagePaintings][tmp_name], 'rb');

			if($photo != null){
				$sql = "UPDATE paintingstable SET title = :title, finished = :finished, media = :media, artistFK = :artistFK, style = :style, imagePaintings = :imagePaintings WHERE idPaintings = '$id'";
				//if-else statement in executing our query
				$step=$db->prepare($sql);
				$step->bindParam(':title',$title,PDO::PARAM_STR, 20);
				$step->bindParam(':finished',$finished,PDO::PARAM_INT, 20);
				$step->bindParam(':media',$media,PDO::PARAM_STR, 20);
				$step->bindParam(':artistFK',$artistFK,PDO::PARAM_STR, 20);
				$step->bindParam(':style',$style,PDO::PARAM_STR, 20);
				$step->bindParam(':imagePaintings',$photo,PDO::PARAM_LOB);
				if($step->execute()){
				   $_SESSION['message'] = 'Paintings details updated as requested successfully';
				}
				else{
				$_SESSION['message']  = 'Not able to add data please contact Admin ';
			}
			}
			else{
				$sql = "UPDATE paintingstable SET title = :title, finished = :finished, media = :media, artistFK = :artistFK, style = :style WHERE idPaintings = '$id'";
				//if-else statement in executing our query
				$step=$db->prepare($sql);
				$step->bindParam(':title',$title,PDO::PARAM_STR, 20);
				$step->bindParam(':finished',$finished,PDO::PARAM_INT, 20);
				$step->bindParam(':media',$media,PDO::PARAM_STR, 20);
				$step->bindParam(':artistFK',$artistFK,PDO::PARAM_STR, 20);
				$step->bindParam(':style',$style,PDO::PARAM_STR, 20);
				if($step->execute()){
				   $_SESSION['message'] = 'Paintings details updated as requested successfully';
				}
				else{
				$_SESSION['message']  = 'Not able to add data please contact Admin ';
			}
			}
			
     }
        catch(PDOException $e){
        $_SESSION['message'] = $e->getMessage();
        }
    }
	else{
		$_SESSION['message'] = 'Fill up update details first';
	}

	header('location: custom.php');

?> 