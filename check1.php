
	<?php echo "Hello, World"; ?>

	
	
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$q1=$_SESSION["usrname1"];$q2=$_SESSION["usrname2"];$q3=$_SESSION["email"];$q4=$_SESSION["address"];$q5=$_SESSION["password"];$q6=$_SESSION["contactno"];
$sql = "INSERT INTO user ( FirstName, LastName , Email , address , password , contactno )
VALUES ('$q1', '$q2' , '$q3' , '$q4' , '$q5' , '$q6' )";

$conn->close();
?>

<?php
session_start();
echo "Hello";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username1"])) {
    $_SESSION["usrname1Err"] = "First Name is required";
  } else {
     $_SESSION["usrname1"] = test_input($_POST["usrname1"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION["usrname1"])) {
      $_SESSION["usrname1Err"] = "Only letters and white space allowed"; 
    }
  }
  if (empty($_POST["username2"])) {
    $_SESSION["username2Err"] = "Last Name is required";
  } else {
    $_SESSION["usrname2"] = test_input($_POST["usrname2"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION["usrname2"])) {
      $_SESSION["usrname2Err"] = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["pse"])) {
    $_SESSION["emailErr"] = "Email is required";
  } else {
    $_SESSION["email"] = test_input($_POST["pse"]);
    // check if e-mail address is well-formed
    if (!filter_var($_SESSION["email"], FILTER_VALIDATE_EMAIL)) {
      $_SESSION["emailErr"] = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["psa"])) {
    $_SESSION["addressErr"] = "Address is required";
  } else {
    $_SESSION["address"] = test_input($_POST["psa"]);
    }
  }

  if (empty($_POST["pscn"])) {
    $_SESSION["contactnoErr"] = "Contact No. is required";
  } else {
    $_SESSION["contactno"] = test_input($_POST["pscn"]);
	if (!preg_match("/^[a-zA-Z ]*$/",$_SESSION["contactno"])) {
      $_SESSION["contactnoErr"] = "Only letters and white space allowed";
  }

  if (empty($_POST["psw"])) {
    $_SESSION["passwordErr"] = "Contact No. is required";
  } else {
    $_SESSION["password"] = test_input($_POST["psw"]);
	if (!preg_match('/^(?=.{10,}$)(?=.*?[A-Z].*?[A-Z])(?=.*?([\x20-\x40\x5b-\x60\x7b-\x7e\x80-\xbf]).*?(?1).*?$).*$/',$_SESSION["password"])) {
      $_SESSION["passwordErr"] = "length should be greater than 10 and should contain atleast 2 upper case letters";
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
