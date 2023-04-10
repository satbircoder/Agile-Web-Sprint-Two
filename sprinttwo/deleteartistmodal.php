<div id="deleteartist_<?php echo $row['idArtist']; ?>" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title">Delete Artist</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo 'Artist ' .$row['artistName'].' from '.$row['artistNationality']; ?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="deleteartist.php?idArtist=<?php echo $row['idArtist']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>
        </div>
    </div>
</div>