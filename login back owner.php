<?php
session_start();
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["usrname"])) {
      echo "
    <script language='javascript'>
        alert('UserName is Required!');
    </script>
    ";
    exit();
  } else {
    $_SESSION["email"] = test_input($_POST["usrname"]);
    }

  if (empty($_POST["psw"])) {
      echo "
  <script language='javascript'>
      alert('Password is Required!');
  </script>
  ";
  exit();
  } else {
      $_SESSION['password'] = test_input($_POST["psw"]);
    $_SESSION['password'] = sha1($_SESSION['password']);
	$q1=$_SESSION["email"];$q2=$_SESSION["password"];
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
	$sql ="SELECT * FROM admi WHERE EmailAddress LIKE '{$q1}' AND password LIKE '{$q2}' ";
	$result = $conn->query($sql);
    if ($result->num_rows > 0) {
       //header("Location: /home1.php");/* Redirect browser */
	   echo "
	   <script language='javascript'>	   
			window.location.href='home1.php';
	   </script>
      ";
    }
	else
	{
        echo "
        <script language='javascript'>
            window.alert('Password is Incorrect');
            window.location.href='login.php';
        </script>
      ";
      exit();
	}
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
