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
    $tempstatus = "Warning! Minimum Exceeded!";
}
else if ($currenttemp > $_SESSION['maxtemp']){
    $tempstatus = "Warning! Maximum Exceeded!";
}


$o2status = "Normal";
if($currento2 < $_SESSION['mino2']){
    $o2status = "Warning! Minimum Exceeded!";
}
else if($currento2 > $_SESSION['maxo2']){
    $o2status = "Warning! Maximum Exceeded!";
}

$phstatus = "Normal";
if($currentph < $_SESSION['minph']){
    $phstatus = "Warning! Minimum Exceeded";
}
else if($currentph > $_SESSION['maxph']){
    $phstatus = "Warning! Maximum Exceeded";
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
            <li><a class = "logo"><b>rmfFarms</b></a></li>
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
                           pH Status: <br><?php echo $phstatus; ?>
                        </td>
                        <td>
                        o2 Status: <br> <?php echo $o2status; ?>
                        </td>
                        <td>
                            Temperature Status: <br><?php echo $tempstatus; ?>
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
                        <td><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=-104.78236198425294%2C50.64265723027545%2C-104.68640327453615%2C50.68155853997977&amp;layer=mapnik&amp;marker=50.662111913376506%2C-104.73438262939453" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=50.6621&amp;mlon=-104.7344#map=14/50.6621/-104.7344&amp;layers=N">View Larger Map</a></small></td> 
                        <td><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=-104.86724853515626%2C50.70317155518571%2C-104.77128982543947%2C50.74202273369285&amp;layer=mapnik&amp;marker=50.722601170975885%2C-104.81926918029785" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=50.7226&amp;mlon=-104.8193#map=14/50.7226/-104.8193&amp;layers=N">View Larger Map</a></small></td> 
                        <td><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=-104.93372440338136%2C50.714123783569946%2C-104.83776569366456%2C50.75296588441902&amp;layer=mapnik&amp;marker=50.733548860219265%2C-104.88574504852295" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=50.7335&amp;mlon=-104.8857#map=14/50.7335/-104.8857&amp;layers=N">View Larger Map</a></small></td> 
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
