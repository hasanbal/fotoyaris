<?php
	session_start();
	if(isset($_SESSION['username'])){
		header("Location: index.php");
	}
?>
<html>
<head>
<title>FOTO YARIŞ | Kayıt Ol</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<meta name="keywords" content="fotoğraf, yarış, fotoyaris, fotoyarış, kayıt">
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/styles.css">
</head>
<style>

hr{width: 100%; color: black; height: 1px; background-color:black;}
        body { padding-top: 70px; padding-bottom: 50px;}
        body {
		
  padding-top: 40px;
  padding-bottom: 40px;
 
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
   
</style>
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
    </div>  <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
		<li><a href="index.php">Ana Sayfa</a></li>
		<li><a href="top.php">Top 10</a></li>
<li><a href="hakkimizda.php">Hakkımızda</a></li>
	  </ul>
	   <ul class="nav navbar-nav navbar-right">
		  
      <li class="active"><a href="register.php"><span class="glyphicon glyphicon-user"></span> Kayıt Ol</a></li>
      <li ><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Giriş Yap</a></li>
		 
	  </ul></div>
		</div>
	</nav>
	<style>
		.form-control{
			margin-bottom: 5px;
		}
	</style>
 <div class="container">

      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Kayıt Ol</h2>
        <input style="margin-bottom:5px" type="text"  class="form-control" placeholder="Kullanıci Adı" required autofocus name="user">
        <input  style="margin-bottom:5px" type="email" class="form-control" placeholder="E-posta" name="email" required>
        <input  style="margin-bottom:5px" type="password" class="form-control" placeholder="Şifre" required name="pass" autocomplete="off">
		<input   style="margin-bottom:5px" type="password" class="form-control" placeholder="Şifre Tekrar" required name="pass2" autocomplete="off">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Kayıt Ol</button>
		  <a style="margin-top:10px" class="btn btn-lg btn-success btn-block" href="login.php">Zaten hesabım var</a>
		  <div class="alert alert-warning" style="margin-top:10px">	 
			  <p>Ödül kazandıktan sonra iletişime geçmek için lütfen E-posta adresini doğru giriniz.</p>
			</div>
      </form>

</div>
<?php
if(isset($_POST["submit"])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$pass2 = $_POST['pass2'];
    if(isset($_POST['email'])){
        $email = $_POST['email'];
    }else $email="undefined";
	include 'connect.php';
	if($pass != $pass2){
		?>
	<div class="alert alert-warning">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Dikkat! Girdiğiniz şifrelerin aynı olması gerek.</strong>
    </div>	
	<?php
	}
	else if(preg_match('/[^A-Za-z0-9]/', $user)){
		?>
	<div class="alert alert-warning">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Dikkat! Kullanıcı adında yalnızca harf ve rakam kullannabilirsiniz.</strong>
    </div>
	<?php
	}else{
	
	$query=mysqli_query($conn,"SELECT * FROM users WHERE username='".$user."'");
	$numrows=mysqli_num_rows($query);
	if($numrows==0)
	{
	$tarih = time();
	$sql="INSERT INTO users(username,password,email,date) VALUES('$user','$pass','$email','$tarih')";

	$result=mysqli_query($conn,$sql);
  echo mysqli_error($conn);

	if($result){
	?>
    <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Başarılı!  Hesap Oluşturuldu.</strong>
    </div>
    <?php
		session_start();
	$_SESSION['username']=$user;
	header("Location: index.php");
	} else {
    ?>
    <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Dikkat!</strong> Bir Hata Meydana Geldi.
    </div>
    <?php
	}

	} else {
        ?>
        <div class="alert alert-warning">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Dikkat!</strong> Bu kullanıcı adı kullanılıyor. Lütfen başka deneyiniz.
        </div>
    <?php
	
	}

}
}
}
?>
	<style>
		footer{
			
		}
	</style>

	<footer class="container-fluid">
		 Tüm Hakları Saklıdır | All Rights Reserved | Copyright © 2016 <br>
	</footer>

</body>
</html>