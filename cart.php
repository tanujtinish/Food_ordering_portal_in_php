<?php
session_start();
$_SESSION["ItemsId"] = "";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$q1 = $_SESSION["email2"];
$_SESSION["ItemsId"] = $_POST["edit1"];
$q2 = $_SESSION["ItemsId"];
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
$sql= "INSERT INTO cart( UserEmail , ItemsId )
VALUES ('$q1', '$q2')";

if ($conn->query($sql) == TRUE) {
    echo "
	<script language='javascript'>
	    window.alert('Your item has been added successfuly to the cart');
        window.location = 'menudisplay.php';
	</script>
    ";
	exit();
} else {
    echo "
	<script language='javascript'>
	    window.alert('Item already exists!');
        window.location = 'menudisplay.php';
	</script>
	";
	exit();
}

$conn->close();
?>
