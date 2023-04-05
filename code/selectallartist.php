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
          try
          {
            $sql = "SELECT * FROM artisttable
            ";
            foreach ($db->query($sql) as $row){
              ?>
            <tr>
              <td><?php echo $row['idArtist'];?></td>
              <td><?php echo $row['artistName'];?></td>
              <td><?php echo $row['artistBirth'];?></td>
              <td><?php echo $row['artistDeath'];?></td>
              <td><?php echo $row['artistNationality'];?></td>
              <td><?php echo '<img src = "data:image/png;base64,' . base64_encode($row['image']) . '" width = "200px" height = "200px"/>';?></td>
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