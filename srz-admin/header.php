<?php

if(!defined('app_dir'))
{
    echo 'No access';
    exit();
} 

if (is_logged() && !is_admin()) { 
    
    redirect('/404');
   exit();
}

if (!is_logged() && !is_admin()) {
  redirect('/login');
}

if (!isset($_SESSION['login'])) {

   redirect('/login');
   exit();
}


 ?>
 <!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php
        global $title;
         echo   isset($title) ? htmlspecialchars($title)  : "Localhost - The Lots Articles";
    ?></title>
  <link rel="stylesheet" href="/assets/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>
<!-- bytewebster.com -->
<!-- bytewebster.com -->
<!-- bytewebster.com -->
<body>
<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
                <h3 class="text-success"><img src="https://bytewebster.com/img/logo.png" width="40"><span class="text-info">BLOG </span>WEBSTER</h3> 
            </a>
            <!-- User menu (mobile) -->
            <div class="navbar-user d-lg-none">
                <!-- Dropdown -->
                <div class="dropdown">
                    <!-- Toggle -->
                    <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-parent-child">
                            <img alt="Image Placeholder" src="https://img.icons8.com/bubbles/100/000000/user.png" class="avatar avatar- rounded-circle">
                            <span class="avatar-child avatar-badge bg-success"></span>
                        </div>
                    </a>
                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <a href="#" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Billing</a>
                        <hr class="dropdown-divider">
                        <a href="/logout" onclick="return confirm('Are you sure you want to logout?')" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/allpost">
                            <i class="bi bi-postcard"></i> All Post
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/addpost">
                            <i class="bi bi-building-add"></i> Add Post
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/user">
                            <i class="bi bi-people"></i> Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/message">
                            <i class="bi bi-chat-dots"></i> Message
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout" onclick="return confirm('Are you sure you want to logout ?')">
                            <i class="bi bi-box-arrow-left"></i> Logout
                            
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>