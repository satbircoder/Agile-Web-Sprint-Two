<table class="table bg-success" style="margin-top:20px;">
				<thead>
                <th>Name</th>
                <th>Lifespan</th>
                <th>Century</th>
                <th>Nationality</th>
                <th>Artist</th>
				</thead>
				<tbody>
<?php
          include_once('connection.php');
          $database = new Connection();
          $db = $database->open();
          try
          {
            $sql = 'SELECT * FROM artisttable';
            foreach ($db->query($sql) as $row){
              ?>
            <tr>
              <td><a href = "descriptionartist.php?idArtist=<?php echo $row['idArtist']; ?>" style="text-decoration:none; color:black;"><?php echo $row['artistName'];?></a></td>
              <td><?php echo $row['artistBirth'];?> - <?php echo $row['artistDeath'];?></td>
              <td><?php echo $row['artistCentury'];?></td>
              <td><?php echo $row['artistNationality'];?></td>
              <td><?php echo '<img src = "data:image/png;base64,' . base64_encode($row['imageArtist']) . '" width = "200px" height = "200px"/>';?></td>
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