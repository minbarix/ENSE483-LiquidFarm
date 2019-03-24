<?php
session_start();
//if (isset($_POST["Login"])) {
   // session_start();
    $conn = new mysqli("localhost", "ranil", "verysecure", "ense483");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// FINDS AND RETURNS CURRENT TEMP
    $sql = "SELECT MAX(num) AS highnum FROM alc";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $sqltemp = "SELECT val FROM alc WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $currentalc;
    $currentalc = $row['val'];}

    $sql = "SELECT MAX(num) AS highnum FROM alc";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $temphold = $temphold-1;
    $sqltemp = "SELECT val FROM alc WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $alcm1;
    $alcm1 = $row['val'];}

    $sql = "SELECT MAX(num) AS highnum FROM alc";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $temphold = $temphold-2;
    $sqltemp = "SELECT val FROM alc WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $alcm2;
    $alcm2 = $row['val'];}

    $sql = "SELECT MAX(num) AS highnum FROM alc";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $temphold = $temphold-3;
    $sqltemp = "SELECT val FROM alc WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $alcm3;
    $alcm3 = $row['val'];}

//FINDS AND RETURNS CURRENT SOIL PH
    $sql = "SELECT MAX(num) AS highnum FROM uv";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $sqltemp = "SELECT val FROM uv WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $currentuv;
    $currentuv = $row['val'];}

    $sql = "SELECT MAX(num) AS highnum FROM uv";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $temphold = $temphold-1;
    $sqltemp = "SELECT val FROM uv WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $lastuv;
    $lastuv = $row['val'];}

    $sql = "SELECT MAX(num) AS highnum FROM uv";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $temphold = $temphold-2;
    $sqltemp = "SELECT val FROM uv WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $uvm2;
    $uvm2 = $row['val'];}

    $sql = "SELECT MAX(num) AS highnum FROM uv";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $temphold = $temphold-3;
    $sqltemp = "SELECT val FROM uv WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $uvm3;
    $uvm3 = $row['val'];}

    
//FINDS AND RETURNS CURRENT o2 Level
$sql = "SELECT MAX(num) AS highnum FROM humidity";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$temphold = $row['highnum'];
$sqltemp = "SELECT val FROM humidity WHERE num = '$temphold'";
$result = $conn->query($sqltemp);
if($result){
$row = $result->fetch_assoc();
global $currento2;
$currento2 = $row['val'];}

$sql = "SELECT MAX(num) AS highnum FROM humidity";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$temphold = $row['highnum'];
$temphold = $temphold-1;
$sqltemp = "SELECT val FROM humidity WHERE num = '$temphold'";
$result = $conn->query($sqltemp);
if($result){
$row = $result->fetch_assoc();
global $humiditym1;
$humiditym1 = $row['val'];}

$sql = "SELECT MAX(num) AS highnum FROM humidity";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$temphold = $row['highnum'];
$temphold = $temphold-2;
$sqltemp = "SELECT val FROM humidity WHERE num = '$temphold'";
$result = $conn->query($sqltemp);
if($result){
$row = $result->fetch_assoc();
global $humiditym2;
$humiditym2 = $row['val'];}

$sql = "SELECT MAX(num) AS highnum FROM humidity";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$temphold = $row['highnum'];
$temphold = $temphold-3;
$sqltemp = "SELECT val FROM humidity WHERE num = '$temphold'";
$result = $conn->query($sqltemp);
if($result){
$row = $result->fetch_assoc();
global $humiditym3;
$humiditym3 = $row['val'];}



$alcstatus = "Normal";
if($currentalc < $_SESSION['minalc']){
    $alcstatus = "Warning! Minimum Alcohol Threshold Exceeded!";
}
else if ($currenttemp > $_SESSION['maxalc']){
    $alcstatus = "Warning! Maximum Alcohol Threshold Exceeded!";
}


$uvstatus = "Normal";
if($currentuv < $_SESSION['minuv']){
    $uvstatus = "Warning! Minimum uv Threshold Exceeded!";
}
else if($currentuv > $_SESSION['maxuv']){
    $uvstatus = "Warning! Maxmimum uv Threshold Exceeded!";
}

$humiditystatus = "Normal";
if($currenthumidity < $_SESSION['minhumidity']){
    $phstatus = "Warning! Minimum humidity Threshold Exceeded";
}
else if($currenthumidity > $_SESSION['maxhumidity']){
    $humiditystatus = "Warning! Maxmimum humidity Threshold Exceeded";
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
            <li><a class ="active" href="oiltest.php">Winery Hub</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="oiltest.php">Oil Hub</a></li>
            <li><a href="milk.php">Dairy Hub</a></li>
            <li><a class = "logo"><b>MXFarms</b></a></li>
            <li> <img class = "logo_img" src="Send_03.png" alt="d" style = "display:inline" width = "30" height = "30"/></li>
        </ul>
    </nav>

    <header>
        <h1>Winery Hub</h1>
    </header>

    <section>
        <article>
            <form id="loginForm" method="post" action="login.php"> 
                <table id="login">
                    <tr>
                        <td>
                            <?php echo "Current Alcohol Storage Level: " . $currentalc; ?>
                        </td>
                        <td>
                            <?php echo "Current UV Radition: " . $currentuv; ?>
                        </td>
                        <td>
                            <?php echo "Current Humidity: " . $currenthumidity; ?>
                        </td>
                    </tr><tr><td></td></tr>
                    <tr>
                        <td>
                           Alcohlol Content Status:  <! historical graph><?php echo $alcstatus; ?>
                        </td>
                        <td>
                        UV Status:  <?php echo $uvstatus; ?>
                        </td>
                        <td>
                            Humidity Status: <?php echo $humiditystatus; ?>
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
  ['Time', 'Alc level'],
  ['Current Alc level', <?php echo $currentalc; ?>],
  ['Alc - 1m', <?php echo $lastalc; ?>],
  ['Alc - 2m', <?php echo $alcm2; ?>],
  ['Alc - 3m', <?php echo $alcm3; ?>],

]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Alcohol Level', 'width':400, 'height':350, 'backgroundColor' : 'transparent',
  
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
  ['Time', 'UV level'],
  ['Current UV level', <?php echo $currentuv; ?>],
  ['UV - 1m', <?php echo $uvm1; ?>],
  ['UV - 2m', <?php echo $uvm2; ?>],
  ['UV - 3m', <?php echo $uvm3; ?>],

]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'UV Level', 'width':400, 'height':350, 'backgroundColor' : 'transparent',
  
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
  ['Time', 'Humidity'],
  ['Current Humidity', <?php echo $currenthumidity; ?>],
  ['% - 1m', <?php echo $humiditym1; ?>],
  ['% - 2m', <?php echo $humiditym2; ?>],
  ['% - 3m', <?php echo $humiditym3; ?>],

]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Ambient Humidity', 'width':400, 'height':350, 'backgroundColor' : 'transparent',
  
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













<div id="inputform">Please Define all Parameters:
    <form action="oilupdate.php" method="post">
Minimum Temperature: <input type="text" name="newminalc"><br>
Maximum Temperature : <input type="text" name="newmaxalc"><br>
Minimum o2: <input type="text" name="newminuv"><br>
Maximum o2 : <input type="text" name="newmaxuv"><br>
Minimum pH: <input type="text" name="newminhumidity"><br>
Maximum pH : <input type="text" name="newmaxhumidity"><br>
<input type="submit" value="Update bounds">
</form>
</div>












  

           





















  </div>
</div>

 










</body>
</html>
