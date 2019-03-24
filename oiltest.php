<?php
session_start();
//if (isset($_POST["Login"])) {
   // session_start();
    $conn = new mysqli("localhost", "ranil", "verysecure", "ense483");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// FINDS AND RETURNS CURRENT TEMP
    $sql = "SELECT MAX(num) AS highnum FROM tempsensor1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $sqltemp = "SELECT tempvalue FROM tempsensor1 WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $currenttemp;
    $currenttemp = $row['tempvalue'];}

    $sql = "SELECT MAX(num) AS highnum FROM tempsensor1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $temphold = $temphold-1;
    $sqltemp = "SELECT tempvalue FROM tempsensor1 WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $tempm1;
    $tempm1 = $row['tempvalue'];}

    $sql = "SELECT MAX(num) AS highnum FROM tempsensor1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $temphold = $temphold-2;
    $sqltemp = "SELECT tempvalue FROM tempsensor1 WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $tempm2;
    $tempm2 = $row['tempvalue'];}

    $sql = "SELECT MAX(num) AS highnum FROM tempsensor1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $temphold = $temphold-3;
    $sqltemp = "SELECT tempvalue FROM tempsensor1 WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $tempm3;
    $tempm3 = $row['tempvalue'];}

//FINDS AND RETURNS CURRENT SOIL PH
    $sql = "SELECT MAX(num) AS highnum FROM soilacid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $sqltemp = "SELECT phvalue FROM soilacid WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $currentph;
    $currentph = $row['phvalue'];}

    $sql = "SELECT MAX(num) AS highnum FROM soilacid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $temphold = $temphold-1;
    $sqltemp = "SELECT phvalue FROM soilacid WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $lastph;
    $lastph = $row['phvalue'];}

    $sql = "SELECT MAX(num) AS highnum FROM soilacid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $temphold = $temphold-2;
    $sqltemp = "SELECT phvalue FROM soilacid WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $phm2;
    $phm2 = $row['phvalue'];}

    $sql = "SELECT MAX(num) AS highnum FROM soilacid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $temphold = $temphold-3;
    $sqltemp = "SELECT phvalue FROM soilacid WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $phm3;
    $phm3 = $row['phvalue'];}

    
//FINDS AND RETURNS CURRENT o2 Level
$sql = "SELECT MAX(num) AS highnum FROM o2level";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$temphold = $row['highnum'];
$sqltemp = "SELECT o2value FROM o2level WHERE num = '$temphold'";
$result = $conn->query($sqltemp);
if($result){
$row = $result->fetch_assoc();
global $currento2;
$currento2 = $row['o2value'];}

$sql = "SELECT MAX(num) AS highnum FROM o2level";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$temphold = $row['highnum'];
$temphold = $temphold-1;
$sqltemp = "SELECT o2value FROM o2level WHERE num = '$temphold'";
$result = $conn->query($sqltemp);
if($result){
$row = $result->fetch_assoc();
global $o2m1;
$o2m1 = $row['o2value'];}

$sql = "SELECT MAX(num) AS highnum FROM o2level";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$temphold = $row['highnum'];
$temphold = $temphold-2;
$sqltemp = "SELECT o2value FROM o2level WHERE num = '$temphold'";
$result = $conn->query($sqltemp);
if($result){
$row = $result->fetch_assoc();
global $o2m2;
$o2m2 = $row['o2value'];}

$sql = "SELECT MAX(num) AS highnum FROM o2level";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$temphold = $row['highnum'];
$temphold = $temphold-3;
$sqltemp = "SELECT o2value FROM o2level WHERE num = '$temphold'";
$result = $conn->query($sqltemp);
if($result){
$row = $result->fetch_assoc();
global $o2m3;
$o2m3 = $row['o2value'];}



$tempstatus = "Normal";
if($currenttemp < $_SESSION['mintemp']){
    $tempstatus = "Warning! Minimum Temperature Threshold Exceeded!";
}
else if ($currenttemp > $_SESSION['maxtemp']){
    $tempstatus = "Warning! Maximum Temperature Threshold Exceeded!";
}


$o2status = "Normal";
if($currento2 < $_SESSION['mino2']){
    $o2status = "Warning! Minimum o2 Threshold Exceeded!";
}
else if($currento2 > $_SESSION['maxo2']){
    $o2status = "Warning! Maxmimum o2 Threshold Exceeded!";
}

$phstatus = "Normal";
if($currentph < $_SESSION['minph']){
    $phstatus = "Warning! Minimum pH Threshold Exceeded";
}
else if($currentph > $_SESSION['maxph']){
    $phstatus = "Warning! Maxmimum pH Threshold Exceeded";
}



$loss = "none";
$loss = $_SESSION['mintemp'];
//if ($_POST["name"]){
 //   $loss = $_POST["name"];
//}




$conn->close();
?>





<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="fernandrstylenew.css"/>
        <meta charset="UTF-8"/>        
    </head>
    <meta name="viewport" content="width=device-width, initial-scale=1">


