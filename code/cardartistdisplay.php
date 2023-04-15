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

            .card {
                width: 100vw;
                height: 100vh;
                background-color: rgb(20, 50, 100);
                color: white;
                display: flex;
                justify-content: center;
                align-items: center;
                position: sticky;
                top: 0;
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
        <div class="card"><?php echo '<img src = "data:image/png;base64,' . base64_encode($row['imageArtist']) . '" width = "40%" height = "40%"/>';?><?php echo $row['artistName'];?></div>

        
        <?php
        }
            $database->close();
        ?>
        <div class="footer">Footer</div>
    </body>
</html>