<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Xử lý đăng nhập- Trang Tin</title>
	</head>
	<body>
		<div class="container">
			<!-- Menu: sử dụng navbar -->
			<?php include 'includes/navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
				<div class="card-header">Xử lý đăng nhập</div>
				<div class="card-body">
					
				</div>
			</div>
			
			<!-- Footer: tự code -->
			<?php include 'includes/footer.php'; ?>
		</div>
		
		<?php include 'javascript.php'; ?>
		<script type="module">
			import { getAuth, signInWithEmailAndPassword } from 'https://www.gstatic.com/firebasejs/9.8.1/firebase-auth.js';
            const auth = getAuth();
            signInWithEmailAndPassword(auth, '<?php echo $_POST['Email']; ?>', '<?php echo $_POST['Password']; ?>')
            .then((userCredential) => {
               
                session_start();
                $_SESSION['hovaten'] = 'tram';
                $_SESSION['email'] = userCredential.user;
            })
            .catch((error) => {
                const errorCode = error.code;
                const errorMessage = error.message;
            });            
			
			location.href = 'index.php';
		</script>
	</body>
</html>