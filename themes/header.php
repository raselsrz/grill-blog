<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>
        <?php
        global $title;
         echo   isset($title) ? htmlspecialchars($title)  : "Localhost - The Lots Articles";
    ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="/assets/css/bootstrap.css">
        <link rel="stylesheet" href="/assets/css/font-awesome.css">
        <link rel="stylesheet" href="/assets/css/templatemo_style.css">
        <link rel="stylesheet" href="/assets/css/templatemo_misc.css">
        <link rel="stylesheet" href="/assets/css/flexslider.css">
        <link rel="stylesheet" href="/assets/css/testimonails-slider.css">
        <link rel="stylesheet"href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

        <script src="/assets/js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
    </head>
    <body>

            <header>
                <div id="top-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="home-account">
                                    <a href="/">Home</a>

                                    <?php 

                            if (!is_logged()) {

                                ?>
                                <a class="nav-link icon" aria-current="page" href="/login">Login <span class="login_icon"><i class='bx bx-user'></i></span> </a>

                                <?php
    
                            }else{
                                ?>
                                <?php if(is_admin()){?>
                                   
                                <a class="nav-link icon" aria-current="page" href="/admin">Admin Panel</a>
                                <a class="nav-link icon" aria-current="page" href="/profile">Profile</a>

                                <?php }else{?>
                                <a class="nav-link icon" aria-current="page" href="/profile">Profile</a>

                            <?php
                        }
                            }


                             ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="search-box searchs">  
                                    <form name="search_form" method="GET" action="/search" class="search_form">
                                        <input id="search" name="s" type="search" value="<?php 
                            echo isset($_GET['s']) && !empty($_GET['s']) ? htmlspecialchars($_GET['s']) : '';?>" placeholder="Type here search"  />
                                        <input type="submit" id="search-button" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="main-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="logo">
                                    <a href="/"><img src="/assets/images/logo.png" title="Grill Template" alt="Grill Website Template" ></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="main-menu">
                                    <ul>
                                        <li><a href="/">Home</a></li>
                                        <li><a href="/about">About</a></li>
                                        <li><a href="/contact">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="search-box">  
                                    <form name="search_form" method="GET" action="/search" class="search_form">
                                        <input id="search" name="s" type="search" value="<?php 
                            echo isset($_GET['s']) && !empty($_GET['s']) ? htmlspecialchars($_GET['s']) : '';?>" placeholder="Type here search" />
                                        <input type="submit" id="search-button"  />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>