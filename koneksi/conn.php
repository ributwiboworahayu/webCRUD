<?php

	$server_address	= 'localhost'; 
	$username 		= 'root'; //nama username
	$password		= ''; //password jika tadak ada bisa di kosongi seperti contoh 
	$database 		= 'tim15'; //nama database

	$conn    = mysqli_connect($server_address,$username,$password,$database);
	if (!$conn){
	    echo "<script>alert('Tidak dapat terhubung ke database.')</script>";
	}
?>