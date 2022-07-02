<?php
require_once "databaseConnection.php";
session_start();

  //array to store data;
  $db_name = array();
  $db_position = array();
  $db_vote = array();

  $president_imgs = array();
  $president_names = array();
  $president_votes = array();

  $vice_imgs = array();
  $vice_names = array();
  $vice_votes = array();

  $organizers_imgs = array();
  $organizers_names = array();
  $organizers_votes = array();

  $finance_imgs = array();
  $finance_names = array();
  $finance_votes = array();

  $pro_imgs = array();
  $pro_names = array();
  $pro_votes = array();

  $secretary_imgs = array();
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
          $db_img[] = $data["img"]; 
      }

      //Get all presidents
      for($i=0; $i<$data_results_num; $i++) {
      if($db_position[$i] == "president") {
          array_push($president_names, $db_name[$i]);
          array_push($president_votes, $db_vote[$i]);
          array_push($president_imgs, $db_img[$i]);
      }

      if($db_position[$i] == "organizer") {
          array_push($organizers_names, $db_name[$i]);
          array_push($organizers_votes, $db_vote[$i]);
          array_push($organizers_imgs, $db_img[$i]);
      }

      if($db_position[$i] == "vice") {
          array_push($vice_names, $db_name[$i]);
          array_push($vice_votes, $db_vote[$i]);
          array_push($vice_imgs, $db_img[$i]);
      }

      if($db_position[$i] == "secretary") {
          array_push($secretary_names, $db_name[$i]);
          array_push($secretary_votes, $db_vote[$i]);
          array_push($secretary_imgs, $db_img[$i]);
      }

      if($db_position[$i] == "pro") {
          array_push($pro_names, $db_name[$i]);
          array_push($pro_votes, $db_vote[$i]);
          array_push($pro_imgs, $db_img[$i]);
      }

      if($db_position[$i] == "finance") {
          array_push($finance_names, $db_name[$i]);
          array_push($finance_votes, $db_vote[$i]);
          array_push($finance_imgs, $db_img[$i]);
      }

      }
  }

