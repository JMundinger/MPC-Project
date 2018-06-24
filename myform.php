<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "rg1570";
$dbName = "test";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$id = $_GET['note'];
if(!$conn){
echo "Not Connected";
}
if($conn){

mysql_select_db("test") or die(' Problem: ' . mysql_error());

if($id ==="A" || $id ==="A#" || $id ==="Bb" || $id ==="B" || $id ==="C" || $id==="C#" || $id==="Db" || $id ==="D" || $id ==="D#" || $id ==="Eb" || $id ==="E" || $id ==="F" || $id ==="F#" || $id ==="Gb" || $id ==="G" || $id ==="G#" || $id ==="Ab"){

$sql = "SELECT * FROM notefreq WHERE Note='$id' OR AkaNote='$id'";
$result = mysql_query($sql);
echo "The frequencies for ";
echo $id;
echo " are: <br>";
    
  while($row = mysql_fetch_assoc($result))
  {
    echo $row['Frequency'];
    echo " Hz";
    echo "<br>";
  }

echo "<br><br>";
echo "The note locations on a standard tuned guitar (EADGBE) for ";
echo $id;
echo " are: <br>";
    $sql = "SELECT * FROM notepos WHERE Note='$id' OR AkaNote='$id'";
$result = mysql_query($sql);
  while($row = mysql_fetch_assoc($result))
  {
    echo $row['Str'];
    echo " string ";
    echo $row['Fret'];
    echo " fret";
    echo "<br>";
  }

}
else{
echo "Please enter a valid music note (i.e. Ab or G#)";
}
}
?>




