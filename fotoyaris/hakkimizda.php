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
	<meta name="keywords" content="fotoğraf, yarış, fotoyaris, fotoyarış, hakkımızda">
	<title>FOTO YARIŞ | Ana Sayfa</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
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
    </div>  <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
		<li ><a href="index.php">Ana Sayfa</a></li>
		<li><a href="top.php">Top 10</a></li>
		
		<?php if($giris == 1){?>
		<li><a href="upload.php">Fotoğraf Yükle</a></li>
		<?php }?>
		<li class="active"><a href="hakkimizda.php">Hakkımızda</a></li>
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
	<style>
		h2,h4{
			letter-spacing: 2px;
			line-height: 1.3;
		}
		h4{text-indent: 0px;}
	</style>
	<div class="container">
		<h2>FotoYarış Nedir?</h2>
		<h4>FotoYarış internet üzerinden yapılan ödüllü fotoğraf yarışmalarıdır.
			Belirlenen kategorilerde yüklenen fotoğraflar oylamaya açılır. Yarışma süresinin sonunda en çok oy alan ilk 10 fotoğrafın sahibi ödüllendirilir. Sende iyi bir fotoğrafçı olduğunu düşünüyorsan hemen fotoğraf çekmeye başla. Üyelik oluşturduktan sonra fotoğraflarınızı yükleyebilirsin. Daha sonra fotoğrafına özel linki paylaşarak oy toplayabilirsin. Oy vermek için üye olmana gerek yok fakat günlük bir fotoğrafa yalnızca bir oy verebilirsin.
		</h4><hr>
		<h2 style="text-align:center">Ödüllendirme</h2>
<table>
			<tr style="border-bottom:1px solid black">
				<th>Derece</th>
				<th>Ödül</th>
			</tr>
		<tr>
			<th>1.'ye</th>	
			<td>500&#x20BA;</td>
		</tr>
			<tr>
			<th>2.'ye </th>	
			<td>300&#x20BA;</td>
		</tr>
			<tr>
			<th>3.'ye </th>	
			<td>200&#x20BA;</td>
		</tr>
			<tr>
			<th>4,5,6.'ya </th>	
			<td>100&#x20BA;</td>
		</tr>
			<tr>
			<th>7,8,9,10.'ya </th>	
			<td>50&#x20BA;</td>
		</tr>
			
		</table>
		
			
		
		<h4 style="color:blue">Her türlü istek, öneri ve şikayetlerinizi fotoyariscom@gmail.com adresine bildirmekten çekinmeyiniz.</h4>
	</div>

	<footer>
		 Tüm Hakları Saklıdır | All Rights Reserved | Copyright © 2016 <br>
	</footer>
	</body>
</html>