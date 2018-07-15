<?php
// define variables and set to empty values
session_start();
$_SESSION["ItemName"] = $_SESSION["ItemType"] = $_SESSION["ItemPrice"] = "";
$flag = 0;
$link = "login.php";
$link1 = "home1.php";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["psin"])) {
      echo "
  	<script language='javascript'>
  		alert('ItemName is Required!');
  	</script>
  	";
  	exit();
    $flag = 1;
  } else {
    $_SESSION["ItemName"] = test_input($_POST["psin"]);
  }

  if (empty($_POST["psit"])) {
      echo "
  	<script language='javascript'>
  		alert('ItemName is Required!');
  	</script>
  	";
  	exit();
    $flag = 1;
  } else {
    $_SESSION["ItemType"] = test_input($_POST["psit"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION["ItemType"])) {
        echo "
    	<script language='javascript'>
    		alert('ItemType should contain letters and Spaces Only!');
    	</script>
    	";
    	exit();
      $flag = 1;
    }
  }

  if (empty($_POST["psip"])) {
      echo "
  	<script language='javascript'>
  		alert('Email is Required');
  	</script>
  	";
  	exit();
    $flag = 1;
  } else {
    $_SESSION["ItemPrice"] = test_input($_POST["psip"]);
}
if($flag == 1)
{
    header("Location: home1.php");
    exit();
}
}
?>

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
$q1=$_SESSION["ItemName"];$q2=$_SESSION["ItemType"];$q3=$_SESSION["ItemPrice"];$q4=$_SESSION["email"];
$sql = "INSERT INTO item (ItemName , ItemType , ItemPrice , adminEmail)
VALUES ('$q1', '$q2' , '$q3' , '$q4')";

if ($conn->query($sql) === TRUE) {
    echo "
    <script language='javascript'>
        window.alert('Your Item has been successfully added');
        window.location.href='home1.php';
    </script>
    ";
} else {
    echo "
    <script language='javascript'>
        window.alert('Item Already Exists');
        window.location.href='home1.php';
    </script>
	";
	exit();
}

$conn->close();
?>
