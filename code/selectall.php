
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
            ";
            foreach ($db->query($sql) as $row){
              ?>
            <tr>
              <td><a href = "description.php?id=<?php echo $row['idPaintings']; ?>" style="text-decoration:none; color:black;"><?php echo $row['title'];?></a></td>
              <td><?php echo $row['finished'];?></td>
              <td><?php echo $row['media'];?></td>
              <td><?php echo $row['artistName'];?></td>
              <td><?php echo $row['style'];?></td>
              <td><?php echo '<img src = "data:image/png;base64,' . base64_encode($row['imagePaintings']) . '" width = "200px" height = "200px"/>';?></td>
            </tr>
            <?php
            }
          }
          catch(PDOException $ex){
            echo "There is some problem in connection". $ex->getMessage();
          }
          $database->close();
          ?>
      </tbody>
    </table>