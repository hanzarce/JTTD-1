
<?php

require_once(__DIR__.'/../mysql_connect.php');

session_start();




$message="";
// made R name
//price
//upload error
//upload file

//==================================================================================================================================================================
if (isset($_POST['submit'])){
	$refImage =$_POST['dollImage'];



	



	//========================================================Insert into AttributeValues Table
	$AVquery = "SELECT  *
                FROM    Attribute";
    $AVresult = mysqli_query($dbc,$AVquery);

    while($row9 = mysqli_fetch_array($AVresult)) {
    	$getAttriName ="U".$row9[1];
    	$attriType =$row9[0];
    	$valueName =$_POST['dollName'].$row9[1];





    	//checks if a file is uploaded
    	if(!isset($_FILES[$getAttriName]) || $_FILES[$getAttriName]['error'] == UPLOAD_ERR_NO_FILE) {
    		//radio is used
	    	echo "radio is used or is blank<br>";
		}
		//upload is used
		else {
		$target1 ="images/".basename($_FILES[$getAttriName]['name']);
        $valueImageR = addslashes(file_get_contents($_FILES[$getAttriName]['tmp_name']));
	    echo "Upload file<br>";

	    //uploads the uploaded image into the attribute value database with a name (dollName + Attribute name) ex. JohnHairStyle
	    $queryAttri="INSERT INTO AttributeValues   (ValueName,
                                                    ValueImage,
                                                    AttributeTypeID,
                                                    AttributeValueType)

                                            VALUES ('{$valueName}',
                                                    '{$valueImageR}',
                                                    '{$attriType}',
                                                    'Requested')";
          $resultAttri=mysqli_query($dbc,$queryAttri);

		}



    }

	//========================================================Insert into Products Table

	if(!isset($_FILES['dollImage']) || $_FILES['dollImage']['error'] == UPLOAD_ERR_NO_FILE) {
    		$dollImage = NULL;

	}

	else{
			$target1 ="images/".basename($_FILES['dollImage']['name']);
          $dollImage = addslashes(file_get_contents($_FILES['dollImage']['tmp_name']));

           if (move_uploaded_file($_FILES[$refImage]['tmp_name'], $target1)) {
                  $msg = "Image uploaded successfully<br>";
           }
           else{
                  $msg = "Failed to upload image<br>";
           }
	}
	
          $productType="Customized";
          $dollName=$_POST['dollName'];
          $dollDescription=$_POST['dollDescription'];
          $dollGender=$_POST['dollGender'];
          $dollSize=$_POST['dollSize'];

          
          //inserts values into product
          $query2="INSERT INTO Product       (ProductType,
                                             ProductName,
                                             ProductImage,
                                             ProductDescription,
                                             ProductGender,
                                             ProductSize)

                              VALUES        ('{$productType}',
                                             '{$dollName}',
                                             '{$dollImage}',
                                             '{$dollDescription}',
                                             '{$dollGender}',
                                             '{$dollSize}')";


          $result200=mysqli_query($dbc,$query2);

          //get the last insterted product ID
          $lastValueQuery = "SELECT *
                             FROM   Product
                             ORDER BY ProductID DESC
                             LIMIT 1";
          $lastValueResult=mysqli_query($dbc,$lastValueQuery);

          while($row = mysqli_fetch_array($lastValueResult)){
              $productID =$row[0];
          }
/*
          $message="{$productType} added!<br>
                    {$dollName} added!<br>
                    {$dollDescription} added!<br>
                    {$dollGender} added!<br>
                    {$dollSize} added!<br>
                    {$productID} last added!<br>";
                    echo "$message";

*/
        

        //========================================================Insert into Product_has_Attribute Table 

          $queryCount = "SELECT *
                         FROM   Attribute";

          $result3=mysqli_query($dbc,$queryCount);


          //repeats depending on how many attributes are there ex. hairstyle, skincolor     
          while ($row5 = mysqli_fetch_array($result3)) { 

          	//radio button is not used, upload is used, and inserts the uploaded attribute
          	//no radio, yes upload
          	if(!isset($_POST[$row5[1]])){

          		$attributeIDD =$row5['AttributeID'];
          		 $attributeNamee =$row5['AttributeName'];
          		 echo "$attributeIDD";
          		 echo "<br>";

          		 $query03 = "SELECT *
          		 			 FROM 	AttributeValues
          		 			 WHERE 	AttributeTypeID = '$attributeIDD'";
          		 $result03 = mysqli_query($dbc,$query03);

          		 //repeats depending on how many values there are in an attribute ex hairstyle = wavy,straight(2) short : eyecolor= green,black,blue(3)
          		 while($row03 = mysqli_fetch_array($result03)) {
	          		 	$getValueName03 = $row03[1]; // Wavy, Straight
	          		 	$getValueID03 = $row03[0]; // 1, 2, 3
	          		 	
	          		 	//looks for uploaded attribute value
	          		 	if($getValueName03 == $dollName.$attributeNamee){
	          		 		$combine03 = $dollName.$attributeNamee;
	          		 		echo "$combine03";
	          		 		echo " found";
	          		 		echo "<br>";

	          		 		$query09="INSERT INTO Product_has_Attribute       (ProductID,
	                                                               			   AttributeValueID)

	                             					 VALUES     			  ('{$productID}',
	                                                               			   '{$getValueID03}')";

	          				$result09=mysqli_query($dbc,$query09);

	          		 	}
	          		 	else{
	          		 	
	          		 	}
			

          		}
          	echo "radio null and uploaded attribute added";
          	echo "<br>";
          }

          else{

          	//radio button is used and gets the attribute selected in the radio
          	//yes radio, no upload
          	$attribute=$_POST[$row5[1]];


              $SpecsQuery="INSERT INTO Product_has_Attribute       (ProductID,
                                                               AttributeValueID)

                              VALUES                          ('{$productID}',
                                                               '{$attribute}')";

          $result27=mysqli_query($dbc,$SpecsQuery);


          
			echo "not blank and attribute inserted";
			echo "<br>";
          	}	 


          }

          header("location:dollNoModOS.php?id=$productID");
        
            


}; //end error

