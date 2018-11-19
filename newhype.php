<?php 

require 'core.php';
require 'connectdb.php';


if(isset($_SESSION['username'])&& !empty($_SESSION['username']) ){
  $username=$_SESSION ['username'];
  
  if (isset($_SESSION['ref']))
    {
      $ref=$_SESSION['ref'];
    }
    else{
      $ref = $username.rand().time();
      $_SESSION['ref']=$ref;
    }

   
        }  else {
             header('Location: index.php');
         }

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
    <link rel="stylesheet" href="assets/css/dropzone.css" type="text/css"  /> 


      
        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png?">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

 
</head>


<body style="background-color: #2B2E33">
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
					
                 <a class="btn btn-info  pull-right" href="all.php" >  <span class="glyphicon glyphicon-bullhorn"></span> VIEW HYPES &raquo </a>
                    
					
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
  





 

   <div class="modal-content">
                    
                    <div class="modal-header">
                       
                        <h3 class="modal-title" id="modal-register-label">CREATE NEW HYPE</h3>
                        
                    </div>
                    
                    <div class="modal-body">
                        

                                    <?php

                                       
                      

                  if(isset($_POST['btn_submit'])&& isset($_POST['title'])&&isset($_POST['info'])&&isset($_POST['select'])):
                      $title = $_POST['title'];
                     
                      $info = $_POST['info'];
                      
                      $category=$_POST['select'];
                     

       
       

                     if(!empty($info) && !empty($title)&&($info != '                                 '))
                     {
                       
                           /*  $size = getimagesize($filetmp1);
                             if ($size === FALSE){
                                 echo "<font color=#FF0000 ><h4>***WELL, STUFF LOOKS MESSY HERE, PLEASE CHECK THE UPLOADED FILE TO MAKE SURE IT IS AN IMAGE***</h4> </font>";
                                goto end;
                             }*/


                              $query1 = "SELECT title FROM valid_hypes WHERE title = '$title'  ";
                              $query_run1 = mysqli_query($con,$query1);
                              $query2 = "SELECT info FROM Valid_hypes WHERE  info ='$info' ";
                              $query_run2 = mysqli_query($con,$query2);
                             // $query3 = "SELECT img_name FROM valid_hypes WHERE img_name='$filename1' ";
                             // $query_run3 = mysqli_query($con,$query3);
             

                               if ((mysqli_num_rows($query_run1) > 0) &&(mysqli_num_rows($query_run2) > 0 ))

                              {
                                     echo  "<font color=#FF0000 ><h4>***HYPE ALREADY EXISTS***</h4> </font>";
                              }else{
                                     $sql= "INSERT INTO hypes VALUES ('','".mysqli_real_escape_string($con,$title)."','".mysqli_real_escape_string($con,$info)."','$username','$category','$ref')";
                         
                                       if( mysqli_query($con,$sql)){


                                                     // header('Location: all.php');


                                                             //UPLOAD HOSTEL'S IMAGES

                                               
                                                     echo '<br><br><h4 id="alert"class="alert alert-danger fade in" >***HYPE SUCCESSFULLY CREATED..IT WILL BE VERIFIED AND MADE LIVE SHORTLY***
                                                      <button type="button" class="close" data-dismiss="alert">
                                                     <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                                      </button>

                                                        </h4>' ;

                                                     unset($_SESSION['ref']);

                                                  }else{
                                               echo "OOPS,SORRY WE COULDN'T CREATE YOUR HYPE AT THIS TIME. PLEASE TRY AGAIN SHORTLY";
                                           }

                                   }

    end :
     
   
    }else{
      echo "<font color=#FF0000 ><h4>***ALL FIELDS REQUIRED***</h4> </font>";
    }
    
endif;



   



?>

<?php

$ds = DIRECTORY_SEPARATOR;  
 
$storeFolder = 'hype_images';   
 
if (!empty($_FILES)) {
     
    $tempFile1 = $_FILES['file']['tmp_name']; 
    $tempFile = explode('.', $_FILES["file"]["name"]);
    $tempFile2 = $_FILES["file"]["name"];
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
    $newfilename = $storeFolder.'/'.$tempFile2;
    $targetFile =  $targetPath. $tempFile2; 
    

    $new="INSERT INTO `hype_images` (`path`, `ref`) VALUES ('$newfilename', '$ref')";
    mysqli_query($con,$new);

    move_uploaded_file($tempFile1,$targetFile);
   


  }



?>

                        <form role="form" action="newhype.php" method="post" enctype="multipart/form-data"class="registration-form">
                            
                            NB: Fields Marked * are mandatory
                                <h4>TITLE  *</h4>
                            <div class="form-group">
                                <input type="text" name="title" maxlength="28" Placeholder="Maximum of 28 characters" class="form-email form-control " >
                            </div> 

                                 <h4>DETAILS  *</h4>
                            <div class="form-group">  
                                 <textarea name="info" class="form-control" rows="3">
                                 </textarea>  
                            </div> 


                           
                           

                                <h4>CATEGORY  *</h4>
                            <select class="form-control" name="select">
                                <option

                                value="event">EVENT

                                </option>
                                 <option

                                value="product">PRODUCT

                                </option>
                                 <option

                                value="business">BUSINESS/SERVICE

                                </option>



                            </select>

                            <br>

                             
                           <!--  <div class="form-group">
                                       <h4> <label for="inputfile">Upload Cover Photo  *</label></h4>
                                        <input type="file" accept = "image/*" name="file_img">       
                                           
                            </div>  -->
                             <div>
                                <h4>Upload Hype Images</h4>
                               <h5>NB: Max of 4 pictures</h5>
                               
                              <div id="file-up" class="dropzone"></div>

                             

                            </div>





                            
                            <br> 
                            <button type="submit" name="btn_submit" class="btn">Submit</button>

                                        
                        </form>
                        
                    </div>
                    
                </div>

                

<!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
          <script src="assets/js/dropzone.js"></script> 

</body>




<footer class="footer-back">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright  &copy; 2016 HypeIt  All Rights Reserved.</p>
                </div>
            </div>
</footer>


</html>