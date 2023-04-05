<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Custom Page-Acme Arts</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
		<?php 
	include_once('navbar.php');
		?>
	<div class="container">
		<h1 class="page-header text-center">Select Appropriate Button to Make Changes</h1>
		<div class="row">
			<div class="col-sm-3">
				<a href="#addnew" class="btn bg-success" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> New</a>
				<?php 
					session_start();
					if(isset($_SESSION['message'])){
						?>
						<div class="alert alert-info text-center" style="margin-top:20px;">
							<?php echo $_SESSION['message']; ?>
						</div>
						<?php

						unset($_SESSION['message']);
					}
				?>
			</div>
			<table class="table bg-success" style="margin-top:20px;">
				<thead>
					<th>Id</th>
					<th>Title</th>
					<th>Finished</th>
					<th>Media</th>
					<th>Artist</th>
					<th>Style</th>
					<th>Painting</th>
					<th>Actions</th>
				</thead>
				<tbody>
					<?php
						//include our connection
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
							";
							foreach ($db->query($sql) as $row) {
								?>
								<tr>
									<td><?php echo $row['idPaintings']; ?></td>
									<td><?php echo $row['title']; ?></td>
									<td><?php echo $row['finished']; ?></td>
									<td><?php echo $row['media']; ?></td>
									<td><?php echo $row['artistName']; ?></td>
									<td><?php echo $row['style']; ?></td>
									<td><?php echo '<img src = "data:Image/png;base64,'  . base64_encode($row['image']) . '" width = "200px" height = "200px"/>';?></td>
									<td>
										<a href="#edit_<?php echo $row['id']; ?>" id="edit" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Edit</a>
										<a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Delete</a>
									</td>
									<?php include('edit_delete_modal.php'); ?>
								</tr>
								<?php 
							}
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						//close connection
						$database->close();

					?>
				</tbody>
			</table>
			
		</div>
	</div>

	<?php include('add_modal.php'); ?>
	<script src="jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>