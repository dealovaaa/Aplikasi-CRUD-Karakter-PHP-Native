
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Character</title>
    <style>
               body {
            background-color: transparent;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        video {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1000;
            background-size: cover;
        }

        .container {
            position: relative;
            color: white;
            font-family: Arial, sans-serif;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            width: 50%;
            max-width: 500px;
            z-index: 1;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-top: 5px;
        }

        .form-group select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="white" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
            background-repeat: no-repeat;
            background-position-x: 100%;
            background-position-y: 50%;
            background-color: #333;
            color: white;
        }

        .container button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
        }

        .container button[type="submit"]:hover {
            background-color: #45a049;
        }

        .container .btn-secondary {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .container .btn-secondary:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <video src="pembuka.mp4" autoplay loop muted></video>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Character</title>
    <style>
       
    </style>
</head>
<body>
    

    <div class="container">
        <h2>Edit Karakter</h2>
        <?php
        include('config.php');

       
        if(isset($_GET['id']) && !empty(trim($_GET['id']))){
            
            $con = mysqli_connect("localhost", "root", "", "quis2");
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

            $id = mysqli_real_escape_string($con, $_GET['id']);
            $query = "SELECT * FROM characters WHERE id = $id";
            $result = mysqli_query($con, $query);

            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
            } else {
                echo "No character found with the provided ID.";
                exit();
            }

            mysqli_close($con);
        } else {
            echo "Invalid request. Please provide a character ID.";
            exit();
        }
        ?>
        <form action="process_edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="vision">Vision</label>
                <input type="text" name="vision" id="vision" value="<?php echo $row['vision']; ?>" required>
            </div>
            <div class="form-group">
                <label for="weapon">Weapon</label>
                <input type="text" name="weapon" id="weapon" value="<?php echo $row['weapon']; ?>" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" required>
                    <option value="Male" <?php if ($row['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if ($row['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="rarity">Rarity</label>
                <input type="text" name="rarity" id="rarity" value="<?php echo $row['rarity']; ?>" required>
            </div>
            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="text" name="birthday" id="birthday" value="<?php echo $row['birthday']; ?>" required>
            </div>
            <div class="form-group">
                <label for="link_api">API Link</label>
                <input type="text" name="link_api" id="link_api" value="<?php echo $row['link_api']; ?>" required>
            </div>
            <button type="submit">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
