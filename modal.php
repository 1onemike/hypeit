 <div class='modal fade' id='<?php echo $row['id'].$row['username'] ?>' tabindex='-1' role='dialog' aria-labelledby='modal-signin-label' aria-hidden='true'>
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
                                                  $active =$active ["path"];

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





                                             <!--  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                                  <span class="glyphicon glyphicon-chevron-left"></span>
                                              </a>
                                              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                                  <span class="glyphicon glyphicon-chevron-right"></span>
                                              </a> -->
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
