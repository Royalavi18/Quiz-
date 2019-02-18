

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

    background-color:dodgerblue;
}
.login-form-1{
    padding: 5%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
}
.login-form-1 h1{
    text-align: center;
    color: #333;
}

.login-container form{
    padding: 10%;
}
h2{
  color:orange;
}

div{
  padding:7% 10% ;
}
</style>
<!------ Include the above in your HEAD tag ---------->
</head>




                <div class="text-center">
<h1 class="text-center text-success">Test Results</h1>
                        <div class="form-group">

                          <?php
                          session_start();
                          $host="localhost";
                          $dbusername="root";
                          $dbpassword="";
                          $dbname="quizdb";
                          $con=mysqli_connect($host,$dbusername,$dbpassword,$dbname);
                          $sql = "select ans_correct,totalquestions from user where email='$_SESSION[email]'";
                          $res=mysqli_query($con,$sql);
                          $row=mysqli_fetch_assoc($res);
                          if($row['ans_correct']>=0 && $row['ans_correct']<=3)
                             echo "<h4>Very poor ,Improve  Yourself</h4>";
                          else if($row['ans_correct']>=4 && $row['ans_correct']<=7)
                              echo "<h4>Good ,Keep it UP</h4>";
                          else{
                              echo "<h4>Congratulation,You can be proud of yourself</h4>";
                          }

                           echo "<h2>".$row['ans_correct']."/"."10"."</h2>";



                          ?>


                          <a href="viewques.php" class="btn btn-md btn-warning"> Test Again </a>
                          <a href="quizlogin.php" class="btn btn-md btn-danger" > Log Out</a>

                </div>

  </div>




</body>
</html>
