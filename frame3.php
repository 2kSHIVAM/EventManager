<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<link rel="stylesheet" href="frame2.css">
<body >
<h2 style="color: purple;">PAST EVENTS</h2>
<form action="" method="POST">
<button class="button" type="submit" name="f3submit">SHOW PAST EVENTS</button>
</form>
<br><br>

</body>
<?php
session_start();
$db=$_SESSION['name'];
if(array_key_exists("f3submit",$_POST)){
$username = "root";
$password = "";
$server = 'localhost:3307';
$con=mysqli_connect($server,$username,$password,$db);
$mydate=date("Y-m-d");
$result=$con->query("SELECT * FROM events WHERE edate < '$mydate' ORDER BY edate");
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<table>";
    echo "<tr> <td class='first'> EVENT </td> <td class ='second' > {$row['Event_name']}  </td></tr> ".
       " <tr> <td class='first'>ORGANIZER</td> <td class ='second'>  {$row['Organizer']}  </td></tr>  ".
       " <tr> <td class='first'>DATE OF EVENT  </td> <td class ='second'> {$row['edate']}  </td></tr>  ".
       " <tr> <td class='first' >ABOUT </td> <td class ='second' > {$row['About']}  </td></tr>  ";
       echo "</table>";
       echo "----------------------------------------------------------------------------------------------------------------------------<br>";
    }
 }

?>

</html>