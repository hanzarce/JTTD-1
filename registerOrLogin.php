<?php 
session_start(); 

require_once('../mysql_connect($dbc).php');

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
	<title>Log In/Register</title>

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


<!-- Navigation section
================================================== -->
<div class="nav-container">
   <nav class="nav-inner transparent">

      <div class="navbar">
         <div class="container">
            <div class="row">

              <div class="brand">
                <a href="home.html">Dolljoy</a>
              </div>

              <!-- Menu section
================================================== -->

              <div class="navicon">
	              <div class="navicon">
                  		<a href="home.html">H O M E</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="about.html">A B O U T</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="FAQ.html">F A Q</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="services.html">S E R V I C E S</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="registerOrLogin.php">L O G I N</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="contact.html">C O N T A C T</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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

<!-- Header section
================================================== -->
<section id="header" class="header-two">
	<div class="container">
		<div class="row">

			<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
          <div class="header-thumb">
              <h1 class="wow fadeIn">Log in</h1>
              <h3 class="wow fadeInUp">To avail of our services.</h3>
          </div>
			</div>

		</div>
	</div>		
</section>


<!-- Log in section
================================================== -->
<section id="single-post">
   <div class="container">
      <div class="row">

         <div class="wow fadeInUp col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10">
         	  <div class="blog-thumb">
         		   

               <p><b>NOTE:</b> If you do not have an account with us yet, click on <b>"SIGN UP"</b> to request an account. Once your request is approved, we will create an account for you and send you an e-mail containing your username and password.</p>
            </div>

<!-- Log in section
================================================== -->


<!-- PHP 
================================================== -->
<?php
//php code for register
$flag=0;
if(isset($_POST['register'])){

$message=NULL;

 if (empty($_POST['CName'])){
  $CName=FALSE;
  $message.='<p>You forgot to enter the company name!';
 }else
  $CName=$_POST['CName'];

 if (empty($_POST['CAddress'])){
  $CAddress=FALSE;
  $message.='<p>You forgot to enter the company address!';
 }else{
   $CAddress=$_POST['CAddress'];
 }

if (empty($_POST['CContactNo'])){
  $CContactNo=FALSE;
  $message.='<p>You forgot to enter the company conatct number!';
 }
 else if(!preg_match('/^[0-9]*$/',$_POST['CContactNo'])){
  $message.='<p>Invalid company contact number!'; 
 }
 else{
   $CContactNo=$_POST['CContactNo'];
 }   
    
if (empty($_POST['CEmailAdd'])){
  $CEmailAdd=FALSE;
  $message.='<p>You forgot to enter the company email address!';
 }else{
   $CEmailAdd=$_POST['CEmailAdd'];
 }   
    
if (empty($_POST['CRepName'])){
  $CRepName=FALSE;
  $message.='<p>You forgot to enter the company representative name!';
 }else{
   $CRepName=$_POST['CRepName'];
 }   
 if (empty($_POST['CRepContactNo'])){
  $CRepContactNo=FALSE;
  $message.='<p>You forgot to enter the company representative contact number!';
 } else if(!preg_match('/^[0-9]*$/',$_POST['CRepContactNo'])){ //checks if input only has numbers
  $message.='<p>Invalid company representative number!'; 
 }else{
   $CRepContactNo=$_POST['CRepContactNo'];
 }   
 if (empty($_POST['CRepAddress'])){
  $CRepAddress=FALSE;
$message.='<p>You forgot to enter the company representive address!';
 }else{
   $CRepAddress=$_POST['CRepAddress'];
 }   
 if (empty($_POST['CRepEmailAdd'])){
  $CRepEmailAdd=FALSE;
  $message.='<p>You forgot to enter the company representative email address!';
 }else{
   $CRepEmailAdd=$_POST['CRepEmailAdd'];
 }   
    
if(!isset($message)){



$query="INSERT INTO `appdev`.`clientaccount`(`CompanyID`, `CName`, `CAddress`, `CContactNo`, `CEmailAdd`, `CRepName`, `CRepContactNo`, `CRepAddress`, `CRepEmailAdd`, `AccountStatus`) VALUES (NULL, '{$CName}', '{$CAddress}', '{$CContactNo}', '{$CEmailAdd}', '{$CRepName}', '{$CRepContactNo}', '{$CRepAddress}', '{$CRepEmailAdd}', 'Pending');";


$result=mysqli_query($dbc,$query);


$message="<b><h2><center>ACCOUNT DETAILS HAVE BEEN SENT FOR APPROVAL!</center></b>";

$flag=1;
}
 //php code for login

}//login checking
else if(isset($_POST['login'])){
//SELECT * FROM appdev.clientaccount WHERE CRepUsername="aaa"; username checking
//getpassword //dont mind 237, 238
if(isset($_POST['username']) && (isset($_POST['password']))){
  $username = $_POST['username'];
  $password = ($_POST['password']);
  
  $sql='SELECT CRepUsername,CRepPassword FROM clientaccount WHERE CRepUsername = \''.$username.'\' AND CRepPassword = PASSWORD(\''.$password.'\')';
  
  $sql2='SELECT EmployeeUsername,EmployeePassword FROM employeeaccount WHERE EmployeeUsername = \''.$username.'\' AND EmployeePassword = PASSWORD(\''.$password.'\')';

  $result= mysqli_query($dbc, $sql);
  $result2= mysqli_query($dbc, $sql2);
  $total=mysqli_num_rows($result)+mysqli_num_rows($result2);
  if(!empty($username)&&!empty($password)){
    

  if ($total<=0){
  
// error messages
      echo "account does not exist";
    }//employee account found

    if($username=="Prodman" && $password == "password"){
      $_SESSION['USERNAME'] = $username;
      $_SESSION['USERID'] = $userid;
      $_SESSION['usertype'] = 1;// prodman
      header("location: prodManDashboard.php");
    }
  
    if (mysqli_num_rows($result2) == 1){
      $_SESSION['USERNAME'] = $username;
      $_SESSION['USERID'] = $userid;
      $_SESSION['usertype'] = 2; // employee
      header("location: employeeDashboard.php");
      //redirect from here to employee dash
    }
  
    
  //client account found
  
    else if (mysqli_num_rows($result) == 1){
    $_SESSION['USERNAME'] = $username;
    $_SESSION['USERID'] = $userid;
     $_SESSION['usertype'] = 3; // client
    header("location: customerDashboard.php");
    //redirect from here to client dash
  }
  }
  
}
}
/*End of main Submit conditional*/

