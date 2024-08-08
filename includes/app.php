<?php
require 'router.php';
require 'database.php';
require 'functions.php';

$router = new AltoRouter();

$router->map('GET|POST','/', function(){
	include app_dir.'/themes/index.php';
});


$router->map('GET|POST','/category/[*:slug]', function ($slug){
	include app_dir.'/themes/category.php';
});

$router->map('GET|POST','/contact', function(){
	include app_dir.'/themes/contact.php';
});

$router->map('GET|POST','/profile', function(){
	include app_dir.'/themes/profile.php';
});

//about
$router->map('GET|POST','/about', function(){
	include app_dir.'/themes/about.php';
});


$router->map('GET|POST','/profile/updata', function(){
	include app_dir.'/themes/updata_account.php';
});

$router->map('GET|POST','/profile/password-change', function(){
	include app_dir.'/themes/password_change.php';
});





$router->map('GET|POST','/login', function(){
	include app_dir.'/themes/login.php';
});

$router->map('GET|POST','/signup', function(){
	include app_dir.'/themes/signup.php';
});

$router->map('GET|POST','/logout', function(){
	include app_dir.'/themes/logout.php';
});
$router->map('GET|POST','/search', function(){
	include app_dir.'/themes/search.php';
});

$router->map('GET|POST','/404', function(){
	include app_dir.'/themes/404.php';
});





$router->map('GET|POST','/admin', function(){
	include app_dir.'/srz-admin/index.php';
});

$router->map('GET|POST','/admin/allpost', function(){
	include app_dir.'/srz-admin/all_post.php';
});

$router->map('GET|POST','/admin/addpost', function(){
	include app_dir.'/srz-admin/addpost.php';
});

$router->map('GET|POST','/admin/insert_post', function(){
	include app_dir.'/srz-admin/insert_post.php';
});

$router->map('GET|POST','/admin/edit/[i:id]', function($id){
	include app_dir.'/srz-admin/edit.php';
});

$router->map('GET|POST','/admin/delete/[i:id]', function($id){
	include app_dir.'/srz-admin/delete.php';
});

$router->map('GET|POST','/admin/user', function(){
	include app_dir.'/srz-admin/user.php';
});

$router->map('GET|POST','/admin/setting', function(){
	include app_dir.'/srz-admin/setting.php';
});

$router->map('GET|POST','/admin/message', function(){
	include app_dir.'/srz-admin/contact_msg.php';
});


$router->map('GET|POST','/[*:slug]', function ($slug){
	
	include app_dir.'/themes/single.php';
});

$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
	call_user_func_array($match['target'], $match['params']);
} else {
	// no route was matched
	http_response_code(404);
	include app_dir.'/themes/404.php';
}

