
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <?php
include_once('navbar.php');
?>
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
    if(isset($_POST['searchbtn']))
    {
        $title = $_POST['searchbox'];
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
          WHERE title = '{$title}'";
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
       
    }
    
    $db = $database->close();

   
?>
 <script src="jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>