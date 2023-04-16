<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HTML 5 Boilerplate</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            .header, .footer {
                background-color: rgb(51, 204, 51);
                color: white;
                height: 200px;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .container {
                width: 100vw;
                height: 110vh;
                background-color: rgb(20, 50, 100);
                color: white;
                display: flex;
                justify-content: center;
                align-items: center;
                position: sticky;
                top: 0;
            }

            .card:hover {
                cursor: pointer;
                transform: rotateY(180deg);
            }

            .card {
                height: 500px;
                width: 350px;
                transition: transform 1500ms;
                transform-style: preserve-3d;
            }

            .front,
            .back {
                height: 100%;
                width: 100%;
                backface-visibility: hidden;
            }

            .back {
                transform: rotateY(180deg);
            }
        </style>
    </head>
    <body>
        <div class="header">Header</div>
        <?php 
            include_once('connection.php');
            $database = new Connection();
            $db = $database->open();
            $sql = 'SELECT * FROM artisttable';
            foreach ($db->query($sql) as $row){
        ?>
            <!--<div class="card"><?php #echo $row['artistName'];?></div> -->
            <div class="container">
                <div class="card">
                    <div class="front"><?php echo '<img src = "data:image/png;base64,' . base64_encode($row['imageArtist']) . '" width = "100%" height = "100%"/>';?></div>
                    <div class="back">
                        <?php echo $row['artistName'];?>
                        <?php echo $row['artistBirth'];?> -
                        <?php echo $row['artistDeath'];?>
                        <?php echo $row['artistCentury'];?>th
                        <?php echo $row['artistNationality'];?>
                    </div>
                </div>
            </div>
        <?php
        }
            $database->close();
        ?>
        <div class="footer">Footer</div>
    </body>
</html>