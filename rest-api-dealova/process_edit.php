<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $vision = trim($_POST['vision']);
    $weapon = trim($_POST['weapon']);
    $gender = trim($_POST['gender']);
    $rarity = trim($_POST['rarity']);
    $birthday = trim($_POST['birthday']);
    $api_link = trim($_POST['link_api']);

  
    $con = mysqli_connect("localhost", "root", "", "quis2");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $query = "UPDATE characters SET name='$name', vision='$vision', weapon='$weapon', gender='$gender', rarity='$rarity', birthday='$birthday', link_api='$api_link' WHERE id=$id";

    if(mysqli_query($con, $query)){
       
        header("location: details.php");
        exit();
    } else {
        echo "Error updating character data: " . mysqli_error($con);
    }

    mysqli_close($con);
} else {
    echo "Invalid request method.";
}
?>
