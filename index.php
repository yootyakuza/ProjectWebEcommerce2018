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
    <!-- Google-code-prettify -->
    <link href="themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="themes/images/ico/favicon.ico">
    
    <style type="text/css" id="enject"></style>
    <script language="JavaScript" type="text/JavaScript">
        function makeRequestObject() {
            var xmlhttp = false;
            try {
                xmlhttp = new ActiveXObject('Msxml2.XMLHTTP'); // #1
            } catch (e) {
                try {
                    xmlhttp = new
                    ActiveXObject('Microsoft.XMLHTTP'); // #2
                } catch (E) {
                    xmlhttp = false;
                }
            }
            if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
                xmlhttp = new XMLHttpRequest(); // #3
            }
            return xmlhttp;
        }
        function updateCart() { // #4
            var xmlhttp = makeRequestObject();
            xmlhttp.open('GET', 'countcart.php', true); // #5
            xmlhttp.onreadystatechange = function () { // #6
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { // #7
                    var ajaxCart = document.getElementById("cartcountinfo"); // #8
                    ajaxCart.innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.send(null);
        }
    </script>
</head>
<body>
<div id="header">
    <div class="container">
        <div id="welcomeLine" class="row"></div>
        <!-- Navbar ================================================== -->
        <div id="logoArea" class="navbar">
            <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-inner">
                <a class="brand" href="index"><img src="themes/images/logo.png" alt="Bootsshop"/></a>
                <form class="form-inline navbar-search" method="post" action="searchitems.php">
                    <input id="srchFld" class="srchTxt" type="text" name="tosearch"/>
                    <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
                </form>
                <ul id="topMenu" class="nav pull-right">
                
            <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }if (isset($_SESSION['emailaddress'])) {
            ?>
                <li style="Color:White;"><?php echo "<br>"."Welcome " . $_SESSION['emailaddress'] . "&nbsp;&nbsp;&nbsp;";  ?></li>
                
                <li><?php echo "<a href=\"logout.php\">Log Out</a></td></tr>"; ?></li>
                <?php
             }if(!isset($_SESSION['emailaddress'])) {
            ?>
                    <li class="">
                    <a href="#signup" data-toggle="modal" style="padding-right:0"><span><?php echo"Signup";?></span></a>
                        <div id="signup" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="false" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3>Register</h3>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal loginFrm" action="addcustomer.php" method="post" onsubmit="return validate(this);">
                                    <div class="control-group">
                                        <input type="text" id="emailmsg" placeholder="Email" name="emailaddress">
                                    </div>
                                    <div class="control-group">
                                        <input type="password"id="passwdmsg" placeholder="Password" name="password">
                                    </div>
                                    <div class="control-group">
                                        <input type="text" id="usrmsg" placeholder="Username" name="complete_name">
                                    </div>
                                    <div class="control-group">
                                        <input type="text"  placeholder="Address" name="address1">
                                    </div>
                                    <div class="control-group">
                                        <input type="text" placeholder="City" name="city">
                                    </div>
                                    <div class="control-group">
                                        <input type="text" placeholder="State" name="state">
                                    </div>
                                    <div class="control-group">
                                        <input type="text" placeholder="Country" name="country">
                                    </div>
                                    <div class="control-group">
                                        <input type="text" placeholder="Zipcode" name="zipcode">
                                    </div>
                                    <div class="control-group">
                                        <input type="text" placeholder="Phone number" name="phone_no">
                                    </div>
                                <br>
                                <button type="submit" class="btn btn-success">Register</button>
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                </form>
                            </div>
                        </div>
                    <li class="">
                        <a href="#login" data-toggle="modal" style="padding-right:0"><span><?php echo"Login&nbsp;&nbsp;&nbsp;"; }?></span></a>
                        <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3>Login</h3>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal loginFrm" action="validateuser.php" method="post">
                                    <div class="control-group">
                                        <input type="text" id="inputEmail" placeholder="Email" name="emailaddress">
                                    </div>
                                    <div class="control-group">
                                        <input type="password" id="inputPassword" placeholder="Password" name="password">
                                    </div>
                                <br>
                                <button type="submit" class="btn btn-success">Sign in</button>
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Header End====================================================================== -->
<div id="carouselBlk">
    <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
            <div class="item active">
                <div class="container">
                    <a href="itemlist.php?category=CellPhone"><img style="width:100%" src="themes/images/carousel/1.png" alt="special offers"/></a>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <a href="itemlist.php?category=Laptop"><img style="width:100%" src="themes/images/carousel/2.png" alt=""/></a>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <a href="itemlist.php?category=CellPhone"><img src="themes/images/carousel/3.png" alt=""/></a>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <a href="itemlist.php?category=Laptop"><img src="themes/images/carousel/4.png" alt=""/></a>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <a href="itemlist.php?category=CellPhone"><img src="themes/images/carousel/5.png" alt=""/></a>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <a href="itemlist.php?category=Laptop"><img src="themes/images/carousel/6.png" alt=""/></a>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
</div>
<div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->
            <div id="sidebar" class="span3">
                <div class="well well-small"><a id="myCart" href="cart.php"><img src="themes/images/ico-cart.png" alt="cart"><span class="badge badge-warning" id="cartcountinfo"></span></a></div>
                <ul id="sideManu" class="nav nav-tabs nav-stacked">
                    <li class="subMenu open"><a> ELECTRONICS</a>
                        <ul>
                            <li><a class="active" href="itemlist.php?category=CellPhone"><i class="icon-chevron-right"></i>Smart Phones</a></li>
                            <li><a href="itemlist.php?category=Laptop"><i class="icon-chevron-right"></i>Laptops</a></li>
                            <li><a href="index"><i class="icon-chevron-right"></i>Cameras</a></li>
                            <li><a href="index"><i class="icon-chevron-right"></i>Televisions</a></li>
                        </ul>
                    </li>
                    <li class="subMenu"><a>Home & Furniture</a>
                        <ul style="display:none">
                            <li><a href="index"><i class="icon-chevron-right"></i>Kitchen Essentials</a></li>
                            <li><a href="index"><i class="icon-chevron-right"></i>Bath Essentials</a></li>
                            <li><a href="index"><i class="icon-chevron-right"></i>Furniture</a></li>
                            <li><a href="index"><i class="icon-chevron-right"></i>Dining & Serving</a></li>
                            <li><a href="index"><i class="icon-chevron-right"></i>Cookware</a></li>
                        </ul>
                    </li>
                </ul>
                <br/>
                <div class="thumbnail">
                    <img src="themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
                    <div class="caption">
                        <h5>Payment Methods</h5>
                    </div>
                </div>
            </div>
            <!-- for body -->

<!-- Placed at the end of the document so the pages load faster ============================================= -->
<script src="themes/js/jquery.js" type="text/javascript"></script>
<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
<script src="themes/js/google-code-prettify/prettify.js"></script>

<script src="themes/js/bootshop.js"></script>
<script src="themes/js/jquery.lightbox-0.5.js"></script>

<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
    <link rel="stylesheet" href="themes/switch/themeswitch.css" type="text/css" media="screen" />
    <script src="themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
    <div id="themeContainer">
        <div id="hideme" class="themeTitle">Style Selector</div>
        <div class="themeName">Oregional Skin</div>
        <div class="images style">
            <a href="themes/css/#" name="bootshop"><img src="themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
            <a href="themes/css/#" name="businessltd"><img src="themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
        </div>
        <div class="themeName">Bootswatch Skins (11)</div>
        <div class="images style">
            <a href="themes/css/#" name="amelia" title="Amelia"><img src="themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="spruce" title="Spruce"><img src="themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>
            <a href="themes/css/#" name="superhero" title="Superhero"><img src="themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="cyborg"><img src="themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="cerulean"><img src="themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="journal"><img src="themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="readable"><img src="themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="simplex"><img src="themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="slate"><img src="themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="spacelab"><img src="themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="united"><img src="themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>
            <p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples and you can build your own color scheme in the backend.</small></p>
        </div>
        <div class="themeName">Background Patterns </div>
        <div class="images patterns">
            <a href="themes/css/#" name="pattern1"><img src="themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>
            <a href="themes/css/#" name="pattern2"><img src="themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern3"><img src="themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern4"><img src="themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern5"><img src="themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern6"><img src="themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern7"><img src="themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern8"><img src="themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern9"><img src="themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern10"><img src="themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>

            <a href="themes/css/#" name="pattern11"><img src="themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern12"><img src="themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern13"><img src="themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern14"><img src="themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern15"><img src="themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>

            <a href="themes/css/#" name="pattern16"><img src="themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern17"><img src="themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern18"><img src="themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern19"><img src="themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>
            <a href="themes/css/#" name="pattern20"><img src="themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>

        </div>
    </div>
</div>
<span id="themesBtn"></span>
</body>
</html>