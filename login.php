<?php
 
include 'core.php';


if(isset($_POST['login_form-username'])&& isset($_POST['login_form-password'])){
   

    $username1 = $_POST['login_form-username'];
    $password =  $_POST['login_form-password'];

      $password_hash = md5($password);
    


    if(!empty($username1)&& !empty($password)){


        

        $sql_query = mysqli_query($con,"SELECT username,password FROM users WHERE username = '".mysqli_real_escape_string($con,$username1)."' AND hash = '$password_hash' ");
        $sql_query2 = mysqli_query($con,"SELECT email,password FROM users WHERE email = '".mysqli_real_escape_string($con,$username1)."' AND hash = '$password_hash' ");

        $row1=mysqli_num_rows($sql_query);
       


        
            if($row1==0)
            {
               $row2=mysqli_num_rows($sql_query2);


                         if($row2==0){

                            echo '<br><br><h4 id="alert"class="alert alert-danger fade in" >Invalid Credentials
                             <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                             </button>

                               </h4>' ;

                         }else if($row2==1){
                              $username_query = mysqli_query($con,"SELECT username FROM users WHERE email = '".mysqli_real_escape_string($con,$username1)."'  ");

                               $username1 =  mysqli_fetch_assoc ($username_query);

                               $username1 =$username1["username"];
                               session_start();
                               $_SESSION ['username']=$username1;
                               $http_referer = $_SERVER['HTTP_REFERER'];
                               header('Location: '.$http_referer);        
                        }

                
            }else if($row1==1){

                  $username1 =  mysqli_fetch_assoc ($sql_query);
                  
                               $username1 =$username1["username"];
                  session_start();
                    $_SESSION ['username']=$username1;
                    $http_referer = $_SERVER['HTTP_REFERER'];
                   
                    header('Location: '.$http_referer);            
            }



  

 }else{
     


     echo '<br><br><h4 id="alert"class="alert alert-danger fade in" >Please fill in details
                 <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>

                        </h4>' ; 
    }
 }

 ?>