<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_frames.css">

</head>
<?php
session_start();
$db=$_SESSION['name'];
if(array_key_exists('fsubmit',$_POST))
{
    $username = "root";
    $password = "";
    $server = 'localhost:3307';
    
    $con=mysqli_connect($server,$username,$password,$db);
    $con->query("INSERT INTO events VALUES('$_POST[fname]','$_POST[fuc]','$_POST[mydate]','$_POST[about]');");

}
?>
<body >
<div class="container">
           <div class="card">
                <div class="inner-box" id="card">
                    <div class="card-front">
                        <h1>EVENT MANAGER</h1>
                        <form action="" method="post">
                        <input type="type" class="input-box" name="fname" placeholder="Event Name" required>
                        <input type="type" class="input-box" name="fuc" placeholder="Event Organizer" required>
                        <input type="date" class="input-box" name="mydate" id="" style="color: purple;">
                        <textarea class="ta" name="about" id="" cols="30" rows="6" placeholder="About the Event"></textarea>
                        <button type="submit" class="submit-btn" name="fsubmit" >Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>