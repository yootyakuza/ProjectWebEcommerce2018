<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Bintu online Barza</title>
</head>
<body>
	<?php include ('index.php');?>
<?php
$connect = mysqli_connect("localhost", "root", "", "shopping") or die
("Please, check the server connection.");
$email_address = $_POST['emailaddress'];
$password = $_POST['password'];
//$repassword = $_POST['repassword'];
$completename = $_POST['complete_name'];
$address1 = $_POST['address1'];
//$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$zipcode = $_POST['zipcode'];
$phone_no = $_POST['phone_no'];
$sql = "INSERT INTO customers (email_address, password, complete_name,
address_line1, city, state, zipcode, country, cellphone_no)
VALUES ('$email_address',(PASSWORD('$password')), '$completename', '$address1','$city', '$state', '$zipcode', '$country', '$phone_no')";
$result = mysqli_query($connect, $sql) or die(mysql_error());
//echo $result;
$message = "Dear, ";
$message1 = "your account is successfully created";
$errormessage = "Some error occurred. Please use different email address";
if ($result) {
	?>
    <p>
	<?php echo "<script type='text/javascript'>alert('$message$completename$message1');</script>";?>
	<?php
} else {
	echo "<script type='text/javascript'>alert('$errormessage');</script>";
}
?>
</body>
</html>