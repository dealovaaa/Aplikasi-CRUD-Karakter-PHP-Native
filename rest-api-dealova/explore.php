<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genshin Impact</title>
    <style>
       
        #bg-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        header {
            text-align: center;
            position: relative;
            color: white;
            padding-top: 20px;
            z-index: 1;
        }

        .features {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60vh;
            z-index: 1;
            position: relative;
            background-color: rgba(255, 255, 255, 0.5);
        }

        .feature {
            margin: 0 10px;
            border-radius: 50%;
            overflow: hidden;
            position: relative;
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .feature .image-container {
            position: relative;
            z-index: 1;
        }

        .feature .image-container img {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
            display: block;
            margin: 0 auto;
            transition: transform 0.3s ease;
        }

        .feature:hover .image-container img {
            transform: scale(1.1);
        }

        .feature:before {
            content: "";
            position: absolute;
            top: -10%;
            left: -10%;
            right: -10%;
            bottom: -10%;
            border-radius: 50%;
            background-color: rgba(128, 128, 128, 0.5);
            z-index: 0;
            transition: opacity 0.3s ease;
            opacity: 0;
        }

        .feature:hover:before {
            opacity: 1;
        }

        .add-button {
            text-align: center;
            margin-top: auto;
        }

        .add-button button {
            padding: 15px 25px;
            font-size: 20px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .add-button button:hover {
            background-color: darkblue;
        }

        .bg-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }

        .bg-text small {
            font-size: 16px;
        }

        .bg-text h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .bg-text button {
            padding: 10px 20px;
            font-size: 18px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .bg-text button:hover {
            background-color: #45a049;
        }

        header, footer {
            background-color: transparent;
        }

        .h1 {
            color: white;
        }

        /* CSS untuk tombol kembali */
        .back-button {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .back-button button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .back-button button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header id="header">
        <h1>Character Genshin Impact</h1>
    </header>

    <section id="home">
        <video id="bg-video" autoplay loop muted>
            <source src="pembuka.mp4" type="video/mp4">
        </video>
        <div class="back-button">
        <a href="index.php"><button>Kembali ke Index</button></a>
        </div>


        <section class="features">        
            <?php
            $con = mysqli_connect("localhost", "root", "", "quis2");
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

            $query = "SELECT * FROM characters";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $api_link = $row["link_api"];
                    $api_nama = $row["name"];
                    $api_id = $row["id"];

                   
                    if (!empty($api_link)) {
                        $api_response = file_get_contents($api_link);
                        
                        if ($api_response !== false) {
                            $api_data = json_decode($api_response, true);

                            echo '<div class="feature" data-id="' . $api_id . '" onclick="redirectToDetails(' . $api_id . ')">';
                            echo '<div class="image-container">';
                            echo '<img src="https://genshin.jmp.blue/characters/' . $api_nama . '/icon-big" alt="' . $api_nama . '">';
                            echo '</div>';
                            echo '</div>';
                        } else {
                            echo "Failed to fetch API data for character: " . $api_nama;
                        }
                    } else {
                        echo "Invalid API link for character: " . $api_nama;
                    }
                }
            } else {
                echo "No data available";
            }

            mysqli_close($con);
            ?>
        </section>

       
        <div class="add-button">
            <a href="add_character.php"><button>Tambah Karakter</button></a>
        </div>
    </section>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> @DealovaZevanyaManurung </p>
    </footer>

    <script>
        
        function redirectToDetails(id) {
            window.location.href = 'details.php?id=' + id;
        }

        
        function redirectToForm() {
            window.location.href = 'add_character.php';
        }
    </script>
</body>
</html>