

<html>


<?php
include 'connectdb.php';
include 'core.php';


 if(isset($_GET['hype_id']))

{
  $hype_id=$_GET['hype_id'];
  

  $sqltest = "SELECT * FROM valid_hypes  WHERE `id`= $hype_id ";
  $result1 = mysqli_query($con,$sqltest);

   if($row = mysqli_fetch_assoc($result1))
      {

          $ref = $row['ref'];
          $id=$row['id'];
         
        $sql = "SELECT `path` FROM hype_images  WHERE hype_images.ref = '$ref' ORDER BY id LIMIT 1 ";
         if ( $result3 = mysqli_query($con,$sql)){

            $path =  mysqli_fetch_assoc ($result3,  0, 'path');

         }else{
        //    $sql = "SELECT `path` FROM hype_images  WHERE hype_images.ref = '$id' ORDER BY id LIMIT 1 ";
        //        $path =  mysqli_fetch_assoc ($result3,  0, 'path');


          }


          }else{
            header('Location:all.php');


          }

          }else{
            header('Location:all.php');



          } 


        ?>



<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="twitter:card" content="photo" />
        <meta name="twitter:site" content="www.hypeit.xyz" />
        <meta name="twitter:title" content="<?php echo $row['title'] ?>" />
        <meta name="twitter:image" content="http://www.hypeit.xyz/<?php echo $path ?>" />
        <meta name="twitter:url" content="http://www.hypeit.xyz/viewhype.php?hype_id=<?php echo $hype_id; ?>" />


        <meta property="og:title" content="<?php echo $row['title'] ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="http://www.hypeit.xyz/viewhype.php?hype_id=<?php echo $hype_id; ?>" />
        <meta property="og:image" content="http://www.hypeit.xyz/assets/img/ad.jpg" />
        <meta property="og:description" content="www.hypeit.xyz" />
   
		<title>HypeIt -Redefining Publicity!!!</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        
        <link rel="stylesheet" href="assets/css/style.css"  type="text/css">
		<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

      
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">


</head>


<?php
session_start();


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
                    <li >
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
    <br>




    <div class='col-sm-3 col-lg-3 col-md-3'>



     
     </div>


   <div class='col-sm-6 col-lg-6 col-md-6'>
    

