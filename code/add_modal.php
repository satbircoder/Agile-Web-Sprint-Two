<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addLabel" aria-hidden="true">
    <?php
        include_once('connection.php');
        $database = new Connection();
        $db = $database->open();
    ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="text-align:center;" id="addLabel">Add New Paintings</h1>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form method="POST" action="add.php" enctype="multipart/form-data">
                        <!-- <div class="row form-group" style="margin-bottom:0.8rem;">
                                <div class="col-sm-4">
                                    <label class="control-label" style="position: relative; top: 7px;">Painting Id</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name = "id">
                                </div>
                            </div> -->
                             <div class="row form-group" style="margin-bottom:0.8rem;">
                                <div class="col-sm-4">
                                    <label class="control-label" style="position: relative; top: 7px;">Painting Title:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name = "title">
                                </div>
                            </div>
                            <div class="row form-group" style="margin-bottom:0.8rem;">
                                <div class="col-sm-4">
                                    <label class="control-label" style="position: relative; top: 7px;">Finished</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name = "finished">
                            </div>
                        </div>
                        <div class="row form-group" style="margin-bottom:0.8rem;">
                            <div class="col-sm-4">
                                <label class="control-label" style="position: relative; top: 7px;">Media</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name = "media" list = "paintingMedias">
                                <datalist id="paintingMedias">
                                    <?php
                                        $sql = 'SELECT DISTINCT media
                                        FROM paintingstable
                                        ORDER BY media';
                                            foreach ($db->query($sql) as $row){
                                            ?>
                                            <option value="<?php echo $row['media'];?>">
                                        <?php 
                                        }
                                    ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="row form-group" style="margin-bottom:0.8rem;">
                            <div class="col-sm-4">
                                <label class="control-label" style="position: relative; top: 7px;">Artist:</label>
                            </div>
                            <div class="col-sm-8">
                        <select name = "artistFK" id = "artist_dropdown" class="form-control">
                        <option selected>Select</option>
                    <?php
          try
          {
            $sql = "SELECT DISTINCT paintingstable.artistFK,
            artisttable.artistName 
            FROM paintingstable
            INNER JOIN artisttable ON paintingstable.artistFK=artisttable.idArtist
            ORDER BY artisttable.artistName
            ";
            foreach ($db->query($sql) as $row){
              ?>
            
              <option value = "<?php echo $row['artistFK'] ?>"> <?php echo $row['artistName'] ?></option>
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
                                <label class="control-label" style="position: relative; top: 7px;">Style:</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name = "style" list = "paintingStyles">
                                <datalist id="paintingStyles">
                                    <?php
                                        $sql = 'SELECT DISTINCT style
                                        FROM paintingstable
                                        ORDER BY style';
                                            foreach ($db->query($sql) as $row){
                                            ?>
                                            <option value="<?php echo $row['style'];?>">
                                        <?php 
                                        }
                                    ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="row form-group" style="margin-bottom:0.8rem;">
                            <div class="col-sm-4">
                                <label class="control-label" style="position: relative; top: 7px;">Select Display Image:</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name = "image">
                            </div>
                        </div>
                        <div class="modal-footer" style="margin-bottom:0.8rem;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" name = "add" class="btn bg-success">Save</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>