<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Acme Arts - All Artists</title>
    <script type="text/javascript">
		$(document).ready(function(){
			$("#main").load("selectallartist.php");
			$("#nationality_dropdown").change(function(){
				var selected=$(this).val();
				$("#main").load("filternationality.php",{selected_nationality: selected});
			});
            $("#century_dropdown").change(function(){
				var selected=$(this).val();
				$("#main").load("filtercentury.php",{selected_century: selected});
			});
			$("#refresh").click(function(){
				$("#main").load("selectallartist.php");
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
    <label for ="nationalityselect" class = "control-label col-sm-6">Select by Nationality</label>
    <div class = "col-sm-6">
    <select name = "nationalityselect" class="form-control" id = "nationality_dropdown">
        <option>----Select----</option> 
        <?php
          include_once('connection.php');
          $database = new Connection();
          $db = $database->open();
          try
          {
            $sql = 'SELECT DISTINCT artistNationality 
            FROM artisttable
            ORDER BY artistNationality';
            foreach ($db->query($sql) as $row){
              //echo $row['style'];
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
    </div>
    </form>
  </div>
  <div class="col">
  <form method = "post">
    <label for ="centuryselect" class = "control-label col-sm-6">Sort by Century</label>
    <div class = "col-sm-6">
    <select name = "centuryselect" class="form-control" id = "century_dropdown">
        <option>----Select----</option> 
        <?php
          include_once('connection.php');
          $database = new Connection();
          $db = $database->open();
          try
          {
            $sql = 'SELECT DISTINCT artistCentury
            FROM artisttable
            ORDER BY artistCentury';
            foreach ($db->query($sql) as $row){
              //echo $row['style'];
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