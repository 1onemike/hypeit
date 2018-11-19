




 

<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
   
		<title>HypeIt -Redefining Publicity!!!</title>

        <!-- CSS -->
       
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

         <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>


</head>




<?php 

require 'core.php';



$mysql_host ='localhost';
$mysql_name = 'root';
$mysql_pswd =   '';
$conn_error='Could not connect';
$mysql_db  ='hypeit';

$con=mysqli_connect($mysql_host,$mysql_name,$mysql_pswd);

mysqli_select_db($con,$mysql_db); 












if(isset($_POST['btn_submit']))
{
    $filename1 =$_FILES["file_img"]["name"];
    $filetmp1 = $_FILES["file_img"]["tmp_name"];
    $filepath1 = "slider_images/".$filename1;
    $id = $_POST['id'];
    $caption = $_POST['caption'];
   
   

                     move_uploaded_file($filetmp1, $filepath1);

                     $sql= "INSERT INTO slider_images VALUES ('$id','$filepath1','$caption')";


                     if($result1 = mysqli_query($con,$sql)){
                      echo "SUCCESS";
                     }else{
                      echo "FAIL";
                     }

       
}
   
   ?>
<br><br><br><br><br><br>

   <?php

    if(isset($_POST['push'])){
        push();
    }elseif(isset($_POST['delete'])){
        delete();
    }elseif(isset($_POST['accept'])){
      accept();
    }elseif(isset($_POST['deleteslider'])){
      deleteslider();
    }
    elseif(isset($_POST['delete_valid'])){
      delete_valid();
    }

    function push()


    {

      $id= $_POST['id'];
      $title= $_POST['title'];
      $info= $_POST['info'];
      $username= $_POST['username'];
     $ref = $_POST['ref'];
      $category= $_POST['category'];


      $mysql_host ='localhost';
      $mysql_name = 'root';
      $mysql_pswd =   '';
      $conn_error='Could not connect';
      $mysql_db  ='hypeit';

      $con=mysqli_connect($mysql_host,$mysql_name,$mysql_pswd);

      mysqli_select_db($con,$mysql_db); 

     $sql= "INSERT INTO valid_hypes VALUES ('','".mysqli_real_escape_string($con,$title)."','".mysqli_real_escape_string($con,$info)."','$username','$category','','$ref')";

    // $sql= 'INSERT INTO valid_hypes VALUES ("",$title,$info,$username,$imgname,$imgpath,$imgtype,$category,"")';
     $result1 = mysqli_query($con,$sql);

     if($result1){
   echo "<font color='red'> ***PUSHED*** </font>";



   $sql2 = "DELETE FROM hypes WHERE hypes.id = $id ";
      $result1 = mysqli_query($con,$sql2);


      }else{
       echo "<font color='red'> *** NOT PUSHED *** </font>";
   }

    }
    function delete()
    {

      $id= $_POST['id'];
    

       
      $sql = "DELETE FROM hypes WHERE hypes.id = $id ";
      $result1 = mysqli_query($con,$sql);

      if($result1){
   echo "<font color='red'> ***DELETED*** </font>";


      }else{
       echo "<font color='red'> *** NOT DELETEd *** </font>";
   }
    }

     function deleteslider()
    {
      $mysql_host ='localhost';
$mysql_name = 'root';
$mysql_pswd =   '';
$conn_error='Could not connect';
$mysql_db  ='hypeit';

$con=mysqli_connect($mysql_host,$mysql_name,$mysql_pswd);

mysqli_select_db($con,$mysql_db); 


      $id= $_POST['id'];
       
      $sql = "DELETE FROM slider_images WHERE slider_images.id = $id ";
      $result1 = mysqli_query($con,$sql);

      if($result1){
   echo "<font color='red'> ***DELETED*** </font>";


      }else{
       echo "<font color='red'> *** NOT DELETEd *** </font>";
   }
    }

     function delete_valid()


    {

      $mysql_host ='localhost';
$mysql_name = 'root';
$mysql_pswd =   '';
$conn_error='Could not connect';
$mysql_db  ='hypeit';

$con=mysqli_connect($mysql_host,$mysql_name,$mysql_pswd);

mysqli_select_db($con,$mysql_db); 

      $id= $_POST['id'];
       $sqltest = "SELECT * FROM valid_hypes WHERE valid_hypes.id = $id   ";
                                          $r = mysqli_query($con,$sqltest);

                          if (mysqli_num_rows($r)>0){

                            $ref = mysqli_fetch_assoc($r);

                            $ref=$ref["ref"];

                            $sql = "DELETE FROM hype_images WHERE hype_images.ref = $ref ";
                            $result1 = mysqli_query($con,$sql);

                               if($result1){
                            echo "<font color='red'> ***DELETED PICS*** </font>";


                               }else{
                                echo "<font color='red'> ***PICS NOT DELETEd *** </font>";
                            }



                          
                        
                            
                          }else {
                              echo "<h3> Not in the images table</h3>";
                          }

      
       
      $sql = "DELETE FROM valid_hypes WHERE valid_hypes.id = $id ";
      $result1 = mysqli_query($con,$sql);

      if($result1){
   echo "<font color='red'> ***DELETED HYPE*** </font>";


      }else{
       echo "<font color='red'> *** HYPE NOT DELETEd *** </font>";
   }
    }
     function accept()
    {
       echo "<font color='red'> ***ACCEPTED*** </font>";
    }


  ?>

