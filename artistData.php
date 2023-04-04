<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Question 1</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
    include_once ('navbar1.php');
        $link = mysqli_connect("localhost", "adminer", "P@ssw0rd", "sprint2db");

        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
		$variable = $_GET['id'];
        $sql = "SELECT * FROM artisttable
        WHERE idArtist = $variable";
	    if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                echo "<div class='card text-white bg-primary mb-4' style='margin:60px 10px 20px'>";
            	    echo "<table>";
                        	echo "<th>ID</th>";
                        	echo "<th>Artist Name</th>";
                          	echo "<th>Artist Birth</th>";
                          	echo "<th>Artist Death</th>";
                          	echo "<th>Artist Nationality</th>";
                          	echo "<th>Image</th>";
            	    while($row = mysqli_fetch_array($result)){
                    	echo "<tr>";
                    	    echo "<td>" . $row['idArtist'] . "</td>";
                        	echo "<td>" . $row['artistName'] . "</td>";
                        	echo "<td>" . $row['artistBirth'] . "</td>";
                        	echo "<td>" . $row['artistDeath'] . "</td>";
                        	echo "<td>" . $row['artistNationality'] . "</td>";
                            echo "<td>" . '<img src = "data:Image/png;base64,' . base64_encode($row['Image']) . '" width = "200px" height = "200px"/>' . "</td>";
                    		#echo "<td>" . "<a href='editform.php?Item=".$row['Id']."&&Title=".$row['Title']."&&Finished=".$row['Finished']."&&Media=".$row['Media']."&&Artist=".$row['Artist']."&&Style=".$row['Style']."'>Text ID </a>" . "<a> Text5</a>" . "</td>";
                    	echo "</tr>";
            	    }
            	    echo "</table>";
        	    echo "</div>";
                // Free result set
                mysqli_free_result($result);
            } else{
                echo "No records matching your query were found.";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        mysqli_close($link);
    ?>
</body>