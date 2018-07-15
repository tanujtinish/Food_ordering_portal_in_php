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
$q3=$_SESSION["email"];
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
    $_SESSION["usrname1"] = test_input($_POST["usrname1"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION["usrname1"])) {
        echo "
    	<script language='javascript'>
    		alert('UserName should contain letters and Spaces Only!');
    	</script>
    	";
    	exit();
    }
	else{$q1=$_SESSION["usrname1"];
$sql = "UPDATE admi SET FirstName='{$q1}' WHERE EmailAddress='{$q3}'";
if ($conn->query($sql) === TRUE){$flag=1;}
}
  }

  if (!empty($_POST["usrname2"])){
    $_SESSION["usrname2"] = test_input($_POST["usrname2"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION["usrname2"])) {
        echo "
    	<script language='javascript'>
    		alert('UserName should have Letters and whitespaces Only!');
    	</script>
    	";
    	exit();
    }
	else
	{$q2=$_SESSION["usrname2"];
$sql = "UPDATE admi SET  SurName='{$q2}'  WHERE EmailAddress='{$q3}'";
if ($conn->query($sql) === TRUE){$flag=1;}
}
  }


  if (!empty($_POST["psa"])) {
    $_SESSION["address"] = test_input($_POST["psa"]);
	$q4=$_SESSION["address"];
$sql = "UPDATE admi SET address='{$q4}'  WHERE EmailAddress='{$q3}'";
if ($conn->query($sql) === TRUE){$flag=1;}
    }

  if (!empty($_POST["pscn"]))  {
    $_SESSION["contactno"] = test_input($_POST["pscn"]);
	$q5=$_SESSION["contactno"];
$sql = "UPDATE admi SET  phoneno='{$q5}' WHERE EmailAddress='{$q3}'";
if ($conn->query($sql) === TRUE){$flag=1;}
  }

  if (!empty($_POST["psw"]))  {
      $_SESSION['password'] = test_input($_POST["psw"]);
    $_SESSION['password'] = sha1($_SESSION['password']);
	$q6=$_SESSION["password"];
$sql = "UPDATE admi SET  password='{$q6}'  WHERE EmailAddress='{$q3}'";
if ($conn->query($sql) === TRUE){$flag=1;}
}

  if (!empty($_POST["psrn"])) {
    $_SESSION["restaurantname"] = test_input($_POST["psrn"]);
	$q7=$_SESSION["restaurantname"];
$sql = "UPDATE admi SET RestaurantName='{$q7}'  WHERE EmailAddress='{$q3}'";
if ($conn->query($sql) === TRUE){$flag=1;}
}

  if (!empty($_POST["psrt"]))  {
    $_SESSION["restauranttype"] = test_input($_POST["psrt"]);
	$q8=$_SESSION["restauranttype"];
$sql = "UPDATE admi SET RestaurantType='{$q8}' WHERE EmailAddress='{$q3}'";
if ($conn->query($sql) === TRUE){$flag=1;}
}

}
?>

<?php
$link1 = "home1.php";

if ($flag==1) {
    echo "
	<script language='javascript'>
		window.alert('Successfuly Updated');
		window.location.href='home1.php';
	</script>";
}
else{
	echo "
    	<script language='javascript'>
			window.alert('Please provide something to Update');
			window.location.href='home1.php';
    	</script>
    	";
    	exit();
}

$conn->close();
?>
