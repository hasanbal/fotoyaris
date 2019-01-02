<?php
	include '../connect.php';
	if(!isset($_POST['id'])){
		header("Location: ../index.php");
	}
	$id = $_POST['id'];

	$sql = "UPDATE fotolar SET onay=1 WHERE id='$id'";
	mysqli_query($conn, $sql);
?>