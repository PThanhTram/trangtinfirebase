<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Thêm bài viết - Trang Tin</title>
	</head>
	<body>
		<div class="container">
			<!-- Menu: sử dụng navbar -->
			<?php include 'includes/navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
				<div class="card-header">Thêm bài viết</div>
				<div class="card-body">
					<form action="baiviet_them_xuly.php" method="post" class="needs-validation" novalidate>
						<div class="mb-3">
							<label for="id" class="form-label">Chủ đề</label>
							<select class="form-select" id="id" name="id" required>
								<option value="">-- Chọn --</option>
							</select>
						</div>
						<div class="mb-3">
							<label for="TieuDe" class="form-label">Tiêu Đề</label>
							<input type="text" class="form-control" id="TieuDe" name="TieuDe" required />
						</div>
						<div class="mb-3">
							<label for="TomTat" class="form-label">Tóm tắt</label>
							<input type="text" class="form-control" id="TomTat" name="TomTat" required />
						</div>
						<div class="mb-3">
							<label for="NoiDung" class="form-label">Nội dung</label>
							<textarea type="text" class="form-control" id="NoiDung" name="NoiDung"></textarea>
						</div>
						
						<button type="submit" class="btn btn-primary">Thêm mới</button>
					</form>
				</div>
			</div>
			
			<!-- Footer: tự code -->
			<?php include 'includes/footer.php'; ?>
		</div>
		
		<?php include 'javascript.php'; ?>
		<script type="module">
			import { getFirestore, collection, getDocs } from 'https://www.gstatic.com/firebasejs/9.8.1/firebase-firestore.js';
			const db = getFirestore();
			const querySnapshot = await getDocs(collection(db, 'chude'));
			var output = '';
			querySnapshot.forEach((doc) => {
				output += '<option value="' + doc.data().TenChuDe + '">' + doc.data().TenChuDe + '</th>';
			});
			$('#id').append(output);
		</script>
		<script>
			(function() {
				'use strict';
				var forms = document.querySelectorAll('.needs-validation');
				Array.prototype.slice.call(forms).forEach(function(form) {
					form.addEventListener('submit', function(event) {
						if (!form.checkValidity()) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add('was-validated');
					}, false);
				});
			})();
		</script>
	</body>
</html>