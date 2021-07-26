<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

include_once("save_url.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$urle = $_POST['urle'];
	
	// checking empty fields
	if(empty($urle)) {
				
		if(empty($urle)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
	
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE urls SET name='$urle' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM urls WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$urle = $res['urle'];
}
?>
<html>
<head>	
	<title>Edit Url</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="view.php">View Url</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
            <tr> 
				<td>url</td>
				<td><input type="text" name="urle"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>