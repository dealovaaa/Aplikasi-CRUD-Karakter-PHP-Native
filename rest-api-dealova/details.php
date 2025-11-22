<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genshin Impact</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

       
        #bg-video {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
        }

      
        .bg-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            z-index: 1;
        }

        .container {
            display: flex;
            flex-direction: row;
            max-width: 800px; 
            margin: 0 auto;
        }

        .image-container {
            flex: 1;
            margin-right: 20px;
            background-color: rgba(128, 128, 128, 0.5); 
            padding: 10px;
            border-radius: 5px;
            background-size: cover; 
            background-position: center; 
        }

        .character-details {
            flex: 2;
            background-color: rgba(128, 128, 128, 0.5); 
            padding: 20px;
            border-radius: 5px;
        }

       
        .character-table {
            width: 100%;
            margin-top: 20px;
        }

        .character-table td {
            padding: 5px 0;
        }

        .character-table .green-dark {
            color: #2ecc71;
            font-weight: bold;
        }

        
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn-container a {
            display: inline-block;
            margin-right: 10px;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            border: 1px solid #007bff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-container a:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-container button {
            display: inline-block;
            margin-right: 10px;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            color: white;
            background-color: #dc3545;
            border: 1px solid #dc3545;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-container button:hover {
            background-color: #bb2d3b;
            border-color: #bb2d3b;
        }
    </style>
</head>
<body>
    <section id="home">
        <video id="bg-video" autoplay loop muted poster="pembuka.mp4">
            <source src="pembuka.mp4" type="video/mp4">
        </video>
        <header id="header">
            <div class="textlogocontainer">
                <a href="#" class="text_logo">Genshin Impact</a>
            </div>

            <div id="toggle"></div>
            <div id="navbar"></div>
        </header>
    </section>

    <div class="bg-text">
        <div class="container">
            <?php
           
            $con = mysqli_connect("localhost", "root", "", "quis2");
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

           
            $id = isset($_GET['id']) ? $_GET['id'] : null;

           
            if (!empty($id)) {
              
                $query = "SELECT * FROM characters WHERE id = $id";
                $result = mysqli_query($con, $query);

              
                if (mysqli_num_rows($result) > 0) {
                   
                    $api_id = $id;

                    while($row = mysqli_fetch_assoc($result)) {
                        
                        $api_link = $row["link_api"];

                        
                        $api_response = file_get_contents($api_link);
                        $api_data = json_decode($api_response, true);
                        $api_img = $row["name"];
                        $api_name = $row["name"];
                        $api_vision = $row["vision"];
                        $api_weapon = $row["weapon"];
                        $api_gender = $row["gender"];
                        $api_rarity = $row["rarity"];
                        $api_birthday = $row["birthday"];

                        
                        if ($api_data) {
                            
                            echo "<div class='character-details'>";
                            echo "<h1>$api_name</h1>";
                            echo "<table class='character-table'>";
                            echo "<tr><td><span class='green-dark'>Title</span></td><td>{$api_data['title']}</td></tr>";
                            echo "<tr><td><span class='green-dark'>Vision</span></td><td>$api_vision</td></tr>";
                            echo "<tr><td><span class='green-dark'>Weapon</span></td><td>$api_weapon</td></tr>";
                            echo "<tr><td><span class='green-dark'>Gender</span></td><td>$api_gender</td></tr>";
                            echo "<tr><td><span class='green-dark'>Nation</span></td><td>{$api_data['nation']}</td></tr>";
                            echo "<tr><td><span class='green-dark'>Rarity</span></td><td>$api_rarity</td></tr>";
                            echo "<tr><td><span class='green-dark'>Release Date</span></td><td>{$api_data['release']}</td></tr>";
                            echo "<tr><td><span class='green-dark'>Constellation</span></td><td>{$api_data['constellation']}</td></tr>";
                            echo "<tr><td><span class='green-dark'>Birthday</span></td><td>$api_birthday</td></tr>";
                            echo "<tr><td><span class='green-dark'>Description</span></td><td>{$api_data['description']}</td></tr>";
                            echo "</table>";
                            echo "</div>";

                           
                            echo "<div class='image-container' style='background-image: url(\"https://genshin.jmp.blue/characters/$api_img/card\");'></div>";
                        } else {
                            echo "Failed to fetch character data.";
                        }
                    }
                } else {
                    echo "0 results";
                }
            } else {
                echo "No character ID provided.";
            }

           
            mysqli_close($con);
            ?>
        </div>
        <div class="btn-container">
            <form method="POST">
                <input type="hidden" name="delete_id" value="<?php echo $api_id; ?>">
                <a href="edit_character.php?id=<?php echo $api_id; ?>" class="edit-btn">Edit</a>
                <button type="submit" class="delete-btn" name="delete">Delete</button>
                <a href="explore.php" class="back-btn">Kembali</a>
            </form>
        </div>
    </div>

    <?php
   
    $con = mysqli_connect("localhost", "root", "", "quis2");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

   
    if(isset($_POST['delete'])) {
        
        $delete_id = $_POST['delete_id'];
        
        
        $delete_query = "DELETE FROM characters WHERE id = $delete_id";
        
       
        if(mysqli_query($con, $delete_query)) {
            echo "<script>alert('Data deleted successfully');</script>";
            echo "<script>window.location.href='index.php';</script>"; 
        } else {
            echo "Error deleting record: " . mysqli_error($con);
        }
    }

   
    mysqli_close($con);
    ?>
</body>
</html>
