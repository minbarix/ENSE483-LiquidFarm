<?php
if (isset($_GET["email"])) {
    Session_Start();
    //Create a database connection:
    $conn = new mysqli("localhost", "root", "Fernandr00261463!", "mydatabase");

    //Check connection: 
    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error);
    }
    //sets variables 
    $email = $_GET["email"];

    $sql = "SELECT verify FROM Users WHERE email = '$email'";
    $result = $conn->query($sql);
    if($result->num_rows==1){   
        $row = $result->fetch_assoc();
        if ($row == 1) {
            header('location: login.php');
            $conn->close();
            exit();
        }
    }  
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    $sql = "UPDATE Users SET verify = '1' WHERE email = '$email'";
    
    if ($conn->query($sql) === TRUE) {
        header('location: login.php');
        $conn->close();
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}       
else {
    header('location: https://www.youtube.com/watch?v=lXMskKTw3Bc');
}
//Close Database connection:
?>