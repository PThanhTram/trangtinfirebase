<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Xử lý kiểm duyệt bài viết- Trang Tin</title>
	</head>
	<body>
		<div class="container">
			<!-- Menu: sử dụng navbar -->
			<?php include 'includes/navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
				<div class="card-header">Xử lý kiểm duyệt bài viết</div>
				<div class="card-body">
					
				</div>
			</div>
			
			<!-- Footer: tự code -->
			<?php include 'includes/footer.php'; ?>
		</div>
		
		<?php include 'javascript.php'; ?>
		<script type="module">
			import {getFirestore, doc, getDoc, updateDoc } from "https://www.gstatic.com/firebasejs/9.8.1/firebase-firestore.js";
			const db = getFirestore();
			const docRef = doc(db, "baiviet", '<?php echo $_GET['id']; ?>');
			const docSnap = await getDoc(docRef);
			if(docSnap.exists){
               if(docSnap.data().KiemDuyet == 1){
					await updateDoc(docRef, {
						KiemDuyet: 0,
					});
                }
                else{
					await updateDoc(docRef, {
						KiemDuyet: 1,
					});
            	}
            }
			location.href = 'baiviet.php';
		</script>
	</body>
</html>