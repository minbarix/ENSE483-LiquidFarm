<?php

session_start();


$_SESSION['mintempmilk'] = $_POST["newmintempmilk"];
$_SESSION['maxtempmilk'] = $_POST["newmaxtempmilk"];
$_SESSION['minmf'] = $_POST["newminmf"];
$_SESSION['maxmf'] = $_POST["newmaxmf"];
$_SESSION['minbacc'] = $_POST["newminbacc"];
$_SESSION['maxbacc'] = $_POST["newmaxbacc"];

header('location: milk.php');
exit();
?>