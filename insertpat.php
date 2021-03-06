<!DOCTYPE html>
<html lang="en">
<head>
  <title>Doctor's View</title>

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
    <p><a href="docview.php">Back</a></p>
      <?php
    $hn = 'localhost';
    $db = 'rangar_pbl';
    $un = 'rangar_pbl';
    $pw = 'mypassword';
    //create connection
    $conn = new mysqli($hn, $un, $pw, $db);
    if($conn->connect_error) die($conn->connect_error);
    
    if(isset($_POST['Pname']) && isset($_POST['age']) && isset($_POST['Pgender'])
    &&  isset($_POST['Pcity']))
    {
        
        if(!empty($_POST['Pname'])){
            //prepare query
            $stmt = $conn->prepare("INSERT INTO patient (Pname,age,Pgender,Pcity) VALUES (?,?,?,?)");
            $Pname = get_post($conn, 'Pname');
            $age = get_post($conn, 'age');
            $Pgender = get_post($conn, 'Pgender');
            $Pcity = get_post($conn, 'Pcity');
            //bind parameters
            $stmt->bind_param("sssss", $fname,$lname,$usercode,$email,$password);
            //execute query
            $stmt->execute();
            
            if(!$stmt) {
                echo "Insertion has failed:" . $conn->error . "<br><br>";
            }
            else{
                echo "Record has been inserted!<br><br>";
            }
            
        }
        
    }
    
    
    echo <<<_END
    <form action="insertpat.php" method="post">
    Name:<input type="text" name="Pname"><br>
    Age: <input type="text" name="age"><br>
    
    Gender:<input type="email" name="Pgender"><br>
    City:<input type="password" name="Pcity"><br>
    <input type="submit" value="ADD RECORD">
    </form>
_END;

$result->close();
$conn->close();

function get_post($conn,$var){
    return $conn->real_escape_string($_POST[$var]);
}

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