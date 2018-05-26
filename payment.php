<?php
session_start();
?>


<?php
    $q4 = $_SESSION["email2"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "admin";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    $sql="SELECT adminEmail, sum(ItemPrice) as total from cart GROUP BY UserEmail, adminEmail HAVING UserEmail = '{$q4}'";
    $result = $conn->query($sql);
    if(!$result)
    {
        echo "
        <script language='javascript'>
            window.alert('Some Problem 1!!!Please Try Later');
            window.location.href='home.php';
        </script>
        ";
        exit();
    }
	
    while($row = mysqli_fetch_array($result))
    {
		$q6 = $row['adminEmail'];
		
			$q7 = $row['total'];
		
		$sql4 = "INSERT INTO payment (userEmail, adminEmail, Total) VALUES('$q4', '$q6', '$q7')";
        if($conn->query($sql4) === FALSE)
		{
		$sql44 = "SELECT Total from payment WHERE userEmail= '{$q4}' and adminEmail=  '{$q6}'";
			$result44 = $conn->query($sql44);
			$row44 = mysqli_fetch_array($result44);
			$q12 = $row44['Total'];
			$q13 = $q7+ $q12;
			$sql66 = "UPDATE payment set Total='{$q13}' where UserEmail = '{$q4}' and adminEmail=  '{$q6}'";
			if($conn->query($sql66) === FALSE)
			{
				echo "
				<script language='javascript'>
					window.alert('Some Problem!!!Please Try Later');
					window.location.href='home.php';
				</script>
				";
				exit();
			}
		}
    }
    $sql3 = "DELETE from cart where UserEmail = '$q4'";
    if($conn->query($sql3) === FALSE)
    {
        echo "
        <script language='javascript'>
            window.alert('Some Problem!!!Please Try Later');
            window.location.href='home.php';
        </script>
        ";
        exit();
    }
    echo "
    <script language='javascript'>
        window.alert('Operation Successfull');
        window.location.href='home.php';
    </script>
    ";
    exit();
?>
