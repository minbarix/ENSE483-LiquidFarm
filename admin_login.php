<?php
if (isset($_POST["Login"])) {
    session_start();
    $conn = new mysqli("localhost", "root", "Fernandr00261463!", "mydatabase");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $email = $_POST["email"];
    $pswd = $_POST["pswd"];

    $sql = "SELECT uname FROM Users WHERE email = \"$email\" AND  pswd = \"$pswd\"";

    $result = $conn->query($sql);

    if($result->num_rows==1){
        $row = $result->fetch_assoc();
        $_SESSION["uname"] = $row['uname'];
        $_SESSION["email"] = $email;
        $sql = "SELECT verify FROM Users WHERE email = \"$email\" AND  pswd = \"$pswd\"";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if($result->num_rows==1) {
            if ($row["verify"] == 1) {
                $_SESSION['emessage'] = 'ACCESS DENIED';
            }
            elseif ($row["verify"] == 2) {
                header('location: admin.php');
                exit();
            }
            else {
                $_SESSION['emessage'] = 'ACCESS DENIED';
            }
        }
    }

    else {
        $_SESSION['emessage'] = 'Invalid Username/Password';
    }
    $conn->close();
}  

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="fernandrstylenew.css"/>
        <meta charset="UTF-8"/>        
    </head>
<body>
    <nav>
        <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a class ="active" href="admin_login.php">Admin Portal</a></li>
            <li><a class = "logo"><b>rmfMedia</b></a></li>
            <li> <img class = "logo_img" src="Send_03.png" alt="d" style = "display:inline" width = "30" height = "30"/></li>
        </ul>
    </nav>

    <header>
        <h1>Administrator Portal</h1>
    </header>

    <section>
        <article>
            <form id="loginForm" method="post" action="admin_login.php"> 
                <table id="login">
                    <tr>
                        <td>
                        <?php
                        if (isset($_SESSION['emessage'])) {
                            echo $_SESSION['emessage'];
                            unset($_SESSION['emessage']);
                        }
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Email Address: </td> <td><input type="text" size="30" name="email"/></td> 
                    </tr>
                    <tr>
                        <td></td><td><label id="uname_msg"></label></td>
                    </tr>
                    <tr>
                        <td>Password: </td> <td><input type="password" size="30" name="pswd"/></td> 
                    </tr>
                    <tr>
                        <td></td><td><label id="pswd_msg"></label></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Login" name="Login"/></td>
                    </tr>
                </table>
            </form>   
            <br/>
        </article>
    </section>

    <footer>
        <p>Copyright © 2018 rmfMedia LLC. All rights reserved.</p>
    </footer>

</body>
</html>