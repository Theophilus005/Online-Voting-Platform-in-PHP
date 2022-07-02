<?php
require "databaseConnection.php";

if(isset($_GET["key"])) {
    $pass = $_GET["key"];
    $section = -1;
    $done = 0;

    //Record the key
    $insert_pass = "INSERT INTO pass(pass,section,done) VALUES ('$pass', $section, $done)";
    if($conn->query($insert_pass)) {
        echo "pass inserted";
    } else {
        echo "pass not inserted";
    }
}

?>