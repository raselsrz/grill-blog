<?php

global $conn,$title;

$title = "Localhost-Profile Password Change Page";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['login'])) {
    
    redirect('/login');
    exit();
}



global $conn;

$is_error= false;
$msg='';
$is_try=false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $is_try= true;

    $old_pass1 =  $_SESSION['user_data']['password'];

    $old_pass2 = $_POST['current_password'];

    if ($old_pass1 != $old_pass2) {
        $is_error = true;
        $msg = 'Wrong Password';
    }

    $new_pass1 = $_POST['new_pass1'];
    $new_pass2 = $_POST['new_pass2'];

    if ($new_pass1 !=$new_pass2) {
        $is_error = true;
        $msg = 'Password Not Matched';
    }

    if (!$is_error) {
        $user_id = $_SESSION['user_data']['id'];

        $sql = "UPDATE `users_data` SET `password`='$new_pass2' WHERE id='$user_id'";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            
            " <br/> \n". mysqli_error($conn);

            $is_error= true;
            $msg= "somehting wrong";
        }else{
            $_SESSION['user_data']['password'] = $new_pass2;
        }
    }

}


	get_header();
?>
                 <div id="contact-us">

                        <div class="container">
                            <div class="row">
                                <div class="product-item col-md-12">
                                    <div class="row">
                                        <div class="col-md-8"> 
                                            <h2>Password Update</h2>
                                            <p>If you want to change your profile password, please update your password with current password <i class='bx bx-arrow-to-bottom' ></i></p>
                                            <div class="message-form">
                                                <form  method="Post" class="send-message">
                                                    <div class="row">        
                                                        <div class="text col-md-8">
                                                            <input type="password" name="current_password" id="currentP" placeholder="Current Password" required />
                                                        </div>

                                                        <div class="text col-md-8">
                                                            <input type="password" name="new_pass1" id="newP" placeholder="New Password" required />
                                                        </div>

                                                        <div class="text col-md-8">
                                                            <input type="password" name="new_pass2" id="confirmP" placeholder="Confirm Password" required />
                                                        </div>

                                                    </div>                              
                                                    <div class="send">
                                                        <button type="submit">Send</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-4">

                                            <?php 

                                             if ($is_try && $is_error) {

                                                    ?>
                                                    <div class="error-msg">
                                                         <h4 style="background: #ff2d2d; padding:8px;
                                                         border-radius:5px; " ><?php echo $msg; ?></h4>
                                                    </div>
                                                    
                                             <?php  }

                                                if ($is_try && !$is_error){
                                                    ?>


                                                    <div class="saccess-msg">
                                                         <h4 style="background: green; padding:8px;
                                                         border-radius:5px; "><?php echo'Your Password Change'; ?><i class='bx bx-like'></i></h4>
                                                    </div>

                                                    <?php
                                                 }

                                                ?>

                                            
                                            <div class="info">
                                               <img src="https://cdni.iconscout.com/illustration/premium/thumb/update-your-profile-1946860-1648379.png" alt="Side Image">
                                            </div>
                                        </div>     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



<?php get_footer();?>
