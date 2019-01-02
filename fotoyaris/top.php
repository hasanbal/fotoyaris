<?php
session_start();
	$giris = 0;
	$username = "";
	if(isset($_SESSION['username'])){
		$giris = 1;
		$username = $_SESSION['username'];
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<meta name="keywords" content="fotoğraf, yarış, fotoyaris, fotoyarış, top10">
	<title>FOTO YARIŞ | Top 10</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
 	<link rel="stylesheet" href="css/styles.css">	
</head>	
<style>
	#top10{position: fixed;padding-right: 20px;}
	hr{padding: 0;margin-top:5px;}
</style>
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
    </div>  <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
		<li><a href="index.php">Ana Sayfa</a></li>
		<li class="active"><a href="top.php">Top 10</a></li>
		
		<?php if($giris == 1){?>
		<li><a href="upload.php">Fotoğraf Yükle</a></li>
		<?php }?>
		<li><a href="hakkimizda.php">Hakkımızda</a></li>
	  </ul>
	   <ul class="nav navbar-nav navbar-right">
		   <?php if($giris == 1){ ?>
		 <li><a href="profil.php?user=<?php echo $username;?>"><span class="glyphicon glyphicon-user"></span> <?php echo $username;?></a></li>
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Çıkış</a></li>
		  <?php }else {?>
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Kayıt Ol</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Giriş Yap</a></li>
		   <?php }?>
	  </ul></div>
		</div>
	</nav>
	
	<div class="container-fluid">
		<h1 style="text-align:center;font-size:50;color:darkblue">TOP 10</h1>
		<?php
			include 'connect.php';
			$sql = "SELECT * FROM fotolar WHERE onay=1 ORDER BY begeni DESC LIMIT 10";
		$query = mysqli_query($conn, $sql);
		$s=1;
		while($row = mysqli_fetch_assoc($query)){
			?>
			<div class="row" id='<?php echo $row['id'];?>'>
			<div class="col-md-2"></div>
				<a style="text-decoration:inherit" href="foto.php?id=<?php echo $row['id'];?>">
			<div class='col-sm-8 col-lg-8 col-md-8'>
				<div class='thumbnail'>
					<span style="font-size:50;"><?php echo $s++;?>.</span>
				<img src='<?php echo $row['foto_link'];?>' alt="fotoyaris"><br>
				<div class="pull-right" id='sag' style="margin-top:3px; color:red"><span class="glyphicon glyphicon-heart"></span></div>
				<p class="pull-right" id='sag' style="margin-right:3px"><?php echo $row['begeni'];?></p>
					
					<a href="profil.php?user=<?php echo $row['username'];?>" class="user"><p><?php echo $row['username'];?></p></a>
				</div>
					</div></a>
		</div>
		<?php
		}
		?>
	</div>
	<footer>
		 Tüm Hakları Saklıdır | All Rights Reserved | Copyright © 2016 <br>
	</footer>
	<script type="text/javascript" src="js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>