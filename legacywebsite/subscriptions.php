<?php
$conn = new mysqli("localhost", "ranil", "verysecure", "ense483");
session_start();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Subscriptions</title>
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


	<body onload="contentInitalize('<?php echo $_SESSION["email"]; ?>');">
	    <nav>
	        <ul>
	            <li><a class ="active" href="subscriptions.php">Subscriptions</a></li>
	            <li><a href="logout.php">Sign Out</a></li>
	            <li><a class = "logo"><b>rmfMedia</b></a></li>
	            <li> <img class = "logo_img" src="Send_03.png" alt="d" style = "display:inline" width = "30" height = "30"/></li>
	        </ul>
	    </nav>

	    <header>
	        <h1><?php echo $_SESSION["uname"];?>'s Subs </h1>
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
                                    <input type="checkbox" id="box0" checked onclick="update('<?php echo $_SESSION["email"]; ?>');"/>
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
                                    <input type="checkbox" id="box1" checked onclick="update('<?php echo $_SESSION["email"]; ?>');"/>
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
                                    <input type="checkbox" id="box2" checked onclick="update('<?php echo $_SESSION["email"]; ?>');"/>
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
                                    <input type="checkbox" id="box3" checked onclick="update('<?php echo $_SESSION["email"]; ?>');"/>
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
                                    <input type="checkbox" id="box4" checked onclick="update('<?php echo $_SESSION["email"]; ?>');"/>
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
                                    <input type="checkbox" id="box5" checked onclick="update('<?php echo $_SESSION["email"]; ?>');"/>
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
                                    <input type="checkbox" id="box6" checked onclick="update('<?php echo $_SESSION["email"]; ?>');"/>
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
                                    <input type="checkbox" id="box7" checked onclick="update('<?php echo $_SESSION["email"]; ?>');"/>
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