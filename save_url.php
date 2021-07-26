<?php

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
	$url = "https";
}
else {
	$url = "http"; 
}  
$url .= "://"; 
$url .= $_SERVER['HTTP_HOST']; 
$url .= $_SERVER['REQUEST_URI']; 
$login_id = $_SESSION['id'];
// echo $url; 
mysqli_query($mysqli, "INSERT INTO urls(urle, login_id) VALUES('$url', $login_id)")
		or die("Could not execute the insert query.");

?>