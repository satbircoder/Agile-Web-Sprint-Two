<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Artist - ACME ARTS</title>
</head>
<script>
 $(document).ready(function(){
    $("#main").load("selectallpaintings.php");
     $("#style_dropdown").change(function(){
         var selected=$(this).val();
         $("#main").load("filterstyle.php",{selected_style: selected});
     });
     $("#artist_dropdown").change(function(){
        var selected=$(this).val();
         $("#main").load("filterartist.php",{selected_artist: selected});
     });
     $("#refresh").click(function(){
        $("#main").load("selectallpaintings.php");
    });
});
</script>
<body style = "background:lightgray;">
<?php
include_once('navbar.php');
?>
<div class ="container">
<h1 style = "text-align:center;">Paintings Gallery</h1>  
</div>
    <div class="container">
    <div class="card ">
    <div class="card-body bg-success">
    <h5 class="card-header text-center" style = "background:lightgray;">Paintings Browsing Section</h5>
    <form class="d-flex" style = "font-size:20px;margin-top:0.8rem"action="filtertitle.php" method="post">
            <input class="form-control me-2" style = "font-size:20px;" type="search" id="searchbox"name = "searchbox" placeholder="Search Painting Title">
            <button class="btn btn-primary" name = "searchbtn" type="submit">Search</button>
            </form>
    <form method = "post">
        <label for ="styleselect" style = "margin-top:0.8rem;font-size:20px;">Select Painting Style</label>
                <select name = "selectstyle" id="style_dropdown" class="form-select form-select-lg mb-3" aria-label=".form-select-lg">
                    <option selected="true" disabled="disabled">Select</option>
                    <?php
          include_once('connection.php');
          $database = new Connection();
          $db = $database->open();
          try
          {
            $sql = 'SELECT DISTINCT style FROM paintingstable ORDER BY style';
            foreach ($db->query($sql) as $row){
              ?>
            
              <option value = "<?php echo $row['style'] ?>"> <?php echo $row['style'] ?></option>
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
        </form>
        <form method = "POST">
        <label for ="artistselect" style = "font-size:20px;">Select An Artist</label>
                <select name = "artistselect" id = "artist_dropdown" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected="true" disabled="disabled">Select</option>
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
          <button type="button" name="refresh" id="refresh" class="btn btn-primary" onClick="window.location.reload();">Refresh</button>
          </form>
          </div>
          </div>
        </div>
      </div>
      </div> 
      <div class="container" id="main">
		
	    </div>
  <script src = "js/bootstrap.bundle.min.js"></script>
</body>
</html>