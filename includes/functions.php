<?php

global $conn;


function get_header(){
	include app_dir.'/themes/header.php';
}

function get_footer(){
	include app_dir.'/themes/footer.php';
}
function redirect($path){	
	header("Location: $path");
	exit();
	
}

function get_admin_header(){
	include app_dir.'/srz-admin/header.php';
}

function get_admin_footer(){
	include app_dir.'/srz-admin/footer.php';
}


function get_post_count(){
	global $conn;
	$sql = "select * from post_data";
	$data= mysqli_query($conn, $sql);
	$total = mysqli_num_rows($data);
	return $total;
}

function get_user_count(){
	global $conn;
	$sql = "select * from users_data";
	$data= mysqli_query($conn, $sql);
	$total = mysqli_num_rows($data);
	return $total;
}


function get_post_data_id($id){
	global $conn;
	$sql = "select * from post_data where id=$id";
	$data= mysqli_query($conn, $sql);
	$total = mysqli_num_rows($data);
	if($total > 0){
		return mysqli_fetch_assoc($data);
	}
	return false;
}


function get_post_by_slug($slug){
	global $conn;
	$sql = "select * from post_data where slug='$slug'";
	$data= mysqli_query($conn, $sql);
	$total = mysqli_num_rows($data);
	if($total > 0){
		return mysqli_fetch_assoc($data);
	}
	return false;
}

function get_category_by_id($id){
	global $conn;
	$sql = "select * from category where id='$id'";
	$data= mysqli_query($conn, $sql);
	$total = mysqli_num_rows($data);
	if($total > 0){
		return mysqli_fetch_assoc($data);
	}
	return false;
}

function make_slug($title){
    $title = strtolower($title);
    $title = str_replace([' ', ':', '`'], '-', $title);
    return $title;
}

function make_category($category) {
    return strtolower($category);
}


function is_logged(){
	return isset($_SESSION['login']);
}

function is_admin(){
	return  ($_SESSION['user_data']['role']) =='admin';
}


//created_at time in blog
function get_time($time){
	$datetime = new DateTime($time);
	$datetime->setTimezone(new DateTimeZone('Asia/Kolkata'));
	return $datetime->format('d-m-Y H:i:s');
}