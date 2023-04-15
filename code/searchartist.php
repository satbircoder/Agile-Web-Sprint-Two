<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <title>ACME ARTS - SEARCH ARTIST PAGE</title>
</head>
<body style = "background:lightgray;">
<?php
    include_once('connection.php');
    $database = new Connection();
    $db = $database->open();
    if(isset($_POST['searchbtnArtist']))
    {
        $artistName = $_POST['searchboxArtist'];
        try
        {
          $sql = "SELECT * FROM artisttable WHERE artistName LIKE '%{$artistName}%'";
          foreach ($db->query($sql) as $row){
        ?>
        <div class="container">
  <div class="row">
    <div class="col">
    <div class= "d-flex flex-column justify-content-end" >

    <h3 style="text-align:center;">Artist Image</h3>
    <?php echo '<img src = "data:Image/png;base64,'  . base64_encode($row['imageArtist']) .  '"height = "500px""/>';?>
          </div>    
    </div>
    <div class="col">
      <h3 style="text-align:center;">Artist's Details</h3>
    <table class="table bg-success" style="margin-left:0rem;margin-top:2rem;border:solid;">
				<tr>
                	<th>Artist Name :</th>
					<td><?php echo $row['artistName']; ?></td>
				</tr>
				<tr>
                	<th>Life Span :</th>
					<td><?php echo $row['artistBirth']; ?> - <?php echo $row['artistDeath']; ?></td>
				</tr>
				<tr>
                	<th>Artist Nationality :</th>
					<td><?php echo $row['artistNationality']; ?></td>
				</tr>
        </table>
    </div>
  </div>
        <?php
        }
        }
        catch(PDOException $ex){
            echo "There is some problem in connection". $ex->getMessage();
          }
       
    }
    
    $db = $database->close();

   
?>


<script src = "js/bootstrap.bundle.min.js"></script>
</body>
</html>