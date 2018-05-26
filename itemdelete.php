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
  if (!empty($_POST["psin2"]))  {
    $_SESSION["ItemName"] = test_input($_POST["psin2"]);
	$flag=1;
  }
}
?>

<?php

$q1=$_SESSION["ItemName"];
if ($flag==1) {
    $sql = "DELETE FROM item WHERE ItemName='{$q1}'";
if ($conn->query($sql) === TRUE){
	echo "
	<script language='javascript'>
		window.alert('Your Item has been Removed successfully!');
		window.location.href='home1.php';
	</script>
	";}
	else{
		echo "
    	<script language='javascript'>
    		window.alert('Item do not exist!');
			window.location.href='home1.php';
    	</script>
    	";
    	exit();
	}
}
else{
	echo "
    	<script language='javascript'>
    		window.alert('Please fill up some information!');
			window.location.href='home1.php';
    	</script>
    	";
    	exit();
}

$conn->close();
?>
