
<?php
// define variables and set to empty values
session_start();
$flag = 0;
$link = "login.php";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
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
    $_SESSION["usrname1"] = test_input($_POST["usrname1"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION["usrname1"])) {
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
    $_SESSION["usrname2"] = test_input($_POST["usrname2"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION["usrname2"])) {
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
    $_SESSION["email"] = test_input($_POST["pse"]);
    $_SESSION["id"] =sha1($_SESSION["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($_SESSION["email"], FILTER_VALIDATE_EMAIL)) {
        $flag = 1;
        echo "
    	<script language='javascript'>
    		alert('Invalid Email Format!');
    	</script>
    	";
    	exit();
    }
  }

  if (empty($_POST["psa"])) {
      $flag = 1;
      echo "
  	<script language='javascript'>
  		alert('Address is Required!');
  	</script>
  	";
  	exit();
  } else {
    $_SESSION["address"] = test_input($_POST["psa"]);
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
    $_SESSION["contactno"] = test_input($_POST["pscn"]);
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
      $_SESSION['password'] = test_input($_POST["psw"]);
    $_SESSION['password'] = sha1($_SESSION['password']);
}

  if (empty($_POST["psrn"])) {
      $flag = 1;
	    echo "
  	<script language='javascript'>
  		alert('Restaurent Nmae is Required!');
  	</script>
  	";
  	exit();
  } else {
    $_SESSION["restaurantname"] = test_input($_POST["psrn"]);
}

  if (empty($_POST["psrt"])) {
      $flag = 1;
	    echo "
  	<script language='javascript'>
  		alert('Restaurant Type is Required!');
  	</script>
  	";
  	exit();
  } else {
    $_SESSION["restauranttype"] = test_input($_POST["psrt"]);
}
if($flag == 1)
{
    header("Location: login.html");
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
$q1=$_SESSION["usrname1"];$q2=$_SESSION["usrname2"];$q3=$_SESSION["email"];$q4=$_SESSION["address"];$q5=$_SESSION["password"];$q6=$_SESSION["contactno"];$q7=$_SESSION["restaurantname"];$q8=$_SESSION["restauranttype"];
$sql = "INSERT INTO admi ( FirstName, SurName , EmailAddress , Address , password , phoneno , RestaurantName , RestaurantType)
VALUES ('$q1', '$q2' , '$q3' , '$q4' , '$q5' , '$q6' , '$q7' , '$q8' )";

if ($conn->query($sql) === TRUE) {
    echo "
    <script language='javascript'>
        window.alert('Hurray!!You have been Registered');
        window.location.href='home1.php';
    </script>
    ";
} else {
    echo "
    <script language='javascript'>
        window.alert('User already exists');
        window.location.href='login.php';
    </script>
	";
	exit();
}
$_SESSION["email"] = "";
$conn->close();
?>
