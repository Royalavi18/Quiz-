<?php
session_start();

if(!isset($_POST['sel']))
  $_SESSION['answer']['10']=-1;
else
  $_SESSION['answer']['10'] = $_POST['sel'];

$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="quizdb";
$con=mysqli_connect($host,$dbusername,$dbpassword,$dbname);
  $sql = "select ans_id from questions order by qid";
  $res=mysqli_query($con,$sql);
  $count=1;
  $answerscorrect=0;

  while($row=mysqli_fetch_assoc($res))
  {
    if($row['ans_id']==$_SESSION['answer']["$count"])
       $answerscorrect++;
    $count++;
  }
    $sql = "update user set  ans_correct=$answerscorrect where email='$_SESSION[email]'" ;

    mysqli_query($con, $sql);
    header('Location: http://localhost/scripts/Quiz/start.php');


    echo mysqli_error($con);
?>
