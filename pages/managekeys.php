<?php
require_once "databaseConnection.php";
session_start();

if(isset($_POST["login"])) {
    $provided_key = $_POST["text-field"];
    //echo $provided_key;
//Arrays to store key data

//Get All Keys
$get_keys_query = "SELECT * FROM pass WHERE pass=$provided_key";
$keys_result = $conn->query($get_keys_query) or die("error: ".mysqli_error($conn));
$keys_number = $keys_result->num_rows;
if($keys_number > 0) {
    while($keysData = $keys_result->fetch_assoc()) {
        $key = $keysData["pass"];
        $section = $keysData["section"];
        $done = $keysData["done"];

        echo "found";
        $_SESSION["key"] = $provided_key;
        $_SESSION["section"] = $section2;
        header("location: vote.php");
    }
} else {
    echo "INVALID KEY";
}
}
?>