<!DOCTYPE html>
<html>
<head>
	<title>Transfer</title>
	

</head>
<body>

</body>
</html>
<?php
   $email=$_POST["email"];
  $amount=$_POST["amount"];
		$conn = mysqli_connect("localhost","swapni","Swapni@7673","swap_db");
		if($conn->connect_error){
		   die("Connection failed:".$conn->connect_error);

	}
	$sql = "SELECT * from bankdetails_db where Customer_email='$email'";
	$result = $conn->query($sql);
	$sql1= "SELECT * from bankdetails_db where Customer_email='bankmanager@gmail.com'";
	$result1= $conn->query($sql1);
	if($result1->num_rows > 0) {
	  while($row1 = $result1 -> fetch_assoc()) {
	 	$managerBalance =$row1["Current_bal"];

	}
}
	if($result->num_rows > 0) {
	  while($row = $result -> fetch_assoc()) {
	 $userBalance =$row["Current_bal"];

	}

}
else{
	echo "0 result";
}
   if($managerBalance<$amount)
   	echo "Transcation not possible";
   else
   {
   	$managerBalance=$managerBalance-$amount;
   	echo "<h3>Manager Balance : $managerBalance</h3>";
   	$userBalance=$userBalance+$amount;
   	$sql2 = "UPDATE bankdetails_db SET Current_bal='$userBalance' WHERE Customer_email='$email'";
    $sql3 = "UPDATE bankdetails_db SET Current_bal='$managerBalance' WHERE Customer_email='bankmanager@gmail.com'";
    $R1=$conn->query($sql2);

    $R2=$conn->query($sql3);
    echo "<h3>Hey...Your Transcation Was Completed Sucessfully!!!!<br><br>THANK YOU!!!!</h3>";
    echo "<button><a href='database%20connect%20to%20html.php'>Click Here to View customers</a></button>";
    


   }
  ?>
