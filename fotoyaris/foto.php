<?php
session_start();
	$giris = 0;
	$username = "";
	$ben = 0;
	if(isset($_SESSION['username'])){
		$giris = 1;
		$username = $_SESSION['username'];
	}
$id=0;
if(!isset($_GET['id'])){
	header("Location: index.php");
}else{
	$id = $_GET['id'];
}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<meta name="keywords" content="fotoğraf, yarış, fotoyaris, fotoyarış">
	<title>FOTO YARIŞ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/lightbox.js"></script>
	<link rel="stylesheet" href="css/lightbox.css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<style>
	#kalp{
		
		margin-left:45%;
		font-size:60;
		color:lightgray;
		text-decoration: inherit;
	}
	#kirmizi{
		margin-left:45%;
		font-size:60;
		color:red;
	}
	#on{
		text-decoration: inherit;
		text-align: center;
		font-size: 50;
		
	}

	#son{font-size: 50;
			text-align: center;}
	#kalp:hover{color:red;}
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
    </div>
	    <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
		<li><a href="index.php">Ana Sayfa</a></li>
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
			</ul></div>
		</div>
	</nav>
	<div class="container">
		<?php
		function getip(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

		
		
			include 'connect.php';
		$ip = getip();
		$time = time() - (24*60*60);
		$sql = "SELECT * FROM begeniler WHERE ip='$ip' AND foto='$id' AND date > '$time' ORDER BY date ASC LIMIT 1";
		$query0 = mysqli_query($conn, $sql);
		$begendim = 0;
		if(mysqli_num_rows($query0) > 0){
			$begendim = 1;
		}
		
		$sql = "SELECT * FROM fotolar WHERE id='$id' AND onay=1";
		$query = mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($query) < 1){
			header("Location: index.php");
		}
		$row = mysqli_fetch_assoc($query);
		$id = $row['id'];
			if($username == $row['username'])
				$ben = 1;
		
			$sql = "SELECT * FROM fotolar WHERE id > '$id' AND onay=1 ORDER BY id ASC LIMIT 1";
			if($query2 = mysqli_query($conn, $sql)){
				$row2 = mysqli_fetch_assoc($query2);
				$id2 = $row2['id'];
				
			}
			$sql = "SELECT * FROM fotolar WHERE id < '$id' AND onay=1 ORDER BY id DESC LIMIT 1";
			if($query3 = mysqli_query($conn, $sql)){
				$row3 = mysqli_fetch_assoc($query3);
				$id3 = $row3['id'];
				
			}else 
			?>
			<div class="row">
			<div class="col-md-2"></div>
				
			<div class='col-sm-8 col-lg-8 col-md-8'>
				<div class='thumbnail'>
				<a href="<?php echo $row['foto_link'];?>" data-lightbox="image-1" data-title="">
				<img src='<?php echo $row['foto_link'];?>' alt="fotoyaris"></a><br>
					<div class="row">
						<div id="on" class="col-md-4">
							<?php if(isset($id2)){?><a href="foto.php?id=<?php echo $id2;?>" class="glyphicon glyphicon-chevron-left"></a>
							<?php }?>
						</div>
						<div class="col-md-4">
							<?php if($begendim == 0){?>
							<a onclick="begeni(<?php echo $id.',\''.$ip.'\''?>)" class="glyphicon glyphicon-heart" id="kalp" ></a>
							<?php }else{?>
							<span class="glyphicon glyphicon-heart" id='kirmizi'></span><br>
							<p style="font-weight:bold;text-align:center">Her fotoğrafı günde 1 kere oylayabilirsiniz.</p>
							<?php }?>
						</div>
					
						<div id="son" class="col-md-4">
							<?php if(isset($id3)){?>
							<a href="foto.php?id=<?php echo $id3;?>" class="glyphicon glyphicon-chevron-right"></a>
							<?php }?>
						</div>
					</div>
					<hr>
				<div class="pull-right" id='sag' style="margin-top:3px; color:red"><span class="glyphicon glyphicon-heart"></span></div>
				<p class="pull-right" id='sag' style="margin-right:3px"><?php echo $row['begeni'];?></p>
					
					<a href="profil.php?user=<?php echo $row['username'];?>" class="user"><p><?php echo $row['username'];?></p></a>
					<?php if($ben == 1){ ?>
					<button class="btn btn-danger"  data-toggle="modal" data-target="#confirm-delete" style="font-size:18">Sil <span class="glyphicon glyphicon-trash" style="font-size:18"></span>
						
					</button>
					<?php }?>
				</div>
					</div>
				
		</div>
		
	</div>
	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Silmek istediğine emin misin?
            </div>
         
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Vazgeç</button>
                <a class="btn btn-danger btn-ok" onclick="sil('<?php echo $row['id'];?>')">Sil</a>
            </div>
        </div>
    </div>
</div>
<script>
	$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data(''));
});
	function sil(id){
		var dataString = "id="+id;
		$.ajax({
			type: "POST",
			url: "fotosil.php",
			data: dataString,
			cache: false,
			success: function(result){
				window.open("index.php","_self",false);
			}
			});

	}
	
	function begeni(id,ip){
		var dataString = "id="+id;
		dataString += "&ip="+ip;
		$.ajax({
			type: "POST",
			url: "begeni.php",
			data: dataString,
			cache: false,
			success: function(result){
			
				location.reload();
			}
			});

	}
	</script>
	<footer>
		
		 Tüm Hakları Saklıdır | All Rights Reserved | Copyright © 2016 <br>
	</footer>
	</body>
</html>