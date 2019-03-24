<?php

session_start();


$_SESSION['mintemp'] = $_POST["newmintemp"];
$_SESSION['maxtemp'] = $_POST["newmaxtemp"];
$_SESSION['mino2'] = $_POST["newmino2"];
$_SESSION['maxo2'] = $_POST["newmaxo2"];
$_SESSION['minph'] = $_POST["newminph"];
$_SESSION['maxph'] = $_POST["newmaxph"];

header('location: oiltest.php');
exit();
?>