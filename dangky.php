<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Đăng ký</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
					
			</div>
			<div class="card-body">
				<?php
					session_start();
					if(isset($_SESSION['status'])&&$_SESSION['status'] != "")
					{
						?>
						<div class="alert alert-warning alert-dismissible fale show" role="alert">
							<strong ><?php echo $_SESSION['status'] ?></strong>
						</div>
						<?php
						unset($_SESSION['status']);
					}
				?>
				
				<form action="xuly.php" method="post" class="needs-validation" novalidate>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" id="hovaten" name="hovaten" required placeholder="Họ và tên">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Email" id="email" name="email" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" id="matkhau" name="password" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Xác nhận mật khẩu" id="xacnhanmatkhau" name="xacnhanmatkhau" required>
					</div>
					<div class="form-group">
						<input type="submit" name="dangky" value="Đăng Ký" class="btn float-right register_btn">
					</div>
				</form>
			</div>
				
		</div>
	</div>
</div>
</body>
<style >
	@import url('https://fonts.googleapis.com/css?family=Numans');

	html,body{
		background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
		background-size: cover;
		background-repeat: no-repeat;
		height: 100%;
		font-family: 'Numans', sans-serif;
	}

	.container{
		height: 100%;
		align-content: center;
	}

	.card{
		height: 420px;
		margin-top: auto;
		margin-bottom: auto;
		width: 470px;
		background-color: rgba(0,0,0,0.5) !important;
	}

	.social_icon span{
		font-size: 60px;
		margin-left: 10px;
		color: #FFC312;
	}

	.social_icon span:hover{
		color: white;
		cursor: pointer;
	}

	.card-header h3{
		color: white;
	}

	.social_icon{
		position: absolute;
		right: 20px;
		top: -45px;
	}

	.input-group-prepend span{
		width: 50px;
		background-color: #FFC312;
		color: black;
		border:0 !important;
	}

	input:focus{
		outline: 0 0 0 0  !important;
		box-shadow: 0 0 0 0 !important;

	}

	.remember{
	    color: white;
	}

	.remember input
	{
		width: 20px;
		height: 20px;
		margin-left: 15px;
		margin-right: 5px;
	}

	.register_btn{
		margin-top: 10px;
		color: black;
		background-color: #FFC312;
		width: 110px;
	}

	.register_btn:hover{
		color: black;
		background-color: white;
	}

	.links{
		color: white;
	}

	.links a{
		margin-left: 4px;
	}
</style>
</html>