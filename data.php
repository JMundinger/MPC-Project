<?php
session_start();

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "rg1570";
$dbName = "test";

$db = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
if(!$db){
echo "Not Connected";}
if($db){
mysql_select_db("test") or die(' Problem: ' . mysql_error());
/*
$uname = $_SESSION['username']; 
$tempo = mysqli_real_escape_string($db, $_POST['tempo']);
$noteval = mysqli_real_escape_string($db, $_POST['noteval']);
$rhythm = mysqli_real_escape_string($db, $_POST['rhythm']);
$dtime = mysqli_real_escape_string($db, $_POST['delay']);
*/
$uname = $_SESSION['username']; 
$tempo = $_POST['tempo'];
$noteval = $_POST['noteval'];
$rhythm = $_POST['rhythm'];
$dtime = $_POST['delay'];

$query = "INSERT INTO userdata (username, tempo, noteval, rhythm, delaytime) 
  	  VALUES('$uname', '$tempo', '$noteval', '$rhythm', '$dtime')";

mysqli_query($db, $query);

$history = "SELECT * FROM userdata WHERE username ='$uname'";
$result = mysql_query($history);
echo "The history of delay/reverb time calculations for ";
echo $uname;
echo " are: <br> <br>";

  while($row = mysql_fetch_assoc($result))
  {
    echo $row['tempo'];
    echo " BPM, ";
    echo $row['noteval'];
    echo " note, ";
    echo $row['rhythm'];
    echo " rhythm, ";
    echo $row['delaytime'];
    echo " ms reverb/delay time";
    echo "<br>";

  }
}
//mysqli_close($db);

?>
