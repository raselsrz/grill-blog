<?php
global $conn;
$sql= "delete from post_data where id=$id";
$result= mysqli_query($conn,$sql);

if(!$result){
	//
}
redirect("/admin/allpost");