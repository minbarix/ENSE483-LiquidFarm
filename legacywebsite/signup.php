<?php
    if (isset($_POST["SignUp"]))
    {
        Session_Start();
        //Create a database connection:
        $conn = new mysqli("localhost", "root", "Fernandr00261463!", "mydatabase");

        //Check connection: 
        if ($conn->connect_error) { 
            die("Connection failed: " . $conn->connect_error);
        }
        //sets variables 
        $uname = $_POST["uname"];
        $pswd = $_POST["pswd"];
        $email = $_POST["email"];

        if ($uname == NULL || $pswd == NULL || $email == NULL) {
            $_SESSION['emessage'] = 'Please Enter All Required Fields';
        }
        else {
            $sql = "SELECT email FROM Users WHERE email = \"$email\" OR uname = \"$uname\"";
            
            $result = $conn->query($sql);
            
            if($result->num_rows==1){
                $_SESSION['emessage'] = 'Email or Username Already In Use! Please Try Again!';
            }
            else {

                //create sql statement to add data to database 
                $sql = "INSERT INTO Users (uname, pswd, email) VALUES ('$uname', '$pswd', '$email')";

                //checks if successful and ouputs the appropriate response 
                if ($conn->query($sql) === TRUE) {
                    $_SESSION["uname"] = $uname;
                    $_SESSION["email"] = $email;
                    $sql = "INSERT INTO Subscriptions (sub, email) VALUES ('00000000', '$email')";
                    $conn->query($sql);
                    $msg = "https://ranil.ursse.org/verify.php?email=$email";
                    $msg = wordwrap($msg,70);
                    mail("$email","Verify rmfMedia Account",$msg);
                    $_SESSION['emessage'] = 'Please Check Email for Verification Link';
                } 
                else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
        $conn->close();
    }       
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" type="text/css" href="fernandrstylenew.css"/>
        <meta charset="UTF-8"/>
    </head>
<body>     
    <nav>
        <ul>
            <li><a href="login.php">Login</a></li>
            <li><a class ="active" href="signup.php">Sign Up</a></li>
            <li><a href="admin_login.php">Admin Portal</a></li>
            <li><a class = "logo"><b>rmfMedia</b></a></li>
            <li> <img class = "logo_img" src="Send_03.png" alt="d" style = "display:inline" width = "30" height = "30"/></li>
        </ul>
    </nav>

    <header>
        <h1>Sign Up</h1>
    </header>

    <section>
        <article>
            <form id="SignUp" method="post" action="signup.php">
                <table>
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
                        <td>Email Address: </td>
                    </tr>
                    <tr>
                        <td><label id="email_msg"></label></td>
                    </tr>
                    <tr>
                        <td> <input type="email" size="30" name="email"/></td>
                    </tr>
                    <tr>
                        <td>Username: </td>
                    </tr>      
                    <tr>
                        <td> <label id="uname_msg"></label></td>
                    </tr>
                    <tr>
                        <td> <input type="uname" size="30" name="uname"/></td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                    </tr>  
                    <tr>
                        <td> <label id="pswdr_msg"></label></td>
                    </tr>
                    <tr>
                        <td> <input type="password" size="30" name="pswd"/></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Sign Up" name="SignUp" /></td>
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