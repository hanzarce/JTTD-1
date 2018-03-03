<?php
require_once('../mysql_connect.php');
$sql = "";
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');
if (isset($_POST['ship'])){
    $id=$_POST['id'];
    $sql = "UPDATE Orders SET OShippedDate = DATE(NOW()), OShipmentStatus = 'Shipped' WHERE OrderID = " . $_POST['id'];
}
if (isset($_POST['paid'])){
    $id=$_POST['id'];
    $sql = "UPDATE Orders SET OPaymentDate = DATE(NOW()), OPaymentStatus = 'Paid' WHERE OrderID = " . $_POST['id'];
}

if (!empty($sql))
    $qu = mysqli_query($dbc, $sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Update Manufacturing</title>

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
    <div class="sidebar" data-color="orange">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="home2.html" class="simple-text">
                    DOLLJOY
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="employeeDashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="updatemanufacturing.php">
                        <i class="pe-7s-tools"></i>
                        <p>Manufacturing</p>
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
  
                        
                        
 
  
                        <!----------------------- START NOTIFICATIONS --------------------------------------------------------------->
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">
                                    <?php
                                        
                                        
                                        ////notif order ready for start manufacturing
                                    $querypaid="SELECT OrderID as 'startmanu' FROM orders WHERE OPaymentStatus='Paid' AND ManufacturingStatus IS NULL";
                                    $resultpaid=mysqli_query($dbc,$querypaid);
                                    $paid= $resultpaid->num_rows;

                                    $total = $paid;
                                    if (($paid) > 0)
                                        echo $total;
                                    ?>
                                    
                                    </span>
                                    <p class="hidden-lg hidden-md">
                                        <b class="caret"></b>
                                    </p>
                              </a>
                            
                            
                            
                            
                              <ul class="dropdown-menu">
                                  <?php
                                  
                                  //CONFIRM START MANUFACTURING
                                  if ($paid == 0){
                                      echo "";
                                  }
                                  else if ($paid == 1){
                                      echo "<li><a href='approveClientAccounts.php'>There is an order ready for manufacturing</a></li>";
                                  }
                                  else if ($paid > 1){
                                      echo "<li><a href='approveClientAccounts.php'>There are orders ready for manufacturing</a></li>";
                                  }
                                  
                                  
                                  ?>
                                  
                                
                              </ul>
                        </li>
                        
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                                <p class="hidden-lg hidden-md">Search</p>&nbsp;&nbsp;&nbsp;
                                <input type="textarea" placeholder="Search...">
                            </a>
                        </li>
                    </ul>
                        
                        
 <!----------------------- END NOTIFICATIONS --------------------------------------------------------------->

                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
                                        <i class="pe-7s-note"></i>
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
                <div class="row">
                    <div class="col-md-18">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Update Manufacturing</h4>
                                <p class="category"></p>
                            </div>

                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th>Order ID</th>
                                        <th>Company</th>
                                        <th>Quantity</th>
                                        <th>Date Ordered</th>
                                        <th>Date Required</th>
                                    </thead>

<br><br>

<?php

//START
$query="SELECT *, C.CName from Orders O join ClientAccount C on O.OCompanyID=C.CompanyID WHERE OPaymentStatus='Paid' AND OrderStatus='Approved' AND CompanyID = OCompanyID";
$result=mysqli_query($dbc,$query);

$numRows = mysqli_num_rows($result);
                                    
//END
$query2="SELECT *, C.CName from Orders O join ClientAccount C on O.OCompanyID=C.CompanyID WHERE ManufacturingStatus='In Progress' AND CompanyID = OCompanyID";
$result2=mysqli_query($dbc,$query2);

$numRows2 = mysqli_num_rows($result2);
    if($numRows ==0 && $numRows2 == 0){
        $message="No orders to show";
    }
    
//END
while($row=mysqli_fetch_array($result2,MYSQLI_ASSOC)){

$id=$row['OrderID'];

echo 
"
<tbody>
<tr>

<td><a href=\"dollOrder02.php?id=$id \">{$row['OrderID']}</a></td>
<td>{$row['CName']}</td>
<td>{$row['OQuantity']}</td>
<td>{$row['OOrderedDate']}</td>
<td>{$row['ORequiredDate']}</td>
<td>{$row['OShippedDate']}</td>


<td>
                            <form action=\"updatemanufacturing.php\" method=\"post\">
                            <input type = \"submit\" name =\"end\" class=\"\" value=\"END\">
                            <input type = \"hidden\" name =\"id\" class=\"\" value=\"".$id."\">
                            </form></td></tr>
";
    
}
                                    
//START
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

$id=$row['OrderID'];

echo 
"
<tr>

<td><a href=\"dollOrder02.php?id=$id \">{$row['OrderID']}</a></td>
<td>{$row['CName']}</td>
<td>{$row['OQuantity']}</td>
<td>{$row['OOrderedDate']}</td>
<td>{$row['ORequiredDate']}</td>
<td>{$row['OShippedDate']}</td>


<td>
                            <form action=\"updatemanufacturing.php\" method=\"post\">
                            <input type = \"submit\" name =\"start\" class=\"\" value=\"START\">
                            <input type = \"hidden\" name =\"id\" class=\"\" value=\"".$id."\">
                            </form></td></tr>
";
?>
    <?php 
}?>



</table>

    <center>
    <label>
        <?php 
            if(isset($message)){
                echo $message;
            }
        ?>
            
    </label>
    </center>

<br><br>
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