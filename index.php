



<html lang="en">





<head>

<meta name="twitter:card" content="photo" />
<meta name="twitter:site" content="www.hypeit.xyz" />
<meta name="twitter:title" content="Checkout Awesome Hypes on HypeIt" />
<meta name="twitter:image" content="http://www.hypeit.xyz/assets/img/logo.jpg" />
<meta name="twitter:url" content="http://www.hypeit.xyz/" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
   
		<title>HypeIt - Redefining Publicity!!!</title>

     
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
		<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

      
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        


</head>

<?php
include 'connectdb.php';
include 'core.php';

include 'login.php';
include 'signupmodal.html';
include 'signinmodal.html';
include 'signup.php';
include 'update.php'; 

?>

<body>


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=946646892032197";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


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
                <a class="navbar-brand" href="index.php"><font size="10" >HypeIt</font></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                     <li class="item active">
                        <a href="#">  <span class="glyphicon glyphicon-home"></span> Home</a>
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

<br><br><br><br>
    <!-- Page Content -->



    <div class="container">

        <div class="row">

            

            <div >
                     
                <div class="row carousel-holder">

                    <div class="">

                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                           

                            <div class="carousel-inner">

                            <?php
                                                                $sqltest1 = "SELECT * FROM slider_images ";
                                                                $result1 = mysqli_query($con,$sqltest1);


                            

                                                            if (mysqli_num_rows($result1)>0){

                                                                     $sq2 = "SELECT img_path FROM slider_images WHERE id = 1";
                                                                     $result2 = mysqli_query($con,$sq2);

                                                                      $active =  mysqli_fetch_assoc ($result2);

                                                                      $active= $active["img_path"];
                                                              

                                                            ?>


                                                                       <div class="item active">
                                                                     <img class="slide-image" src="<?php echo $active ?>" alt="">
                                                           
                                                                    </div>  


                                                            <?php

                                                                     $sql3 = "SELECT img_path FROM slider_images WHERE id NOT LIKE '1' ORDER BY id DESC  ";
                                                                     $result3 = mysqli_query($con,$sql3);

                                                       
                                                                     while ($row = mysqli_fetch_assoc($result3)){
                                                         ?>

                                                        <div class="item">
                                                            <img class="slide-image" src="<?php echo $row['img_path'] ?>" alt="">
                                                           
                                                        </div>     
                                            
                            
                                                         <?php

                                                                  }
                                                                }else {
                                                                          echo "<h3>0 images</h3>";
                                                                    }



                                                            ?>





                            </div>





                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>
              </div>
            </div>
          </div>
                      <h2> FEATURED HYPES</h2>
                    <br>
                    <br>
                    <br>


                    
                    <h2> TOP HYPES</h2>
                    <hr>
                    
                                       
 <div class="container">

    <div class="row">


                            <?php
                            $sqltest = "SELECT * FROM valid_hypes ORDER BY no_of_hypes DESC LIMIT 6 ";
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
                                        $path= $path["path"];


                                      }else{
                                        $sql = "SELECT `path` FROM hype_images  WHERE hype_images.ref = '$id' ORDER BY id LIMIT 1 ";
                                          
                                        $path =  mysqli_fetch_assoc ($result3);
                                        $path= $path["path"];

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
       

    <!-- /.container -->

<div >


<br>
<b><h2>MOST RECENT HYPES</h2><b>
<hr>
                    
                                         
 <div class="container">

    <div class="row">


                            <?php
                              $sqltest = "SELECT * FROM valid_hypes ORDER BY id DESC LIMIT 6 ";
                                          $result1 = mysqli_query($con,$sqltest);

                          if (mysqli_num_rows($result1)>0){
                           $recent=6;

                              while ($row = mysqli_fetch_assoc($result1)){
                          $recent++;

                           $ref = $row['ref'];
                          
                           $sql = "SELECT `path` FROM hype_images  WHERE hype_images.ref = '$ref' ORDER BY id LIMIT 1 ";
                          $result3 = mysqli_query($con,$sql);


                          $path =  mysqli_fetch_assoc ($result3);
                          $path= $path["path"];
                            include 'rhype-thumbnail.php';
                             include 'modal.php';
                           }
                          }else {
                              echo "<h3> No hypes at the moment</h3>";
                          }



                            ?>



    </div>
</div>
       

    <!-- /.container -->

    <div >




        <hr>

                
       
       

    <?php

    if(isset($_POST['subscribe'])){


      $email= $_POST['subscribe_email'];


      if(!empty($email)){

      $sql = "INSERT INTO subscribers VALUES ('','$email') ";
      if(mysqli_query($con,$sql)){
echo '<br><br><h4 id="alert"class="alert alert-danger fade in" >SUCCESSFULLY SUBSCRIBED
                 <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>

                        </h4>' ;            

                      }else{
 echo '<br><br><h4 id="alert"class="alert alert-danger fade in" >Sorry we could not subscribe you at the moment
                 <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>

                        </h4>' ;   

        }  
        } 

    } 


    ?>


		 <div>
             <b>Subscribe to recieve our latest hypes....</b>
			 <p>
			<form action="index.php" method="post" >
			
			<input type="email" name="subscribe_email"  placeholder="Email..." class="black"  >
      <input type="submit"class="btn btn-primary" name="subscribe"value="Subscribe" ></a>

			</form>
            </p>
         </div>
		<hr>

		 
		 
		<div >
			 <h3>Follow Us</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="https://www.facebook.com/hypeitonline" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                           
                            <li>
                                <a href="https://plus.google.com/u/0/117212678984917813544" target="_blank"class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/_hype_it" target="_blank" class="btn-social btn-outline"><i class="fa fa-fw fa-instagram"></i></a>
                            </li>
                           
                        </ul>

                        <a class="twitter-timeline" href="https://twitter.com/_Hype_It" data-widget-id="726540589479636992">Tweets by @_Hype_It</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

     <div class="fb-page" data-href="https://www.facebook.com/hypeItonline/" data-tabs="timeline" data-height="600" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/hypeItonline/"><a href="https://www.facebook.com/hypeItonline/">HypeIt</a></blockquote></div></div>

		</div>
    
    <a href="https://twitter.com/_Hype_It" class="twitter-follow-button" data-show-count="false"data-show-screen-name="false"data-size  ="large">Follow @_Hype_It</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    

		<hr>
        <!-- Footer -->
        <footer class="footer-back">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright  &copy; 2016 HypeIt  All Rights Reserved.</p>
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
        $("#"+ postid).toggleClass("btn-danger");


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
            async: true,
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


