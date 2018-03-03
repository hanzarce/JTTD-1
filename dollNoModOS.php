<?php
session_start();

require_once(__DIR__.'/../mysql_connect.php');
$username = $_SESSION['USERNAME'];



$type = $_SESSION['usertype'];
if(empty($type)){

}
else if($type == 3){
//client

	$querys = "SELECT * 
		  	FROM   clientaccount 
		  	WHERE  CRepUsername = '".$username."'";
  $results=mysqli_query($dbc,$querys);
  while($row=mysqli_fetch_array($results)){
  	$userID= $row[0];
  	
  }
}
else{

} 


if(isset($_GET['id'])){

$id=$_GET['id'];

  $query = "SELECT * 
		  	FROM   Product 
		  	WHERE  ProductID = '".$id."'";
  $result=mysqli_query($dbc,$query);
  while($row=mysqli_fetch_array($result)){
  	$dollImage=$row[3];
  	$dollDescription=$row[4];
    $dollName=$row[2];
    $dollID=$row[0];
    $dollSize=$row[6];
	}
}
date_default_timezone_set('Asia/Manila');
$msg="";
$message="";
$count="";

$dateToday = date('Y-m-d');


if (isset($_POST['submit'])){
$requiredDate =$_POST['requiredDate'];

		if($requiredDate > $dateToday){
			$OCompanyID = $userID; //chhange neeed change CHANGE TO SESSION ID PLSSSS
		$OQuantity = $_POST['quantity'];
		$OPrice = 250;
		$OTotalAmount = 250 * $OQuantity;
		$OOrderDate = date("Y-m-d");
		$ORequiredDate = $_POST['requiredDate'];
		$OShippedDate = "";
		$OrderStatus = "Pending";
		$OPaymentStatus = "Unpaid";
		$OPaymentDate = "";
		$OShipmentStatus = "Not Shipped";
		$StartManufacturing = "";
		$EndManufacturing = "";
		$ManufacturingStatus = "Pending";

        $message=NULL;
        echo "{$dollID} <br>";
        echo "{$OCompanyID} <br>";
        echo "{$OQuantity} <br>";
        echo "{$OPrice} <br>";
        echo "{$OTotalAmount} <br>";
        echo "$OOrderDate <br>";
        echo "$ORequiredDate <br>";
        echo "$OShippedDate <br>";
        echo "$OrderStatus <br>";
        echo "$OPaymentStatus <br>";
        echo "$OPaymentDate <br>";
        echo "$OShipmentStatus <br>";
        echo "$StartManufacturing <br>";
        echo "$EndManufacturing <br>";
        echo "$ManufacturingStatus <br>";
        
        


        $query2="INSERT INTO Orders       	(OProductID,
                                             OCompanyID,
                                             OQuantity,
                                             OPrice,
                                             OTotalAmount,
                                             OOrderedDate,
                                             ORequiredDate,
                                             OShippedDate,
                                             OrderStatus,
                                             OPaymentStatus,
                                             OPaymentDate,
                                             OShipmentStatus,
                                             StartManufacturing,
                                             EndManufacturing,
                                             ManufacturingStatus)

                              VALUES        ('{$dollID}',
                                             '{$OCompanyID}',
                                             '{$OQuantity}',
                                             '{$OPrice}',
                                             '{$OTotalAmount}',
                                             '{$OOrderDate}',
                                             '{$ORequiredDate}',
                                             NULL,
                                             '{$OrderStatus}',
                                             '{$OPaymentStatus}',
                                             NULL,
                                             '{$OShipmentStatus}',
                                             NULL,
                                             NULL,
                                             '{$ManufacturingStatus}')";


          $result2=mysqli_query($dbc,$query2);
          header("location:thankYou.php");
		}
		else{
			echo "Enter a later date please.";
		}



		




        }


?>

<!DOCTYPE html>
<html lang="en">
<head>
<!--

Template 2082 Pure Mix

http://www.tooplate.com/view/2082-pure-mix

-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<!-- Site title
   ================================================== -->
	<title>Order Summary</title>

	<!-- Bootstrap CSS
   ================================================== -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Animate CSS
   ================================================== -->
	<link rel="stylesheet" href="css/animate.min.css">

	<!-- Font Icons CSS
   ================================================== -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/ionicons.min.css">

	<!-- Main CSS
   ================================================== -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Google web font 
   ================================================== -->	
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,300' rel='stylesheet' type='text/css'>
	
</head>
<body>


<!-- Preloader section
================================================== -->
<div class="preloader">

	<div class="sk-spinner sk-spinner-pulse"></div>

</div>


<!-- Navigation section
================================================== -->
<div class="nav-container">
   <nav class="nav-inner transparent">

      <div class="navbar">
         <div class="container">
            <div class="row">

              <div class="brand">
                <a href="home.html">DOLLJOY</a>
              </div>


            <!-- Menu section
