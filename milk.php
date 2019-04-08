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
    $tempstatus = "Warning! Minimum Exceeded!";
}
else if ($currenttemp > $_SESSION['maxtempmilk']){
    $tempstatus = "Warning! Maximum Exceeded!";
}


$mfstatus = "Normal";
if($currentmf < $_SESSION['minmf']){
    $mfstatus = "Warning! Minimum Exceeded!";
}
else if($currentmf > $_SESSION['maxmf']){
    $mfstatus = "Warning! Maximum Exceeded!";
}

$baccstatus = "Normal";
if($currentbacc < $_SESSION['minbacc']){
    $phstatus = "Warning! Minimum Exceeded";
}
else if($currentbacc > $_SESSION['maxbacc']){
    $baccstatus = "Warning! Maximum Exceeded";
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


<body style="background-image: url('olive.jpg'); background-size: cover;">
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
                           Milk Fat Status: <br>
                           <?php echo $mfstatus; ?>
                        </td>
                        <td>
                        Bacteria Content Status: <br> <?php echo $baccstatus; ?>
                        </td>
                        <td>
                            Temperature Status: <br> <?php echo $tempstatus; ?>
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
                        <td><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=-77.03891023993494%2C38.89662966095715%2C-77.03591153025629%2C38.89812221482436&amp;layer=mapnik&amp;marker=38.89737594181201%2C-77.0374108850956" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=38.89738&amp;mlon=-77.03741#map=19/38.89738/-77.03741&amp;layers=N">View Larger Map</a></small></td> 
                        <td><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=-77.03762143850328%2C38.89392419664227%2C-77.03462272882463%2C38.895416807369905&amp;layer=mapnik&amp;marker=38.89467050592726%2C-77.03612208366394" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=38.89467&amp;mlon=-77.03612#map=19/38.89467/-77.03612&amp;layers=N">View Larger Map</a></small></td> 
                        <td><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=-77.05236822366716%2C38.88929377244844%2C-77.04637080430986%2C38.89227915715388&amp;layer=mapnik&amp;marker=38.8907864804854%2C-77.0493695139885" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=38.89079&amp;mlon=-77.04937#map=18/38.89079/-77.04937&amp;layers=N">View Larger Map</a></small></td> 
                    </tr>
                </table>
            </form>   
            <br/>
        </article>
    </section>













    <div id="inputform">Please input all Parameters:
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
</div>

 










</body>
</html>
