
<div class="modal fade" id="editartist_<?php echo $row['idArtist']; ?>" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myeditModal" style = "text-align=center">Edit Artist Details:</h4>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="editartist.php?idArtist=<?php echo $row['idArtist']; ?>" enctype="multipart/form-data">
                <div class="row form-group" style="margin-bottom:0.8rem;">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Artist ID:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="idArtist" value="<?php echo $row['idArtist']; ?>" readonly>
					</div>
				</div>
                <div class="row form-group" style="margin-bottom:0.8rem;">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Artist Name:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="artistName" value="<?php echo $row['artistName']; ?>">
					</div>
				</div>
				<div class="row form-group" style="margin-bottom:0.8rem;">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Artist Birth:</label>
					</div>
					<div class="col-sm-8">
						<input type="number" class="form-control" name="artistBirth" value="<?php echo $row['artistBirth']; ?>">
					</div>
				</div>
				<div class="row form-group" style="margin-bottom:0.8rem;">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Artist Death:</label>
					</div>
					<div class="col-sm-8" style="margin-bottom:0.8rem;">
                    <input type="number" class="form-control" name ="artistDeath" value="<?php echo $row['artistDeath']; ?>" onkeyup='ValueChange(this.value);'>
					</div>
				</div>
				<div class="row form-group" style="margin-bottom:0.8rem;">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Artist Century:</label>
					</div>
					<div class="col-sm-8">
                    <input type="number" class="form-control"  name = "artistCentury" value="<?php echo $row['artistCentury']; ?>" readonly>
					</div>
				</div>
				<div class="row form-group" style="margin-bottom:0.8rem;">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Artist Nationality:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="artistNationality" value="<?php echo $row['artistNationality']; ?>">
					</div>
				</div>
				<div class="row form-group" style="margin-bottom:0.8rem;">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Select Artist Image:</label>
					</div>
					 <div class="col-sm-8">
					 <input type="file" class="form-control" name="imageArtist" style="margin-bottom:0.8rem;">
					 <?php
					echo '<img src = "data:image/png;base64,' . base64_encode($row['imageArtist']) . '" width = "200px" height = "200px"/>';?>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer" style="margin-bottom:0.8rem;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="editartist" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>
        </div>
    </div>
</div>
