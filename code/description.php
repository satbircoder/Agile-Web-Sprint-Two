<html>
	<head>
		<meta charset="utf-8">
		<title>PHP CRUD Operation using PDO with Bootstrap/Modal1</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body class = "bg-success">
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