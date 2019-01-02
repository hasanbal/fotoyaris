<?php
	include 'connect.php';
	if(!isset($_POST['id']))
		header("Location: index.php");
	$id = $_POST['id'];
	$sql = "SELECT * FROM fotolar WHERE id='$id'";
	$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
	unlink($row['foto_link']);


	$sql = "DELETE FROM fotolar WHERE id='$id'";
	mysqli_query($conn, $sql);
header("Location: index.php");
?>