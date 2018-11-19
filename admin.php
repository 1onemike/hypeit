     <?php
	ob_start();
     include'core.php';
   
     
     if(isset($_SESSION['username'])&& !empty($_SESSION['username']) ){
                if(($_SESSION['username'])=='admin'){header('Location:adminpanel789214.php');

                }else{
                    header('Location:index.php');
                     exit();

                }
         }else{
            header('Location: index.php');
            exit();
         }



        ?>