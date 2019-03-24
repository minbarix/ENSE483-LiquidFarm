<?php

session_start();


$_SESSION['minalc'] = $_POST["newminalc"];
$_SESSION['maxalc'] = $_POST["newmaxalc"];
$_SESSION['minuv'] = $_POST["newminuv"];
$_SESSION['maxuv'] = $_POST["newmaxuv"];
$_SESSION['minhumidity'] = $_POST["newminhumidity"];
$_SESSION['maxhumidity'] = $_POST["newmaxhumidity"];

header('location: winery.php');
exit();
?>