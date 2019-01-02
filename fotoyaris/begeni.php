<?php
	include 'connect.php';
	if(!isset($_POST['id'])){
		header("Location: index.php");
	}
	$id = $_POST['id'];
	$sql = "SELECT * FROM fotolar WHERE id='$id'";
	$query = mysqli_query($conn, $sql);
	if(mysqli_num_rows($query) == 1){
		$row = mysqli_fetch_assoc($query);
		$begeni = $row['begeni']+1;
		$sql = "UPDATE fotolar SET begeni='$begeni' WHERE id='$id'";
		mysqli_query($conn, $sql);
	}else{
		header("Location: index.php");
	}
	$ip = $_POST['ip'];
	$time = time();
	$sql = "INSERT INTO begeniler (ip,foto,date) VALUES('$ip','$id','$time')";
	mysqli_query($conn, $sql);
?>
