
<?php
session_start();
if (!$_SESSION['user_login']) {
    header("Location: login.php");
}

?>
