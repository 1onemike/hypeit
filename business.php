<?php
session_start();
?>




<html lang="en">




<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta property="og:url"           content="http://www.hypeit.xyz/products.php" />
          <meta property="og:type"          content="article" />
          <meta property="og:title"         content="HypeIt" />
          <meta property="og:description"   content="Checkout Awesome Hypes on HypeIt" />
          <meta property="og:image"         content="http://www.hypeit.xyz/assets/img/logo.jpg" />
   
        <title>HypeIt -Redefining Publicity!!!</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

      
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">


</head>


<?php
include 'connectdb.php';
include 'core.php';

include 'login.php';
include 'signupmodal.html';
include 'signinmodal.html';
include 'signup.php';

?>
   
<body >



    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><font size="10" >HypeIt</font></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"  >
                <ul class="nav navbar-nav">
                     <li>
                        <a href="index.php">  <span class="glyphicon glyphicon-home"></span> Home</a>
                    </li>
                    <li>
                        <a href="about.php">  <span class="glyphicon glyphicon-info-sign"></span> About</a>
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
    <br><br><br>

     <div>
    <ul class="nav nav-pills  nav-justified  " style="background-color: #E6E6E6;">  
      <li ><a href="all.php">ALL HYPES</a></li>  
        <li ><a href="events.php">  <span class="glyphicon glyphicon-calendar"></span> EVENTS</a></li>
        <li><a href="products.php"> <span class="glyphicon glyphicon-tags"></span> PRODUCTS</a></li>      
         <li class="active"><a href="#"><span class="glyphicon glyphicon-usd"></span> BUSINESS /  <span class="glyphicon glyphicon-cargo"></span> SERVICES</a></li> 
         </div>  
        

        
<br><br>



   <div>

             

  <div class="container">

     <div class="row">


                             <?php
                            
                            
                            $sqltest = "SELECT * FROM valid_hypes  WHERE `category`='business' ORDER BY id DESC ";
                            $result1 = mysqli_query($con,$sqltest);

                           if (mysqli_num_rows($result1)>0){
                            $hype_number=0;

                               while ($row = mysqli_fetch_assoc($result1)){
                                       $hype_number++;

                                        $ref = $row['ref'];
                                        $id=$row['id'];
                                       
                                        $sql = "SELECT `path` FROM hype_images  WHERE hype_images.ref = '$ref' ORDER BY id LIMIT 1 ";
                                      if ( $result3 = mysqli_query($con,$sql)){

                                      
                                         $path =  mysqli_fetch_assoc ($result3);
                                         $path = $path["path"];

                                       }else{
                                         $sql = "SELECT `path` FROM hype_images  WHERE hype_images.ref = '$id' ORDER BY id LIMIT 1 ";
                                            
                                         $path =  mysqli_fetch_assoc ($result3);
                                         $path = $path["path"];

                                       }
                                       
                                       
                                       include 'hype-thumbnail.php';
                                       include 'modal.php';
                               }

                               }else {
                               echo "<h3> No hypes at the moment</h3>";
                               }



                             ?>

       </div>

 </div>
        


    <!-- Page Content -->
   

 
    <!-- /.container -->

      
   
    

    


    
        <hr>
        <!-- Footer -->
        <footer>

            <!--logged in as-->       
        <?php

        if(isset($_SESSION['username'])&& !empty($_SESSION['username']) ){
    echo 'Logged In as '.'<b>'.$_SESSION['username'].'</b>' . ' <a href = "logout.php">  Log out</a> ';
    //getuserfield();
        }  else {
            echo '<b>'.'<a  href="#"class = "launch-modal" data-modal-id="modal-signin">LOGIN</a>'.'</b>'; 
            echo '/';
            echo '<b>'.'<a  href="#"class = "launch-modal" data-modal-id="modal-register">REGISTER NOW</a>'.'</b>';
         }

        ?>

       
    <div >
       <h3>Follow Us</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="https://www.facebook.com/hypeitonline" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https:/twitter.com/_Hype_It" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://plus.google.com/u/0/117212678984917813544" target="_blank"class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/_hype_it" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-instagram"></i></a>
                            </li>
                           
                        </ul>
    </div>
    
            <div class="row footer-back">
                <div class="col-lg-12">
                    <p>Copyright  &copy; 2016 HypeIt All Rights Reserved.</p>
                </div>
            </div>
        </footer>

    </div>


                
    
    
        
    <!-- /.container -->

    <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>


     <script>
    $(".atopa").click(function(e) {
        e.preventDefault();

    
    var postid = $(this).attr('id');
    var span = $(this).find('span');

        if(span.text() == "Hype This"){
        span.text("Hyped");
        $("#"+postid).toggleClass("btn-danger");


        var g = $(this).attr('name');
        var id='#'+g;
        var cntTag = $(id);
        var cnt = parseInt(cntTag.text());
        cnt++;
        cntTag.text(String(cnt));


      
          var userid =$(this).attr('value');
          var postid = span.attr('id');
       
          
          $.ajax({

            url:'update.php',
            type:'post',
            async: false,
            data :{
              'hype':1,
              'postid':postid,
              'userid':userid,

            },
           
          });


      }


  });


    </script>

       <script type="text/javascript">

$(document).ready(function() {

    $(document).on("click",'.whatsapp',function() {

if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

        var text = $(this).attr("data-text");
        var url = $(this).attr("data-link");
        var message = encodeURIComponent(text)+" - "+encodeURIComponent(url);
        var whatsapp_url = "whatsapp://send?text="+message;
        window.location.href= whatsapp_url;
} else {
    alert("Whatsapp Sharing Is Only On Mobile Devices");
}

    });
});
</script>
        
</body>

</html>







