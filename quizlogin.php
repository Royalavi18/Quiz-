<?php


if(isset($_POST['login']))
{
  $username=$_POST['username'];
  $pass=$_POST['pass'];
   $perr="";
  $host="localhost";
  $dbusername="root";
  $dbpassword="";
  $dbname="quizdb";



  $con=mysqli_connect($host,$dbusername,$dbpassword,$dbname);
  $sql = "select name,email,password from user where username='$username'";
  $res=mysqli_query($con,$sql);
  if(mysqli_num_rows($res)>0)
  {

    $row = mysqli_fetch_assoc($res);
    $pass1=$row['password'];
    if(strcasecmp($pass1,$pass)==0)
    {
     session_start();
        $_SESSION['name']=$row['name'];
        $_SESSION['email']=$row['email'];

      header('Location: http://localhost/scripts/Quiz/viewques.php');
    }
    else
    {
       echo "<script> alert('Invalid password') ;</script>";
    }
  }
  else{
       echo "<script> alert('Invalid username') ;</script>";
      }
  }

?>



<!DOCTYPE html>


<html>
<head>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
.login-container{
    margin-top: 5%;
    margin-bottom: 5%;
}
.login-form-1{
    padding: 5%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h3{
    text-align: center;
    color: #333;
}
.login-form-2{
    padding: 5%;
    background: #0062cc;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-2 h3{
    text-align: center;
    color: #fff;
}
.login-container form{
    padding: 10%;
}
.btnSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    border: none;
    cursor: pointer;
}
.login-form-1 .btnSubmit{
    font-weight: 600;
    color: #fff;
    background-color: #0062cc;
}
.login-form-2 .btnSubmit{
    font-weight: 600;
    color: #0062cc;
    background-color: #fff;
}
.login-form-2 .ForgetPwd{
    color: #fff;
    font-weight: 600;
    text-decoration: none;
}
.login-form-1 .ForgetPwd{
    color: #0062cc;
    font-weight: 600;
    text-decoration: none;
}

</style>
<!------ Include the above in your HEAD tag ---------->
</head>

<div class="container login-container">
            <h1 class="text-center text-success"> Welcome to Quiz World</h1>
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Login Form</h3>
                    <form action="" method="post" >
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Username *" name="username" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Your Password *" name="pass" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" name="login" />

                        </div>
                        <div class="form-group">
                            <a href="#" class="ForgetPwd">Forget Password?</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 login-form-2">
                    <h3>Signup Form</h3>
                    <form  id="Signup" action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name *" name="name"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username*" name="username" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email *" name="email" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Your Password *" name="pass" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Signup" name="create"  />
                        </div>

                        <div class="form-group">

                            <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <?php
        if(isset($_POST['create'])){
          $name=$_POST['name'];
          $username=$_POST['username'];
          $email=$_POST['email'];
          $pass=$_POST['pass'];

        $host="localhost";
        $dbusername="root";
        $dbpassword="";
        $dbname="quizdb";
        $con=mysqli_connect($host,$dbusername,$dbpassword,$dbname);
          $sql = "INSERT INTO user(name,password,username,email) VALUES ('$name','$pass','$username','$email')";
          $res=mysqli_query($con,$sql);

          if($res){
            echo '<script> alert("Data Inserted Succesfully!"); </script>';
          }
        }
        ?>

</body>
</html>
