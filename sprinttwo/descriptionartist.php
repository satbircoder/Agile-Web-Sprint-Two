<html>
<head>
	<meta charset="utf-8">
	<title>PHP CRUD Operation using PDO with Bootstrap/Modal1</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body style = "background:lightgray;">
<?php
include_once('navbar.php');
?>
<?php
	session_start();
	include_once('connection.php');

		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "SELECT * FROM artisttable WHERE idArtist = '".$_GET['idArtist']."'";
			?>
        	<?php
        	foreach ($db->query($sql) as $row) {
			?>
            
            
      <div class="container">
  <div class="row">
    <div class="col">
    <div class= "d-flex flex-column justify-content-end" >

    <h3 style="text-align:center;">Artist Image</h3>
    <?php echo '<img src = "data:Image/png;base64,'  . base64_encode($row['imageArtist']) .  '"height = "500px""/>';?>
          </div>    
    </div>
    <div class="col">
      <h3 style="text-align:center;">Artist's Details</h3>
    <table class="table bg-success" style="margin-left:0rem;margin-top:2rem;border:solid;">
				<tr>
                	<th>Artist Name :</th>
					<td><?php echo $row['artistName']; ?></td>
				</tr>
				<tr>
                	<th>Life Span :</th>
					<td><?php echo $row['artistBirth']; ?> - <?php echo $row['artistDeath']; ?></td>
				</tr>
				<tr>
                	<th>Artist Nationality :</th>
					<td><?php echo $row['artistNationality']; ?></td>
				</tr>
        </table>
    </div>
  </div>
              <?php    	
              }
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}
		//close connection
?>
<div class = "container">
<h3 style="text-align:center; margin-top:1rem; margin-bottom:0px;"> Paintings By <?php echo $row['artistName']; ?> </h3>
<?php

$sql1 = "SELECT * FROM paintingstable WHERE artistFK = '".$_GET['idArtist']."'";
 
foreach ($db->query($sql1) as $row1) {
?>
<table class="table bg-success" style="margin-left:0rem;margin-top:2rem;border:solid;">
				<tr>
                	<th>Painting Title :</th>
					<td><?php echo $row1['title']; ?></td>
				</tr>
				<tr>
                	<th>Painting Year :</th>
					<td><?php echo $row1['finished']; ?></td>
				</tr>
				<tr>
                	<th>Painting Media :</th>
					<td><?php echo $row1['media']; ?></td>
				</tr>
				<tr>
                	<th>Painting Style :</th>
					<td><?php echo $row1['style']; ?></td>
				</tr>
                <tr>
                	<th>Painting :</th>
					<td><?php echo '<img src = "data:image/png;base64,' . base64_encode($row1['imagePaintings']) . '" width = "200px" height = "200px"/>';?></td>
				</tr>
        </table>
<?php
}
$database->close();
?>
</div>
<script src = "js/bootstrap.bundle.min.js"></script>
</body>
</html>
            