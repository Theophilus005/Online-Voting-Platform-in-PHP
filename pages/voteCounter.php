<?php
require_once "databaseConnection.php";

 //array to store data;
 $db_name = array();
 $db_position = array();
 $db_vote = array();

 $president = array();
 $president_names = array();
 $president_votes = array();

 $vice = array();
 $vice_names = array();
 $vice_votes = array();

 $organizers = array();
 $organizers_names = array();
 $organizers_votes = array();

 $finance = array();
 $finance_names = array();
 $finance_votes = array();

 $pro = array();
 $pro_names = array();
 $pro_votes = array();

 $secretary = array();
 $secretary_names = array();
 $secretary_votes = array();

 $get_all_data = "SELECT * FROM executives";
 $data_results = $conn->query($get_all_data);
 $data_results_num = $data_results->num_rows;
 if($data_results_num > 0) {
     while($data = $data_results->fetch_assoc()) {
         $db_name[] = $data["name"];
         $db_position[] = $data["position"];
         $db_vote[] = $data["vote"]; 
     }

     //Get all presidents
     for($i=0; $i<$data_results_num; $i++) {
     if($db_position[$i] == "president") {
         array_push($president_names, $db_name[$i]);
         array_push($president_votes, $db_vote[$i]);
     }

     if($db_position[$i] == "organizer") {
         array_push($organizers_names, $db_name[$i]);
         array_push($organizers_votes, $db_vote[$i]);
     }

     if($db_position[$i] == "vice") {
         array_push($vice_names, $db_name[$i]);
         array_push($vice_votes, $db_vote[$i]);
     }

     if($db_position[$i] == "secretary") {
         array_push($secretary_names, $db_name[$i]);
         array_push($secretary_votes, $db_vote[$i]);
     }

     if($db_position[$i] == "pro") {
         array_push($pro_names, $db_name[$i]);
         array_push($pro_votes, $db_vote[$i]);
     }

     if($db_position[$i] == "finance") {
         array_push($finance_names, $db_name[$i]);
         array_push($finance_votes, $db_vote[$i]);
     }

     }
 }

 if(isset($_GET["update_vote"])) {
 $all_votes = array_merge($organizers_votes, $pro_votes, $finance_votes, $secretary_votes, $vice_votes, $president_votes);
 echo(implode(" ", $all_votes));
 }
?>