<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php
$email=$_GET["email"];
echo "<h1>$email</h1>";
?>
<?php
		$conn = mysqli_connect("localhost","swapni","Swapni@7673","swap_db");
		if($conn->connect_error){
		   die("Connection failed:".$conn->connect_error);

	}
	$sql = "SELECT * from bankdetails_db where Customer_email='$email'";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
	  while($row = $result -> fetch_assoc()) {
	 echo "first name: " . $row["first_name"] ." Email: " .$row["Customer_email"] ." City: ".$row["city"]."<br><h3> Current_bal: ".$row["Current_bal"]."</h3>";
	}
echo "</table>";
}
else{
	echo "0 result";
}
   $conn->close();
	?>
<form action="Transfer.php" method="POST">
	<input type="number" placeholder="Enter the amount" Name="amount">
	<?php
	 echo "<input type='hidden' name = 'email' value='$email'>";
	?>
	<button>Transfer from Bank Manager Account</button>

</form>	
</body>
</html>