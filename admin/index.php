<html>
	<script src="../js/jquery.min.js"></script>
<?php
session_start();
if(!isset($_SESSION['giris'])){
	header("location: login.php");
}
	?>
	<a href="logout.php">Cikis</a><hr>
<?php

	include '../connect.php';
	$s = 0;
	$sql = "SELECT * FROM fotolar WHERE onay='$s' ORDER BY id DESC";
	$query = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($query)){
		?>
		<img src="../<?php echo $row['foto_link'];?>" width="300" height="300"><br><br>
		<button onclick="onay('<?php echo $row['id'];?>')">Onayla</button><span> | </span>
		<button onclick="reddet('<?php echo $row['id'];?>')">Reddet</button><hr><br>
	<?php
	}
?>
<script>
	function onay(id){
		var dataString = "id="+id;
		
		$.ajax({
			type: "POST",
			url: "onay.php",
			data: dataString,
			cache: false,
			success: function(result){	

				location.reload();
			}
			});

	}
	function reddet(id){
		var dataString = "id="+id;
		
		$.ajax({
			type: "POST",
			url: "reddet.php",
			data: dataString,
			cache: false,
			success: function(result){
				
				location.reload();
			}
			});

	}
</script>
</html>