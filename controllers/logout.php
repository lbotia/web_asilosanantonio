<?php 
session_start();
unset($_SESSION['usernme']);
session_destroy();

header('Location: ../index.php');


?>