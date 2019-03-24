<?php
session_start();
//if (isset($_POST["Login"])) {
   // session_start();
    $conn = new mysqli("localhost", "ranil", "verysecure", "ense483");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

// FINDS AND RETURNS CURRENT TEMP
    $sql = "SELECT MAX(num) AS highnum FROM milktemp";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $sqltemp = "SELECT val FROM milktemp WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $currenttemp;
    $currenttemp = $row['val'];}

    $sql = "SELECT MAX(num) AS highnum FROM milktemp";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $temphold = $temphold-1;
    $sqltemp = "SELECT val FROM milktemp WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $tempm1;
    $tempm1 = $row['val'];}

    $sql = "SELECT MAX(num) AS highnum FROM milktemp";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $temphold = $temphold-2;
    $sqltemp = "SELECT val FROM milktemp WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $tempm2;
    $tempm2 = $row['val'];}

    $sql = "SELECT MAX(num) AS highnum FROM milktemp";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $temphold = $temphold-3;
    $sqltemp = "SELECT val FROM milktemp WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $tempm3;
    $tempm3 = $row['val'];}

//FINDS AND RETURNS CURRENT SOIL PH
    $sql = "SELECT MAX(num) AS highnum FROM mf";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $sqltemp = "SELECT val FROM mf WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $currentmf;
    $currentmf = $row['val'];}

    $sql = "SELECT MAX(num) AS highnum FROM mf";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $temphold = $temphold-1;
    $sqltemp = "SELECT val FROM mf WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $lastmf;
    $lastmf = $row['val'];}

    $sql = "SELECT MAX(num) AS highnum FROM mf";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $temphold = $temphold-2;
    $sqltemp = "SELECT val FROM mf WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $mfm2;
    $mfm2 = $row['val'];}

    $sql = "SELECT MAX(num) AS highnum FROM mf";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $temphold = $row['highnum'];
    $temphold = $temphold-3;
    $sqltemp = "SELECT val FROM mf WHERE num = '$temphold'";
    $result = $conn->query($sqltemp);
    if($result){
    $row = $result->fetch_assoc();
    global $mfm3;
    $mfm3 = $row['val'];}

    
//FINDS AND RETURNS CURRENT o2 Level
$sql = "SELECT MAX(num) AS highnum FROM bacc";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$temphold = $row['highnum'];
$sqltemp = "SELECT val FROM bacc WHERE num = '$temphold'";
$result = $conn->query($sqltemp);
if($result){
$row = $result->fetch_assoc();
global $currentbacc;
$currentbacc = $row['val'];}

$sql = "SELECT MAX(num) AS highnum FROM bacc";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$temphold = $row['highnum'];
$temphold = $temphold-1;
$sqltemp = "SELECT val FROM bacc WHERE num = '$temphold'";
$result = $conn->query($sqltemp);
if($result){
$row = $result->fetch_assoc();
global $baccm1;
$baccm1 = $row['val'];}

$sql = "SELECT MAX(num) AS highnum FROM bacc";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$temphold = $row['highnum'];
$temphold = $temphold-2;
$sqltemp = "SELECT val FROM bacc WHERE num = '$temphold'";
$result = $conn->query($sqltemp);
if($result){
$row = $result->fetch_assoc();
global $baccm2;
$baccm2 = $row['val'];}

$sql = "SELECT MAX(num) AS highnum FROM bacc";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$temphold = $row['highnum'];
$temphold = $temphold-3;
$sqltemp = "SELECT val FROM bacc WHERE num = '$temphold'";
$result = $conn->query($sqltemp);
if($result){
$row = $result->fetch_assoc();
global $baccm3;
$baccm3 = $row['val'];}



$tempstatus = "Normal";
if($currenttemp < $_SESSION['mintempmilk']){
    $tempstatus = "Warning! Minimum Temperature Threshold Exceeded!";
}
else if ($currenttemp > $_SESSION['maxtempmilk']){
    $tempstatus = "Warning! Maximum Temperature Threshold Exceeded!";
}


$mfstatus = "Normal";
if($currentmf < $_SESSION['minmf']){
    $mfstatus = "Warning! Minimum mf Threshold Exceeded!";
}
else if($currentmf > $_SESSION['maxmf']){
    $mfstatus = "Warning! Maxmimum mf Threshold Exceeded!";
}

$baccstatus = "Normal";
if($currentbacc < $_SESSION['minbacc']){
    $phstatus = "Warning! Minimum Bacteria Threshold Exceeded";
}
else if($currentbacc > $_SESSION['maxbacc']){
    $baccstatus = "Warning! Maxmimum Bacteria Threshold Exceeded";
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
            <li><a class ="active" href="milk.php">Oil Hub</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="admin_login.php">Wine Hub</a></li>
            <li><a href="admin_login.php">Milk Hub</a></li>
            <li><a class = "logo"><b>MXFarms</b></a></li>
            <li> <img class = "logo_img" src="Send_03.png" alt="d" style = "display:inline" width = "30" height = "30"/></li>
        </ul>
    </nav>

    <header>
        <h1>Milk Hub</h1>
    </header>

    <section>
        <article>
            <form id="loginForm" method="post" action="login.php"> 
                <table id="login">
                    <tr>
                        <td>
                            <?php echo "Current Milk Fat Levels: " . $currentmf; ?>
                        </td>
                        <td>
                            <?php echo "Current Bacteria Levels: " . $currentbacc; ?>
                        </td>
                        <td>
                            <?php echo "Current Temperature: " . $currenttemp; ?>
                        </td>
                    </tr><tr><td></td></tr>
                    <tr>
                        <td>
                           Milk Fat Status:  <! historical graph><?php echo $mfstatus; ?>
                        </td>
                        <td>
                        Bacteria Content Status:  <?php echo $baccstatus; ?>
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
  ['Time', 'MF level'],
  ['Current MF level', <?php echo $currentmf; ?>],
  ['pH - 1m', <?php echo $lastmf; ?>],
  ['pH - 2m', <?php echo $mfm2; ?>],
  ['pH - 3m', <?php echo $mfm3; ?>],

]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'MF Level', 'width':400, 'height':350, 'backgroundColor' : 'transparent',
  
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
  ['Time', 'Bacteria level'],
  ['Current Bacteria level', <?php echo $currentbacc; ?>],
  ['pH - 1m', <?php echo $baccm1; ?>],
  ['pH - 2m', <?php echo $baccm2; ?>],
  ['pH - 3m', <?php echo $baccm3; ?>],

]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Bacteria Level', 'width':400, 'height':350, 'backgroundColor' : 'transparent',
  
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














    <form action="milkupdate.php" method="post">
Minimum Temperature: <input type="text" name="newmintempmilk"><br>
Maximum Temperature : <input type="text" name="newmaxtempmilk"><br>
Minimum MF: <input type="text" name="newminmf"><br>
Maximum MF : <input type="text" name="newmaxmf"><br>
Minimum Bacteria: <input type="text" name="newminbacc"><br>
Maximum Bacteria : <input type="text" name="newmaxbacc"><br>
<input type="submit" value="Update bounds">
</form>













  

           





















  </div>
</div>

 










</body>
</html>
