<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$name=$_POST['name'];
$uid=$_POST['uid'];
$branch=$_POST['branch'];
$year=$_POST['year'];
$cgpa1=$_POST['cgpa1'];
$cgpa2=$_POST['cgpa2'];
$cgpa3=$_POST['cgpa3'];
$cgpa4=$_POST['cgpa4'];
$about=$_POST['about'];
$techname1=$_POST['tech-name1'];
$techscore1=$_POST['tech-score1'];
$techname2=$_POST['tech-name2'];
$techscore2=$_POST['tech-score2'];
$techname3=$_POST['tech-name3'];
$techscore3=$_POST['tech-score3'];
$co1=$_POST['co-name1'];
$coscore1=$_POST['co-score1'];
$co2=$_POST['co-name2'];
$coscore2=$_POST['co-score2'];
$co3=$_POST['co-name3'];
$coscore3=$_POST['co-score3'];
$extra=$_POST['extra-name'];
$extrarating=$_POST['extra-rating'];

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_select_db($conn,'test');

$sql = "INSERT INTO `students`(`name`, `uid`, `branch`, `year`, `cgpa1`, `cgpa2`, `cgpa3`, `cgpa4`, `about`, `tech-name1`, `tech-score1`, `tech-name2`, `tech-score2`, `tech-name3`, `tech-score3`, `co-name1`, `co-score1`, `co-name2`, `co-score2`, `co-name3`, `co-score3`, `extra-name`, `extra-rating`)"; 
$sql .= "VALUES ('".$name."','".$uid."','".$branch."','".$year."','".$cgpa1."','".$cgpa2."','".$cgpa3."','".$cgpa4."','".$about."','".$techname1."','".$techscore1."','".$techname2."','".$techscore2."','".$techname3."','".$techscore3."','".$co1."','".$coscore1."','".$co2."','".$coscore2."','".$co3."','".$coscore3."','".$extra."','".$extrarating."')";
/*$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Mary', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Julie', 'Dooley', 'julie@example.com')";*/
$conn->multi_query($sql);



$cgpa=($cgpa1+$cgpa2+$cgpa3)/3;
$tech=($techscore1+$techscore2+$techscore3)/3;
$coscore=($coscore1+$coscore2+$coscore3)/3;
$extr=$extra*$extrarating;
$score=$cgpa+$tech+$coscore+$extr;

if($cgpa<$tech ) 
{
	if($coscore<$extr)
		$rec="co-curriculum and cgpa";
	else
		$rec="extra curriculum and cgpa";
}
else
	echo "technical projects";

mysqli_close($conn);

#include('retrival_php.php');
?>
<html lang="en">
<head>
  <title>Student Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  <style>

  div.align-center {
    text-align: center;
  }
  /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
  /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #000000;
      padding: 25px;
    }
body {font-family: Arial, Helvetica, sans-serif;
}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

.form-design{
<!--text-align: center;-->
  width: 100px;


}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>

<body style="height:1500px">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">STUDENTS ACHIEVEMENT MANAGEMENT SYSTEM</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="form.html">Home</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  </br>
  </br>
  </br>
  </br>


<form action="retrival_php.php" method ="get">
  

  <div class="container" >
    <div class="align-center">
	<div class="img-container">
    <img src="media.png" alt="Avatar" class="avatar" style="width:10%">
  </div>
    <h1><?php  echo $name;  ?></h1></br>
    <h2><?php  echo $uid;  ?></h2></br>
    <h2><?php  echo $branch;  ?></h2>
    </br>
    </br>
    
    <div class="alert alert-success">
      <h1><strong><?php  echo $score;  ?></strong></h1> 
    </div>
	</br>
	</br>
	<h2>Recommndations</h2>
	<h2><?php  echo $rec;  ?></h2>

  </div>
   
        
   
  </div>
</form>


</body>