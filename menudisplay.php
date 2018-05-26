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
$q1 = $_SESSION["email2"];
$sql = "SELECT FirstName FROM user where Email = '$q1'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$q2 = $row["FirstName"];
$q9 = $_SESSION["carte"];
$sql2 = "SELECT ItemName,ItemType,ItemPrice FROM item where adminEmail = '$q9'";
$result2 = $conn->query($sql2);
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
                <a class="navbar-brand mine44" href="login.html">
                    <img alt="Buggy" src="dinner (1).png">
                </a>
                <a class="navbar-brand" href="login.html">Buggy</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="home.php">Dashboard</a></li>
                    <li class = "active"><a href="#">Menu Viewer</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron">
        <div class="container">
            <?php echo "<h1>Hello,". $q2. "!</h1>"?>
            <p>Below is the List of Items which are in the Restaurant you selected</p>
        </div>
    </div>
    <div class = "container">
        <?php
        echo "<form action = \"cart.php\" role = \"form\" method = \"post\">";
        echo "<ul class=\"list-group\">";
        while($row2 = mysqli_fetch_array($result2))
        {
            echo "<div class = 'container'>";
            echo "<div class = 'row'>";
            echo "<li class = 'list-group-item'>";
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
            echo "<button class = 'btn btn-primary' type='submit' name='edit1' value=" . $row2['ItemName'] . ">Add To Cart</button>";
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
