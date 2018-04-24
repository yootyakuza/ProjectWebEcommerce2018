<?php
include('index.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$connect = mysqli_connect("localhost", "root", "", "shopping") or
die("Please, check your server connection.");
$cartamount = 0;
$total = 0;
$cartamount = $_POST['cartamount'];
$total = $_POST['totalquantity'];// รับค่ามาจาก showcart
$_SESSION['cartamount'] = $cartamount;
if (isset($_SESSION['emailaddress'])) {
    $email_address = $_SESSION['emailaddress'];
    echo "<br><table border=\"0\" align=\"center\" cellpadding=\"5\"><tr><td>";
    echo "Welcome " . $email_address . ". <br/>";
    echo "</td></tr>";
}
if (isset($_SESSION['password'])) {
    $password = $_SESSION['password'];
}
if ((isset($_SESSION['emailaddress']) && $_SESSION['emailaddress'] != "") ||
    (isset($_SESSION['password']) && $_SESSION['password'] != "")
) {
    $tmp = 0;//สร้างตัวแปรไว้เก็บค่า
    $sess = session_id();//สร้างตัวแปรมาเก็บค่า session id
    $query = "select * from cart where cart_sess = '$sess'";
    $results = mysqli_query($connect, $query) or die(mysql_error());
    if (mysqli_num_rows($results) >= 1) {

        $query = "select * from customers where email_address = '$email_address'";//ทำการ query ข้อมูลออกมา
        $result = mysqli_query($connect, $query) or die(mysql_error());
        $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
        extract($data);//แล้วทำการ แตกข้อมูลเพื่อเอาไปใช้ในการ insert เข้า ตาราง orders และส่งค่าไปยัง sanbox.2checkout

        $query = "select * from orders";//select ข้อมูลจากตาราง orders
        $result = mysqli_query($connect, $query) or die(mysql_error());
        $id = mysqli_num_rows($result)+1;//ทำการจนับำนวนแถวที่คิวรี่แล้วให้ค่าเพิ่มทีละ 1 เก็บไว้ในตัวแปร id

        $query = "INSERT INTO orders (order_date, email_address, customer_name, shipping_address_line1, shipping_city, shipping_state, shipping_country, shipping_zipcode) 
        VALUES (NOW(), '$email_address', '$complete_name','$address_line1', '$city', '$state', '$country', '$zipcode')";
        mysqli_query($connect, $query) or die(mysql_error());//insert ข้อมูลเข้าตาราง orders

        echo"<form action='https://sandbox.2checkout.com/checkout/purchase' method='post'>
             <input type='hidden' name='sid' value='901376583' />
             <input type='hidden' name='mode' value='2CO' />";
            while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
                extract($row);
                //form นี้ใช้ในการส่งค่าไปยัง sanbox.2checkout ขณะกำลังส่งค่าก็จะทำการ  insert ตาม code ด้านล่าง(อ่านด้วยว่าส่งค่าอะไรไป)
                $query = "INSERT INTO orders_details (order_no, item_code, item_name, quantity, price) 
                VALUES ('$id', '$cart_itemcode','$cart_item_name', '$cart_quantity', '$cart_price')";
                mysqli_query($connect, $query) or die(mysql_error());

                echo "<input type='hidden' name='li_{$tmp}_type' value='product' />
                      <input type='hidden' name='li_{$tmp}_name' value='$cart_item_name' />
                      <input type='hidden' name='li_{$tmp}_quantity' value='$cart_quantity' />
                      <input type='hidden' name='li_{$tmp}_price' value='$cart_price' />";
                      $tmp += 1;
            }
        echo "<input type='hidden' name='card_holder_name' value='$complete_name' />
              <input type='hidden' name='street_address' value='$address_line1' />
              <input type='hidden' name='city' value='$city' />
              <input type='hidden' name='state' value='$state' />
              <input type='hidden' name='zip' value='$zipcode' />
              <input type='hidden' name='country' value='$country' />
              <input type='hidden' name='email' value='$email_address' />
              <input type='hidden' name='phone' value='$cellphone_no' />";
        echo "<tr><td><br>";
        echo "There are $total products chosen in the cart worth $$cartamount<br>If you have finished Shopping ";
        echo "<input name='submit' type='submit' style='background-color: Transparent;border:0;color:blue;' value='Click Here' /> to purchasing by selecting items from the menu";
        echo "</form>";
            //จากนั้นโปรแกรมจะทำตามลำดับขั้นตอนในลูบ if นี้ คือจะทำการ delete ข้อมูลจากตาราง cart ตาม session
        $query = "DELETE FROM cart WHERE cart_sess = '$sess'";
        mysqli_query($connect, $query) or die(mysql_error());
    } else {
        echo "You can do purchasing by selecting items from the menu on left side";
    }
    echo "</td></tr>";
    echo "</table>";
} else {
    ?>
    <html>
    <head>
    </head>
    <body>
    <h3>Not Logged in yet</h3>
    <p>
        You are currently not logged into our system.<br>
        You can do purchasing only if you are logged in.<br>
        If you have already registered,
        <a href="#login" data-toggle="modal" style="padding-right:0"><span style="color:blue;font-size:15px;"><?php echo"click here"?></span></a> to login, or if would like to create an
        account, <a href="#signup" data-toggle="modal" style="padding-right:0"><span style="color:blue;font-size:15px;"><?php echo"click here"?></span></a> to register.
    </p>
    </body>
    </html>
    <?php
}
?>