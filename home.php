<?php
session_start();
if(empty($_SESSION['email2'])){
      header("location:login.php");
   }
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
    <script>
        $(document).ready(function() {
            $("#update").click(function() {
                $("#myModal0").modal();
            });
        });
    </script>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand mine44" href="home.php">
                    <img alt="Buggy" src="dinner (1).png">
                </a>
                <a class="navbar-brand" href="home.php">Buggy</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class = "active"><a href="#">DashBoard</a></li>
                    <li><a href="menuselecteddisplay.php">Cart</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" id = "update">Update Profile</a></li>
                            <li><a href="logout.php">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

                    <div class="modal fade" id="myModal0" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header" style="padding:35px 50px;">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="popeye1"><span class="glyphicon glyphicon-cutlery"></span> Update Profile</h4>
                                </div>
                                <div class="modal-body" style="padding:40px 50px;">
                                    <form role="form" method="post" action="userupdate.php">
                                        <div class="form-group">
                                            <label for="Name"><span class="glyphicon glyphicon-user"></span> Username</label>
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <input type="text" class="form-control" name="usrname1" placeholder="First Name">
                                                </div>
                                                <div class="col-xs-6">
                                                    <input type="text" class="form-control" name="usrname2" placeholder="Surname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ps1"><span class="glyphicon glyphicon-phone-alt"></span>Contact No</label>
                                            <input type="text" class="form-control" name="pscn" placeholder="91xxxxxxxx">
                                        </div>
                                        <div class="form-group">
                                            <label for="ps2"><span class="glyphicon glyphicon-globe"></span>Address</label>
                                            <textarea class="form-control" rows="4" placeholder="Address" name="ps2"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>New Password</label>
                                            <input type="password" class="form-control" name="psw" placeholder="Enter password">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-heart"></span>Update Profile</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                </div>
                            </div>

                        </div>
                    </div>
            <div class="jumbotron">
                    <div class = "container">
                        <div class = "row">
                            <h1 class = "opo opo1">Order delicious Food Online!</h1>
                        </div>
                        <div class = "row">
                            <h2 class="opo">Order food online from the best restaurants near you</h2>
                        </div>
                        <div class = "row"><p></p></div>
                        <div class="col-lg-12">
                            <form action = "home.php" role="form" method="post">
                            <div class="input-group input-group-lg lol1">
                                <input type="text" class="form-control" name = "search" placeholder="Type Delivery Location(City,Landmark etc..)">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">Show Restaurants</button>
                                </span>
                            </div>
                        </form>
                        </div>
                    </div>
            </div>
            <?php
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "admin";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                    if (!empty($_POST["search"]))
                    {
                        $_SESSION["address"] = test_input($_POST["search"]);
		                $q1=$_SESSION["address"];
                        $sql = "SELECT * FROM admi WHERE address LIKE '%$q1%'";
                        $result = $conn->query($sql);
                        echo "<h2 class = 'opo'>List of Restaurants</h2>";
                        echo "<form action = \"menudisplay.php\" name = 'MyForm' role = \"form\" method = \"post\">";
                        echo "<ul class=\"list-group\">";
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<div class = 'container'>";
                            echo "<div class = 'row'>";
                            echo "<li class = 'list-group-item'>";
                            echo "<div class = 'col-xl-4'><p></p></div>";
                            echo "<div class = 'col-xl-4'>";
                            echo "<h3>Restaurant Name: <span class='label label-primary'>";
                            echo $row['RestaurantName']."</span></h3>";
                            echo "</div>";
                            echo "<div class = 'col-xl-4'>";
                            echo "<h3>Restaurant Type: <span class='label label-info'>";
                            echo $row['RestaurantType']."</span></h3>";
                            echo "</div>";
                            echo "<div class = 'col-xl-4'>";
                            echo "<button class = 'btn btn-primary' type='submit' name='edit' value=" . $row['EmailAddress'] . ">Select This</button>";
                            //echo "<input type='hidden' name='edit' value=" . $row['EmailAddress'] . ">";
                            //echo "<input type = 'submit' value = 'Select' class = 'btn btn-primary'/>";
                            echo "</div>";
                            echo "</li>";
                            echo "</div>";
                            echo "</div>";
                        }
                        echo "</div";
                        echo "</form>";
                    }
                }
                $conn->close();
            ?>
</body>

</html>
