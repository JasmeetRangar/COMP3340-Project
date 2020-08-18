<!DOCTYPE html>
<html lang="en">
<head>
  <title>Doctor's View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <p><a href="docview.php">Back</a></p>
       <?php
    $servername = "localhost";
    $username = "rangar_pbl";
    $password = "mypassword";
    $dbname = "rangar_pbl";
    

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT Pid, Pname, age, FamilyDoc FROM patient";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    echo "id: " . $row["Pid"]. " - Name: " . $row["Pname"]. " - Family Doctor: " . $row["FamilyDoc"]. "<br>";
    }
    } else {
    echo "0 results";
    }   

    mysqli_close($conn);
    ?> 
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