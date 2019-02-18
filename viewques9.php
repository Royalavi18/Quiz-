<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>

#quiz {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
}
body{
  background-color: rgb(240,255,255);
}
.container{
  background-color:rgb(240,255,255);
  padding:0;
  width:100vw;
}ul{
  float:right;
  list-style-type: none;
}
li{
  font-size:25px;
  color:#6699ff;
}
</style>
</head>
<body>

<?php



if(!isset($_POST['sel']))
  $_SESSION['answer']['8']=-1;
else
  $_SESSION['answer']['8'] = $_POST['sel'];


$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="quizdb";
$con=mysqli_connect($host,$dbusername,$dbpassword,$dbname);
$sql = "SELECT question FROM questions where qid=9";
$res=mysqli_query($con,$sql);
echo "<ul >";
echo "<li>".$_SESSION['email']."</li>";
echo "<li >".$_SESSION['name']."</li></ul>";


echo "<div id = 'quiz' class ='container' >";

if (mysqli_num_rows($res) > 0) {
    echo  "<h2 style='color:blue;'> Question 9 out of 10</h2>";

    while($row = mysqli_fetch_assoc($res)) {

        echo  "<h3>".$row["question"]."</h3>";
        echo "<br>";
    }
}
mysqli_close($con);?>
<?php
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="quizdb";
$con=mysqli_connect($host,$dbusername,$dbpassword,$dbname);
$sql = "SELECT  answer FROM answers where ans_id=9";
$res=mysqli_query($con,$sql);

if (mysqli_num_rows($res) > 0) {

     echo "<form action = 'viewques10.php' method = 'POST'>";
      echo "<table class = 'table table-hover' id='result'>";
      $count=1;
      while($row = mysqli_fetch_assoc($res)) {
          echo  "<tr class = 'text-left'><td><input type='radio' style='width:20px' name='sel' value='$count' > ".$row['answer']."</td></tr>";
  $count++;


    }
    echo "</table>";

}

mysqli_close($con);?>
<br>
<br>

        <button type="submit" class="btn btn-primary btn-md pull-right">Next</button>
      </form>
  </div>
</body>

</html>
