<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['idPaintings'];?>" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel" style = "text-align=center">Edit Paintings</h4>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit.php?idPaintings=<?php echo $row['idPaintings']; ?>" enctype="multipart/form-data">
            <div class="row form-group" style="margin-bottom:0.8rem;">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Painting ID:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="idPaintings" value="<?php echo $row['idPaintings']; ?>" readonly>
					</div>
				</div>
				<div class="row form-group" style="margin-bottom:0.8rem;">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Title:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>">
					</div>
				</div>
				<div class="row form-group" style="margin-bottom:0.8rem;">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Finished:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="finished" value="<?php echo $row['finished']; ?>">
					</div>
				</div>
				<div class="row form-group" style="margin-bottom:0.8rem;">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Media:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="media" value="<?php echo $row['media']; ?>">
					</div>
				</div>
				<div class="row form-group" style="margin-bottom:0.8rem;">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Artist:</label>
					</div>
					<div class="col-sm-8" >
                    <select name = "artistFK" class="form-control">
                        <option value = "<?php echo $row['artistFK'] ?>" selected><?php echo $row['artistName']; ?></option>
                    <?php
          include_once('connection.php');
          $database = new Connection();
          $db = $database->open();
          try
          {
            $sql = "SELECT DISTINCT paintingstable.artistFK,
            artisttable.artistName 
            FROM paintingstable
            INNER JOIN artisttable ON paintingstable.artistFK=artisttable.idArtist
            ORDER BY artisttable.artistName
            ";
            foreach ($db->query($sql) as $row1){
              ?>
              <option value = "<?php echo $row1['artistFK'] ?>"> <?php echo $row1['artistName'] ?></option>
          </div>
        <?php
            }
          }
          catch(PDOException $ex){
            echo "There is some problem in connection". $ex->getMessage();
          }
          $database->close();
          ?>
          </select>
                   
					</div>
				</div>
				<div class="row form-group" style="margin-bottom:0.8rem;">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Style:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="style" value="<?php echo $row['style']; ?>">
					</div>
				</div>
				<div class="row form-group" style="margin-bottom:0.8rem;">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Select Image:</label>
					</div>
					<div class="col-sm-8">
						<input type="file" class="form-control" name="imagePaintings" style="margin-bottom:0.8rem;">
                        <?php
					echo '<img src = "data:image/png;base64,' . base64_encode($row['imagePaintings']) . '" width = "200px" height = "200px"/>';?>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer" style="margin-bottom:0.8rem;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['idPaintings']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel">Delete Paintings</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['title'].' by '.$row['artistName']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete.php?id=<?php echo $row['idPaintings']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>
