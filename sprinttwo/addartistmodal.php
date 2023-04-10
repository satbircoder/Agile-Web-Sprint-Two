<div id="addartistModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="text-align:center;" id="addArtistLabel">Add New Artist</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="POST" action="addartist.php" enctype="multipart/form-data">
                             <div class="row form-group" style="margin-bottom:0.8rem;">
                                <div class="col-sm-4">
                                    <label class="control-label" style="position: relative; top: 7px;">Artist Name:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name = "artistName">
                                </div>
                            </div>
                            <div class="row form-group" style="margin-bottom:0.8rem;">
                                <div class="col-sm-4">
                                    <label class="control-label" style="position: relative; top: 7px;">Year Of Birth</label>
                                </div>
                                <div class="col-sm-8">
                                <input type="number" class="form-control" name = "artistBirth">
                                </div>
                            </div>
                            <div class="row form-group" style="margin-bottom:0.8rem;">
                                <div class="col-sm-4">
                                <label class="control-label" style="position: relative; top: 7px;">Year Of Death</label>
                                </div>
                                <div class="col-sm-8" style="margin-bottom:0.8rem;">
                                <input type="number" class="form-control" name = "artistDeath" onkeyup='ValueChange(this.value);'>
                                </div>
                            </div>
                            <div class="row form-group" style="margin-bottom:0.8rem;">
                                <div class="col-sm-4">
                                <label class="control-label" style="position: relative; top: 7px;">Artist Century:</label>
                                </div>
                                <div class="col-sm-8" style="margin-bottom:0.8rem;">
                                <input type="text" class="form-control"  name = "artistCentury" readonly>
                                </div>
                            </div>
                            <div class="row form-group" style="margin-bottom:0.8rem;">
                                <div class="col-sm-4">
                                <label class="control-label" style="position: relative; top: 7px;">Artist Nationality:</label>
                                </div>
                                <div class="col-sm-8">
                                <input type="text" class="form-control" name = "artistNationality">
                                </div>
                            </div>
                            <div class="row form-group" style="margin-bottom:0.8rem;">
                                <div class="col-sm-4">
                                <label class="control-label" style="position: relative; top: 7px;">Select Artist Image:</label>
                                </div>
                                <div class="col-sm-8">
                                <input type="file" class="form-control" name = "imageArtist">
                                </div>
                            </div>
                            <div class="modal-footer" style="margin-bottom:0.8rem;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" name = "addartist" class="btn bg-success">Save</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>