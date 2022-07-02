<?php
session_start();
unset($_SESSION["key"]);
unset($_SESSION["section"]);
setcookie("key", "", time()-60, "/");
setcookie("section", "", time()-60, "/");
session_destroy();
header("location: ../index.php");

?>