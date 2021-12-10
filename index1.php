<!DOCTYPE html>
<html>
     <title>Login Form</title>
     <link rel="stylesheet" href="style1.css">
</head>
<?php



function random_strings($length_of_string)
{
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
  
    return substr(str_shuffle($str_result),0, $length_of_string);
}



       if(array_key_exists('ssubmit',$_POST))
       {
          $uc=random_strings(8);
          echo "<script>alert('SUCCESSFULLY SIGNED UP SUCCESSFULLY!! COPY THE UNIQUE CODE (WILL BE HELPFUL TO RESET PASSWORD) :$uc ')</script>";

          $username = "root";
          $password = "";
          $server = 'localhost:3307';
          $db = 'login_details';
          $con=mysqli_connect($server,$username,$password,$db);
          
       mysqli_query($con,"CREATE TABLE data_info(Company_name CHAR(30),Company_email CHAR(50),Company_password CHAR(40),Unique_Code CHAR(10));");
       mysqli_query($con,"INSERT INTO data_info VALUES('$_POST[sname]','$_POST[semail]','$_POST[spass]','$uc');");
      
       mysqli_query($con,"CREATE DATABASE $_POST[sname]");
       $con=mysqli_connect($server,$username,$password,$_POST['sname']);
       $con->query("CREATE TABLE events (Event_name CHAR (40),Organizer CHAR (20),edate CHAR (12),About CHAR (100))");
       
       }
       if(array_key_exists('lsubmit',$_POST))
       {
          $username = "root";
          $password = "";
          $server = 'localhost:3307';
          $db = 'login_details';
          $con=mysqli_connect($server,$username,$password,$db);
          $result=$con->query("SELECT DISTINCT Company_email FROM data_info WHERE Company_name='$_POST[lname]' AND Company_password='$_POST[lpass]'");
          if(($result->num_rows)>0)
          {
               echo "<script>alert('LOGGED IN SUCCESSULLY !!')</script>";
               session_start();
          $_SESSION['name']=$_POST['lname'];
          
          require_once('frames.php');
          }
          else
          echo "<script>alert('SORRY WRONG DETAILS PLEASE RETRY :(')</script>";
          
       }

    ?>
<body>
      <div class="container">
           <div class="card">
                <div class="inner-box" id="card">
                     <div class="card-front">
                     <h2>LOGIN</h2>
                     <form action="" method="post">
                         <input type="type" class="input-box" name="lname" placeholder="Company ID" required>
                         <input type="password" class="input-box" name="lpass" placeholder="Password" required>
                         <button type="submit" class="submit-btn" name="lsubmit" >Submit</button>
	               <input type="checkbox"><span>Remember Me</span>
                      </form>
                      <button type="button" class="btn" onclick="openRegister()" id="nh">I'm New Here</button>
	                 <a href="forgot_pass.php">Forgot Password</a>
                      </div>
                      <div class="card-back">
                      <h2>REGISTER</h2>
                     <form action ="" method="post">
                         <input type="type" class="input-box" name="sname" placeholder="New Company ID" required>
                         <input type="email" class="input-box" name="semail" placeholder="Company Email Id" required>
                         <input type="password" class="input-box" name="spass" placeholder="Password" required>
                         <button type="submit" class="submit-btn" name="ssubmit" >Submit</button>
	             <input type="checkbox"><span>Remember Me</span>
                      </form>
                      <button type="button" class="btn" onclick="openLogin()">I've an account</button>
	                 <a href="forgot_pass.php" >Forgot Password</a>
                   </div>
                </div>
            </div>
        </div>
        <script>
       var card = document.getElementById("card");

        function openRegister(){
          card.style.transform="rotateY(-180deg)";
        }
        function openLogin(){
          card.style.transform="rotateY(0deg)";
        }
        </script>  

       
         
</body>
</html>
