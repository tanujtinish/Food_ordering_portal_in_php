
<?php

session_start();
$_SESSION["ItemsId"] = "";
$link = "home1.php";
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
$q2=$_SESSION["email"];
$sql = "SELECT Total,userEmail FROM payment WHERE adminEmail= '$q2' ";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>Buggy</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="homedup.css" />
</head>
<body>
    <nav class="navbar navbar-default fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand mine44" href="home1.php">
                    <img alt="Buggy" src="dinner (1).png">
                </a>
                <a class="navbar-brand" href="home1.html">Buggy</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="home1.php">Dashboard</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
<div class = "container">
    <h1>Your payment History: </h1>
        <?php
        echo "<ul class=\"list-group\">";
		while($row = mysqli_fetch_array($result))
        {
			$q1=$row["userEmail"];
            $sql2 = "SELECT FirstName FROM user WHERE Email= '$q1' ";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            echo "<div class = 'container'>";
            echo "<div class = 'row'>";
            echo "<li class = 'list-group-item'>";
            echo "<div class = 'col-xl-4'><p></p></div>";
            echo "<div class = 'col-xl-4'>";
            echo "<h3>Name of the payer: <span class='label label-primary'>";
            echo $row2['FirstName']."</span></h3>";
            echo "</div>";
            echo "<div class = 'col-xl-4'>";
            echo "<h3>TotalPrice payed by the payer: <span class='label label-primary'>";
            echo $row['Total']."</span></h3>";
            echo "</div>";
            echo "</li>";
            echo "</div>";
            echo "</div>";
        }
        echo "</ul>";
        ?>
    </div>
</body>
