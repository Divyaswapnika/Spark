<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.spark
    {
    float: left;
    width: 400px;
    margin: 0;
    padding: 0;
    list-style: none;
    }
    .top-right {
  position: absolute;
  top: 8px;
  right: 16px;
}

body {
  background-image: url('pay1.jpeg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
	
</head>
<body >
	<div class="container">
	
	 <div class="top-right">Top Right</div>
</body>

<?php
$email=$_GET["email"];
echo "<h2>$email</h2>";
?>
<?php
		$conn = mysqli_connect("localhost","swapni","Swapni@7673","swap_db");
		if($conn->connect_error){
		   die("Connection failed:".$conn->connect_error);

	}
	$sql = "SELECT * from bankdetails_db where Customer_email='$email'";
	 echo '<ul class="spark">';
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
	  while($row = $result -> fetch_assoc()) {
	 echo "<h3>first name: " . $row["first_name"] ."<br><h3> Email: " .$row["Customer_email"] ." <br><h3>City: ".$row["city"]."<br><h3> Current_bal: ".$row["Current_bal"]."</h3>";
	
	}

echo "</table>";
}
else{
	echo "0 result";
}
   $conn->close();
	?>
<form action="Transfer.php" method="POST">
	<input type="number" placeholder="Enter the amount" Name="amount"><br>
	<?php
	 echo "<input type='hidden' name = 'email' value='$email'>";
	?>
	<br><button>Transfer from Bank Manager Account</button>

</form>	
</body>
</html>
