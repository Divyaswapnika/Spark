<!DOCTYPE html>
<html>
<head>
	<title>Connect Database</title>
</head>
<body>
	<form action="viewcustomer.php" method="GET">

	
	<table>
		<tr>
			<th>first_name</th>
			<th>Customer_email</th>
			
			
		</tr>
		<?php
		$conn = mysqli_connect("localhost","swapni","Swapni@7673","swap_db");
		if($conn->connect_error){
		   die("Connection failed:".$conn->connect_error);

	}
	$sql = "SELECT first_name,Customer_email from bankdetails_db";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
	  while($row = $result -> fetch_assoc()) {
	 echo "<tr><td><button name ='email' value='".$row["Customer_email"]."'> " . $row["first_name"] ."</td><td>" .$row["Customer_email"] ."</button></td><td>";
	}
echo "</table>";
}
else{
	echo "0 result";
}
   $conn->close();
	?>
	</table>

</body>
</html>