================================================== -->

              <div class="navicon">
	              <div class="navicon">
                  		<a href="home2.html">H O M E</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="about2.html">A B O U T</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="FAQ2.html">F A Q</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="gallery.php">G A L L E R Y</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="services2.php">S E R V I C E S</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="customerDashboard.php">A C C O U N T</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="home.html">L O G O U T</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="contact2.html">C O N T A C T</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </div>
              </div>
              
              <!-- END of Menu section
================================================== -->

                </div>
              </div>

            </div>
         </div>
      </div>

   </nav>
</div>


<!-- Doll section
================================================== -->
<section id="single-project">
   <div class="container">

		
        <div class="wow fadeInUp col-md-push-1">
		
<!-- Content section
================================================== -->
	<h4><b>ORDER SUMMARY</b><h5>Review all the details of your order below.</h5></h4>

	<br>

	<head>
	<style>
	table {
		width:50%;

	}
	th, td {
		padding: 5px;
		text-align: left;
	}
	table#t01 tr:nth-child(even) {
		background-color: #f9f9f9;
	}
	table#t01 tr:nth-child(odd) {
	   background-color:#f9f9f9;
	}
	table#t01 th {
		background-color: gray;
		color: white;
	}
	</style>
	</head>
	<body>

	<table id="t01" class="table"> 
	  <tr>
		<th><center>Product Name & Number</center></th>
		<th><center>Quantity</center></th>
		<th><center>Date Needed</center></th>
		<th><center>Size</center></th>

		<?php 

                            $query4 = "SELECT 		p.productID,
                  						av.ValueName as 'valname',
                  						av.ValueImage as 'valimage',
                  						a.AttributeName as 'attname',
                  						pd.ProductName as 'prodname',
                  						pd.ProductType as 'prodtype' 

                             FROM 		Product_has_Attribute p 
                             JOIN 		AttributeValues av ON p.AttributeValueID = av.ValueID 
                             JOIN 		Attribute a 	   ON av.AttributeTypeID = a.AttributeID 
                             JOIN 		Product pd 		   ON pd.ProductID = p.ProductID 
                             WHERE 		p.ProductID = $dollID
                             ORDER BY 	a.AttributeName desc";
                $result5=mysqli_query($dbc,$query4);
                while ($row5=mysqli_fetch_array($result5)){
                    $category = $row5['attname'];
                    $value = $row5['valimage'];

?>
		<th><center><?php echo $category; ?></center></th>

<?php
 } 
?>
	  </tr>
<!----------------------------------------------------------------------------------------------------------------------------------------------------FORM--> 
	  <tr>
<form action="dollNoModOS.php?id=<?php echo $id; ?>" class="ws-validate" method="POST" style="width:50%">
		<td><center><h3><?php echo $dollName; ?><br><?php echo $dollID; ?></center></td>
		<td><center><h3><input name="quantity" type="number" min="1" style="width:70%" required></center></td>
		<td><h3>
		
		<div class="form-row show-inputbtns">
			<input name="requiredDate" type="date" data-date-inline-picker="false" data-date-open-on-focus="true" required />
		</div>

	</center></td>
		<td><center><h3><?php echo $dollSize; ?></center></td>

			<?php 

                            $query = "SELECT  *
                                      FROM    Product_has_Attribute
                                      JOIN    AttributeValues ON Product_has_Attribute.AttributeValueID = AttributeValues.ValueID
                                      WHERE   Product_has_Attribute.ProductID = '".$id."'";


                            $result=mysqli_query($dbc,$query);
                            //Loop for attribute picture
                            while ($row = mysqli_fetch_array($result)) { 

?>

		<td><center><img src=<?php  echo '"data:image/jpeg;base64,'.base64_encode( $row['ValueImage'] ).'" '; ?> style="width:70%"><br></center></td>


<?php
 } 
?>
	  </tr>	  

	</table>
	</font>
	</body>
<!----------------------------------------------------------------------------------------------------------------------------------------------------QUERIES-->	
			<br>

			<center>
			<div class="project-info">
				<h4>What would you like to<b> do next?</b></h4>
				
				

				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				<button type="submit" class="btn btn-success" name="submit">S U B M I T&nbsp;&nbsp;&nbsp;O R D E R</button>
				</form>

				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
				<a href="gallery.php"><button type="button" class="btn btn-danger">C A N C E L&nbsp;&nbsp;&nbsp;O R D E R</button></a>

			</div>
		
		</h5>
		


</section>


<!-- Footer section
================================================== -->
<footer>
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12">
				<p class="wow fadeInUp">Copyright © 2017 Dolljoy - Designed by Before You Exit</p>
				<ul class="social-icon wow fadeInUp">
					<li><a href="https://www.facebook.com/Dolljoy-Gallery-and-Museum-108987895809526/" class="fa fa-facebook"></a></li>
					<li><a href="#" class="fa fa-twitter"></a></li>
					<li><a href="#" class="fa fa-dribbble"></a></li>
					<li><a href="#" class="fa fa-behance"></a></li>
					<li><a href="#" class="fa fa-google-plus"></a></li>
				</ul>
			</div>
			
		</div>
	</div>
</footer>


<!-- Javascript 
================================================== -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>