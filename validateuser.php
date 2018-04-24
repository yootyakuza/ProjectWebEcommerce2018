<html>
<head>
    <script language="JavaScript" type="text/JavaScript">
        function updateUser(username) { // #1
            var ajaxUser = document.getElementById("userinfo"); // #2
            ajaxUser.innerHTML = "Welcome " + username + "&nbsp;&nbsp;&nbsp; <a href=\"logout.php\">Log Out</a>";
        }
    </script>
</head>
<body>
<?php
include('index.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$connect = mysqli_connect("localhost", "root", "", "shopping") or die("Please, check your server connection.");
$query = "SELECT email_address, password, complete_name FROM customers WHERE email_address like '" . $_POST['emailaddress'] . "' " . "AND password like (PASSWORD('" . $_POST['password'] . "'))";
$result = mysqli_query($connect, $query) or die(mysql_error()); // #3
$message = "Welcome ";
$message1 = " to our Shopping Mall";
$messageError = "Invalid Email address and/or Password. ";
$messageError1 = "If you do not Register.Just register or want to try login again. Please try again!!!";
if (mysqli_num_rows($result) == 1) {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        extract($row);
        echo "<script type='text/javascript'>alert('$message$complete_name$message1');</script>";
        $_SESSION['emailaddress'] = $_POST['emailaddress'];
        $_SESSION['password'] = $_POST['password'];
        echo "<SCRIPT LANGUAGE=\"JavaScript\">updateUser('$complete_name');
</SCRIPT>"; // #5
    }
} else {
    ?>
    <?php
    echo "<script type='text/javascript'>alert('$messageError$messageError1');</script>";
}
?>
</body>
</html>

