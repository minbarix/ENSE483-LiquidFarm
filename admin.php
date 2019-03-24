<?php
    $conn = new mysqli("localhost", "root", "Fernandr00261463!", "mydatabase");
    session_start();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST["Add"])) {

        $pswd = $_POST["pswd"];
        $email = $_POST["mail"];
        $uname = $_POST["uname"];

        if ($pswd == NULL || $email == NULL || uname == NULL)
            true;
        else {
            $sql = "INSERT INTO Users (uname, pswd, email, verify) VALUES ('$uname', '$pswd', '$email', '1')";
        
            if ($conn->query($sql) === TRUE) {
                $sql = "INSERT INTO Subscriptions (sub, email) VALUES ('00000000', '$email')";
                $conn->query($sql);
            } 
            else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }  

    $sql = "SELECT * FROM Users";
    $result = $conn->query($sql);
    $data = "<table>";
    $data = $data . "<tr><td>Email<td/><td>Username<td/><td>Password<td/><td>Verified<td/><td>Edit User<td/><tr/>";
    if ($result->num_rows >= 0) {  
        while ($row = $result->fetch_assoc()) {
            if ($row["verify"] == 2) {
                true;
            }
            elseif ($row["verify"] == 1) {
                $flag = "True";
                $data = $data . "<tr><td>" . $row["email"] . "<td/><td>" . $row['uname'] . "<td/><td>" . $row['pswd'] . "<td/><td>" . $flag . "<td/><td>" . "<input type=\"button\" value=\"Edit\" onclick=\"edit('" . $row['email'] . "')\"/>" . "<tr/><td/>";
            }
            elseif ($row["verify"] == 0) {
                $flag = "False";
                $data = $data . "<tr><td>" . $row["email"] . "<td/><td>" . $row['uname'] . "<td/><td>" . $row['pswd'] . "<td/><td>" . $flag . "<td/><td>" . "<input type=\"button\" value=\"Edit\" onclick=\"edit('" . $row['email'] . "')\"/>" . "<tr/><td/>";
            }
            
        }
    }  
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $data = $data . "</table>";

    $conn->close();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Administrator Hub</title>
        <link rel="stylesheet" type="text/css" href="fernandrstylenew.css"/>
        <meta charset="UTF-8"/>
    </head>

    <script>
		function edit(email) {
            window.location.assign("https://ranil.ursse.org/admin_sub.php?mod=" + email);
        }
	</script>


	<body>
	    <nav>
	        <ul>
	            <li><a class ="active" href="admin.php">Admin Hub</a></li>
	            <li><a href="logout.php">Sign Out</a></li>
	            <li><a class = "logo"><b>rmfMedia</b></a></li>
	            <li> <img class = "logo_img" src="Send_03.png" alt="d" style = "display:inline" width = "30" height = "30"/></li>
	        </ul>
	    </nav>

	    <header>
	        <h1>Administrator Hub</h1>
	    </header>

	    <form>
            <?php echo $data; ?>
	    </form> 
        <br/>
        <br/>
        <br/>
        <form id="Add" method="post" action="admin.php">
            <table>
                <tr>
                    <td>
                    </td>
                    <td>
                        Add User
                    </td>
                </tr>
                <tr>
                    <td>
                        Email
                    </td>
                    <td>
                        Username
                    </td>
                    <td>
                        Password
                    </td>
                </tr>
                    <td>
                        <input type="text" name="mail"/>
                    </td>
                    <td>
                        <input type="text" name="uname"/>
                    </td>
                    <td>
                        <input type="text" name="pswd"/>
                    </td>
                    <td>
                        <input type="submit" name="Add" value="Add"/>
                    </td>
                </tr>
            </table>
        </form>

	    <footer>
	        <p>Copyright © 2018 rmfMedia LLC. All rights reserved.</p>
	    </footer>

	</body>
</html>