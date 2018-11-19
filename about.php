<?php
session_start();
?>


<html>



<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
   
		<title>HypeIt -Redefining Publicity!!!</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
		<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

      
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png?">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">


</head>

<?php
require'connectdb.php';
require'core.php';

include 'login.php';
include 'signupmodal.html';
include 'signinmodal.html';
include 'signup.php'; 

?>

<body style="background-color: #2B2E33">

  <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" ><font size="10" >HypeIt</font></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                     <li >
                        <a href="index.php">  <span class="glyphicon glyphicon-home"></span> Home</a>
                    </li>
                    <li class="item active">
                        <a href="#">  <span class="glyphicon glyphicon-info-sign"></span> About</a>
                    </li>
                   
                    <li>
                        <a href="contact_us.php"> <span class="glyphicon glyphicon-phone"></span> Contact Us</a>
                    </li>
					
                </ul>
					<br>

                <?php

        if(isset($_SESSION['username'])&& !empty($_SESSION['username']) ){
    echo 'Logged In as '.'<b>'.$_SESSION['username'].'</b>' . ' <a href = "logout.php">  Log out</a> ';
    //getuserfield();
        }  else {
            echo '<b>'.'<a  href="#"class = "btn btn-info launch-modal pull-right" data-modal-id="modal-signin"><span class="glyphicon glyphicon-user"></span> LOGIN / REGISTER</a>'.'</b>'; 
            
           
         }
         
        ?>      
              
                     <a class="btn btn-info  pull-right" href="all.php" >  <span class="glyphicon glyphicon-bullhorn"></span> VIEW HYPES &raquo </a>
                    
                    

                    <!-- Php script to for post hype events -->
                     
                     <?php

                     if(isset($_SESSION['username'])&& !empty($_SESSION['username']) ){
                     echo '<a class="btn btn-info  pull-right" href="newhype.php" ><span class="glyphicon glyphicon-plus-sign"></span> CREATE NEW HYPE  &raquo </a>';
                    }  else {
           
                     echo '<a class="btn btn-info btn-large launch-modal pull-right" href="#" data-modal-id="modal-signin"> <span class="glyphicon glyphicon-plus-sign"></span> CREATE NEW HYPE  &raquo </a>';
                     }

                     ?>




                    
					
					
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <br>





             <div class="modal-dialog">


   <div class="modal-content">
                    
                    <div class="modal-header">
                       
                        <h3 class="modal-title" id="modal-register-label">About HypeIT</h3>
                        
                    </div>
                    
                    <div class="modal-body">
                        <img src="assets/img/logo.png">
                       <p><h4> HypeIt's main goal is to help you market your events,products,business and other services. It also helps other users to find the best events, products, business or services out there. <br><br> <hr>HOW IT WORKS<br><br>
Simple,just Register, Create a Hype and Refer Partners and Friends to hype it...hence the higher your number of hypes, the greater your chances of improving your business, product or event. <br><br><hr>WHY JOIN US<br><br>
This platform helps provide publicity through hyping. Everything goes on online now, so this is a perfect place to start advertising if you haven't started already. Instead of paying sums of money to advertise your products, events and businesses online, just join HypeIt and leave the rest to us.<hr> <br>Advertising made simple!!! <br><br>Publicity Redefined!!!
</p>
                        
                    </div>
                    
   </div>
   </div>



        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>


</body>



<footer class="footer-back">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright  &copy;2016 HypeIt All Rights Reserved.</p>
                </div>
            </div>
</footer>


</html>