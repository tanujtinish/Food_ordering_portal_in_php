<?php
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $_SESSION["carte"] = $_POST["edit"];
        //echo $_POST["edit"];
    }
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
    $q7 = $_SESSION["email2"];
    $sql = "SELECT * FROM cart where UserEmail = '$q7'";
    $sql3 = "SELECT FirstName from user where Email = '$q7'";
    $result = $conn->query($sql);
    $result4 = $conn->query($sql3);
    $row4 = $result4->fetch_assoc();
    $q11 = $row4["FirstName"];
?>


<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>Buggy</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="home1.css" />
</head>
<body>
    <nav class="navbar navbar-default fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand mine44" href="home.php">
                    <img alt="Buggy" src="dinner (1).png">
                </a>
                <a class="navbar-brand" href="home.php">Buggy</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="payment.php">Order Cart Items</a></li>
                    <li><a href="home.php">Dashboard</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron">
        <div class="container">
            <?php echo "<h1>Hello, ". $q11. "!</h1>"?>
            <p>Below is the List of Items which are in your cart</p>
        </div>
    </div>
    <div class = "container">
        <?php
        echo "<form action = \"removecartitem.php\" role = \"form\" method = \"post\">";
        echo "<ul class=\"list-group\">";
		while($row = $result->fetch_assoc())
        {
			$q3 = $row["ItemName"];
            $sql2 = "SELECT ItemName,ItemType,ItemPrice FROM item where ItemName = '$q3'";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            echo "<div class = 'container'>";
            echo "<div class = 'row'>";
            echo "<li class = 'list-group-item'>";
            //echo "<div class = 'col-xl-4'><p></p></div>";
            //echo "<div class = 'col-xl-4'>";
            echo "<h3>Item Name: <span class='label label-primary'>";
            echo $row2['ItemName']."</span></h3>";
            //echo "</div>";
            //echo "<div class = 'col-xl-4'>";
            echo "<h3>Item Type: <span class='label label-info'>";
            echo $row2['ItemType']."</span></h3>";
            //echo "</div>";
            //echo "<div class = 'col-xl-4'>";
            echo "<h3>Price: <span class='label label-primary'>";
            echo $row2['ItemPrice']."</span></h3>";
            //echo "</div>";
            echo "<button class = 'btn btn-primary' type='submit' name='edit3' value=" . $row['CartId'] . ">Remove from Cart</button>";
            //echo "<input type='hidden' name='edit' value=" . $row['EmailAddress'] . ">";
            //echo "<input type = 'submit' value = 'Select' class = 'btn btn-primary'/>";
            //echo "</div>";
            echo "</li>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div";
        echo "</form>";
        ?>
    </div>
</body>
