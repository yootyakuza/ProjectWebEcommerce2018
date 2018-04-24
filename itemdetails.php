<?php
include('index.php');
?>
<div class="span9">
<?php
$connect = mysqli_connect("localhost", "root", "", "shopping") or die("Please, check your server connection.");
$code = $_REQUEST['itemcode'];
$query = "SELECT item_code, item_name, description, imagename, price FROM products " . "where item_code like '$code'";
$results = mysqli_query($connect, $query) or die(mysql_error()); // #1
$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
extract($row);
echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"5\">";
echo "<tr><td style=\"padding: 3px;\" rowspan=\"6\">";
echo '<img src=' . $imagename . ' style="max-width:200px;max-height:260px;width:auto;height:auto;"></img></td>';
echo "<td colspan=\"2\" align=\"center\" style=\"font-family:verdana;font-size:150%;\"><b>";
echo $item_name;
echo "</b></td></tr><tr><td colspan=\"2\"><table><tr><td>";
$itemname = urlencode($item_name);
$itemprice = $price;
$itemdescription = $description;
$pfquery = "SELECT feature1, feature2, feature3, feature4, feature5,feature6 FROM productfeatures " . "where item_code like '$code'"; // #2
$pfresults = mysqli_query($connect, $pfquery) or die(mysql_error());
$pfrow = mysqli_fetch_array($pfresults, MYSQLI_ASSOC);
extract($pfrow);
echo $feature1;
echo "</td><td>";
echo $feature2;
echo "</td></tr><tr><td>";
echo $feature3;
echo "</td><td>";
echo $feature4;
echo "</td></tr><tr><td>";
echo $feature5;
echo "</td><td>";
echo $feature6;
echo "</td></tr><tr>";
echo "<form method=\"POST\" action=\"cart.php?action=add&icode=$item_code&iname=$itemname&iprice=$itemprice\">";
echo "<td colspan=\"2\" style=\"font-family:verdana; font-size:150%;\">";
echo "<hr class=\"soft clr\">";
echo " Quantity: <input type=\"number\" class=\"span1\" placeholder=\"Qty.\" name=\"quantity\" size=\"2\">&nbsp;&nbsp;&nbsp;Price: " . $itemprice;
echo "</td></tr><tr><td colspan=\"2\"><input type=\"submit\"class=\"btn btn-large btn-primary\" name=\"buynow\" value=\"Buy Now\" style=\"font-size:150%;\">";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type=\"submit\" class=\"btn btn-large btn-primary\" name=\"addtocart\"> Add To Cart <i class=\" icon-shopping-cart\"></i></button</td>";
echo " </form>";
echo "</tr></table></table>";
echo "<hr class=\"soft clr\">";
echo "<p style=\"font-size:140%;\">Description</p>";
echo $itemdescription;
echo "<hr class=\"soft clr\">";
?>
</div>

					
			