<?php 



require 'core.php';

require 'connectdb.php';

include 'login.php';

include 'signup.php';

include 'signupmodal.html';

include 'signinmodal.html';

?>





<?php

if(isset($_POST['hype'])){

	$postid = $_POST['postid'];



$result = mysqli_query($con,"SELECT * FROM valid_hypes WHERE 'id' = $postid ");

$row=mysql_fetch_array($result);

 echo $n = $row['no_of_hypes'];

 echo $users_who_hyped=$row['users_hyped'];



mysqli_query($con,"UPDATE `valid_hypes` SET `no_of_hypes` = $n +1  WHERE `valid_hypes`.`id` = $postid;");





echo $user=$_SESSION['username'];

$sql_query = "SELECT id FROM users WHERE username = '$user'  ";

$query_run2= mysqli_query($con,$sql_query);

 echo $user_id =  mysqli_fetch_assoc ($query_run2,  0, 'id');



echo $new = $user_id.','.$users_who_hyped;



 

          mysql_query ("UPDATE valid_hypes SET users_hyped = $new WHERE valid_hypes.id = $postid");

               

exit();







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



      

        <!-- Favicon and touch icons -->

        <link rel="shortcut icon" href="assets/ico/favicon.png">

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">

        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">

        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">

        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

</head>





<body>



	 <div class="container">



    <div class="row">



		<?php

		$sqltest = "SELECT * FROM valid_hypes WHERE `category`='business' ORDER BY id DESC ";

		$result1 = mysqli_query($con,$sqltest);

  		



  		while ( $row = mysql_fetch_assoc($result1)) {

  			?>

  			<div class='col-sm-4 col-lg-4 col-md-4'>

             <div class='thumbnail'   >



               <div id="wrapper">

                  <div id="im" style="background-image: url('<?php echo $row['img_path'] ?>');">

                    </div>

              </div>

                              

                <div class='caption'> 

                <h4> <font color='red'><span class="glyphicon glyphicon-fire"></span> <?php echo $row['title']  ?></font></h4>

                <?php

                

                if(($row['no_of_hypes'])==0){

                  echo "<h4> <font color='black'> <span class='glyphicon glyphicon-bullhorn'></span> No One Hyped This Yet</font></h4>";

                }else if(($row['no_of_hypes'])==1){

                  echo "<h4> <font color='black'> <span class='glyphicon glyphicon-bullhorn'></span> ".$row['no_of_hypes']." Person Hyped This</font></h4>";

                }else{

                  echo "<h4> <font color='black'> <span class='glyphicon glyphicon-bullhorn'></span> ".$row['no_of_hypes']." People Hyped This</font></h4>";

                }

				?>





				<?php



					$exists=false;

					if(isset($_SESSION['username'])&& !empty($_SESSION['username']) ){

        			$user=$_SESSION['username'];

        			$id=$row['id'];





					//get user id and hypes hyped

         			$sql_query = "SELECT id FROM users WHERE username = '$user'  ";

          			$query_run2= mysqli_query($con,$sql_query);

          			$user_id =  mysqli_fetch_assoc ($query_run2,  0, 'id');

          			

					

					$list_of_hype_ids = explode(',', $row['users_hyped']);



										foreach( $list_of_hype_ids as $value ) 

         								{

          								if($value == $user_id){

          									$exists = true;

         									 	} 

         								 }

         			if($exists==true){

         			?>	

         			<!-- hyped -->

         			 <span><a  href=""class="unhype" id='<?php echo $row['id'] ?>'> Hyped</a></span>



         			<?php

         			}else{

         			?>	

         			<!-- unhyped -->

         			 <span><a href="" class="hype" id='<?php echo $row['id'] ?>'>Hype This UNHYPED</a></span>





         			<?php

         			}



				?>



                

                </div>



            </div>

        </div>



        <?php

  		}else{

  			?>

              <span  ><a class="btn btn-primary launch-modal " data-modal-id='modal-signin'>Hype This SIGN IN</a></span>



  			<?php

  		}

  	}



		?>







	</div>



</div>







    <!-- Javascript -->

        <script src="assets/js/jquery-1.11.1.min.js"></script>

        <script src="assets/js/bootstrap.min.js"></script>

        <script src="assets/js/jquery.backstretch.min.js"></script>

        <script src="assets/js/scripts.js"></script>





          <script type="text/javascript">

        $(document).ready(function(){



          $('.hype').click(function(){

            var postid = $(this).attr('id');

          $.ajax({



            url:'test.php',

            type:'post',

            async: false,

            data :{

              'hype':1,

              'postid':postid



            },

            success: function(){



              

            }

          });



          });



        });







        </script>





</body>

<footer>







</footer>





</html>