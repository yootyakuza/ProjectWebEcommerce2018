<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bintu Online Barza</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php
if (!isset($totalamount)) {
    $totalamount = 0;
}
$totalquantity = 0;
if (!session_id()) {
    session_start();
}
$connect = mysqli_connect("localhost", "root", "", "shopping") or
die("Please, check your server connection.");
$sessid = session_id();
$query = "SELECT * FROM cart WHERE cart_sess = '$sessid'";
$results = mysqli_query($connect, $query) or die (mysql_query());
if (mysqli_num_rows($results) == 0)
{
    echo "<div align=\"center\"><strong>Your Cart is empty</strong></div>";
}
else
{
?>
<table border="1" align="center" cellpadding="5">
    <tr>
        <td style="text-align: center;"> Item Code</td>
        <td style="text-align: center;">Quantity</td>
        <td style="text-align: center;">Item Name</td>
        <td style="text-align: center;">Price</td>
        <td style="text-align: center;">Total Price</td>
        <td style="text-align: center;">Edit</td>
        <td style="text-align: center;">Delete</td>
        <?php
        while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
            extract($row);
            echo "<br><tr><td>";
            echo $cart_itemcode;
            echo "</td><form method=\"POST\" action=\"cart.php?action=change&icode=$cart_itemcode\"><td>";
            echo "<input type=\"number\" style=\"text-align: center;\" class=\"span1\" name=\"modified_quantity\" size=\"2\"value=\"$cart_quantity\">";
            echo "</td><td>";
            echo $cart_item_name;
            echo "</td><td>";
            echo $cart_price;
            echo "</td><td>";
            $totalquantity = $totalquantity + $cart_quantity;
            $totalprice = number_format($cart_price * $cart_quantity, 2);
            $totalamount = $totalamount + ($cart_price * $cart_quantity);
            echo $totalprice;
            echo "</td><td>";
            echo "<button type=\"submit\" class=\"btn btn-warning\" name=\"Submit\">Update</button></form>";
            echo "</td><form method=\"POST\" action=\"cart.php?action=delete&icode=$cart_itemcode\"><td>";
            echo "<button class=\"btn btn-danger\"type=\"submit\" name=\"Submit\">Delete</button></div></form>
</td></tr>";
        }
        echo "<tr><td>Total</td><td style=\"text-align: center;\">$totalquantity</td><td></td><td></td><td class=\"label label-important\">";
        $totalamount = number_format($totalamount, 2);
        echo "<h5>$totalamount</h5>";
        echo "</td></tr>";
        echo "</table><br>";
        echo "<div style=\"width:400px; text-align:center; margin:auto;\">You currently have " . $totalquantity . " product(s) selected in your cart</div> ";
        ?>
        <table border="0" style="margin:auto;">
            <tr>
                <td style="padding: 10px;">
                    <form method="POST" action="cart.php?action=empty">
                        <input type="submit" class="btn btn-primary" name="Submit" value="Empty Cart"style="font-family:verdana; font-size:130%;">
                    </form>
                </td>
                <td>
                    <form method="POST" action="checklogin.php">
                        <input id="totalquantity" name="totalquantity" type="hidden" value="<?php echo $totalquantity; ?>">
                        <input id="cartamount" name="cartamount" type="hidden" value="<?php echo $totalamount; ?>">
                        <input type="submit" class="btn btn-success" name="Submit" value="Checkout" style="font-family:verdana; font-size:130%;">
                    </form>
                </td>
            </tr>
        </table>
        <?php
        }
        ?>
</body>
</html>