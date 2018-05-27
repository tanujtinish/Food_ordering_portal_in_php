
<?php
session_start();
if(empty($_SESSION["email"])){
      header("location:login.php");
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
    $q1 = $_SESSION["email"];
    $sql = "SELECT FirstName FROM admi where EmailAddress = '$q1'";
    $sql2 = "SELECT * FROM item where adminEmail = '$q1'";
    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    $row = $result->fetch_assoc();
    $q2 = $row["FirstName"];
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
    <script>
        $(document).ready(function() {
            $("#addItem").click(function() {
                $("#myModal11").modal();
            });
        });
        $(document).ready(function() {
            $("#mop").click(function() {
                $("#myModal12").modal();
            });
        });
        $(document).ready(function() {
            $("#updatePrice").click(function() {
                $("#myModal90").modal();
            });
        });
        $(document).ready(function() {
            $("#deleteItem").click(function() {
                $("#myModal91").modal();
            });
        });
    </script>
    <nav class="navbar navbar-default fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand mine44" href="home1.php">
                    <img alt="Buggy" src="dinner (1).png">
                </a>
                <a class="navbar-brand" href="home1.php">Buggy</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class = "active"><a href="#">DashBoard</a></li>
                    <li><a href="paymentdisplay.php">Payment History</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" id = "addItem">Add Items</a></li>
                            <li><a href="#" id = "updatePrice">Update Prices</a></li>
                            <li><a href="#" id = "deleteItem">Delete Item</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" id = "mop">Update Profile</a></li>
                            <li><a href="logout.php">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="myModal11" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-cutlery"></span>Add Item</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" method="post" action = "additem.php">
                        <div class="form-group">
                            <label for="psin"><span class="glyphicon glyphicon-grain"></span>Item Name</label>
                            <input type="text" class="form-control" name="psin" placeholder="Paneer Masala etc...">
                        </div>
                        <div class="form-group">
                            <label for="psit"><span class="glyphicon glyphicon-apple"></span> Item Type</label>
                            <input type="text" class="form-control" name="psit" placeholder="Dessert, Curry...">
                        </div>
                        <div class="form-group">
                            <label for="psip"><span class="glyphicon glyphicon-piggy-bank"></span> Price</label>
                            <input type="text" class="form-control" name="psip" placeholder="Price">
                        </div>
                        <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Add Item</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal90" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-cutlery"></span>Update Price</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" method="post" action = "itemupdate.php">
                        <div class="form-group">
                            <label for="psin1"><span class="glyphicon glyphicon-grain"></span>Item Name</label>
                            <input type="text" class="form-control" name="psin1" placeholder="Paneer Masala etc...">
                        </div>
                        <div class="form-group">
                            <label for="psip1"><span class="glyphicon glyphicon-piggy-bank"></span>New Price</label>
                            <input type="text" class="form-control" name="psip1" placeholder=" New Price">
                        </div>
                        <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Update Price</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal91" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4><span class="glyphicon glyphicon-trash"></span>Delete Item</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" method="post" action = "itemdelete.php">
                        <div class="form-group">
                            <label for="psin2"><span class="glyphicon glyphicon-grain"></span>Item Name</label>
                            <input type="text" class="form-control" name="psin2" placeholder="Paneer Masala etc...">
                        </div>
                        <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-trash"></span> Remove Item</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal12" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="popeye1"><span class="glyphicon glyphicon-cutlery"></span>Update Profile</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" method="post" action="adminupdate.php">
                        <div class="form-group">
                            <label for="Name"><span class="glyphicon glyphicon-user"></span> OwnerName</label>
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
                            <label for="ps"><span class="glyphicon glyphicon-font"></span> Restaurant Name</label>
                            <input type="text" class="form-control" name="psrn" placeholder="Restaurant Name">
                        </div>
                        <div class="form-group">
                            <label for="ps"><span class="glyphicon glyphicon-leaf"></span>Restaurant Type</label>
                            <input type="text" class="form-control" name="psrt" placeholder="Italian,Chinese etc..">
                        </div>
                        <div class="form-group">
                            <label for="ps1"><span class="glyphicon glyphicon-phone-alt"></span>Contact No</label>
                            <input type="text" class="form-control" name="pscn" placeholder="91xxxxxxxx">
                        </div>
                        <div class="form-group">
                            <label for="ps2"><span class="glyphicon glyphicon-globe"></span> Restaurant Address</label>
                            <textarea class="form-control" rows="4" placeholder="Address" name="psa"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span>New Password</label>
                            <input type="password" class="form-control" name="psw" placeholder="Enter password">
                        </div>
                        <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-import"></span>Update My Profile</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                </div>
            </div>

        </div>
    </div>
    <div class="jumbotron">
        <div class="container">
            <?php echo "<h1>Hello,". $q2. "!</h1>"?>
            <p>Below is the List of Items which are in your Menu</p>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Item Name</th>
                <th>Item Type</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $erpr = 1;
            while($row2 = $result2->fetch_assoc())
            {
                echo "<tr><th scope = \"row\">" . $erpr . "</th><td>" . $row2['ItemName'] . "</td><td>" . $row2['ItemType'] . "</td><td>" . $row2['ItemPrice'] . "</td></tr>";
                $erpr++;
            }
        ?>
        </tbody>
    </table>
</body>

</html>
