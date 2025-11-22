<?php

$con = mysqli_connect("localhost", "root", "", "quis2");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}


if(isset($_POST['name']) && isset($_POST['vision']) && isset($_POST['weapon']) && isset($_POST['gender']) && isset($_POST['rarity']) && isset($_POST['birthday']) && isset($_POST['link_api'])) {
  
    $name = $_POST['name'];
    $vision = $_POST['vision'];
    $weapon = $_POST['weapon'];
    $gender = $_POST['gender'];
    $rarity = $_POST['rarity'];
    $birthday = $_POST['birthday'];
    $api_link = $_POST['link_api'];

 
    $insert_query = "INSERT INTO characters (name, vision, weapon, gender, rarity, birthday, link_api) 
                    VALUES ('$name', '$vision', '$weapon', '$gender', '$rarity', '$birthday', '$api_link')";
    if(mysqli_query($con, $insert_query)) {
 
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "Form data is incomplete. Please provide all required fields.";
   
}
?>
