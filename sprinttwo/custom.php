<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>ACME ARTS - HOME PAGE</title>
</head>
<body style = "background:lightgray;">
<?php 
include_once('navbar.php');
	?>
<div class="container">
	<h1 class="page-header text-center">Select Appropriate Button to Make Changes In Paintings</h1>
		<div class="col-sm-3">
			<a href="#addnew" class="btn btn-lg btn-success" data-bs-toggle="modal"><span><i class="fa fa-plus"></i></span> New Paintings</a>
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
            <?php include('add_modal.php'); ?>
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
						    $sql = 'SELECT paintingstable.*,
							artisttable.artistName 
							FROM paintingstable
							INNER JOIN artisttable ON paintingstable.artistFK=artisttable.idArtist
                            ORDER BY paintingstable.idPaintings'
                            ;
						    foreach ($db->query($sql) as $row) {
						    	?>
						    	<tr>
						    		<td><?php echo $row['idPaintings']; ?></td>
						    		<td><?php echo $row['title']; ?></td>
						    		<td><?php echo $row['finished']; ?></td>
						    		<td><?php echo $row['media']; ?></td>
						    		<td><?php echo $row['artistName']; ?></td>
						    		<td><?php echo $row['style']; ?></td>
									<td><?php echo '<img src = "data:image/png;base64,'  . base64_encode($row['imagePaintings']) . '" width = "200px" height = "200px"/>';?></td>
						    		<td>
						    			<a href="#edit_<?php echo $row['idPaintings']; ?>" class="btn btn-primary btn-sm" data-bs-toggle="modal"><span><i class="fa fa-edit"></i></span> Edit</a>
						    			<a href="#delete_<?php echo $row['idPaintings']; ?>" class="btn btn-danger btn-sm" data-bs-toggle="modal"><span><i class="fa fa-trash"></i></span> Delete</a>
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




<script src = "js/bootstrap.bundle.min.js"></script>
</body>
</html>