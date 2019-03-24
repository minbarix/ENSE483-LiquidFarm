<?php
$conn = new mysqli("localhost", "root", "Fernandr00261463!", "mydatabase");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_GET["mode"];
$data = $_GET["data"];
$sql = "UPDATE Subscriptions SET sub = '$data' WHERE email = \"$email\"";
if($conn->query($sql) === TRUE){   
    true;
}  
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>