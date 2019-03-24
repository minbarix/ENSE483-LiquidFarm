<?php
$conn = new mysqli("localhost", "root", "Fernandr00261463!", "mydatabase");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_GET["mode"];
$sql = "SELECT sub FROM Subscriptions WHERE email = \"$email\"";
$result = $conn->query($sql);

if($result->num_rows==1){   
    $row = $result->fetch_assoc();
    print json_encode($row); 
}  
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>