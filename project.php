<?php session_start(); 
if($_SESSION['username']==null){
header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
background-color: lightblue;
}
h1 {
color: gray;
text-align: center;
}

</style>
<h1>Music Production Calculator</h1>
<style> p{text-align:center;}</style><p><img src="https://lmkprod.com/wp-content/uploads/2015/04/amplifier-controls-music-desktop-hd-wallpaper-ibackgroundz3.jpg" style="width:700px;height:300px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="http://www.fretjam.com/images/circle-of-fifths-simple.gif" style="width:300px;height:300px;"></p>
<script>

function getMilliseconds()
{
var notev = document.getElementById('noteval_select').value;
var noter = document.getElementById('rhythm_select').value;

var bpm = parseInt(document.getElementById('bpm').value);

if(noter ==="standard"){
if(notev === "quarter")
{document.getElementById('result').value = 60000 / bpm;}
else if(notev === "half")
{document.getElementById('result').value = (60000 / bpm) * 2;}
else if(notev === "eighth")
{document.getElementById('result').value = (60000 / bpm) / 2;}
else if(notev === "sixteenth")
{document.getElementById('result').value = (60000 / bpm) / 4;}
}
else if(noter ==="triplet"){
if(notev === "quarter")
{document.getElementById('result').value = (60000 / bpm) * 0.667;}
else if(notev === "half")
{document.getElementById('result').value = ((60000 / bpm) * 2) * 0.667;}
else if(notev === "eighth")
{document.getElementById('result').value = ((60000 / bpm) / 2) * 0.667;}
else if(notev === "sixteenth")
{document.getElementById('result').value = ((60000 / bpm) / 4) * 0.667;}
}
else if(noter ==="dotted"){
if(notev === "quarter")
{document.getElementById('result').value = (60000 / bpm) * 1.5;}
else if(notev === "half")
{document.getElementById('result').value = ((60000 / bpm) * 2) * 1.5;}
else if(notev === "eighth")
{document.getElementById('result').value = ((60000 / bpm) / 2) * 1.5;}
else if(notev === "sixteenth")
{document.getElementById('result').value = ((60000 / bpm) / 4) * 1.5;}
}
}

</script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
function storeData() {
var notev = document.getElementById('noteval_select').value;
var noter = document.getElementById('rhythm_select').value;

var bpm = parseInt(document.getElementById('bpm').value);
var dtime = document.getElementById('result').value;

$.ajax({
  url: 'data.php',
  type: 'POST',
  data: { 'tempo' : bpm, 'noteval' : notev, 'rhythm' : noter, 'delay' : dtime},
  }).done(function (msg) {
  alert("Data Saved")
  console.log(data);
});
}
</script>
</head>
<body>
Welcome, <?php 
$uname = $_SESSION['username']; 
echo $uname;
echo str_repeat('&nbsp;', 10);
date_default_timezone_set("America/New_York");
echo date("m/d/Y");

?><br>
    	<a href="index.php?logout='1'" style="color: red;">Logout</a>
<br>

<br><br>
Calculate the amount of milliseconds you should set your reverb or delay time to based on the BPM and the desired note length (i.e. quarter note, eighth note, etc.)
<br><br>
BPM: <input type="text" id="bpm"><br><br>
<p1>Note Value:</p1>
<select id="noteval_select">
  <option value="half">Half</option>
  <option value="quarter">Quarter</option>
  <option value="eighth">Eighth</option>
  <option value="sixteenth">Sixteenth</option>
</select> 
<br><br><p1>Rhythm: &nbsp;&nbsp;&nbsp;&nbsp;</p1>
<select id="rhythm_select">
  <option value="standard">Standard</option>
  <option value="triplet">Triplet</option>
  <option value="dotted">Dotted</option>
</select>
<br><br>
<button onclick="getMilliseconds();storeData();">Calculate</button>
<input type="text" id="result"/> ms<br><br>
<form action="data.php" method="POST">
<input type="submit" name="Submit" value="View History">
</form>

<br>
Enter a musical note (e.g. A# or Bb) to determine the frequencies in Hz of that note and the fretboard locations on a standard tuned guitar:
<br><br>
<form action="myform.php" method="GET">
Note: <input type="text" name="note">&nbsp;
<input type="submit" name = "Submit" value="Submit">
</form>
</body>


</html>
