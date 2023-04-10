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
    $("#mainArtist").load("selectallartist.php");
     $("#nationality_dropdown").change(function(){
         var selected=$(this).val();
         $("#mainArtist").load("filternationality.php",{selected_nationality: selected});
     });
     $("#century_dropdown").change(function(){
        var selected=$(this).val();
         $("#mainArtist").load("filtercentury.php",{selected_century: selected});
     });
     $("#refreshArtist").click(function(){
        $("#mainArtist").load("selectallartist.php");
    });
});
</script>
<body style = "background:lightgray;">
<?php
include_once('navbar.php');
?>
<div class ="container">
<h1 style = "text-align:center;">Artist's Gallery</h1>  
</div>
    <div class="container">
    <div class="card ">
    <div class="card-body bg-success">
    <h5 class="card-header text-center" style = "background:lightgray;">Artist Browsing Section</h5>
    <form class="d-flex" style = "font-size:20px;margin-top:0.8rem"action="searchartist.php" method="post">
            <input class="form-control me-2" style = "font-size:20px;" type="search" name = "searchboxArtist" placeholder="Search Artists">
            <button class="btn btn-primary" name = "searchbtnArtist" type="submit">Search</button>
            </form>
    <form method = "post">
        <label for ="selectnationality" style = "margin-top:0.8rem;font-size:20px;">Select Artist Nationality</label>
                <select name = "selectnationality" id="nationality_dropdown" class="form-select form-select-lg mb-3" aria-label=".form-select-lg">
                    <option selected>Select</option>
                    <?php
          include_once('connection.php');
          $database = new Connection();
          $db = $database->open();
          try
          {
            $sql = 'SELECT DISTINCT artistNationality FROM artisttable';
            foreach ($db->query($sql) as $row){
              ?>
            
              <option value = "<?php echo $row['artistNationality'] ?>"> <?php echo $row['artistNationality'] ?></option>
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
        <label for ="selectcentury" style = "font-size:20px;">Select A Century Period</label>
                <select name = "selectcentury" id = "century_dropdown" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                    <option selected>Select</option>
                    <?php
          include_once('connection.php');
          $database = new Connection();
          $db = $database->open();
          
          try
          {
            $sql = 'SELECT DISTINCT artistCentury FROM artisttable';
            foreach ($db->query($sql) as $row){
              ?>
            
              <option value = "<?php echo $row['artistCentury'] ?>"> <?php echo $row['artistCentury'] ?></option>
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
          <button type="button" name="refresh" id="refreshArtist" class="btn btn-primary">Refresh</button>
          </form>
           
            
          </div>
          </div>
        </div>
      </div>
      </div> 
      <div class="container" id="mainArtist">
		
	    </div>
  <script src = "js/bootstrap.bundle.min.js"></script>
</body>
</html>