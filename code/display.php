<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Acme Arts - All Paintings</title>
    <script type="text/javascript">
		$(document).ready(function(){
			$("#main").load("selectall.php");
			$("#style_dropdown").change(function(){
				var selected=$(this).val();
				$("#main").load("filterstyle.php",{selected_style: selected});
			});
            $("#artist_dropdown").change(function(){
				var selected=$(this).val();
				$("#main").load("filterartist.php",{selected_artist: selected});
			});
			$("#refresh").click(function(){
				$("#main").load("selectall.php");
			});
		});
	</script>
</head>
<body>
    <?php
    include_once('navbar.php');
    ?>
    <div class="row">
  <div class="col">
  <form method = "post">
    <label for ="styleselect" class = "control-label col-sm-6">Select A Style</label>
    <div class = "col-sm-6">
    <select name = "styleselect" class="form-control" id = "style_dropdown">
        <option>----Select----</option> 
        <?php
          include_once('connection.php');
          $database = new Connection();
          $db = $database->open();
          try
          {
            $sql = 'SELECT DISTINCT style 
            FROM paintingstable
            ORDER BY style';
            foreach ($db->query($sql) as $row){
              //echo $row['style'];
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
    </div>
    </form>
  </div>
  <div class="col">
  <form method = "post">
    <label for ="artistselect" class = "control-label col-sm-6">Select Artist</label>
    <div class = "col-sm-6">
    <select name = "artistselect" class="form-control" id = "artist_dropdown">
        <option>----Select----</option> 
        <?php
          include_once('connection.php');
          $database = new Connection();
          $db = $database->open();
          try
          {
            #$sql = 'SELECT DISTINCT artistFK FROM paintingstable';
            $sql = "SELECT DISTINCT paintingstable.artistFK,
            artisttable.artistName 
            FROM paintingstable
            INNER JOIN artisttable ON paintingstable.artistFK=artisttable.idArtist
            ORDER BY artisttable.artistName
            ";
            foreach ($db->query($sql) as $row){
              //echo $row['style'];
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
    </form>
  </div>
  <div class="col">
  <button type="button" name="refresh" id="refresh" class="btn btn-primary">Refresh</button>
   </div>
</div>
   
    <div class="d-flex" id="main">
		
	</div>
     <script src="jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
   
</body>
</html>