<body style="background-color:black">

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
                <a class="navbar-brand" href="index.php" ><font size="10" >HypeIt</font></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                     <li class="item active">
                        <a href="#">  <span class="glyphicon glyphicon-user"></span> ADMIN</a>
                    </li>
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
                     <a class="btn btn-info  pull-right" href="all.php" >  <span class="glyphicon glyphicon-bullhorn"></span> VIEW HYPES &raquo </a>

                   </nav>
<h1> <font color='red'> ***WELCOME ADMINISTRATOR*** </font></h1>

<br><br><br><br>

<div>

                                    <h3> <font color='red'> ***SLIDER IMAGES*** </font></h3>

                                    <div>

                                         <?php
                                         $sqltest = "SELECT * FROM slider_images  ";
                                          $result1 = mysqli_query($con,$sqltest);

                                         ?>
                                   <div class="container">

                                   <div class="row">


                                  <?php

if (mysqli_num_rows($result1)>0){


    while ($row = mysqli_fetch_assoc($result1)){


   
 
    ?>
        

    <div class='col-sm-4 col-lg-4 col-md-4'>
             <div class='thumbnail'   >

               <div id="wrapper">
                  <div id="im" style="background-image: url('<?php echo $row['img_path'] ?>');">
                    </div>
              </div>
                              
                <div class='caption'> 
                <h4> <font color='red'><?php echo $row['id']?></font></h4>
                                <h4> <font color='red'><?php echo $row['caption']?></font></h4>

               
                </div>

              <form action="adminpanel789214.php" method="post">
                <p>  <input  type="submit" class='btn btn-primary' name="deleteslider" value='Delete'> </p>
                <p>  <input  type="hidden"  name="id" value='<?php echo $row['id']  ?>'> </p>
              </form>

              </div>
      </div>

    
 
    <?php

    }
}else {
    echo "<h3>0 results</h3>";
}


?>
</div>

<div>

       
 <form role="form" action="adminpanel789214.php" method="post" enctype="multipart/form-data"class="registration-form">
                            
                            <div class="form-group">
                                        <label for="inputfile">Upload Slider Photo</label>
                                        <input type="file" name="file_img">     
                                        ID <input style="color: #000;"type="number" name="id">  

                                        CAPTION <input type="text" name="caption">     
 
                                           
                            </div>
                            <button type="submit" name="btn_submit" class="btn btn-info">Submit</button>

                                        
</form>
</div>




 </div>

 <br><br><br>

 
 <br><br><br>


<h3> <font color='red'> ***INVALIDATED HYPES*** </font></h3>

 
<?php
  $sqltest = "SELECT * FROM hypes ORDER BY id DESC ";
  $result1 = mysqli_query($con,$sqltest);


   




  ?>
  <div class="container">

    <div class="row">


  <?php

