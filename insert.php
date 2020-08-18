<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "rangar_pbl", "mypassword", "rangar_pbl");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$Patid = mysqli_real_escape_string($link, $_REQUEST['Patid']);
$Docid = mysqli_real_escape_string($link, $_REQUEST['Docid']);

// Attempt insert query execution
$sql = "INSERT INTO appointment (Patid, Docid) VALUES ('$Patid', '$Docid')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
    header("location: homepage.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    header("location: patbookappointment.php")
}
 
// Close connection
mysqli_close($link);
?>