<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
	{
    die("Connection failed: " . $conn->connect_error);
}
$flag=0;$flag2=0;
?>
<?php
// define variables and set to empty values
session_start();
$flag = 0;
$link = "home1.php";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST["psin1"]))  {
    $_SESSION["ItemName"] = test_input($_POST["psin1"]);
	$flag=1;
  }

  if (!empty($_POST["psip1"])){
    $_SESSION["ItemPrice"] = test_input($_POST["psip1"]);
	$flag2=1;
}}
?>

<?php

$q1=$_SESSION["ItemPrice"];$q2=$_SESSION["ItemName"];
if ($flag==1 && $flag2==1) {
$sql = "UPDATE item SET ItemPrice='{$q1}' WHERE ItemName='{$q2}'";
if ($conn->query($sql) === TRUE){
	echo "
	<script language='javascript'>
		window.alert('Item Update Successfull');
		window.location.href='home1.php';
	</script>";}
	else{
		echo "
		<script language='javascript'>
			window.alert('Item doesn't exist');
			window.location.href='home1.php';
		</script>
    	";
    	exit();
	}
}
else{
	echo "
	<script language='javascript'>
		window.alert('Please fill up some information');
		window.location.href='home1.php';
	</script>
    	";
    	exit();
}

$conn->close();
?>
