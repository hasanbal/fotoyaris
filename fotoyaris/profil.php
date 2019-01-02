<?php
include 'connect.php';
if(!isset($_GET['user'])){
	header("Location: index.php");
}
$user = $_GET['user'];
$sql = "SELECT * FROM users WHERE username='$user'";
$query = mysqli_query($conn, $sql);
if(mysqli_num_rows($query) == 0){
	header("Location: index.php");
}
session_start();
	$giris = 0;
	$username = "";
	$ben = 0;
	if(isset($_SESSION['username'])){
		$giris = 1;
		$username = $_SESSION['username'];
		
		if($user == $username){
			$ben = 1;
		}
	}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	
	<meta name="keywords" content="fotoğraf, yarış, fotoyaris, fotoyarış, profil">
	<title>FOTO YARIŞ | <?php echo $user?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header" >
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
 <a class="pull-left" href="index.php"><img src="img/logo.jpg" id='logo' alt="logo"></a>
    </div><div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
		<li ><a href="index.php">Ana Sayfa</a></li>
		<li><a href="top.php">Top 10</a></li>
		
		<?php if($giris == 1){?>
		<li><a href="upload.php">Fotoğraf Yükle</a></li>
		<?php }?>
		<li><a href="hakkimizda.php">Hakkımızda</a></li>
	  </ul>
	   <ul class="nav navbar-nav navbar-right">
		   <?php if($giris == 1){ ?>
		 <li <?php if($ben == 1) echo "class='active'";?>><a href="profil.php?user=<?php echo $username;?>"><span class="glyphicon glyphicon-user"></span> <?php echo $username;?></a></li>
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Çıkış</a></li>
		  <?php }else {?>
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Kayıt Ol</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Giriş Yap</a></li>
		   <?php }?>
	  </ul></div>
		</div>
	</nav>
	<style>
		.baslik{
			font-size: 40;
			margin-left: 15px;
		}
	</style>
	<div class="row">
	<div class="col-md-2"> </div>
	<div class="col-md-9">
		<strong class="baslik"><?php echo $user;?></strong>
		<hr>
		<?php
		
			$sql = "SELECT * FROM fotolar  WHERE username='$user' AND onay=1 ORDER BY id DESC";
			$query = mysqli_query($conn, $sql);
			if(mysqli_num_rows($query) > 0){
				while($row = mysqli_fetch_assoc($query)){
					 $gecenSure = time() - $row['date']; 
					$gecenGun = floor($gecenSure / (24*60*60));
					$gecenSaat = floor($gecenSure/(60*60));
					$gecenDakika = floor($gecenSure/60);
					$gecenSaniye = $gecenSure;
					?>
					
					<a href="foto.php?id=<?php echo $row['id'];?>"><div class='col-sm-4 col-lg-4 col-md-4'>
				<div class='thumbnail'>
				<img src='<?php echo $row['foto_link'];?>' id='resim' alt="fotoyaris"><br>
				<div class="pull-right" id='sag' style="margin-top:3px; color:red"><span class="glyphicon glyphicon-heart"></span></div>
				<p class="pull-right" id='sag' style="margin-right:3px"><?php echo $row['begeni'];?></p>
					
					<?php
						if($gecenGun > 0)
							echo "<p>".$gecenGun." gün</p>";
						else if($gecenSaat > 0)
							echo "<p>".$gecenSaat." saat</p>";
						else if($gecenDakika > 0)
							echo "<p>".$gecenDakika." dakika</p>";
						else
							echo "<p>".$gecenSaniye." saniye</p>";
					?>
					
				</div>
				</div></a>
		
				<?php
				}
			}
		?>
	</div>
	</div>

	
	<footer class="container-fluid">
		 Tüm Hakları Saklıdır | All Rights Reserved | Copyright © 2016 <br>
	</footer>
	
	</body>
</html>