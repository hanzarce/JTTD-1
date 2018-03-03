<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Production Manager Dashboard</title>

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

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="home2.html" class="simple-text">
                    DOLLJOY
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="prodManDashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="accountRequests.php">
                        <i class="pe-7s-add-user"></i>
                        <p>Account Requests</p>
                    </a>
                </li>
                <li>
                    <a href="activateAccounts.php">
                        <i class="pe-7s-unlock"></i>
                        <p>Activate Accounts</p>
                    </a>
                </li>
                <li>
                    <a href="addEmployee.php">
                        <i class="pe-7s-id"></i>
                        <p>Add Employees</p>
                    </a>
                </li>
                <li>
                    <a href="viewAccounts.php">
                        <i class="pe-7s-users"></i>
                        <p>View Accounts</p>
                    </a>
                </li>
                <li>
                    <a href="reviewOrders.php">
                        <i class="pe-7s-search"></i>
                        <p>Review Orders</p>
                    </a>
                </li>
                <li>
                    <a href="dollOrders.php">
                        <i class="pe-7s-menu"></i>
                        <p>Current Doll Orders</p>
                    </a>
                </li>
                <li>
                    <a href="shipment.php">
                        <i class="pe-7s-next-2"></i>
                        <p>Payment and Shipment</p>
                    </a>
                </li>
                <li>
                    <a href="completedDollOrders1.php">
                        <i class="pe-7s-notebook"></i>
                        <p>Completed Doll Orders</p>
                    </a>
                </li>
                <li>
                    <a href="orderFromSuppliers.php">
                        <i class="pe-7s-drawer"></i>
                        <p>Supply Orders</p>
                    </a>
                </li>
                <li>
                    <a href="addSuppliers.php">
                        <i class="pe-7s-cart"></i>
                        <p>Add Suppliers</p>
                    </a>
                </li>
                <li>
                    <a href="receiveInventory.php">
                        <i class="pe-7s-box1"></i>
                        <p>Inventory</p>
                    </a>
                </li>
                <li>
                    <a href="generateSalesReport.php">
                        <i class="pe-7s-display1"></i>
                        <p>Generate Sales Report</p>
                    </a>
                </li>
                <li>
                <a href="addNewDoll.php">
                        <i class="pe-7s-magic-wand"></i>
                        <p>Add New Doll</p>
                    </a>
              </li>
              <li>
                <a href="gallery.php">
                        <i class="pe-7s-look"></i>
                        <p>View Premade Dolls</p>
                    </a>
              </li>
              <li>
              <a href="createNewSpec.php">
                        <i class="pe-7s-next-2"></i>
                        <p>Create New Doll Specification</p>
                    </a>
              </li>
              <li>
              <a href="createNewSpecValue.php">
                        <i class="pe-7s-network"></i>
                        <p>Create Specification Choices</p>
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
                                <li><a href="gallery.php">Gallery</a></li>
                                <li><a href="services2.php">Services</a></li>
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
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div style="text-align:center;width:300px;padding:1em 0;"> <h4><a href="http://www.zeitverschiebung.net/en/country/ph"><span style="color:gray;">Current local time in</span><br />Philippines</a></h4> 

                            <h3>
                            <script>
                            function startTime() {
                                var today = new Date();
                                var h = today.getHours();
                                var m = today.getMinutes();
                                var s = today.getSeconds();
                                m = checkTime(m);
                                s = checkTime(s);
                                document.getElementById('txt').innerHTML =
                                h + ":" + m + ":" + s;
                                var t = setTimeout(startTime, 500);
                            }
                            function checkTime(i) {
                                if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                                return i;
                            }
                            </script>
</head>

<body onload="startTime()">

