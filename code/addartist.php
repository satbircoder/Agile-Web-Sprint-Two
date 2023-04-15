<?php
	session_start();
	include_once('connection.php');
	if(isset($_POST['addartist'])){//addartist name of the button in addartist modal
		$database = new Connection();
		$db = $database->open();
		try{
			$type1=$_POST['artistName'];
			$type2=$_POST['artistBirth'];
			$type3=$_POST['artistDeath'];
            $type4=$_POST['artistCentury']; 
			$type5=$_POST['artistNationality'];
			$photo= fopen($_FILES['imageArtist']['tmp_name'], 'rb');
			$query="Insert Into artisttable (artistName, artistBirth, artistDeath, artistCentury, artistNationality, imageArtist)
    		Values (:artistName, :artistBirth, :artistDeath, :artistCentury, :artistNationality, :imageArtist)";
			$step=$db->prepare($query);
			$step->bindParam(':artistName',$type1,PDO::PARAM_STR, 20);
			$step->bindParam(':artistBirth',$type2,PDO::PARAM_INT, 20);
			$step->bindParam(':artistDeath',$type3,PDO::PARAM_INT, 20);
			$step->bindParam(':artistCentury',$type4,PDO::PARAM_INT, 20);
			$step->bindParam(':artistNationality',$type5,PDO::PARAM_STR, 20);
			$step->bindParam(':imageArtist',$photo,PDO::PARAM_LOB);
			if($step->execute()){
               $_SESSION['message'] = 'Artist added successfully';
			}
			else{
			$_SESSION['message']  = 'Not able to add data please contact Admin ';
				}
			}
			catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
			}

		//close connection
		$database->close();
	}

	else{
		$_SESSION['message'] = 'Fill up Add Artist form first';
	}

	header('location: customartist.php');
	
?>