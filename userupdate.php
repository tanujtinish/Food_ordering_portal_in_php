<?php
session_start();
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
$q3=$_SESSION["email2"];
?>
<?php
// define variables and set to empty values
$flag = 0;
$link = "home1.php";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST["usrname1"]))  {
    $_SESSION["usrname12"] = test_input($_POST["usrname1"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION["usrname12"])) {
        echo "
    	<script language='javascript'>
    		alert('UserName should contain letters and Spaces Only!');
    	</script>
    	";
    	exit();
    }
	else{$q1=$_SESSION["usrname12"];
$sql = "UPDATE user SET FirstName='{$q1}' WHERE Email='{$q3}'";
if ($conn->query($sql) === TRUE){$flag=1;}
}
  }

  if (!empty($_POST["usrname2"])){
    $_SESSION["usrname22"] = test_input($_POST["usrname2"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION["usrname22"])) {
        echo "
    	<script language='javascript'>
    		alert('UserName should have Letters and whitespaces Only!');
    	</script>
    	";
    	exit();
    }
	else
	{$q2=$_SESSION["usrname22"];
$sql = "UPDATE user SET  SurName='{$q2}'  WHERE Email='{$q3}'";
if ($conn->query($sql) === TRUE){$flag=1;}
}
  }


  if (!empty($_POST["ps2"])) {
    $_SESSION["address2"] = test_input($_POST["ps2"]);
	$q4=$_SESSION["address2"];
$sql = "UPDATE user SET address='{$q4}'  WHERE Email='{$q3}'";
if ($conn->query($sql) === TRUE){$flag=1;}
    }

  if (!empty($_POST["pscn"]))  {
    $_SESSION["contactno2"] = test_input($_POST["pscn"]);
	$q5=$_SESSION["contactno2"];
$sql = "UPDATE user SET  contactno='{$q5}' WHERE Email='$q3'";
if ($conn->query($sql) === TRUE){$flag=1;}
  }

  if (!empty($_POST["psw"]))  {
      $_SESSION['password2'] = test_input($_POST["psw"]);
    $_SESSION['password2'] = sha1($_SESSION['password2']);
	$q6=$_SESSION["password2"];
$sql = "UPDATE user SET  password='$q6'  WHERE Email='$q3'";
if ($conn->query($sql) === TRUE){$flag=1;}
}
}
?>

<?php
$link1 = "home.php";

if ($flag==1) {
    echo "
	<script language='javascript'>
		window.alert('Successfuly Updated');
		window.location.href='home.php';
	</script>";
}
else{
	echo "
    	<script language='javascript'>
			window.alert('Please provide something to Update');
			window.location.href='home.php';
    	</script>
    	";
    	exit();
}

$conn->close();
?>
