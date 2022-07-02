<?php
require_once "databaseConnection.php";
session_start();

$positions = array("organizer", "pro", "finance", "secretary", "vice", "president");


if(isset($_GET["name"]) && isset($_GET["pos"])) {
    $name = $_GET["name"];
    $pos = $_GET["pos"];
    $key = $_SESSION["key"];

    //Get the votes
$get_votes = "SELECT vote FROM executives WHERE name='$name' AND position='$positions[$pos]'";
$get_votes_result = $conn->query($get_votes) or die("Connection failed".mysqli_error($conn));
$get_votes_num = $get_votes_result->num_rows;
if($get_votes_num > 0) {
    $vote_object = $get_votes_result->fetch_object();
    $vote = $vote_object->vote;
}

    if(isset($vote)) {
    $new_vote = $vote+1;

    //Update the votes 
    $update_votes = "UPDATE executives SET vote = '$new_vote' WHERE name='$name' AND position = '$positions[$pos]'";
    $conn->query($update_votes);

    //Update section
    $update_section = "UPDATE pass SET section=$pos WHERE pass='$key'";
    if($conn->query($update_section)) {
        echo $pos;
    }
    }
}

?>