<div class="modal-dialog">


   <div class="modal-content">
                    
                   <div class='modal-header'>

                                              <?php if(isset($_GET['hype_id']))

                          {
                            $hype_id=$_GET['hype_id'];
                            

                            $sqltest = "SELECT * FROM valid_hypes  WHERE `id`= $hype_id ";
                            $result1 = mysqli_query($con,$sqltest);

                             if($row = mysqli_fetch_assoc($result1))
                                {

                                    $ref = $row['ref'];
                                    $id=$row['id'];
                                   
                                  $sql = "SELECT `path` FROM hype_images  WHERE hype_images.ref = '$ref' ORDER BY id LIMIT 1 ";
                                   if ( $result3 = mysqli_query($con,$sql)){

                                      $path =  mysqli_fetch_assoc ($result3,  0, 'path');

                                   }else{
                                  //    $sql = "SELECT `path` FROM hype_images  WHERE hype_images.ref = '$id' ORDER BY id LIMIT 1 ";
                                  //        $path =  mysqli_fetch_assoc ($result3,  0, 'path');


                                    }


                                    }else{
                                      header('Location:all.php');


                                    }

                                    }else{
                                      header('Location:all.php');



                                    } ?>
                       
                      <h2 class="modal-title"> <font  ><span class="glyphicon glyphicon-fire"></span> <?php echo $row['title']  ?></font></h2>
                        <h4> Posted By : <?php echo nl2br ( $row['username']); ?></h4>
                        
             
                               <span>

                            <ul class="list-inline">

                                      <li>  <a class="whatsapp" data-text="<?php echo"Check Out '".$row['title']."' on HypeIt... Click Here  " ?>" data-link="<?php echo "http://www.hypeit.xyz/viewhype.php?hype_id=".$hype_id."" ?>" >
                                          <img class=" btn nbtn" src="assets/img/whatsapp.png" >
                                        </a>   

                                        </li>
                                        <!-- <a href="index.php"> </a> -->
                               
                                      <li>
                          <a target="_blank"href="http://twitter.com/share?url=[]&via=_hype_it&image=[]&text=<?php echo"Check Out '".$row['title']."' on HypeIt... Click Here http://www.hypeit.xyz/viewhype.php?hype_id=".$hype_id." " ?>"   ><img class=" nbtn btn" src="assets/img/twitter.png"></a>
                           </li>

                           <li>
                           <div 

                           >
                            <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fhypeit.xyz%2F<?php echo "viewhype.php?hype_id=".$hype_id.""; ?>&amp;src=sdkpreparse">
                              <img class=" btn nbtn" src="assets/img/facebook.png" >
          </a>
                          </div>
                          </li>

                           </ul>

                            </span>  
                        
                    </div>
                    
                    <div class='modal-body'>
                              
                                
                                                                     <?php
                                                                       

                                                                       $username = $row['username'];
                                                                       $info =  $row['info'];
                                                                       $number=$row['no_of_hypes'];
                                                                        $id=$row['id'];

                                                                       ?>
                                                             
                                                                        <!-- IMAGE SLIDER FOR HYPE -->
                                              <div class="row carousel-holder">

                                                  <div class="">

                                                      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                                         

                                                          <div class="carousel-inner">

                                                                                <?php

                                                                                /*GET ALL IMAGE PATHS FROM IMAGES TABLE*/

                                                                                 $sql = "SELECT `path` FROM hype_images  WHERE hype_images.ref = '$ref' ORDER BY id  ";
                                                                                $res3 = mysqli_query($con,$sql);

                                                                                    /*IF THERE EXIST AN IMAGE  */                         
                                                                                  if (mysqli_num_rows($res3)>0){

                                                                                    /*SELECT THE FIRST IMAGE*/

                                                                                    $sql2 = "SELECT `path` FROM hype_images  WHERE hype_images.ref = '$ref' ORDER BY id LIMIT 1 ";                                                                                      
                                                                                     $res2 = mysqli_query($con,$sql2);

                                                                                            /*SET IT AS THE ACTIVE SLIDER*/
                                                                                            $active =  mysqli_fetch_assoc ($res2,  0, 'path');
                                                                                    

                                                                                  ?>


                                                                                         <div class="item active">
                                                                                       <img class="slide-image" src="<?php echo $active ?>" alt="">
                                                                             
                                                                                      </div>  


                                                                              <?php
                                                                                      /*SELECT THE REMAINING 3*/

                                                                              $sql3 = "SELECT `path` FROM hype_images  WHERE hype_images.ref = '$ref'AND hype_images.path NOT LIKE '$active'  ORDER BY id DESC LIMIT 3  ";                                                                                      
                                                                               $res1 = mysqli_query($con,$sql3);

                                                                         
                                                                                       while ($row = mysqli_fetch_assoc($res1)){
                                                                           ?>

                                                                          <div class="item">
                                                                              <img class="slide-image" src="<?php echo $row['path'] ?>" alt="">
                                                                             
                                                                          </div>     
                                                              
                                              
                                                                           <?php

                                                                                    }
                                                                                  }else {
                                                                                            echo "<h3>0 images</h3>";
                                                                                      }



                                                                              ?>              
                                             </div>
                                           </div>
                                         </div>
                                       </div>
                                          
                                          
                                          <center> <h4> <font color='#31B0D5'> <span class='glyphicon glyphicon-bullhorn'></span> Number of Hypes: <span id='<?php echo $hype_id  ?>'><?php echo $number  ?> </span> </font></h4>
                                         </center>
                                      

  
                                     <div class="row">


  <?php
                //check if user is logged in

       if(isset($_SESSION['username'])&& !empty($_SESSION['username']) ){
        $user=$_SESSION['username'];
       

//get user id and hypes hyped
          $sql_query = "SELECT id,hypes_hyped FROM users WHERE username = '$user'  ";
          $query_run2= mysqli_query($con,$sql_query);
          $user_id =  mysqli_fetch_assoc ($query_run2,  0, 'id');
          $hypes_hyped=mysqli_fetch_assoc ($query_run2,  0, 'hypes_hyped');


          $list_of_hype_ids = explode(',', $hypes_hyped);

          $exists = false;
          foreach( $list_of_hype_ids as $value ) 
          {
          
          if($value == $id){

              $exists = true;
          } 

          }



          if($exists == true ){

            ?>
                           
                         <center><a  class=" btn  btn-danger center "id='<?php echo $id; ?>'>
                        <span class="button-text" >You Hyped This</span>
                        </a></center>
              <?php

          }else{

            ?>
                      
                      <center><a  class="btn  btn-primary atopa center" name="<?php echo $hype_id; ?>" id='<?php echo $id.'atopa' ?>' value="<?php echo $user_id ?>">
                        <span class="" id='<?php echo $id; ?>'>Hype This</span>
                        </a></center>  

                          <?php

          }


         

  

          

        }else {

          ?>
              <center><a class="btn btn-primary launch-modal center " data-modal-id='modal-signin'> <span class="button-text"> Hype This</span>
                        </a>
</center>
              <?php

            }
                ?>  

               
              </div>

              <br>
              <hr>

                <div class="col" >
                          
                                        <p><h3> <?php echo nl2br ( $info); ?></h3></p>
               </div> 
              
                
                    
                    </div>
                    
   </div>
   </div>

    <br>
    <hr>
   <b><h2> HYPE STREAM</h2><b>


    <div class="row carousel-holder">

        <div class="">

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
               

                <div class="carousel-inner">

                <?php

                /*GET ALL IMAGE PATHS FROM IMAGES TABLE*/

                 $sql = "SELECT `path`,`ref` FROM hype_images   ORDER BY id DESC  ";
               
                $res3 = mysqli_query($con,$sql);

                    /*IF THERE EXIST AN IMAGE  */                         
                  if (mysqli_num_rows($res3)>0){

                    /*SELECT THE FIRST IMAGE*/

                    $sql2 = "SELECT `path` FROM hype_images   ORDER BY id DESC LIMIT 1 ";                                                                                      
                     $res2 = mysqli_query($con,$sql2);

                            /*SET IT AS THE ACTIVE SLIDER*/
                            $active =  mysqli_fetch_assoc ($res2,  0, 'path');
                    

                  ?>


                         <div class="item active">
                      <a href="all.php"> <img class="slide-image" src="<?php echo $active ?>" alt=""></a>
             
                      </div>  


              <?php
                      /*SELECT THE REMAINING 3*/

              $sql3 = "SELECT `path` FROM hype_images  WHERE  hype_images.path NOT LIKE '$active'  ORDER BY id DESC  ";                                                                                      
               $res1 = mysqli_query($con,$sql3);

         
                       while ($row = mysqli_fetch_assoc($res1)){
           ?>

          <div class="item">
               <a href="all.php"> <img class="slide-image" src="<?php echo $row['path'] ?>" alt=""></a>
             
          </div>     


           <?php

                    }
                  }else {
                            echo "<h3>0 images</h3>";
                      }



              ?>





                </div>





               <!--  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a> -->
            </div>
        </div>
   </div>

   <hr>



   <br>

         
    </div>



<div class='col-sm-3 col-lg-3 col-md-3'>

         
   <a class="twitter-timeline" href="https://twitter.com/_Hype_It" data-widget-id="726540589479636992">Tweets by @_Hype_It</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<div>

  <a href="contact_us.php"><img  src="assets/img/ad.jpg" alt=""></a>

</div>
<div>

  <a href="contact_us.php"><img  src="assets/img/ad2.jpg" alt=""></a>

</div>
              
     </div>
   




</body>

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






<!-- <footer class="footer-back">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright  &copy;2016 HypeIt All Rights Reserved .</p>

                </div>
            </div>
</footer> -->


</html>


    