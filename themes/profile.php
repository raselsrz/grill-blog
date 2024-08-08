<?php

global $conn,$title;

$title = "Localhost-Profile Page";

if (!isset($_SESSION['login'])) {

   redirect('/login');
   exit();
}

$profile_data = $_SESSION['user_data'];

 get_header();

?>



<div class="user-profile-card">
    <div class="user-profile">
        <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="user-avatar" alt="User-Profile-Image">
        <h6 class="user-name"><?php echo $profile_data['full_name']; ?></h6>
        <i class="edit-icon mdi mdi-square-edit-outline feather icon-edit"></i>
    </div>
    <div class="user-details">
        <h6 class="section-title">Information</h6>
        <div class="detail-row">
            <p class="detail-label">Full Name</p>
            <p class="detail-value"><?php echo $profile_data['full_name']; ?></p>
        </div>
        <!-- <div class="detail-row">
            <p class="detail-label">Address</p>
            <p class="detail-value"><?php //echo $profile_data['address']; ?></p>
        </div> -->
        <div class="detail-row">
            <p class="detail-label">Email</p>
            <p class="detail-value"><?php echo $profile_data['email']; ?></p>
        </div>

        <div class="detail-row">
            <a href="/profile/updata" class="logout-link">U<span>pdata profile</span> </a>
            <a href="/profile/password-change" class="logout-link">P<span>assword change</span> </a>
            <a href="/logout" class="logout-link">L<span>ogout</span></a>
        </div>
         

    </div>
</div>

<?php

get_footer();


?>