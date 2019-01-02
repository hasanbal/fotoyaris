<?php
	session_start();
	if(isset($_SESSION['username'])){
		header("Location: index.php");
	}
?>
<html>
    <head>
    <title>FOTO YARIŞ | Giriş Yap</title>
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
		<meta name="keywords" content="fotoğraf, yarış, fotoyaris, fotoyarış, giriş">
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
    </div><div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
		<li><a href="index.php">Ana Sayfa</a></li>
		<li ><a href="top.php">Top 10</a></li>
<li><a href="hakkimizda.php">Hakkımızda</a></li>
	  </ul>
	   <ul class="nav navbar-nav navbar-right">
		  
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Kayıt Ol</a></li>
      <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Giriş Yap</a></li>
		 
	  </ul></div>
		</div>
	</nav>
 <div class="container">

      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Giriş Yap</h2>
        <input type="text"  class="form-control" placeholder="Kullanıcı Adı" required autofocus name="user">
        <input type="password" class="form-control" placeholder="Şifre" required name="pass" autocomplete="off">
        <div class="checkbox">
         
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Giriş Yap</button>
		   <a style="margin-top:10px" class="btn btn-lg btn-success btn-block" href="register.php">Hala hesabım yok</a>
      </form>

</div>
<?php
if(isset($_POST["submit"])){

if(!empty($_POST['user']) && !empty($_POST['pass'])) {
	$user=$_POST['user'];
	$pass=$_POST['pass'];

	include 'connect.php';

	$query=mysqli_query($conn,"SELECT * FROM users WHERE username='".$user."' AND password='".$pass."'");
	$numrows=mysqli_num_rows($query);
	if($numrows!=0)
	{
    $row=mysqli_fetch_assoc($query);
	$username2=$row['username'];
	$password2=$row['password'];
	

	if($user == $username2 && $pass == $password2)
	{
	session_start();
	$_SESSION['username']=$user;
	header("Location: index.php");
	}
	} else {
	   ?>
        <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Dikkat!</strong> Girdiğiniz Bilgiler Yanlış. Lütfen Tekrar Deneyiniz.
  </div>
        <?php
	}

} 
}
?>
<footer>
		 Tüm Hakları Saklıdır | All Rights Reserved | Copyright © 2016 <br>
	</footer>
</body>
</html>