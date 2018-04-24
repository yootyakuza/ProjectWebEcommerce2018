<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bintu online Barza</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap style -->
    <link id="callCss" rel="stylesheet" href="themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="themes/css/base.css" rel="stylesheet" media="screen"/>
    <!-- Bootstrap style responsive -->
    <link href="themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="themes/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
</head>
<body>
<?php include("index.php")
?>
<div class="span9">
    <div class="well well-small">
        <h4>Featured Products
            <small class="pull-right">Select the item you want.</small>
        </h4>
        <div class="row-fluid">
            <div id="featured">
                <div class="carousel-inner">
                    <?php
                    $connect = mysqli_connect("localhost", "root", "", "shopping") or
                    die("Please, check your server connection.");
                    $category = $_REQUEST['category'];
                    $query = "SELECT item_code, item_name, description, imagename, price FROM products " . "where category like '$category' order by item_code";
                    $results = mysqli_query($connect, $query) or die(mysqli_error());
                    if (mysqli_num_rows($results) > 0):
                        while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)):
                            ?>
                            <div class="item" style="margin-left: 40px;">
                                <?php
                                extract($row);
                                ?>
                                <li class="span3">
                                    <div class="thumbnail" style="margin-left: 10px;margin-bottom: 20px;">
                                        <?php if($price > 1000){
                                            ?>
                                             <i class="tag"></i> <?php
                                            }?>
                                        <!-- <i class="tag"></i> ติด tag สินค้าใหม่ -->
                                        <?php
                                        echo "<a href=itemdetails.php?itemcode=$item_code>" ?>
                                        <img src="<?php echo $imagename ?> "/>
                                        <div class="caption">
                                            <h5><?php echo $item_code . '<br/>'; ?></h5>
                                            <h4><a class="btn"
                                                   <?php echo "<a href=itemdetails.php?itemcode=$item_code>" ?>VIEW</a>
                                                <span
                                                        class="pull-right"><?php echo '$' . $price;
                                                    ?></span></h4>
                                        </div>
                                    </div>
                                </li>
                            </div>
                            <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>