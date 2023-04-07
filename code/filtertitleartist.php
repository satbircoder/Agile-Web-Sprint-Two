
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <?php
include_once('navbar.php');
?>
<table class="table bg-success" style="margin-top:20px;">
				<thead>
                <th>Name</th>
                <th>Birth Year</th>
                <th>Death Year</th>
                <th>Century</th>
                <th>Nationality</th>
                <th>Portrait</th>
				</thead>
				<tbody>

<?php
    include_once('connection.php');
    $database = new Connection();
    $db = $database->open();
    if(isset($_POST['searchbtn']))
    {
        $name = $_POST['searchboxartist'];
        try
        {
          $sql = "SELECT * FROM artisttable
          WHERE artistName LIKE '%{$name}%'";
          foreach ($db->query($sql) as $row){
        ?>
        <tr>
        <td><?php echo $row['artistName']; ?></td>
        <td><?php echo $row['artistBirth'];?></td>  
        <td><?php echo $row['artistDeath'];?></td>  
        <td><?php echo $row['artistCentury'];?></td>  
        <td><?php echo $row['artistNationality'];?></td>  
        <td><?php echo '<img src = "data:Image/png;base64,' . base64_encode($row['imageArtist']) . '" width = "200px" height = "200px"/>';?></td>  
        </tr>
        <?php
        }
        }
        catch(PDOException $ex){
            echo "There is some problem in connection". $ex->getMessage();
        }
    
    }
    
    $db = $database->close();


?>
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>