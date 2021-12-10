<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
if(array_key_exists("fsubmit",$_POST)){
$username = "root";
$password = "";
$server = 'localhost:3307';
$db = 'login_details';
$con=mysqli_connect($server,$username,$password,$db);
$con->query("UPDATE data_info SET Company_password='$_POST[fpass]' WHERE Company_name='$_POST[fname]' AND Unique_Code='$_POST[fuc]'");
$c=mysqli_affected_rows($con);
if($c>0)
    echo "<script>alert('PASSWORD CHANGED SUCCESSFULLY !!')</script>";

else
    echo "<script>alert('INVALID DETAILS :( ')</script>";
}
?>
<body>
<body>
        <div class="container">
           <div class="card">
                <div class="inner-box" id="card">
                    <div class="card-front">
                        <h2>FORGET PASSWORD</h2>
                        <form action="" method="post">
                        <input type="type" class="input-box" name="fname" placeholder="Company ID" required>
                        <input type="type" class="input-box" name="fuc" placeholder="Unique Code" required>
                        <input type="password" class="input-box" name="fpass" placeholder="New Password" required>
                        <button type="submit" class="submit-btn" name="fsubmit" >Submit</button>
                        </form>
                      
                    </div>
                </div>
            </div>
        </div>
</body>
</html>