<div id="txt"></div> <small style="color:gray;">&copy; </small> </div>
                    </div>

                    
                </div>



                <div class="row">
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Notifications</h4>
                                <p class="category">Take note of the following notifications before dismissing them</p>
                            </div>
                            <div class="content">
                        <div class="row">
             
                            <div class="col-md-12">


                                    <?php

                                    require_once('../mysql_connect.php');
                                        
                                        ////notif pending account
                                    $queryacct="SELECT CompanyID as 'acct' FROM clientaccount WHERE AccountStatus='Pending'";
                                    $resultacct=mysqli_query($dbc,$queryacct);
                                    $acct = $resultacct->num_rows; 

                                        ////notif activate account
                                    $queryaccp="SELECT CompanyID as 'acct' FROM clientaccount WHERE AccountStatus='Approved'";
                                    $resultaccp=mysqli_query($dbc,$queryaccp);
                                    $accp = $resultaccp->num_rows;
                                       
                                        ////notif pending order
                                    $queryorder="SELECT OrderID as 'orderid' FROM orders WHERE OrderStatus='Pending'";
                                    $resultorder=mysqli_query($dbc,$queryorder);
                                    $order = $resultorder->num_rows;
                                        
                                        //notif order ready for payment
                                    $querypay="SELECT OrderID as 'pay' FROM orders WHERE OrderStatus='Approved' AND OPaymentStatus='Unpaid'";
                                    $resultpay=mysqli_query($dbc,$querypay);
                                    $pay= $resultpay->num_rows;
                                        
                                        //notif order ready for shipping
                                    $queryship="SELECT OrderID as 'ship' FROM orders WHERE ManufacturingStatus = 'Completed' && OShipmentStatus='Not shipped'";
                                    $resultship=mysqli_query($dbc,$queryship);
                                    $ship= $resultship->num_rows;
                                        
                                        //notif supplies
                                    $queryrcv="SELECT SupplyID as 'supplies' FROM supplies WHERE DateReceived IS NULL";
                                    $resultrcv=mysqli_query($dbc,$queryrcv);
                                    $rcv= $resultrcv->num_rows;
                                    
                                    $total = $acct + $order + $ship + $rcv+$accp+$pay;
                                    if (($acct + $order + $ship + $rcv+$accp+$pay) > 0){



                                  
                                  //APPROVE OR REJECT CLIENT ACCOUNTS
                                  if ($acct == 0){
                                      echo "";
                                  }
                                  else if ($acct == 1){
                                      echo '
                                        <div class="alert alert-warning">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Newly Registered Client Accounts - </b> There is a client account pending for approval</font></span>
                                        </div>';}
                                  else if ($acct > 1){
                                      echo '
                                        <div class="alert alert-warning">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Activate Client Accounts - </b> There are client accounts pending for approval</font></span>
                                        </div>';
                                  }

                                  
                                  //ACTIVATE CLIENT ACCOUNTS
                                  if ($accp == 0){
                                      echo "";
                                  }
                                  else if ($accp == 1){
                                      echo '
                                        <div class="alert alert-warning">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Activate Client Accounts - </b> There is a client account pending for activation</font></span>
                                        </div>';
                                  }
                                  else if ($accp > 1){
                                      echo '
                                        <div class="alert alert-warning">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Activate Client Accounts - </b> There are client accounts pending for activation</font></span>
                                        </div>';
                                  }


                                  //APPROVE OR REJECT ORDERS
                                  if ($order == 0){
                                      echo "";
                                  }
                                  else if ($order == 1){
                                      echo '
                                        <div class="alert alert-warning">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Order Approval - </b> There is an order pending for approval</font></span>
                                        </div>';
                                  }
                                  else if ($order > 1){
                                      echo '
                                        <div class="alert alert-warning">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Order Approval - </b> There are orders pending for approval</font></span>
                                        </div>';
                                  }
                                  
                                  //CONFIRM SHIPPING
                                  if ($ship == 0){
                                      echo "";
                                  }
                                  else if ($ship == 1){
                                      echo '
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Shipment - </b> There is an order ready to be shipped</font></span>
                                        </div>';
                                  }
                                  else if ($ship > 1){
                                      echo '
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Shipment - </b> There are orders ready to be shipped</font></span>
                                        </div>';
                                  }
                                  
                                  //PENDING PAYMENT
                                  if ($pay == 0){
                                      echo "";
                                  }
                                  else if ($pay == 1){
                                      echo '
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Payment - </b> There is an order pending payment</font></span>
                                        </div>';
                                  }
                                  else if ($pay > 1){
                                      echo '
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Payment - </b> There are orders pending payment</font></span>
                                        </div>';
                                  }
                                  
                                  //RECEIVE INVENTORY
                                  if ($rcv == 0){
                                      echo "";
                                  }
                                  else if ($rcv == 1){
                                      echo '
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Supplies - </b> There is a supply waiting to be received</font></span>
                                        </div>';
                                  }
                                  else if ($rcv > 1){
                                      echo '
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                            <span aria-hidden="true"><b><font color="black">Supplies - </b> There are supplies waiting to be received</font></span>
                                        </div>';
                                  }
                              }
                              else{
                                echo '
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                                    <span aria-hidden="true"><b><font color="black">No pending notifications</font></span>
                                </div>';
                                  }
                                  
                                  ?>

                            </div>
                        </div>
                        </div>
                    </div>

                
                            </div>
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

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-smile',
            	message: "Welcome back, <b>Production Manager</b>!"

            },{
                type: 'danger',
                timer: 4000
            });

    	});
	</script>

</html>
