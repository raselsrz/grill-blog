<?php 

global $conn,$title;

$title = "Localhost-Sign Up Error Page";


$is_error = false;
$errors_msg= '';
$error_msg= '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$name = mysqli_escape_string($conn, $_POST['name']);
$address = mysqli_escape_string($conn, $_POST['address']);
$email = mysqli_escape_string($conn, $_POST['email']);
$phone = mysqli_escape_string($conn, $_POST['phone']);
$password = $_POST['password'];


$sql1 = "select * from users_data where email='$email'";

$email_result = mysqli_query($conn, $sql1);

$totale_email = mysqli_num_rows($email_result);

if ($totale_email > 0) {
    $is_error= true;
    $errors_msg = "this email used";
    $error_msg = "This email address is already associated with an existing account. Please use a different email or";
}

if (!$is_error){
    
    $sql = "insert into users_data(`full_name`,`address`,`email`,`phone`,`password`,`role`) values( '$name','$address','$email','$phone','$password','user')";

 $register_data = mysqli_query($conn, $sql);

 if (!$register_data) {
    
    $is_error= true;
    $msg= "Somehting wrong !";
 }

}

if (!$is_error){
    redirect('/');
}

}

get_header();

?>

<div id='notfound'>
        <div class='notfound'>
            <div class='notfound-404'></div>
            <h1>Oops!</h1>
            <?php if ($is_error) {

                ?>


                <h2><?php echo $errors_msg; ?></h2>
                <p><?php echo $error_msg; ?></p>


                

                <?php
            } ?>
            <a href='/login'>Back to Sign Up Page</a>
        </div>
    </div>



<?php get_footer(); ?>
