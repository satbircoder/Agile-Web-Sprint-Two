<table class="table bg-success" style="margin-top:20px;">
				<thead>
                <th>Name</th>
                <th>Lifespan</th>
                <th>Nationality</th>
                <th>Artist</th>
				</thead>
				<tbody>
<?php
          include_once('connection.php');
          $database = new Connection();
          $db = $database->open();
          $value = $_POST['selected_century'];
          try
          {
            $sql = "SELECT * FROM artisttable WHERE artistCentury = '{$value}'";
            foreach ($db->query($sql) as $row){
              ?>
            <tr>
              <td><?php echo $row['artistName'];?></a></td>
              <td><?php echo $row['artistBirth'];?> - <?php echo $row['artistDeath'];?></td>
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