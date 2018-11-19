

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


<body style="background-color: #2B2E33">

    <?php 
session_start();
require'connectdb.php';
require'core.php';

include 'login.php';
include 'signupmodal.html';
include 'signinmodal.html';
include 'signup.php'; 

?>
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
                    <li>
                        <a href="about.php">  <span class="glyphicon glyphicon-info-sign"></span> About</a>
                    </li>
                   
                    <li class="item active">
                        <a href="#"> <span class="glyphicon glyphicon-phone"></span> Contact Us</a>
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
    <br> <br> <br> 




    


 

   <div class="modal-content">
                    
                    <div class="modal-header">

                        
                         <?php 
                        if(isset($_POST['sender'])){

                        if( (!empty($_POST['sender'])) && (!empty($_POST['message'])) ) {

                           $to = "contact.hypeit@gmail.com"; 
                           $subject = "Customer Feedback"; 
                           $message = $_POST['message'];
                           $header = "From:".$_POST['sender']." \r\n"; 
                           $header .= "MIME-Version: 1.0\r\n"; 
                           $header .= "Content-type: text/html\r\n"; 
                           $retval = mail ($to,$subject,$message,$header); 
                           if( $retval == true ) 
                           { 
                              echo "Message sent successfully..."; 
                           } 
                           else{
                                  echo "Message Sending Failed..."; 
                              }

                           }else{
                            echo "Please fill in all details";
                           }

                         }
                           

                          ?>


                       
                        <h3 class="modal-title" id="modal-register-label">Send us an email..We'll get to you shortly.</h3>
                        
                    </div>
                    
                    <div class="modal-body">
                        
                        <form role="form" action="contact_us.php" method="post" class="registration-form">
                            
                            
                            <h4>Your Email</h4>
                             <div class="form-group">
                                <input type="email" name="sender"  class="form-email form-control" style ="background-color: #333333; color:#fff" >
                            </div> 

                                 <h4>Your Message</h4>
                           
                            <div class="form-group">
                                
                                <textarea  class="form-control " name="message" cols="30"  >

                                </textarea>	
                            </div>


                            <label>OR CALL US ON +233-206775217 / +233-572205132</label>

                                                     
                            <br> <br> <br>
                            <button name="submit" type="submit" class="btn">Send</button>
                        </form>
                        
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
                    <p>Copyright  &copy; 2016 HypeIt  All Rights Reserved.</p>
                </div>
            </div>
</footer>


</html>