<?php
session_start();
?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["usrname12"])) {
      echo "
    <script language='javascript'>
        alert('UserName is Required!');
    </script>
    ";
    exit();
  } else {
    $_SESSION["email2"] = test_input($_POST["usrname12"]);
    }

  if (empty($_POST["psw12"])) {
      echo "
  <script language='javascript'>
      alert('Password is Required!');
  </script>
  ";
  exit();
  } else {
      $_SESSION['password2'] = test_input($_POST["psw12"]);
    $_SESSION['password2'] = sha1($_SESSION['password2']);
	$q1=$_SESSION["email2"];$q2=$_SESSION["password2"];
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
	$sql ="SELECT * FROM user WHERE Email LIKE '{$q1}' AND password LIKE '{$q2}' ";
	$result = $conn->query($sql);
    if ($result->num_rows > 0) {
       //header("Location: /home1.php");/* Redirect browser */
	   echo "
	   <script language='javascript'>	   
			window.location.href='home.php';
	   </script>
      ";
    }
	else
	{
        echo "
      <script language='javascript'>
          alert('Password is incorrect!');
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
