
<?php

if(isset($_POST['username'])&&isset($_POST['email'])&& isset($_POST['password'])&&isset($_POST['password2'])&&isset($_POST['number'])):







    $username = $_POST['username'];

    $password =$_POST['password'];

    $password2 = $_POST['password2'];

    $email = $_POST['email']; 

    $password_hash = md5($password);

    $number = $_POST['number'];

    $proceed ='1';

    $proceed2 ='1';
    $proceed3 ='1';



    if (isset($_POST['terms'])){



    }else{

        echo ' <br><br><h4 id="alert"class="alert alert-danger fade in" >Please read and accept terms and conditions

                 <button type="button" class="close" data-dismiss="alert">

                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                        </button>



                        </h4>' ;

        goto end;

    }

    

    if(!empty($password) && !empty($password2) &&!empty($email)&&!empty($username)){

        

        if($password==$password2){

            $query3 = "SELECT email FROM users WHERE email = '$email'";

            $query_run3 = mysqli_query($con,$query3);





            if (preg_match('/^[a-z\d_]{5,20}$/i', $username)){





             $query4 = "SELECT username FROM users WHERE username = '$username'";

            $query_run4 = mysqli_query($con,$query4);

        }else{



             echo ' <br><br><h4 id="alert"class="alert alert-danger fade in" >The username '.$username.' is not accepted.

                 <button type="button" class="close" data-dismiss="alert">

                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                        </button>



                        </h4>' ;

                    $proceed3 = '0';

                            goto end;



        }



             if (mysqli_num_rows($query_run3) == 1){

                   

                   



                     echo ' <br><br><h4 id="alert"class="alert alert-danger fade in" >The email '.$email.' already exists.

                 <button type="button" class="close" data-dismiss="alert">

                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                        </button>



                        </h4>' ;

                    $proceed = '0';

                            goto end;



            }



            if(mysqli_num_rows($query_run4) == 1){





                  echo '<br><br><h4 id="alert"class="alert alert-danger fade in" >The username '.$username.' already exists.

                 <button type="button" class="close" data-dismiss="alert">

                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                        </button>



                        </h4>' ;

                     $proceed2 = '0';

                             goto end;





            }

           



           if($proceed2=='0' || $proceed =='0' || $proceed3 =='0'){

                    



            }else{

               

                $query2 = "INSERT INTO users VALUES ('','".mysqli_real_escape_string($con,$username)."', '".mysqli_real_escape_string($con,$password)."' ,'$password_hash','".mysqli_real_escape_string($con,$email)."','$number','','0') ";

             

                        if($query_run= mysqli_query($con,$query2)){



                                     $sql_query = "SELECT username FROM users WHERE username = '".mysqli_real_escape_string($con,$username)."' ";







                                if($query_run2= mysqli_query($con,$sql_query)){

                                         $username2 =  mysqli_fetch_assoc ($query_run2);

                                    
                                         $username = $username["username"];

                                         $_SESSION ['username']=$username2;

                                         header('Location: index.php');



                                }else{

                                    echo '<br><br><h4 id="alert"class="alert alert-danger fade in" >Sorry we could not register you at the moment

                 <button type="button" class="close" data-dismiss="alert">

                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                        </button>



                        </h4>' ;

                                }



                                 









                             }

                                 else{

                                       





                  echo '<br> <br><h4 id="alert"class="alert alert-danger fade in" >Oops,sorry we could not register you at the moment

                 <button type="button" class="close" data-dismiss="alert">

                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                        </button>



                        </h4>' ;



                                                                                                 }

            }



        }else {

            

            echo '<br><br><h4 id="alert"class="alert alert-danger fade in" >Passwords do not match

                 <button type="button" class="close" data-dismiss="alert">

                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                        </button>



                        </h4>' ;



        }

    }else{

        

        echo '<br><br><h4 id="alert"class="alert alert-danger fade in" >All fields are required

                 <button type="button" class="close" data-dismiss="alert">

                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                        </button>



                        </h4>' ;



    }



    end:



endif;





?>