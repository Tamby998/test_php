<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>
<html>
<head>
	<title>Add Url</title>
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

include_once("save_url.php");

if(isset($_POST['Submit'])) {	
	$urle = $_POST['urle'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($urle)) {
				
		if(empty($urle)) {
			echo "<font color='red'>Url field is empty.</font><br/>";
		}
		
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO urls(urle, login_id) VALUES('$urle', '$loginId')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='view.php'>View Result</a>";
	}
}
?>
</body>
</html>