<body>
    <nav>
        <ul>
            <li><a class ="active" href="oiltest.php">Oil Hub</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="admin_login.php">Wine Hub</a></li>
            <li><a href="admin_login.php">Milk Hub</a></li>
            <li><a class = "logo"><b>MXFarms</b></a></li>
            <li> <img class = "logo_img" src="Send_03.png" alt="d" style = "display:inline" width = "30" height = "30"/></li>
        </ul>
    </nav>

    <header>
        <h1>Oil Hub</h1>
    </header>

    <section>
        <article>
            <form id="loginForm" method="post" action="login.php"> 
                <table id="login">
                    <tr>
                        <td>
                            <?php echo "Current soil pH Levels: " . $currentph; ?>
                        </td>
                        <td>
                            <?php echo "Current o2 Levels: " . $currento2; ?>
                        </td>
                        <td>
                            <?php echo "Current Temperature: " . $currenttemp; ?>
                        </td>
                    </tr><tr><td></td></tr>
                    <tr>
                        <td>
                           pH Status:  <! historical graph><?php echo $phstatus; ?>
                        </td>
                        <td>
                        o2 Status:  <?php echo $o2status; ?>
                        </td>
                        <td>
                            Temperature Status: <?php echo $tempstatus; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>   <div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Time', 'pH level'],
  ['Current pH level', <?php echo $currentph; ?>],
  ['pH - 1m', <?php echo $lastph; ?>],
  ['pH - 2m', <?php echo $phm2; ?>],
  ['pH - 3m', <?php echo $phm3; ?>],

]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'pH Level', 'width':400, 'height':350, 'backgroundColor' : 'transparent',
  
  titleTextStyle: {
      color: 'white',
      fontSize: 22
  },

  hAxis: {
      textStyle: {
          color: 'white',
          bold: 'true',
          fontSize: 14
      },
      titleTextStyle: {
          color: 'white',
          fontSize: 14
      }
  },
  vAxis: {
      textStyle: {
          color: 'white',
          bold: 'true',
          fontSize: 14
      },
      titleTextStyle: {
          color: 'white',
          bold: 'true',
          fontSize: 14
      }
  },
  legend: {
      textStyle: {
          color: 'white',
          bold: 'true',
          fontSize: 14
      }
  }


};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.AreaChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
</td> 



                        <td><div id="o2chart"></div><script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Time', 'o2 level'],
  ['Current o2 level', <?php echo $currento2; ?>],
  ['pH - 1m', <?php echo $o2m1; ?>],
  ['pH - 2m', <?php echo $o2m2; ?>],
  ['pH - 3m', <?php echo $o2m3; ?>],

]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'o2 Level', 'width':400, 'height':350, 'backgroundColor' : 'transparent',
  
  titleTextStyle: {
      color: 'white',
      fontSize: 22
  },

  hAxis: {
      textStyle: {
          color: 'white',
          bold: 'true',
          fontSize: 14
      },
      titleTextStyle: {
          color: 'white',
          fontSize: 14
      }
  },
  vAxis: {
      textStyle: {
          color: 'white',
          bold: 'true',
          fontSize: 14
      },
      titleTextStyle: {
          color: 'white',
          bold: 'true',
          fontSize: 14
      }
  },
  legend: {
      textStyle: {
          color: 'white',
          bold: 'true',
          fontSize: 14
      }
  }


};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.AreaChart(document.getElementById('o2chart'));
  chart.draw(data, options);
}
</script></td> 




                        <td><div id="tempchart"></div><script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Time', 'Temperature'],
  ['Current', <?php echo $currenttemp; ?>],
  ['Temp - 1m', <?php echo $tempm1; ?>],
  ['Temp - 2m', <?php echo $tempm2; ?>],
  ['Temp - 3m', <?php echo $tempm3; ?>],

]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Ambient Temperature', 'width':400, 'height':350, 'backgroundColor' : 'transparent',
  
    titleTextStyle: {
        color: 'white',
        fontSize: 22
    },

    hAxis: {
        textStyle: {
            color: 'white',
            bold: 'true',
            fontSize: 14
        },
        titleTextStyle: {
            color: 'white',
            fontSize: 14
        }
    },
    vAxis: {
        textStyle: {
            color: 'white',
            bold: 'true',
            fontSize: 14
        },
        titleTextStyle: {
            color: 'white',
            bold: 'true',
            fontSize: 14
        }
    },
    legend: {
        textStyle: {
            color: 'white',
            bold: 'true',
            fontSize: 14
        }
    }


  };

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.AreaChart(document.getElementById('tempchart'));
  chart.draw(data, options);
}
</script></td> 





                    </tr>
                </table>
                <table id="login">
                    <tr>
                        <td>
                            Sensor 1:
                        </td>
                        <td>
                            Sensor 2:
                        </td>
                        <td>
                            Sensor 3:
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Battery Level 97% Signal Strength: 97db
                        </td>
                        <td>
                            Battery Level 97% Signal Strength: 97db
                        </td>
                        <td>
                            Battery Level 97% Signal Strength: 97db
                        </td>
                    <tr>
                        <td><img src="https://image.shutterstock.com/z/stock-vector-world-globe-d-illuminated-with-coordinates-modern-sci-fi-futuristic-vector-illustration-concept-626909456.jpg" width="349" height="219"></td> 
                        <td><img src="https://image.shutterstock.com/z/stock-vector-world-globe-d-illuminated-with-coordinates-modern-sci-fi-futuristic-vector-illustration-concept-626909456.jpg" width="349" height="219"></td> 
                        <td><img src="https://image.shutterstock.com/z/stock-vector-world-globe-d-illuminated-with-coordinates-modern-sci-fi-futuristic-vector-illustration-concept-626909456.jpg" width="349" height="219"></td> 
                    </tr>
                </table>
            </form>   
            <br/>
        </article>
    </section>













<div id="inputform">Please define all Parameters:
    <form action="oilupdate.php" method="post">
Minimum Temperature: <input type="text" name="newmintemp"><br>
Maximum Temperature : <input type="text" name="newmaxtemp"><br>
Minimum o2: <input type="text" name="newmino2"><br>
Maximum o2 : <input type="text" name="newmaxo2"><br>
Minimum pH: <input type="text" name="newminph"><br>
Maximum pH : <input type="text" name="newmaxph"><br>
<input type="submit" value="Update bounds">
</form>
</div>












  

           





















  </div>
</div>

 










</body>
</html>
