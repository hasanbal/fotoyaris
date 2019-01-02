<?php

session_start();
	$giris = 0;
	$username = "";
	if(isset($_SESSION['username'])){
		$giris = 1;
		$username = $_SESSION['username'];
	}else{
		header("Location: index.php");
	}
	function temizle($uri){
	$uri = str_replace ("ç","c",$uri);
	$uri = str_replace ("ğ","g",$uri);
	$uri = str_replace ("İ","I",$uri);
	$uri = str_replace ("ı","i",$uri);
	$uri = str_replace ("ş","s",$uri);
	$uri = str_replace ("ö","o",$uri);
	$uri = str_replace ("ü","u",$uri);
	$uri = str_replace ("Ü","U",$uri);
	$uri = str_replace ("Ç","c",$uri);
	$uri = str_replace ("!","",$uri);
	$uri = str_replace ("-","",$uri);
	$uri = str_replace (":)","",$uri);
	$uri = str_replace (")","",$uri);
	$uri = str_replace ("(","",$uri);
	$uri = str_replace (",","_",$uri);
	$uri = str_replace ("Ğ","g",$uri);
	$uri = str_replace ("Ş","S",$uri);
	$uri = str_replace ("Ö","O",$uri);
	$uri = str_replace (" ","_",$uri);
	$uri = str_replace ("'","",$uri);
	$uri = str_replace ("/","",$uri);
	$uri = str_replace ("__","_",$uri);
	$uri = str_replace("`","",$uri);
	$uri = str_replace ("ç","c",$uri);
	$uri = str_replace("&","",$uri);
	$uri = str_replace("%","",$uri);
	$uri = str_replace("'","",$uri);
	$uri = strtolower($uri);
	 return $uri;
}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<meta name="keywords" content="fotoğraf, yarış, fotoyaris, fotoyarış, fotoğraf yükle">
	<title>FOTO YARIŞ | Fotoğraf Yükle</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/styles.css">
</head>

<body >
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
    </div> <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
		<li><a href="index.php">Ana Sayfa</a></li>
		<li ><a href="top.php">Top 10</a></li>
		<li class="active"><a href="upload.php">Fotoğraf Yükle</a></li>
		<li><a href="hakkimizda.php">Hakkımızda</a></li>
	  </ul>
	   <ul class="nav navbar-nav navbar-right">
		  
		 <li><a href="profil.php?user=<?php echo $username;?>"><span class="glyphicon glyphicon-user"></span> <?php echo $username;?></a></li>
		   <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Çıkış</a></li>
		   
	  </ul></div>
		</div>
	</nav>
	
	<div class="row">
	<div class="container">
	<form method="post" enctype="multipart/form-data" >
	<div class="fileinput fileinput-new" data-provides="fileinput">
	
  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="background-color:lightgray;height:400px;width:350%;" ></div>
		
  <div>
    <span class="btn btn-success btn-file"><span class="fileinput-new">Fotoğraf Seç</span><span class="fileinput-exists">Değiştir</span><input type="file" name="foto" id="foto"></span>
    <button type="submit" class="btn btn-success fileinput-exists" name="gonder" id="gonder">Yükle</button>
  </div>
		
</div>	
	</form>
					<div class='alert alert-danger'>
				
						<strong>Dikkat!</strong> Yarışmaya sadece kendi çektiğin fotoğrafla katılabilirsin. Başkasına ait bir fotoğraf yüklemek kesinlikle <strong>YASAKTIR</strong>.
					</div>
	
	
		<?php
			include 'connect.php';
			if(isset($_POST['gonder']) and isset($_FILES["foto"])){
		
			$target_dir = "img/upload/";
			$name = temizle($_FILES["foto"]["name"]);
				
			$target_file = $target_dir . basename($name);
			if(file_exists($target_file)){
				$k = 1;
				while(file_exists($target_file)){
					$name = (string)$k.$name;
					$target_file = $target_dir . basename($name);
					$k++;
				}
			}
				
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
				$check = getimagesize($_FILES["foto"]["tmp_name"]);
				if($check !== false) {
					
					$uploadOk = 1;
				} else {
					echo "
					<div class='alert alert-danger'>
					  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					  <strong>Dikkat!</strong> Yüklediğiniz dosya fotoğraf değil.
					</div>
					";
					$uploadOk = 0;
				}
			
			
			if (file_exists($target_file)) {
				echo "
					<div class='alert alert-warning'>
					  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					  <strong>Dikkat!</strong> Bu fotoğrafı daha önce yüklediniz.
					</div>
					";
				$uploadOk = 0;
			}

			if ($_FILES["foto"]["size"] > 500000000) {
				echo "
					<div class='alert alert-warning'>
					  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					  <strong>Dikkat!</strong> Yüklediğiniz fotoğrafın boyutu çok yüksek.
					</div>
					";
				$uploadOk = 0;
			}
			
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
				echo "
					<div class='alert alert-danger'>
					  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					  <strong>Dikkat!</strong> Yalnızca JPG, JPEG, PNG uzantılı dosya yükleyebilirsiniz.
					</div>
					";
				$uploadOk = 0;
			}
			
			if ($uploadOk == 0) {
				echo "
					<div class='alert alert-warning'>
					  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					  <strong>Malesef!</strong> Bir hata meydana geldi.
					</div>
					";
			
			} else {
				if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
					$time = time();
					$sql = "INSERT INTO fotolar(foto_link,username,date) VALUES('$target_file','$username','$time')";
					
					if(mysqli_query($conn, $sql)){
						echo "
						<div class='alert alert-success'>
						  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						  <strong>Başarılı!</strong> Fotoğrafınız kontrolden geçtikten sonra yayınlanacaktır.
						</div>
						";
					}
						
					else {
						echo "
					<div class='alert alert-warning'>
					  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					  <strong>Malesef!</strong> Bir hata meydana geldi.
					</div>
					";
					}
				} else {
					echo "
					<div class='alert alert-warning'>
					  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					  <strong>Malesef!</strong> Bir hata meydana geldi.
					</div>
					";
				}
			}
			
		}
		?>	
		</div>
	
	</div>
	<footer>
		 Tüm Hakları Saklıdır | All Rights Reserved | Copyright © 2016 <br>
	</footer>
	</body>
</html>