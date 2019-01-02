<?php
//error_reporting(E_ERROR | E_PARSE);
session_start();
	$giris = 0;
	$username = "";
	if(isset($_SESSION['username'])){
		$giris = 1;
		$username = $_SESSION['username'];
	}
	//echo time();
$time = time();
$son = 1542873576 + 60*60*24*60;
$kalansure = $son - $time;
?>
<html>
<head>
	<meta name="verify-admitad" content="6b14a2eab0" />
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<meta name="keywords" content="fotoğraf, yarış, fotoyaris, fotoyarış, ana sayfa">
	<meta name="description" content="Çektiğin fotoğrafları yarıştırmak, üstelik yarışma sonunda para kazanmak istiyorsan doğru yerdesin. Fotoğraf çek yarışmaya katıl ödülleri kap! ÇEK YARIŞ KAZAN!">
	<title>FOTO YARIŞ | Ana Sayfa</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  
<link rel="stylesheet" href="css/styles.css">

	<link rel="stylesheet" href="css/countdown.css">
</head>

		
<body onload="timer(<?php echo $kalansure;?>)">
	<div class="navbar-wrapper">
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
    </div> 
	  <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
		<li class="active"><a href="index.php">Ana Sayfa</a></li>
		<li><a href="top.php">Top 10</a></li>
		
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
	  </ul>
	  </div>
		</div>
		</nav>
	</div>
	<div class="container-fluid">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>

    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="img/1.jpeg" alt="fotograf" >
       
      </div>

      <div class="item">
        <img src="img/2.jpeg" alt="fotograf" >
       
      </div>
    
      <div class="item">
        <img src="img/3.jpeg" alt="fotograf" >
        
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
	<style>
		.baslik{
			text-align: center;
		}
		body{margin-top: 50px;}
		table {
    border-collapse: collapse;
			width: 30%;
			margin: auto;
}
		table{border: 1px solid black;}
table, th, td {
    
text-align: center;
	padding: 5px;
	font-weight: bold;
		}
		td{color: darkblue;}

		tr:hover {
			background-color: gray;
			color: white;
		}
		th{border-right: 1px solid black}
	</style>

	 <h1 class="baslik">Çek, Yarış, Kazan!</h1>
	<p style="font-size:20">Fotoğraf çekmeyi veya çekilmeyi seviyorsan bu haber tam sana göre!<br>Çektiğin fotoğrafları yarıştırmak, üstelik yarışma sonunda para ödülü kazanmak ister misin?<br>Cevabın evetse eğer doğru yerdesin.<br></p>
		<table>
			<tr style="border-bottom:1px solid black">
				<th>Derece</th>
				<th>Ödül</th>
			</tr>
		<tr>
			<th>1.'ye</th>	
			<td>Belirsiz</td>
		</tr>
			<tr>
			<th>2.'ye </th>	
			<td>Belirsiz</td>
		</tr>
			<tr>
			<th>3.'ye </th>	
			<td>Belirsiz</td>
		</tr>
			<tr>
			<th>4,5,6.'ya </th>	
			<td>Belirsiz</td>
		</tr>
			<tr>
			<th>7,8,9,10.'ya </th>	
			<td>Belirsiz</td>
		</tr>
			
		</table>
	
	<h1 class="baslik">Kategori: <strong style="color:darkblue">Galerindeki En Güzel Fotoğraf</strong></h1>
	<div id="clockdiv" style="margin-bottom:10px">
		  <div >
			<span class="days"></span>
			<div class="smalltext">Gün</div>
		  </div>
		  <div>
			<span class="hours"></span>
			<div class="smalltext">Saat</div>
		  </div>
		  <div>
			<span class="minutes"></span>
			<div class="smalltext">Dakika</div>
		  </div>
		  <div>
			<span class="seconds"></span>
			<div class="smalltext">Saniye</div>
		  </div>
	</div>
	<div class="container-fluid">
		<a class="btn btn-primary" style="margin:10px;padding:20px" href="<?php if($giris==1)echo'upload.php';else echo'register.php';?>" >Yarışmaya Katıl</a>
		<div class="row">
			<?php
				include 'connect.php';
				$sql = "SELECT * FROM fotolar  WHERE onay=1 ORDER BY begeni DESC LIMIT 52";
				$query = mysqli_query($conn, $sql);
				$reklam = 0;
				// if(mysqli_num_rows($query) == 0){
				// 	echo "henuz fotograf yuklenmemis.";
				// }else
				while($row = mysqli_fetch_assoc($query)){
					?>
			
				<a href='foto.php?id=<?php echo $row['id'];?>'><div class='col-sm-3 col-lg-3 col-md-3'>
				<div class='thumbnail'>
				<img src='<?php echo $row['foto_link'];?>' id='resim' alt='fotoyaris'><br>
				<div class='pull-right' id='sag' style='margin-top:3px; color:red'><span class='glyphicon glyphicon-heart'></span></div>
				<p class='pull-right' id='sag' style='margin-right:3px'><?php echo $row['begeni'];?></p>
					
					<a href='profil.php?user=<?php echo $row['username'];?>' class='user'><p style='text-align:left;'><?php echo $row['username'];?></p></a>
				</div>
				</div></a>
			
					<?php
				}
			
			?>
		</div>
	</div>
	<footer>
		 Tüm Hakları Saklıdır | All Rights Reserved | Copyright © 2016 <br>
	</footer>
	<script type="text/javascript" src="js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
	

	<script type="text/javascript" src="js/script.js"></script>
</html>