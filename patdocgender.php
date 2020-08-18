<!DOCTYPE html>
<html lang="en">
<head>
  <title>Patient's View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      background-color: #1e649e;
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #a1d8ed;
      height: 100%;
      
    }
    
    /* Set background color, white text and some padding */
    footer {
      position:fixed;
	bottom:0;
	left:0;
	right:0;	
	width:100%;
	margin:auto;
      background-color: #1e649e;
      color: white;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
  <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Category', 'Number of Books'],
                  
                  <?php
                        $hn = 'localhost';
                        $db = 'rangar_pbl';
                        $un = 'rangar_pbl';
                        $pw = 'mypassword';
                        $conn = new mysqli($hn,$un,$pw,$db);
                        if ($conn->connect_error) die ($conn->connect_error);
                        
                        $query = "SELECT Gender, count(*) as cnt FROM doctor GROUP BY Gender";
                        $result = $conn->query($query);
                        if (!$result) die ("Access Failed: ". $conn->error);
                        
                        $rows = $result->num_rows;
                        
                        for ($i = 0; $i < $rows; $i++){
                            
                            $result->data_seek($i);
                            //$row = $result->fetch_array(MYSQLI_NUM);
                            
                            echo "['".$result->fetch_assoc()['Gender']."',";
                            
                            $result->data_seek($i);
                            echo $result->fetch_assoc()['cnt']."]";
                            
                            if ($i < $rows-1) echo ",";
                        }
                        
                        $result->close();
                        $conn->close();
                    ?>
                ]);
                var options = {
                  title: 'Percentage of Patients Based On Gender'
                };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
            
          }
        </script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="homepage.php">Home</a></li>
      </ul>
      <strong><font style="font-size:30px"><center>ABC Walk-In</center></font></strong>
      <ul class="nav navbar-nav navbar-right">
    
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="../html/doctorlogin.php">Doctor</a></p>
      <p><a href="reclogin.php">Receptionist</a></p>
      <p><a href="patlogin.php">Patient</a></p>
    </div>
    <div class="col-sm-8 text-left"> 
    <p><a href="patview.php">Back</a></p>
      <div id="piechart" style="width: 900px; height: 500px;"></div>

      <hr>
      
    </div>
    
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Contact:(999) 999-9999</p>
  <p>Email: walkin@abcwalkin.ca
</footer>

</body>
</html>