<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
		<title>Sửa bài viết - Trang Tin</title>
	</head>
	<body>
		<div class="container">
			<!-- Menu: sử dụng navbar -->
			<?php include 'includes/navbar.php'; ?>
			
			<!-- Nội dung: sử dụng card -->
			<div class="card mt-3">
				<div class="card-header">Sửa bài viết</div>
				<div class="card-body">
					<form action="baiviet_sua_xuly.php" method="post" class="needs-validation" novalidate>
						<input type="text" id="id" name="id" hidden />
						<div class="mb-3">
							<label for="id" class="form-label">Chủ đề</label>
							<select class="form-select" id="TenChuDe" name="TenChuDe" required>
								<option value="">-- Chọn --</option>
							</select>
						</div>
						<div class="mb-3">
							<label for="TieuDe" class="form-label">Tiêu đề</label>
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
						
						<button type="submit" class="btn btn-primary">Cập nhật</button>
					</form>
				</div>
			</div>
			
			<!-- Footer: tự code -->
			<?php include 'includes/footer.php'; ?>
		</div>
		
		<?php include 'javascript.php'; ?>
		<script type="module">
			import { getFirestore, doc, collection, getDocs, getDoc } from 'https://www.gstatic.com/firebasejs/9.8.1/firebase-firestore.js';
			const db = getFirestore();
			
			const chude = await getDocs(collection(db, 'chude'));
			var output = '';
			chude.forEach((d) => {
				output += '<option value="' + d.data().TenChuDe + '">' + d.data().TenChuDe + '</option>';
			});
			$('#TenChuDe').append(output);
			
			const docRef = doc(db, 'baiviet', '<?php echo $_GET['id']; ?>');
			const docSnap = await getDoc(docRef);
			if (docSnap.exists()) {
				$('#id').val(docSnap.id);
				$('#TieuDe').val(docSnap.data().TieuDe);
				$('#TomTat').val(docSnap.data().TomTat);
				$('#NoiDung').val(docSnap.data().NoiDung);
			} else {
				console.log('No such document!');
			}
			$(document).ready(function(){     
                $('#TenChuDe').find('option[value="' + docSnap.data().TenChuDe + '"]').attr('selected','selected');            
        	});

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