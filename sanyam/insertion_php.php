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



?>