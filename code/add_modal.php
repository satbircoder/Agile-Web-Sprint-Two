
    <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="text-align:center;" id="addLabel">Add New Paintings</h1>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form method="POST" action="add.php" enctype="multipart/form-data">
                        <div class="row form-group">
                                <div class="col-sm-4">
                                    <label class="control-label" style="position: relative; top: 7px;">Painting Id</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name = "id">
                                </div>
                            </div>
                             <div class="row form-group">
                                <div class="col-sm-4">
                                    <label class="control-label" style="position: relative; top: 7px;">Painting Title:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name = "title">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">
                                    <label class="control-label" style="position: relative; top: 7px;">Finished</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name = "finished">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label" style="position: relative; top: 7px;">Media</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name = "media">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label" style="position: relative; top: 7px;">Artist:</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name = "artist">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label" style="position: relative; top: 7px;">Style:</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name = "style">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-4">
                                <label class="control-label" style="position: relative; top: 7px;">Select Display Image:</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name = "image">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" name = "add" class="btn bg-success">Save</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
