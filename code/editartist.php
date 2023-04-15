 <?php  
	session_start();
	include_once('connection.php');

	if(isset($_POST['editartist'])){
		$database = new Connection();
		$db = $database->open();
       
		try{
            $id = $_GET['idArtist'];
			$artistName = $_POST['artistName'];
			$artistBirth = $_POST['artistBirth'];
			$artistDeath = $_POST['artistDeath'];
			$artistCentury = $_POST['artistCentury'];
			$artistNationality = $_POST['artistNationality'];
			if(!($_FILES['imageArtist']['error'] == 4 || ($_FILES['imageArtist']['size'] == 0 && $_FILES['imageArtist']['error'] == 0))){
				$photo= fopen($_FILES['imageArtist']['tmp_name'], 'rb');
				$sql = "UPDATE artisttable
				SET artistName = :artistName,
				artistBirth = :artistBirth,
				artistDeath = :artistDeath,
				artistCentury = :artistCentury,
				artistNationality = :artistNationality,
				imageArtist = :imageArtist
				WHERE idArtist = '$id'";
				//if-else statement in executing our query
				$step=$db->prepare($sql);
				$step->bindParam(':artistName',$artistName,PDO::PARAM_STR, 20);
				$step->bindParam(':artistBirth',$artistBirth,PDO::PARAM_INT, 20);
				$step->bindParam(':artistDeath',$artistDeath,PDO::PARAM_INT, 20);
				$step->bindParam(':artistCentury',$artistCentury,PDO::PARAM_INT, 20);
				$step->bindParam(':artistNationality',$artistNationality,PDO::PARAM_STR, 20);
				$step->bindParam(':imageArtist',$photo,PDO::PARAM_LOB);
				if($step->execute()){
				   $_SESSION['message'] = 'Artist details updated as requested successfully 11';
				}
				else{
					$_SESSION['message']  = 'Not able to add data please contact Admin ';
				}	
			}
			else{
				$sql = "UPDATE artisttable SET artistName = :artistName, artistBirth = :artistBirth, artistDeath = :artistDeath, artistCentury = :artistCentury, artistNationality = :artistNationality WHERE idArtist = '$id'";
				//if-else statement in executing our query
				$step=$db->prepare($sql);
				$step->bindParam(':artistName',$artistName,PDO::PARAM_STR, 20);
				$step->bindParam(':artistBirth',$artistBirth,PDO::PARAM_INT, 20);
				$step->bindParam(':artistDeath',$artistDeath,PDO::PARAM_INT, 20);
				$step->bindParam(':artistCentury',$artistCentury,PDO::PARAM_INT, 20);
				$step->bindParam(':artistNationality',$artistNationality,PDO::PARAM_STR, 20);
				if($step->execute()){
				   $_SESSION['message'] = 'Artist details updated as requested successfully 22';
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

	header('location: customartist.php');

?> 