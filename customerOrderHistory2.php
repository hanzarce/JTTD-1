<!doctype html>
<?php
    require_once('../mysql_connect.php');
    session_start();
?>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Order History</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="home2.html" class="simple-text">
                    DOLLJOY
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="customerDashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="userProfile.php">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="customerReviewOrders.php">
                        <i class="pe-7s-search"></i>
                        <p>Review Orders</p>
                    </a>
                </li>
                <li>
                    <a href="customerOrderTracking.php">
                        <i class="pe-7s-map-marker"></i>
                        <p>Order Tracking</p>
                    </a>
                </li>
                <li class="active">
                    <a href="customerOrderHistory.php">
                        <i class="pe-7s-note2"></i>
                        <p>Order History</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                       
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <p class="hidden-lg hidden-md">
                                        5 Notifications
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                          
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                                <p class="hidden-lg hidden-md">Search</p>&nbsp;&nbsp;&nbsp;
                                <input type="textarea" placeholder="Search..."></input>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                       
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        Website
                                        <b class="caret"></b>
                                    </p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="home2.html">Home</a></li>
                                <li><a href="FAQ2.html">F.A.Q.</a></li>
                                <li><a href="gallery.html">Gallery</a></li>
                                <li><a href="services2.html">Services</a></li>
                                <li><a href="contact2.html">Contact</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="home.html">
                                <p>Log out</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>




        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Completed Doll Orders</h4>
                        <p class="category">Completed doll orders for entries between dates 
                            <?php 
                            echo $_POST["startDate"]." and ".$_POST["endDate"].".";
                            ?>
                            <br>
                            
                            <?php
                            date_default_timezone_set('Asia/Manila');
                            echo "<b>As of ".date('m/d/Y h:i A', time())."</b>";
                            ?>
                            </p>

                            <br>

                    </div>
                    <div class="content">
                        <div class="row">
                            
                
                            
                            <?php
                            
                            //User didn't input start and end date
                            if (empty($_POST['startDate']) && empty($_POST['endDate'])) {
                                echo "<center><font color='red'>Incomplete input.
                                <br>You forgot to choose a start and end date.
                                <br>Please click Back to try again.</center>";
                            }
                            //Start date is after end date or no end date was provided   
                            if ($_POST['startDate'] > $_POST['endDate']) {
                                
                                //User didn't input end date
                                if (!empty($_POST['startDate'] && empty($_POST['endDate']))){
                                echo "<center><font color='red'>Invalid input.
                                <br>You forgot to set an end date.
                                <br>Please click Back to try again.</center>";
                                }
                                
                                //Start date is after end date
                                else{
                                echo "<center><font color='red'>Invalid input.
                                <br>Start Date cannot be after End Date.
                                <br>Please click Back to try again.</center>";
                                }
                            }
                                
                                //User didn't input start date
                                if (!empty($_POST['endDate'] && empty($_POST['startDate']))){
                                echo "<center><font color='red'>Invalid input.
                                <br>You forgot to set a start date.
                                <br>Please click Back to try again.</center>";
                                }
                            
                            //User inputted start and end date where start date is before end date
                            if ((!empty($_POST['startDate'] && $_POST['endDate'])) && ($_POST['startDate'] < $_POST['endDate'])) {  
                                require_once('../mysql_connect.php');
                                $sD = $_POST["startDate"];
                                $eD = $_POST["endDate"];
                                $_SESSION['start']=$sD;
                                $_SESSION['end']=$eD;


                                echo '<table width="90%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
                                <tr>
                                <td width="10%"><div align="center"><b>Order ID
                                </div></b></td>
                                <td width="10%"><div align="center"><b>Quantity Ordered<br>(number of dolls ordered)
                                </div></b></td>
                                <td width="10%"><div align="center"><b>Total Amount<br>(in PHP)
                                </div></b></td>
                                <td width="10%"><div align="center"><b>Date Ordered
                                </div></b></td>
                                <td width="10%"><div align="center"><b>Date Shipped
                                </div></b></td>
                                <td width="10%"><div align="center"><b>Date Paid
                                </div></b></td>
                                </tr>';


                                $query="SELECT OrderID, OQuantity, OTotalAmount, OOrderedDate, OShippedDate, OPaymentDate From Orders where OShippedDate between '$sD' AND '$eD' AND ManufacturingStatus ='Completed' AND OShipmentStatus = 'Shipped' AND OrderStatus = 'Completed' ";
                                $result=mysqli_query($dbc,$query);
                                
                                
                                while ($row = mysqli_fetch_array($result)) {
                                $id = $row['OrderID'];
                                echo "<tr>
                                <td width=\"10%\"><div align=\"center\"><a href=\"individualSalesReport.php?id=$id \">{$row['OrderID']}</a>
                                </div></td>
                                
                                <td width=\"10%\"><div align=\"right\">{$row['OQuantity']}
                                </div></td>
                                
                                <td width=\"10%\"><div align=\"right\">{$row['OTotalAmount']}
                                </div></td>
                                
                                <td width=\"10%\"><div align=\"center\">{$row['OOrderedDate']}
                                </div></td>";
                                
                                if ($row['OShippedDate'] == '0000-00-00'){
                                    echo "<td width=\"10%\"><div align=\"center\">Not Shipped</div></td>";
                                }
                                else if ($row['OShippedDate'] != '0000-00-00'){
                                    echo "<td width=\"10%\"><div align=\"center\">{$row['OShippedDate']}
                                    </div></td>";
                                }
                                
                                echo "<td width=\"10%\"><div align=\"center\">{$row['OPaymentDate']}
                                </div></td>
                                </tr>";

                                }
                                
                                echo '</table>';
                                
                                
                                
                                
                                echo '<br><br>
                            <strong><center>------ END OF REPORT ------</center></strong>';
                            }

                                ?>
                            <br>
                            <br>
                            <center><a href="completedDollOrders1.php"><input type="submit" class="btn btn-primary btn-fill" value="Back"></a></center>

                        <br>
                        <br>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                   
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="home2.html">Dolljoy</a>, designed by Before You Exit
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

        <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>

</html>