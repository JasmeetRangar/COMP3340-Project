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
      
      
      
      <?php
$servername = "localhost";
$username = "rangar_pbl";
$password = "mypassword";
$dbname = "rangar_pbl";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if(!$conn){
    echo"Error connection to database";
}

if (isset($_POST['Submit'])){
    if (!empty($_POST['Pid'])   &&
    !empty($_POST['Pname'])    &&
    !empty($_POST['age']) &&
    !empty($_POST['Pgender'])     &&
    !empty($_POST['Pcity'])     &&
    !empty($_POST['CardNum']) &&
    !empty($_POST['Contact']) &&
    !empty($_POST['FamilyDoc']) &&
    !empty($_POST['HasInsurance'])){
          
            $Pid   = $_POST['Pid'];
            $Pname    = $_POST['Pname'];
            $age =  $_POST['age'];
            $Pgender     = $_POST['Pgender'];
            $Pcity    = $_POST['Pcity'];
            $CardNum    =  $_POST['CardNum'];
            $Contact    =  $_POST['Contact'];
            $FamilyDoc    =  $_POST['FamilyDoc'];
            $HasInsurance    =  $_POST['HasInsurance'];
            $query    = "INSERT INTO patient VALUES" .
                "('$Pid', '$Pname', '$age', '$Pgender', '$Pcity', '$CardNum', '$Contact', '$FamilyDoc', '$HasInsurance')";
            $result   = $conn->query($query);

            if (!$result) echo "INSERT failed: $query<br>" .
                $conn->error . "<br><br>";
            else {
                echo"Inserted successfully";
               //header("Refresh:2; url='docnewpat.php'");
            }
            //refresh page
            //header( "Refresh:2; url='docnewpat.php'");
    }
    else{
        echo "Invalid data";
        header( "Refresh:2; url='docnewpat.php'");
    }
}
// This PHP script will only run on post from submit
if (!empty($_POST['delete'])):
        if(!empty($_POST['Pname'])){
            // loop to retrieve checked values
            foreach($_POST['Pname'] as $selected){
                $sql = "DELETE FROM patient WHERE Pid='$selected'";
                if ($conn->query($sql) === TRUE) {
                    echo "Record deleted".$selected." successfully";
                } else {
                    echo "Error deleting record:".$selected." ".$conn->error;
                }
                echo "</br>";
            }
        }
        else{
            echo "No records selected";
        }
    //refresh page
    header( "Refresh:1; url='docnewpat.php'");

// This PHP script will only run if not post form submit
else: ?>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <p>
        <label for="Pid">Patient ID:</label>
        <input type="int" name="Pid" id="Pid">
    </p>
    <p>
        <label for="Pname">Name:</label>
        <input type="text" name="Pname" id="Pname">
    </p>
    <p>
        <label for="age">Age:</label>
        <input type="text" name="age" id="age">
    </p>
    <p>
        <label for="Pgender">Gender:</label>
        <input type="text" name="Pgender" id="Pgender">
    </p>
    <p>
        <label for="Pcity">City:</label>
        <input type="text" name="Pcity" id="Pcity">
    </p>
    <p>
        <label for="CardNum">Card Number:</label>
        <input type="text" name="CardNum" id="CardNum">
    </p>
    <p>
        <label for="Contact">Contact:</label>
        <input type="text" name="Contact" id="Contact">
    </p>
    <p>
        <label for="FamilyDoc">Family Doctor:</label>
        <input type="text" name="FamilyDoc" id="FamilyDoc">
    </p>
    <p>
        <label for="HasInsurance">Has Insurance?(1 for yes, 0 for no):</label>
        <input type="text" name="FamilyDoc" id="FamilyDoc">
    </p>
    <input type="Submit" value="Submit">
    </form>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <input type="Submit" name="delete" value="Delete">

        <?php
            $sql = "SELECT * FROM patient";
            $result = $conn->query($sql);        
            if ($result->num_rows > 0) {
                echo "<table><thead>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>City</th>
                <th>Card Number</th>
                <th>Contact</th>
                <th>Family Doctor</th>
                <th>Has Insurance</th>
                <th><input type='checkbox' name='all' value='all' onclick='check_all(this)' </th></thead>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $id = $row["ISBN"];
                    echo "<tr>  
                    <td>" . $row["Pid"]. "</td>
                    <td>" . $row["Pname"]. "</td>
                    <td>" . $row["age"]. "</td>
                    <td>" . $row["Pgender"]. "</td>
                    <td>" . $row["Pcity"]. "</td>
                    <td>" . $row["CardNum"]. "</td>
                    <td>" . $row["Contact"]. "</td>
                    <td>" . $row["FamilyDoc"]. "</td>
                    <td>" . $row["HasInsurance"]. "</td>";
                    echo "<td><input type='checkbox' name='Pname[]' id='Pname' value='$id' </td> </tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
        ?>
    </form>
<?php endif; ?>
      
      
      
      
      
      
      
      
      
      
      
      
      
    
      <hr>
      
    </div>
    
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Contact:(999) 999-9999</p>
  <p>Email: walkin@abcwalkin.ca
</footer>

</body>
<script src="../js/checkboxes.js">
</script>
</html>