<div class='col-sm-4 col-lg-4 col-md-4'>
             <div class='thumbnail'   >

               <div id="wrapper">
                               <a  class="launch-modal"  data-modal-id='<?php echo $row['id'].$row['username'] ?>' >  <div id="im" style="background-image: url('<?php echo $path; ?>');">
                                  </div>.</a>
                            </div>
                              
                <div class='caption'> 
                <h4> <font color='red'><span class="glyphicon glyphicon-fire"></span> <?php echo $row['title']  ?></font></h4>
                <h4> <font color='black'> <span class='glyphicon glyphicon-bullhorn'></span> Number of Hypes:  <span id='<?php echo $hype_number  ?>'><?php echo $row['no_of_hypes']  ?> </span>  </font></h4>

                </div>



                
                  <div class="row">
  <?php
                //check if user is logged in

       if(isset($_SESSION['username'])&& !empty($_SESSION['username']) ){
        $user=$_SESSION['username'];
        $id=$row['id'];

//get user id and hypes hyped
          $sql_query = "SELECT id FROM users WHERE username = '$user'  ";
          $query_run2= mysqli_query($con,$sql_query);

          $user_id =  mysqli_fetch_assoc ($query_run2);
          $user_id =$user_id["id"];

        $sql_query = "SELECT hypes_hyped FROM users WHERE id = '$user_id'  ";
          $query_run3= mysqli_query($con,$sql_query);
          $hypes_hyped=mysqli_fetch_assoc ($query_run3);

          $hypes_hyped = $hypes_hyped["hypes_hyped"];

     



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
                           
                           <a  class=" btn btn-danger "id='<?php echo $row['id'] ?>'>
                        <span class="button-text" >Hyped</span>
                        </a>
              <?php

          }else{

            ?>
                      
                        <a  class="btn btn-primary atopa" name="<?php echo $hype_number ?>" id='<?php echo $row['id'].'atopa' ?>' value="<?php echo $user_id ?>">
                        <span class="button-text" id='<?php echo $row['id'] ?>'  >Hype This</span>
                        </a>


                          <?php

          }


         

  

          

        }else {

          ?>
              
              <span  ><a class="btn btn-primary launch-modal " data-modal-id='modal-signin'>Hype This</a></span>';
              <?php

            }
                ?>  


               <span  > <a  class="btn btn-primary launch-modal"  data-modal-id='<?php echo $row['id'].$row['username'] ?>' >More Info</a></span>

                

               
               

                
              </div>


              <br>      

              <?php include 'social-media.php';?> 
             

               
              </div>
      </div>