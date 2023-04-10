<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <title>ACME ARTS - HOME PAGE</title>
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
			$sql = "SELECT paintingstable.idPaintings,
            paintingstable.title,
            paintingstable.finished,
            paintingstable.media,
            paintingstable.artistFK,
            paintingstable.style,
            paintingstable.imagePaintings,
            artisttable.artistName 
            FROM paintingstable
            INNER JOIN artisttable ON paintingstable.artistFK=artisttable.idArtist
            WHERE idPaintings = '".$_GET['id']."'";
	?>
		<?php
			foreach ($db->query($sql) as $row) {
		?>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class= "d-flex flex-column justify-content-end" >

						<h3 style="text-align:center;">Painting</h3>
						<?php echo '<img src = "data:Image/png;base64,'  . base64_encode($row['imagePaintings']) .  '"height = "500px""/>';?>
					</div>    
				</div>
				<div class="col">
					<h3 style="text-align:center;">Painting Details</h3>
					<table class="table bg-success" style="margin-left:0rem;margin-top:2rem;border:solid;">
						<tr>
							<th>Painting Title :</th>
							<td><?php echo $row['title']; ?></td>
						</tr>
						<tr>
							<th>Painting Year :</th>
							<td><?php echo $row['finished']; ?></td>
						</tr>
						<tr>
							<th>Painting Media :</th>
							<td><?php echo $row['media']; ?></td>
						</tr>
						<tr>
							<th>Painting Artist :</th>
							<td><?php echo $row['artistName']; ?></td>
						</tr>
						<tr>
							<th>Painting Style :</th>
							<td><?php echo $row['style']; ?></td>
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
			$database->close();
			?>
		</div>
		<script src="jquery.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>





<script src = "js/bootstrap.bundle.min.js"></script>
</body>
</html>