?>
<!----------------------------------------------------------------------------------------------------------------------------------------------------QUERIES-->

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
	<title>Create Doll</title>

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
<!----------------------------------------------------------------------------------------------------------------------------------------------------FORM-->

<!-- Doll section
================================================== -->
<section id="single-project">
   <div class="container">

        <div class="wow fadeInUp col-md-push-1">
        <center>


                 <h4><b>CUSTOMIZE SPECIFICATIONS OF THE DOLL<br></h4></b><h5>You have the freedom to customize the doll to your liking, and may even<br>upload a reference picture for us to follow.




<form action="createDoll.php" method="POST" enctype="multipart/form-data">
				 <div class="project-info">
				<h4>DOLL NAME</h4>
				<hp><input type="textarea" name="dollName" placeholder="Doll Name"  required/></p>
			</div>

			Upload a reference image of your doll:<br><input type="file" name="dollImage" accept="image/*">
			
			


		<br><br>

		
		<h5><input type="checkbox" id="Size" checked disabled>&nbsp;Size</input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select name="dollSize" style="width:150px">
		<option value="" disabled >Select size</option>
		<option value="Small (6 inches)" selected>Small  (6 inches)</option>
		<option value="Medium (10 inches)">Medium (10 inches)</option>
		<option value="Large  (12 inches)">Large  (12 inches)</option>
		</select>
		</h5>
		
		<br>
		<h5><input type="checkbox" id="Gender" checked disabled>&nbsp;Gender</input>&nbsp;&nbsp;
		<select name="dollGender" style="width:150px">
		<option value="" disabled>Select gender</option>
		<option value="Male" selected>Male</option>
		<option value="Female">Female</option>
		</select>
		</h5>
		
		
		<br>			
			
<!-- Generation of form
=================================================================================================================================== -->
<?php 

                            $query = "SELECT  *
                                      FROM    Attribute";
                            $result=mysqli_query($dbc,$query);

                            //Loop for attribute name
                            while ($row = mysqli_fetch_array($result)) { 

?>

<h5><input type="checkbox" id="Hairstyle" checked disabled>&nbsp;<?php echo $row["AttributeName"]; ?></input>&nbsp;&nbsp;

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
		background-color: white;
		color: black;
	}
	</style>
	</head>
	<body>
						   <?php
                            $attributeID = $row["AttributeID"];
                           ?>

	<table id="t01">
							<?php 
                            //loop for attribute values ex. Wavy,Straight,Curly hair, Green Hair,Black hair
                            //radio buttons
                            $query2 = "SELECT  *
                                      FROM    AttributeValues
                                      WHERE   AttributeTypeID = '$attributeID' AND AttributeValueType = 'PreMade'";
                            $result2 = mysqli_query($dbc,$query2);
                            ?> 	  
	  <tr>
	  						<?php 
                            //loop for attribute values ex. Wavy,Straight,Curly hair, Green Hair,Black hair
                              while ($row2 = mysqli_fetch_array($result2)) { 
                                //echo $row2["ValueName"];
                            ?>

		<td><center><img src=<?php  echo '"data:image/jpeg;base64,'.base64_encode( $row2['ValueImage'] ).'" '; ?> style="width:50%"><br><input type="radio" name="<?php echo $row["AttributeName"]; ?>" value="<?php echo $row2["ValueID"]; ?>"></center></td>	
<?php
                            }
?>
	  </tr>	  
	</table>
	</font>
	</body>
	
			<p>	
		OR Select image:<br><input type="file" name="U<?php echo $row["AttributeName"]; ?>" accept="image/*">	
		</h5>
	</font>
	</body>

<?php

                  }
?>
	


		<br><br>
		<h5><input type="checkbox" id="Special" checked disabled>&nbsp;Special instructions or added specifications<br><b>&nbsp;&nbsp;&nbsp;&nbsp;(type N/A if you have nothing to add)</b></input>&nbsp;&nbsp;
			
		<br>
<textarea name="dollDescription" placeholder="Input special requests here" rows="20" cols="50" required></textarea>			
		
		<br><br>
		<div class="project-info">
				<h4>PROCEED TO <b>ORDER SUMMARY?</b></h4>
				
				<button type="submit" name="submit">Y E S</button>
				&nbsp;&nbsp;&nbsp;&nbsp;

				</form>
				<a href="gallery.php"><button type="button">C A N C E L</button></a>

			</div>

		</div>
		
					<br></br>

	<!----------------------------------------------------------------------------------------------------------------------------------------------------QUERIES-->	
		<br></br>

      </div>
      
   </div>
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