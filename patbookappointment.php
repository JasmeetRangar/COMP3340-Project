<!DOCTYPE html>
<html lang="en">
<head>
  <title>Patient's View</title>
  <script src="../js/checkboxes.js">
    
</script>
<link rel="stylesheet" type="text/css" href="../css/table.css">

  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/table.css">
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
    <p><a href="patview.php">Back</a></p>
      <html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
</head>
<body>
<form action="insert.php" method="post">
    <p>
        <label for="firstName">Patient ID:</label>
        <input type="text" name="first_name" id="firstName">
    </p>
    <p>
        <label for="lastName">Doctor ID:</label>
        <input type="text" name="last_name" id="lastName">
    </p>
    
    <input type="submit" value="Submit">
</form>
<p>If successfull you will be taken to homepage</p>
</body>
</html>
    
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Contact:(999) 999-9999</p>
  <p>Email: walkin@abcwalkin.ca
</footer>

</body>

</html>