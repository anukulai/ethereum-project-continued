<html>
<head>
<title>from-retrival</title>
</head>
<body>

<?php
$con=mysqli_connect("localhost","root","");
if(!$con)
	die("Cannot Connect" . mysql_error());

$uid=$_POST['$uid'];

mysqli_select_db($con,'test');
$sql="SELECT * FROM students WHERE uid = '".$uid."'";
$data=mysqli_query($con,$sql);



$record=mysqli_fetch_assoc($data);
$cgpa_avg= ($record["cgpa1"]+$record["cgpa2"]+$record["cgpa3"]+$record["cgpa4"])/4;
$tech_avg= ($record["tech-score1"]+$record["tech-score2"]+$record["tech-score3"])/3;
$co_avg= ($record["co-score1"]+$record["co-score2"]+$record["co-score3"])/3;
$score= ($cgpa_avg+$tech_avg+$tech_avg+$co_avg)/3+9;
$name=$record["name"];
$branch=$record["branch"];

#echo $score;
mysqli_close($con);

?>
</body>
</html>