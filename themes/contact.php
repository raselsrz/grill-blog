<?php

global $conn,$title;

$title = "Localhost-Contact Us";

$is_error = false;
$msg = "";
$is_try = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $is_try = true;
        $name = mysqli_escape_string($conn, $_POST['name']);
        $email = mysqli_escape_string($conn, $_POST['email']);
        $message = mysqli_escape_string($conn, $_POST['message']);
        $address = mysqli_escape_string($conn, $_POST['address']);

        if (!$is_error) {
            
            $sql = "INSERT INTO `contact`(`name`, `email`, `message`,`address`) VALUES ('$name','$email','$message','$address')";

            $result = mysqli_query($conn, $sql);

            if (!$result) {

                $is_error= true;
                $msg= "Somehting wrong !";

            }
        }else{
            $is_try = true;
            $msg = "For some reason, your information was not submitted";
        }

}





get_header();
?>


            <div id="heading">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-content">
                                <h2>Contact Us</h2>
                                <span>Home / <a href="contact.php">Contact Us</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="product-post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                                <h2>Feel free to send a message</h2>
                                <?php 

                                   if ($is_try && $is_error) { ?>
                                       
                                       <div class="error-msg">
                                            
                                            <h3 class="mt-3"><?php echo $msg; ?> <i class="fa fa-ban"></i></h3>
                                          
                                          </div>


                                                    
                                  <?php  }

                                  if ($is_try && !$is_error){ ?>


                                                    <div class="saccess-msg">
                                                         <h3><?php echo'Your data has been successfully submitted'; ?><i class='bx bx-like'></i></h3>
                                                    </div>

                                      <?php
                                          
                                          }

                                       ?>
                                
                                <img src="/assets/images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    <div id="contact-us">
                        <div class="container">
                            <div class="row">
                                <div class="product-item col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">  
                                            <div class="message-form">
                                                <form  method="POST" class="send-message">
                                                    <div class="row">
                                                    <div class=" col-md-5">
                                                        <input type="text" name="name" id="name" placeholder="Name" required />
                                                    </div>
                                                    <div class="email col-md-4">
                                                        <input type="text" name="email" id="email" placeholder="Email" required />
                                                    </div>
                                                    <div class="subject col-md-4">
                                                        <input type="text" name="address" id="subject" placeholder="Addres" required />
                                                    </div>
                                                    </div> <br>
                                                    <div class="row">        
                                                        <div class="text col-md-12">
                                                            <textarea name="message" placeholder="Message" required></textarea>
                                                        </div>   
                                                    </div>                              
                                                    <div class="send">
                                                        <button type="submit">Send</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="info">
                                                <h>For some reason, your information was not submitted</p>
                                                <ul>
                                                    <li><i class="fa fa-phone"></i>090-080-0760</li>
                                                    <li><i class="fa fa-globe"></i>456 New Dagon City Studio, Yankinn, Digital Estate</li>
                                                    <li><i class="fa fa-envelope"></i><a href="#">info@company.com</a></li>
                                                </ul>
                                            </div>
                                        </div>     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                                <h2>Find Us On Map</h2>
                                <img src="/assets/images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="googleMap" >
                                <iframe style="height:340px; width: 100%; " src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2895.613947259532!2d88.90451150983189!3d25.783126507627106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e3511d17bf7571%3A0x8dbbf5bb4d0562ad!2sSohag%20Bari!5e1!3m2!1sen!2sbd!4v1692950838859!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>


<?php

get_footer();


?>