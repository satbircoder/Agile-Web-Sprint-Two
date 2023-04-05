<table class="table bg-success" style="margin-top:20px;">
				<thead>
                <th>Artist</th>
                <th>Date of Birth</th>
                <th>Date of Death</th>
                <th>Nationallity</th>
                <th>Century</th>
                <th></th>
				</thead>
				<tbody>
<?php
    include_once('connection.php');
    $database = new Connection();
    $db = $database->open();
    $value = $_POST['selected_century'];
    //$value = trim($value);
    try
    {
      $sql = "SELECT * FROM artisttable WHERE artistCentury = '{$value}'";
      foreach ($db->query($sql) as $row){
    ?>
    
    <tr>
        <td><?php echo $row['artistName'];?></td>
        <td><?php echo $row['artistBirth'];?></td>
        <td><?php echo $row['artistDeath'];?></td>
        <td><?php echo $row['artistNationality'];?></td>
        <td><?php echo $row['artistCentury'];?></td>
        <td><?php echo '<img src = "data:image/png;base64,' . base64_encode($row['imageArtist']) . '" width = "200px" height = "200px"/>';?></td>
    </tr>
    <?php
    }
    }
    catch(PDOException $ex){
        echo "There is some problem in connection". $ex->getMessage();
      }
    $db = $database->close();

   
?>