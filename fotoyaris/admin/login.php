<?php
	session_start();
	if(isset($_SESSION['giris'])){
		header("Location: index.php");
	}
?>
<html>
	<form method="post">
		Kullanici Adi: <input type="text" name="user"><br>
		Sifre: <input type="password" name="pass"><hr>
		<button type="submit" name="gonder">Giris</button>
	</form>
	<?php
		if(isset($_POST['gonder'])){
			$user = $_POST['user'];
			$pass = $_POST['pass'];

			//Set your admin username and password.
			if($user == '' and $pass == ''){
				$_SESSION['giris'] = 1;
				header("Location: index.php");
			}else{
				header("Location: ../index.php");
			}
		}
	?>
</html>