if (isset($message)){
 echo '<font color="blue">'.$message. '</font>';
}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<!--
<fieldset><legend>Register for an account: </legend>

<p>Company Name: 
    <input type="text" name="CName" size="20" maxlength="30" value="<?php if (isset($_POST['CName']) && !$flag) echo $_POST['CName']; ?>"/>

<p>Company Address: 
    <input type="text" name="CAddress" size="20" maxlength="30" value="<?php if (isset($_POST['CAddress']) && !$flag) echo $_POST['CAddress']; ?>"/>

<p>Company Contact Number: 
    <input type="text" name="CContactNo" size="20" maxlength="12" value="<?php if (isset($_POST['CContactNo']) && !$flag) echo $_POST['CContactNo']; ?>"/>

<p>Company Email Address: 
    <input type="email" name="CEmailAdd" size="20" maxlength="30" value="<?php if (isset($_POST['CEmailAdd']) && !$flag) echo $_POST['CEmailAdd']; ?>"/>

<p>Company Representative Name: 
    <input type="text" name="CRepName" size="20" maxlength="30" value="<?php if (isset($_POST['CRepName']) && !$flag) echo $_POST['CRepName']; ?>"/>

<p>Company Representative Contact Number: 
    <input type="text" name="CRepContactNo" size="20" maxlength="12" value="<?php if (isset($_POST['CRepContactNo']) && !$flag) echo $_POST['CRepContactNo']; ?>"/>

<p>Company Representative Address: 
    <input type="text" name="CRepAddress" size="20" maxlength="30" value="<?php if (isset($_POST['CRepAddress']) && !$flag) echo $_POST['CRepAddress']; ?>"/>

<p>Company Representative Email Address: 
    <input type="email" name="CRepEmailAdd" size="20" maxlength="30" value="<?php if (isset($_POST['CRepEmailAdd']) && !$flag) echo $_POST['CRepEmailAdd']; ?>"/>

<div align="center"><input type="submit" name="register" value="Add!" /></div>


</fieldset>

</form>

<p>
<a href="admin.php">Return to dashboard</a>
-->

  <title>Login/Sign-In</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/logInPlug.css">

  
</head>

<body>
  <div class="logmod">
  <div class="logmod__wrapper">
    <div class="logmod__container">
      <ul class="logmod__tabs">
        <li data-tabtar="lgm-2"><a href="#">Login</a></li>
        <li data-tabtar="lgm-1"><a href="#">Register</a></li>
      </ul>
      <div class="logmod__tab-wrapper">
      <div class="logmod__tab lgm-1">


