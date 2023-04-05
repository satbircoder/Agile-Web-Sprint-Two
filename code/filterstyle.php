<table class="table bg-success" style="margin-top:20px;">
				<thead>
                <th>Title</th>
                <th>Finished</th>
                <th>Media</th>
                <th>Artist</th>
                <th>Style</th>
                <th>Painting</th>
				</thead>
				<tbody>
<?php
    include_once('connection.php');
    $database = new Connection();
    $db = $database->open();
    $value = $_POST['selected_style'];
    //$value = trim($value);
    try
    {
      $sql = "SELECT paintingstable.idPaintings,
            paintingstable.title,
            paintingstable.finished,
            paintingstable.media,
            paintingstable.artistFK,
            paintingstable.style,
            paintingstable.imagePaintings,
            artisttable.artistName 
            FROM paintingstable
            INNER JOIN artisttable ON paintingstable.artistFK=artisttable.idArtist
            WHERE paintingstable.style = '{$value}'
            ";
      foreach ($db->query($sql) as $row){
    ?>
    
    <tr>
    <td><?php echo $row['title']; ?></td>  
    <td><?php echo $row['finished'];?></td>  
    <td><?php echo $row['media'];?></td>  
    <td><?php echo $row['artistName'];?></td>  
    <td><?php echo $row['style'];?></td>  
    <td><?php echo '<img src = "data:Image/png;base64,' . base64_encode($row['imagePaintings']) . '" width = "200px" height = "200px"/>';?></td>  
    </tr>
    <?php
    }
    }
    catch(PDOException $ex){
        echo "There is some problem in connection". $ex->getMessage();
      }
    $db = $database->close();

   
?>