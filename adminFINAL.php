<html>
<head>
<title>ADMIN</title>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- css -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,300,700,800" rel="stylesheet" media="screen">

  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="css/style.css" rel="stylesheet" media="screen">
  <link href="color/default.css" rel="stylesheet" media="screen">
</head>
<body>
        

<?php

$event=$_POST['inputEvent'];
$con=mysqli_connect("localhost","root","");
if(!$con)
	die("Cannot Connect" . mysql_error());
mysqli_select_db($con,'test');

$sql="SELECT * FROM adminsams WHERE UID = $event";
$sql2="SELECT * FROM college database WHERE UID = $event";

$data=mysqli_query($con,$sql);
$datanew=mysqli_query($con,$sql2);

$record=mysqli_fetch_assoc($data);

#$record2=mysqli_fetch_assoc($datanew);

	echo "UID :" . $record['UID'] . " = " . $record['UID'] . "</br></br>";
	echo "CGPA: " . $record['CGPA1'] . " = " . $record['CGPA1'] . "</br></br>" ;
	echo "REPORT CARD: " . $record['REPORT'] . " = " . $record['REPORT'] . "</br></br>" ;
	echo "CERTIFICATE: " . $record['CERTIFICATE'] . " = " . $record['CERTIFICATE'] . "</br></br>" ;
		
	echo "</br></br>";
	



mysqli_close($con);

?>

 
</body>
</html>
