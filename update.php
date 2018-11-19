 <?php
include 'core.php';
include 'connectdb.php';


   
    if(isset($_POST['hype'])){
        hype();

   }
    

    function hype()
    {

        $id = $_POST['postid'];
        $user_id=$_POST['userid'];


include 'connectdb.php';

         mysqli_query($con,"UPDATE valid_hypes SET no_of_hypes=no_of_hypes+1 WHERE id ='$id'");

         $query1=mysqli_query($con,"SELECT  `hypes_hyped` FROM `users` WHERE id = '$user_id' ");
           $hypes_hyped=mysqli_fetch_assoc ($query1);
          $hypes_hyped = $hypes_hyped["hypes_hyped"];

           $id2 = $id.','.$hypes_hyped;

        mysqli_query ($con,"UPDATE users SET hypes_hyped = '$id2' WHERE users.id = $user_id");
      



    }

       

    
   
 ?>