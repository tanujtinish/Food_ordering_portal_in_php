
<?php
// define variables and set to empty values
session_start();
$flag = 0;
$link = "login.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["usrname1"])) {
      echo "
  	<script language='javascript'>
  		alert('UserName is Required!');
  	</script>
  	";
  	exit();
    $flag = 1;
  } else {
    $_SESSION["usrname12"] = test_input($_POST["usrname1"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION["usrname12"])) {
        echo "
    	<script language='javascript'>
    		alert('UserName should contain letters and Spaces Only!');
    	</script>
    	";
    	exit();
      $flag = 1;
    }
  }

  if (empty($_POST["usrname2"])) {
      echo "
  	<script language='javascript'>
  		alert('UserName is Required!');
  	</script>
  	";
  	exit();
    $flag = 1;
  } else {
    $_SESSION["usrname22"] = test_input($_POST["usrname2"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION["usrname22"])) {
        echo "
    	<script language='javascript'>
    		alert('UserName should have Letters and whitespaces Only!');
    	</script>
    	";
    	exit();
      $flag = 1;
    }
  }

  if (empty($_POST["pse"])) {
      echo "
  	<script language='javascript'>
  		alert('Email is Required');
  	</script>
  	";
  	exit();
    $flag = 1;
  } else {
    $_SESSION["email2"] = test_input($_POST["pse"]);
    // check if e-mail address is well-formed
    if (!filter_var($_SESSION["email2"], FILTER_VALIDATE_EMAIL)) {
        $flag = 1;
        echo "
    	<script language='javascript'>
    		alert('Invalid Email Format!');
    	</script>
    	";
    	exit();
    }
  }

  if (empty($_POST["ps2"])) {
      $flag = 1;
      echo "
  	<script language='javascript'>
  		alert('Address is Required!');
  	</script>
  	";
  	exit();
  } else {
    $_SESSION["address2"] = test_input($_POST["ps2"]);
    }

  if (empty($_POST["pscn"])) {
      $flag = 1;
      echo "
  	<script language='javascript'>
  		alert('Contact No is Required!');
  	</script>
  	";
  	exit();

  } else {
    $_SESSION["contactno2"] = test_input($_POST["pscn"]);
  }

  if (empty($_POST["psw"])) {
      $flag = 1;
      echo "
      <script language='javascript'>
          alert('Password is Required!');
      </script>
      ";
      exit();
  } else {
    $_SESSION['password2'] = test_input($_POST["psw"]);
    $_SESSION['password2'] = sha1($_SESSION['password2']);
}
if($flag == 1)
{
    header("Location: login.php");
    exit();
}}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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
$q1=$_SESSION["usrname12"];$q2=$_SESSION["usrname22"];$q3=$_SESSION["email2"];$q4=$_SESSION["address2"];$q5=$_SESSION["password2"];$q6=$_SESSION["contactno2"];
$sql = "INSERT INTO user ( FirstName, SurName , Email , address , password , contactno )
VALUES ('$q1', '$q2' , '$q3' , '$q4' , '$q5' , '$q6')";

if ($conn->query($sql) === TRUE) {
    echo "
	<script language='javascript'>
		window.alert('Hurray!You have been registered.Login to continue');
        window.location ='login.php';
	</script>
    ";
} else {
    echo "
	<script language='javascript'>
		window.alert('User already exists!');
        window.location ='login.php';
	</script>
	";
	exit();
    $_SESSION["email2"] = "";
}
$conn->close();
?>