if(isset($_SESSION["key"])) {
    $key = $_SESSION["key"];
    //check voter section
    $check_section = "SELECT section from pass WHERE pass= '$key'";
    $section_result = $conn->query($check_section);
    if($section_result->num_rows > 0) {
        $section_object = $section_result->fetch_object();
        $section = $section_object->section;
    }
    
} else {
    header("location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote</title>
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/vote.css">
    <script></script>
</head>
<body onload="sectionCheck()">
    <div class="navbar">
        <div class="first-nav">
            MOSA
        </div>
        <div class="second-nav">
            <?php echo "Hi, ".$key ?>
            <a href="logout.php" class="logout">Log Out</a>
        </div>
    </div>

        <!--Results Section-->
        <div class="results-main-div">
            <div class="results-inner-div">
                <div class="success">You have successfully voted</div>
                <div class="charts">
                    <div class="chart-row-1">
                    <div class="president">
                        <div id="stat-header">
                            <span>President</span>
                            <span class="stat-total-votes">30votes</span>
                        </div>
                        <div id="stat-content">
                    <?php
                        for($i=0; $i<count($president_names); $i++) {
                        echo <<<STATCONTENT
                      
                            <div id="result-card">
                            <span>{$president_names[$i]}  <span class="stat-vote">(10 votes)</span></span>
                            <div id="progressDiv">
                            <div id="progressbar">
                                <div id="progress-inner-div"></div>
                            </div>
                            <span id="vote-percentage">80%</span>
                            </div>
                            </div>
                        
STATCONTENT;
                        }
                    ?>
                    </div>
                    </div>

                    <div class="vice">
                    <div id="stat-header">
                            <span>Vice President</span>
                            <span class="stat-total-votes">30votes</span>
                        </div>
                        <div id="stat-content">
                        <?php
                        for($i=0; $i<count($vice_names); $i++) {
                        echo <<<STATCONTENT
                      
                            <div id="result-card">
                            <span>{$vice_names[$i]}  <span class="stat-vote">(10 votes)</span></span>
                            <div id="progressDiv">
                            <div id="progressbar">
                                <div id="progress-inner-div"></div>
                            </div>
                            <span id="vote-percentage">80%</span>
                            </div>
                            </div>
                        
STATCONTENT;
                        }
                    ?>
                        </div>
                    </div>

                    <div class="secretary">
                    <div id="stat-header">
                            <span>Secretary</span>
                            <span class="stat-total-votes">30votes</span>
                        </div>
                        <div id="stat-content">
                        <?php
                        for($i=0; $i<count($secretary_names); $i++) {
                        echo <<<STATCONTENT
                      
                            <div id="result-card">
                            <span>{$secretary_names[$i]}  <span class="stat-vote">(10 votes)</span></span>
                            <div id="progressDiv">
                            <div id="progressbar">
                                <div id="progress-inner-div"></div>
                            </div>
                            <span id="vote-percentage">80%</span>
                            </div>
                            </div>
                        
STATCONTENT;
                        }
                    ?>
                        </div>
                    </div>

                    </div>

                    <div class="chart-row-2">
                    <div class="finance">
                    <div id="stat-header">
                            <span>Financial Secretary</span>
                            <span class="stat-total-votes">30votes</span>
                        </div>
                        <div id="stat-content">
                        <?php
                        for($i=0; $i<count($finance_names); $i++) {
                        echo <<<STATCONTENT
                      
                            <div id="result-card">
                            <span>{$finance_names[$i]}  <span class="stat-vote">(10 votes)</span></span>
                            <div id="progressDiv">
                            <div id="progressbar">
                                <div id="progress-inner-div"></div>
                            </div>
                            <span id="vote-percentage">80%</span>
                            </div>
                            </div>
                        
STATCONTENT;
                        }
                    ?>
                        </div>
                    </div>

                    <div class="pro">
                    <div id="stat-header">
                            <span>PUBLIC RELATIONS OFFICER</span>
                            <span class="stat-total-votes"> 30votes</span>
                        </div>
                        <div id="stat-content">
                        <?php
                        for($i=0; $i<count($pro_names); $i++) {
                        echo <<<STATCONTENT
                      
                            <div id="result-card">
                            <span>{$pro_names[$i]}  <span class="stat-vote">(10 votes)</span></span>
                            <div id="progressDiv">
                            <div id="progressbar">
                                <div id="progress-inner-div"></div>
                            </div>
                            <span id="vote-percentage">80%</span>
                            </div>
                            </div>
                        
STATCONTENT;
                        }
                    ?>
                        </div>
                    </div>

                    <div class="organizer">
                    <div id="stat-header">
                            <span>Organizer</span>
                            <span class="stat-total-votes">30votes</span>
                        </div>
                        <div id="stat-content">
                        <?php
                        for($i=0; $i<count($organizers_names); $i++) {
                        echo <<<STATCONTENT
                      
                            <div id="result-card">
                            <span>{$organizers_names[$i]}  <span class="stat-vote">(10 votes)</span></span>
                            <div id="progressDiv">
                            <div id="progressbar">
                                <div id="progress-inner-div"></div>
                            </div>
                            <span id="vote-percentage">80%</span>
                            </div>
                            </div>
                        
STATCONTENT;
                        }
                    ?>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>

        
    <div class="main-vote-div">
        <!-- Loading div -->
        <div class="loading-main-div">
            <div id="loading-lottie"></div>
        </div>

        <input type="hidden" id="section" value="<?php echo $section ?>">

        <div class="voter-div">

            <!--organizer section-->
            <div class="wrapper" id="organizer">
            <div class="header">ORGANIZER</div>
            <div class="vote-section">

            <?php
                for($i=0; $i<count($organizers_names); $i++) {
                    echo <<<ORGANIZER
                    <div class="participant">
                <div class="name">{$organizers_names[$i]}</div>
                <div class="image"><img src="../{$organizers_imgs[$i]}" alt="" class="pic"></div>
                <span class="vote-count">{$organizers_votes[$i]}</span>
                <button onclick="vote('{$organizers_names[$i]}', '0')" class="vote-button" id="0">Vote</button>
            </div>

ORGANIZER;
                }
            ?>
            
        </div>
        </div>

        <!--pro section-->
        <div class="wrapper" id="pro">
            <div class="header">PUBLIC RELATIONS OFFICER</div>
            <div class="vote-section">
            <?php
                for($i=0; $i<count($pro_names); $i++) {
                    echo <<<ORGANIZER
                    <div class="participant">
                <div class="name">{$pro_names[$i]}</div>
                <div class="image"><img src="../{$pro_imgs[$i]}" alt="" class="pic"></div>
                <span class="vote-count">{$pro_votes[$i]}</span>
                <button onclick="vote('{$pro_names[$i]}', '1')" class="vote-button" id="1">Vote</button>
            </div>

ORGANIZER;
                }
            ?>
        </div>
        </div>

        <!--finance secretary section-->
        <div class="wrapper" id="finance">
            <div class="header">FINANCIAL SECRETARY</div>
            <div class="vote-section">
            <?php
                for($i=0; $i<count($finance_names); $i++) {
                    echo <<<ORGANIZER
                    <div class="participant">
                <div class="name">{$finance_names[$i]}</div>
                <div class="image"><img src="../{$finance_imgs[$i]}" alt="" class="pic"></div>
                <span class="vote-count">{$finance_votes[$i]}</span>
                <button onclick="vote('{$finance_names[$i]}', '2')" class="vote-button" id="2">Vote</button>
            </div>

ORGANIZER;
                }
            ?>
        </div>
        </div>

        <!--secretary section -->
        <div class="wrapper" id="secretary">
            <div class="header">SECRETARY</div>
            <div class="vote-section">
            <?php
                for($i=0; $i<count($secretary_names); $i++) {
                    echo <<<ORGANIZER
                    <div class="participant">
                <div class="name">{$secretary_names[$i]}</div>
                <div class="image"><img src="../{$secretary_imgs[$i]}" alt="" class="pic"></div>
                <span class="vote-count">{$secretary_votes[$i]}</span>
                <button onclick="vote('{$secretary_names[$i]}', '3')" class="vote-button" id="3">Vote</button>
            </div>

ORGANIZER;
                }
            ?>
        </div>
        </div>

        <!--vice secretary -->
        <div class="wrapper" id="vice">
            <div class="header">VICE PRESIDENT</div>
            <div class="vote-section">
            <?php
                for($i=0; $i<count($vice_names); $i++) {
                    echo <<<ORGANIZER
                    <div class="participant">
                <div class="name">{$vice_names[$i]}</div>
                <div class="image"><img src="../{$vice_imgs[$i]}" alt="" class="pic"></div>
                <span class="vote-count">{$vice_votes[$i]}</span>
                <button onclick="vote('{$vice_names[$i]}', '4')" class="vote-button" id="4">Vote</button>
            </div>

ORGANIZER;
                }
            ?>
        </div>
        </div>


        <!--president section-->
        <div class="wrapper" id="president">
            <div class="header">PRESIDENT</div>
            <div class="vote-section">
            <?php
                for($i=0; $i<count($pro_names); $i++) {
                    echo <<<ORGANIZER
                    <div class="participant">
                <div class="name">{$president_names[$i]}</div>
                <div class="image"><img src="../{$president_imgs[$i]}" alt="" class="pic"></div>
                <span class="vote-count">{$president_votes[$i]}</span>
                <button onclick="vote('{$president_names[$i]}', '5')" class="vote-button" id="5">Vote</button>
            </div>

ORGANIZER;
                }
            ?>
        </div>
        </div>

    
        </div>
    </div>

<script src="../js/lottie.js"></script>
<script src="../js/vote.js"></script>
</body>
</html>