<!-- START OF REGISTRATION 
================================================== -->

        <div class="logmod__heading">
          <span class="logmod__heading-subtitle">Enter your personal & company details <strong>to request an acount</strong></span>
        </div>
        <div class="logmod__form">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <div class="sminputs">
            
            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="CName">Company Name</label>
                <input type="text" name="CName" placeholder="Company Name" size="20" maxlength="30" value="<?php if (isset($_POST['CName']) && !$flag) echo $_POST['CName']; ?>"/>
              </div>
            </div>

            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="CAddress">Company Address</label>
                <input type="text" name="CAddress" placeholder="Company Address" size="20" maxlength="30" value="<?php if (isset($_POST['CAddress']) && !$flag) echo $_POST['CAddress']; ?>"/>
              </div>
            </div>

            <div class="sminputs">
              <div class="input string optional">
                <label class="string optional" for="CEmailAdd">Company E-mail Address</label>
                <input type="email" name="CEmailAdd" placeholder="Company E-mail Address" size="20" maxlength="30" value="<?php if (isset($_POST['CEmailAdd']) && !$flag) echo $_POST['CEmailAdd']; ?>"/>
              </div>

              <div class="input string optional">
                <label class="string optional" for="CContactNo">Company Contact Number</label>
                <input type="text" name="CContactNo" placeholder="Company Contact Number" size="20" maxlength="12" value="<?php if (isset($_POST['CContactNo']) && !$flag) echo $_POST['CContactNo']; ?>"/>
              </div>
            </div>

            <div class="input string optional">
                <label class="string optional" for="CRepName">Full Name</label>
                <input type="text" name="CRepName" placeholder="Full Name" size="20" maxlength="30" value="<?php if (isset($_POST['CRepName']) && !$flag) echo $_POST['CRepName']; ?>"/>
              </div>

              <div class="input string optional">
                <label class="string optional" for="CRepContactNo">Contact Number</label>
                <input type="text" name="CRepContactNo" placeholder="Contact Number" size="20" maxlength="12" value="<?php if (isset($_POST['CRepContactNo']) && !$flag) echo $_POST['CRepContactNo']; ?>"/>
              </div>
            </div>

            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="CRepAddress">Address</label>
                <input type="text" name="CRepAddress" placeholder="Address" size="20" maxlength="30" value="<?php if (isset($_POST['CRepAddress']) && !$flag) echo $_POST['CRepAddress']; ?>"/>
              </div>
            </div>

            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="CRepEmailAdd">Personal E-mail</label>
                <input type="email" name="CRepEmailAdd" placeholder="Personal E-mail" size="20" maxlength="30" value="<?php if (isset($_POST['CRepEmailAdd']) && !$flag) echo $_POST['CRepEmailAdd']; ?>"/>
              </div>
            </div>

            <div class="simform__actions">
			<input type="submit" class="sumbit" style= "border:0px; background-color: green" type="submit" value="Request Account" name="register">

			<!--<input type="submit" value="Request Account" name="register">-->
              <span class="simform__actions-sidetext">By requesting an account you agree to our <a class="special" href="#" target="_blank" role="link">Terms & Privacy</a></span>
            </div> 

          </form>
        </div> 


<!-- END OF REGISTRATION 
================================================== -->


        <div class="logmod__alter">
          <div class="logmod__alter-container">    
          </div>
        </div>
      </div>


<!-- LOG-IN 
================================================== -->
      <div class="logmod__tab lgm-2">
        <div class="logmod__heading">
          <span class="logmod__heading-subtitle">Enter your username and password <strong>to sign in</strong></span>
        </div> 
        <div class="logmod__form">
          <form accept-charset="utf-8" action="registerOrLogin.php" class="simform" method="post">
            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="user-name">Username</label>
                <input class="string optional" maxlength="255" name="username" id="user-name" placeholder="Username" type="username" size="50" value="<?php if (isset($_POST['username']) && !$flag) echo $_POST['username']; ?>" />
              </div>
            </div>
            <div class="sminputs">
              <div class="input full">
                <label class="string optional" for="user-pw">Password</label>
                <input class="string optional" maxlength="255" name="password" id="user-pw" placeholder="Password" type="password" size="50" value="<?php if (isset($_POST['password']) && !$flag) echo $_POST['password']; ?>" />
                            <span class="hide-password">Show</span>
              </div>
            </div>
            <div class="simform__actions"><input class="sumbit" style= "border:0px; background-color: green" type="submit" value="Log In" name="login">
              <span class="simform__actions-sidetext">Forgot your password?<br><a class="special" role="link" href="#">Click here</a></span>
            </div> 
          </form>
        </div> 
        <div class="logmod__alter">
          <div class="logmod__alter-container">

          </div>
        </div>
          </div>
      </div>
    </div>
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/logInPlug.js"></script>

</body>



<!-- END of Log in section
================================================== -->
					       
      </div>
   </div>
</section>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>



<!-- Footer section
================================================== -->
<footer>
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12">
				<p class="wow fadeInUp">Copyright © 2017 Dolljoy - Designed by Before You Exit</p>
				<ul class="social-icon wow fadeInUp">
					<li><a href="https://www.facebook.com/Dolljoy-Gallery-and-Museum-108987895809526/" class="fa fa-facebook" class="fa fa-facebook"></a></li>
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