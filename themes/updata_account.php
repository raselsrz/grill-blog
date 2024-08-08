<?php

global $conn,$title;

$title= "Localhost-Profile Update";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['login'])) {
	
	redirect('/login');
	exit();
}

global $conn;

$is_try = false;
$msg='';
$is_error=false;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$is_try= true;
	$full_name = mysqli_escape_string($conn, $_POST['full_name']);
    $email = mysqli_escape_string($conn, $_POST['email']);
	$address = mysqli_escape_string($conn, $_POST['address']);

	if (!$is_error) {

		$user_id = $_SESSION['user_data']['id'];

        $sql = "UPDATE `users_data` SET `full_name`='$full_name',`address`='$address',`email`='$email' WHERE id='$user_id'";

		$result = mysqli_query($conn, $sql);

		if (!$result) {
			
			" <br/> \n". mysqli_error($conn);

			$is_error = true;
			$msg = 'somehting wrong';
		}else{
            $_SESSION['user_data']['full_name']= $full_name;
            $_SESSION['user_data']['email']= $email;
            $_SESSION['user_data']['address']= $address;

        }
	}else{
		$is_try= true;
		$msg = 'Error to update';
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
                                            <div class="message-form">
                                                <form action="#" method="post" class="send-message">
                                                    <div class="row">
                                                    <div class="name col-md-4">
                                                        <input type="text" name="full_name" id="name" placeholder="Name" value="<?php echo $_SESSION['user_data']['full_name']; ?>" required />
                                                    </div>
                                                    <div class="email col-md-4">
                                                        <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $_SESSION['user_data']['email']; ?>" required />
                                                    </div>
                                                    </div>
                                                    <div class="row">        
                                                        <div class="text col-md-8">
                                                            <input type="text" name="address" id="address" placeholder="Address" value="<?php echo $_SESSION['user_data']['address']; ?>" required />
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
                                                         <h5><?php echo $msg; ?></h5>
                                                    </div>
                                                    
                                             <?php  }

                                                if ($is_try && !$is_error){
                                                    ?>


                                                    <div class="saccess-msg">
                                                         <h3><?php echo'Your Profile Update'; ?><i class='bx bx-like'></i></h3>
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
