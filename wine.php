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
global $currenthumidity;
$currenthumidity = $row['val'];}

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
    $alcstatus = "Warning! Minimum Exceeded!";
}
else if ($currentalc > $_SESSION['maxalc']){
    $alcstatus = "Warning! Maximum Exceeded!";
}


$uvstatus = "Normal";
if($currentuv < $_SESSION['minuv']){
    $uvstatus = "Warning! Minimum Exceeded!";
}
else if($currentuv > $_SESSION['maxuv']){
    $uvstatus = "Warning! Maximum Exceeded!";
}

$humiditystatus = "Normal";
if($currenthumidity < $_SESSION['minhumidity']){
    $phstatus = "Warning! Minimum Exceeded";
}
else if($currenthumidity > $_SESSION['maxhumidity']){
    $humiditystatus = "Warning! Maximum Exceeded";
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


<body style="background-image: url('wine.jpg'); background-size: cover;">
    <nav>
        <ul>
            <li><a class ="active" href="oiltest.php">Winery Hub</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="oiltest.php">Oil Hub</a></li>
            <li><a href="milk.php">Dairy Hub</a></li>
            <li><a class = "logo"><b>2XLFarms</b></a></li>
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
                           Alcohol Content Status:  <br><?php echo $alcstatus; ?>
                        </td>
                        <td>
                        UV Status:<br>  <?php echo $uvstatus; ?>
                        </td>
                        <td>
                            Humidity Status:<br> <?php echo $humiditystatus; ?>
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
  ['Alc - 1m', <?php echo $alcm1; ?>],
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
  ['UV - 1m', <?php echo $lastuv; ?>],
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
                        <td><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=-104.59164619445802%2C50.415540922900625%2C-104.58752632141115%2C50.417984935405265&amp;layer=mapnik&amp;marker=50.416762944914694%2C-104.58958625793457" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=50.41676&amp;mlon=-104.58959#map=18/50.41676/-104.58959&amp;layers=N">View Larger Map</a></small></td> 
                        <td><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=-104.59399849176408%2C50.41530335132473%2C-104.58987861871721%2C50.417747376086055&amp;layer=mapnik&amp;marker=50.41652537946719%2C-104.59193855524063" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=50.41653&amp;mlon=-104.59194#map=18/50.41653/-104.59194&amp;layers=N">View Larger Map</a></small></td> 
                        <td><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=-104.58874672651294%2C50.4175935600641%2C-104.58462685346605%2C50.42003746666807&amp;layer=mapnik&amp;marker=50.41881552912763%2C-104.58668678998947" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=50.41882&amp;mlon=-104.58669#map=18/50.41882/-104.58669&amp;layers=N">View Larger Map</a></small></td> 
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
