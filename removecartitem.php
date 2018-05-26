<?php

session_start();
$link = "menuselecteddisplay.php";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$_SESSION["CartId"] = $_POST["edit3"];
$q2 = $_SESSION["CartId"];

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
$sql="DELETE FROM cart WHERE CartId= '$q2' ";
$result = $conn->query($sql);


if ($conn->query($sql) === TRUE) {
    echo "
   <script language='javascript'>
       window.alert('Your item has been deleted successfuly from the cart');
       window.location = '$link';
   </script>
    ";
}
else {
    echo "
   <script language='javascript'>
       window.alert('Please try after some time!!!'');
       window.location = '$link';
   </script>
    ";
}

$conn->close();
?>