if (mysqli_num_rows($result1)>0){




    while ($row = mysqli_fetch_assoc($result1)){



      $ref = $row['ref'];
     
      $sql = "SELECT `path` FROM hype_images  WHERE hype_images.ref = '$ref' ORDER BY id LIMIT 1 ";
     $result3 = mysqli_query($con,$sql);

       $path =  mysqli_fetch_assoc ($result3);
        $path =$path ["path"];
     


      $new = fix_image($path);
   
 
    ?>
        

    <div class='col-sm-4 col-lg-4 col-md-4'>
             <div class='thumbnail'   >

               <div id="wrapper">
                  <div id="im" style="background-image: url('<?php echo $path ?>');">
                    </div>
              </div>
                              
                <div class='caption'> 
                <h4> <font color='red'><?php echo $row['id']  ?></font></h4>
                 <h4> <font color='red'><?php echo $row['title']  ?></font></h4>
                <h4> <font color='red'><?php echo $row['category']  ?></font></h4>
                </div>

                <a href='#' class='btn btn-primary launch-modal'  data-modal-id='<?php echo $row['id'] ?>'>  <span class="glyphicon glyphicon-info-sign"></span> Info</a>

                <br>

                  
                
                <form action="adminpanel789214.php" method="post">

                	<p> <input  type="submit" class='btn btn-primary' name="push" value='Accept this Hype'> </p>
               
                <p>  <input  type="submit" class='btn btn-primary' name="delete" value='Delete'> </p>
               
                <p>  <input  type="hidden"  name="id" value='<?php echo $row['id']  ?>'> </p>
                <p>  <input  type="hidden"  name="title" value="<?php echo $row['title']  ?>"> </p>
                <p>  <input  type="hidden"  name="info" value="<?php echo $row['info']  ?>"> </p>
                <p>  <input  type="hidden"  name="username" value='<?php echo $row['username']  ?>'> </p>
                <p>  <input  type="hidden"  name="category" value='<?php echo $row['category']  ?>'> </p>
                <p>  <input  type="hidden"  name="ref" value='<?php echo $row['ref']  ?>'> </p>



               
                </form>

              </div>
      </div>



           <div class='modal fade' id='<?php echo $row['id'] ?>' tabindex='-1' role='dialog' aria-labelledby='modal-signin-label' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    
                    <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal'>
                            <span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span>
                        </button>
                        <h3 class='modal-title' id='modal-signin-label'> <?php echo $row['title'] ?></h3>
                        
                    </div>
                    
                    <div class='modal-body'>
                                     
                                     <?php
                                     $username = $row['username'];
                                     $info =  $row['info'];

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
                                                          $active =  mysqli_fetch_assoc ($res2);
                                                          $active = $active["path"];
                                                  

                                                ?>


                                                       <div class="item active">
                                                     <img class="slide-image" src="<?php echo $active ?>" alt="">
                                           
                                                    </div>  


                                            <?php
                                                    /*SELECT THE REMAINING 3*/

                                            $sql3 = "SELECT `path` FROM hype_images  WHERE hype_images.ref = '$ref' ORDER BY id DESC LIMIT 3  ";                                                                                      
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





                                              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                                  <span class="glyphicon glyphicon-chevron-left"></span>
                                              </a>
                                              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                                  <span class="glyphicon glyphicon-chevron-right"></span>
                                              </a>
                                          </div>
                                      </div>
                                 </div>
                                        

                                <p> Posted By : <?php echo nl2br ( $username); ?></p>
                                
                                <div class="col" >
                                <p><h3> <?php echo nl2br ($info); ?></h3></p>
                                </div>          

                                      
                    </div>
                  

                </div>
            </div>
        </div>


       
 

    
 
    <?php

    }
}else {
    echo "<h3>0 results</h3>";
}



   function fix_image($badfilename){

    $exif = exif_read_data($badfilename);


  if (!empty($exif['Orientation'])) {
   $newimage = imagecreatefromjpeg($badfilename);

   $exifdata = $exif['Orientation'];

    if ($exifdata==3){
      echo "3";
            $newimage = imagerotate($newimage, 180, 0);
          }else if ($exifdata==6) {
      echo "6";
            $newimage = imagerotate($newimage, -90, 0);
          }else if ($exifdata==8){
      echo "3";
            $newimage = imagerotate($newimage, 90, 0);
          }
    imagejpeg($newimage,$badfilename,90);
   
   



  

  
 }

}

?>





    </div>
  </div>









  <h3> <font color='red'> ***VALID HYPES*** </font></h3>

 
<?php
  $sqltest = "SELECT * FROM valid_hypes ORDER BY id DESC ";
  $result1 = mysqli_query($con,$sqltest);


   

   


  ?>
  <div class="container">

    <div class="row">


  <?php

if (mysqli_num_rows($result1)>0){


    while ($row = mysqli_fetch_assoc($result1)){

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
   
 
    ?>
        

    <div class='col-sm-4 col-lg-4 col-md-4'>
             <div class='thumbnail'   >

               <div id="wrapper">
                  <div id="im" style="background-image: url('<?php echo $path ?>');">
                    </div>
              </div>
                              
                <div class='caption'> 
                <h4> <font color='red'><?php echo $row['id']  ?></font></h4>
                 <h4> <font color='red'><?php echo $row['title']  ?></font></h4>
                <h4> <font color='red'><?php echo $row['category']  ?></font></h4>
                </div>



                <form action="adminpanel789214.php" method="post">
                 
                <p>  <input  type="submit" class='btn btn-primary' name="delete_valid" value='Delete'> </p>
               
                <p>  <input  type="hidden"  name="id" value='<?php echo $row['id']  ?>'> </p>
             

               
                </form>

              </div>
      </div>

    
 
    <?php

    }
}else {
    echo "<h3>0 results</h3>";
}

?>





    </div>
  </div>


<!-- 

<?php 

if(isset($_POST['move'])){
  $sql = "SELECT * FROM valid_hypes  ";
      $sqlquery= mysqli_query($con,$sql);
  
  while ($row = mysqli_fetch_assoc($sqlquery)){
    $ref = $row['id'];
    $path = $row['img_path'];

    if(!($path === '')){
    $sql2= "INSERT INTO hype_images VALUES ('','$path','$ref')";
    if(mysqli_query($con,$sql2)){
      $sql3= "UPDATE valid_hypes SET ref='$ref' WHERE id= '$ref'";
      if(mysqli_query($con,$sql3)){
        echo"done";
      }
    }
  }
  }
}  

?>
<form method="post">

<input type="submit" name= "move">
</form>
 -->





 </body>