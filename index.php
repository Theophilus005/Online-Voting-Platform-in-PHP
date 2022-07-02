<?php
require_once "pages/databaseConnection.php";
session_start();

if(isset($_COOKIE["key"]) && isset($_COOKIE["section"])) {
    $key = $_COOKIE["key"];
    $section = $_COOKIE["section"];
    $_SESSION["key"] = $key;
    header("location: pages/vote.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOSA - LOGIN</title>
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/login.js"></script>
</head>
<body>
 <input type="hidden" id="name" value="<?php echo $username ?>">
    <input type="hidden" id="user_id" value="<?php echo $user_id ?>">
    <input type="hidden" id="shop" value="<?php echo $shop ?>">

    <!--Modal Box-->
    <div class="modal-container">
        <div class="modal-alert">
        <div class="modal-first-div">CPSTORE says:</div>     
        <div class="modal-second-div">
            <div class="modal-message"> Please log in to start selling on this platform</div>
            <div class="modal-buttons">
            <button class="action-button">Got it</button>
            <button class="okay-close" onclick="closeModal()">Okay</button>
            </div>
        </div>     
        <div class="modal-third-div"></div>     
        </div>
    </div>


    <div class="main-login-div">
        <div class="login-div">
            <div class="header">MOSA Executives Online Voting Platform</div>
            <form action="pages/managekeys.php" method="POST" class="login-inner-div">
                <div>
                <span>Enter the SMS key to vote</span>
                <span class="status"></span>
                </div>
                <input type="text" name="text-field" class="voter-key-text" required>
                <button name="login"> LOG IN </button>
</form>
        </div>
    </div>
</body>
</html>