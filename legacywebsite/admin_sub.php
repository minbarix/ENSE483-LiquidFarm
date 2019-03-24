<?php
$conn = new mysqli("localhost", "root", "Fernandr00261463!", "mydatabase");
session_start();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_GET['mod'] != NULL) {
    $_SESSION["mod"] = $_GET["mod"];
}

if (isset($_POST["Change"])) {

    $pswd = $_POST["pswd"];
    $email = $_SESSION["mod"];
    if ($pswd == NULL) {
        $_SESSION['amsg'] = 'Please enter a password before attempting to change the password.';
    }
    else {
        $sql = "UPDATE Users SET pswd = '$pswd' WHERE email = '$email'";

        if ($conn->query($sql) === TRUE) {
            true;
        } 
        else {
                echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}       

if (isset($_POST["Delete"])) {

    $pswd = $_POST["pswd"];
    $email = $_SESSION["mod"];

    $sql = "DELETE FROM Subscriptions WHERE email = '$email'";

    if ($conn->query($sql) === TRUE) {
        true;
    } 
    else {
            echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "DELETE FROM Users WHERE email = '$email'";

    if ($conn->query($sql) === TRUE) {
        true;
    } 
    else {
            echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header('location: admin.php');
    exit();
}   

$conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Modify User</title>
        <link rel="stylesheet" type="text/css" href="fernandrstylenew.css"/>
        <meta charset="UTF-8"/>
    </head>

    <script>
		function contentInitalize(email) {
			input = email;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var data = JSON.parse(xmlhttp.responseText);
                    for (var i = 0; i < data.sub.length; i++) {
                        if (data.sub[i] == "1") {
                            document.getElementById("box" + i).checked = true;
                        }
                        else {
                            document.getElementById("box" + i).checked = false;
                        }
                    }
			    }
		    }
			xmlhttp.open("GET", "update.php?mode="+input, true);
			xmlhttp.send();
        }
        function update(email) {
            data="";
            for (var i = 0; i < 8; i++) {
                if (document.getElementById("box" + i).checked == true) {
                   data = data + "1";
                }
                else if (document.getElementById("box" + i).checked == false) {
                    data = data + "0";
                }
            }
            var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
                    true;
			    }
		    }
			xmlhttp.open("GET", "updatesubs.php?data="+data+"&mode="+email, true);
			xmlhttp.send();
        }
	</script>


	<body onload="contentInitalize('<?php echo $_SESSION["mod"]; ?>');">
	    <nav>
	        <ul>
                <li><a href="admin.php">Admin Hub</a></li>
	            <li><a class ="active" href="admin_sub.php">Modify User</a></li>
	            <li><a href="logout.php">Sign Out</a></li>
	            <li><a class = "logo"><b>rmfMedia</b></a></li>
	            <li> <img class = "logo_img" src="Send_03.png" alt="d" style = "display:inline" width = "30" height = "30"/></li>
	        </ul>
	    </nav>

	    <header>
	        <h1>Modification Page for <?php echo $_SESSION["mod"];?></h1>
	    </header>

		<section>
	        <article>
	            <span id="subscription">
	                <form id = "sub" method="post" action="">
                        <table id = "subs">
                            <tr>
                                <td>
                                    <b>Subscription</b>
                                </td>
                                <td>
                                    <b>Description</b>
                                </td>
                                <td>
                                    <b>Sign Up</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Text Adventures Weekly
                                </td>
                                <td>
                                    The premier emacs games network.
                                </td>
                                <td>
                                    <input type="checkbox" id="box0" checked onclick="update('<?php echo $_SESSION["mod"]; ?>');"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Stallman Daily
                                </td>
                                <td>
                                    GNU NOT LINUX.
                                </td>
                                <td>
                                    <input type="checkbox" id="box1" checked onclick="update('<?php echo $_SESSION["mod"]; ?>');"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Acronyms Monthly
                                </td>
                                <td>
                                    What name can we change next? Help us decide!
                                </td>
                                <td>
                                    <input type="checkbox" id="box2" checked onclick="update('<?php echo $_SESSION["mod"]; ?>');"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    IPv6 Initative 
                                </td>
                                <td>
                                    Down with IPv4!
                                </td>
                                <td>
                                    <input type="checkbox" id="box3" checked onclick="update('<?php echo $_SESSION["mod"]; ?>');"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    FSF Network 
                                </td>
                                <td>
                                    Free is for Freedom
                                </td>
                                <td>
                                    <input type="checkbox" id="box4" checked onclick="update('<?php echo $_SESSION["mod"]; ?>');"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    GNU: GNU's Not Unix
                                </td>
                                <td>
                                    GNU/Linux!!!!!!!
                                </td>
                                <td>
                                    <input type="checkbox" id="box5" checked onclick="update('<?php echo $_SESSION["mod"]; ?>');"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Save GitHub Foundation
                                </td>
                                <td>
                                    Stop Micro$oft from destroying GitHub!
                                </td>
                                <td>
                                    <input type="checkbox" id="box6" checked onclick="update('<?php echo $_SESSION["mod"]; ?>');"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    URCourses 
                                </td>
                                <td>
                                    pls help fix
                                </td>
                                <td>
                                    <input type="checkbox" id="box7" checked onclick="update('<?php echo $_SESSION["mod"]; ?>')"/>
                                </td>
                            </tr>
                        </table>
	                </form>
                    <br/>
                    <br/>
                    <br/>
                    <form id="Change" method="post" action="admin_sub.php">
                        <table>
                            <tr>
                                <td>
                                    Change Password
                                </td>
                                <td>
                                    <input type="text" name="pswd"/>
                                </td>
                                <td>
                                    <input type="submit" name="Change" value="Change"/>
                                </td>
                                <td>
                                    <?php
                                        if (isset($_SESSION['amsg'])) {
                                            echo $_SESSION['amsg'];
                                            unset($_SESSION['amsg']);
                                        }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <br/>
                    <form id="Change" method="post" action="admin_sub.php">
                        <table>
                            <tr>
                                <td>
                                    Delete User
                                </td>
                                <td>
                                    <input type="submit" name="Delete" value="Delete"/>
                                </td>
                            </tr>
                        </table>
                    </form>
	            </span>    
	        </article>
	        <br/>
	    </section>
	    <footer>
	        <p>Copyright © 2018 rmfMedia LLC. All rights reserved.</p>
	    </footer>

	</body>
</html>