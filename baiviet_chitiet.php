<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
	<title>Chi tiết bài viết</title>
</head>

<body>
	<div class="container">
		<!-- Navbar -->
		 <?php include 'includes/navbar.php'; ?>
		
		<!-- Card: Header and Footer -->
		<div class="card mt-3" id="HienThi">
			<h5 class="card-header"><%= baiviet.TieuDe %></h5>
			<div class="card-body">
				<p class="card-text small text-muted">Ngày đăng <%= new Date(baiviet.NgayDang.toISOString()).toLocaleString("vi-VN") %>, bởi <%= baiviet.TaiKhoan.HoVaTen %>, có <%= baiviet.LuotXem %> lượt xem.</p>
				<p class="card-text fw-bold"><%= baiviet.TomTat %></p>
				<p class="card-text"><%- baiviet.NoiDung %></p>
			</div>
		</div>
		
		<!-- Footer -->
		<?php include 'includes/footer.php'; ?>
	</div>
	
	 <?php include 'javascript.php'; ?>
        <script type="module">
          import { getFirestore, collection, getDocs, getDoc, query, where } from 'https://www.gstatic.com/firebasejs/9.8.1/firebase-firestore.js';
          const db = getFirestore();
          
            async function getDanhSachBaiViet() {
                let data = []
                const querySnapshot = await getDocs(collection(db, "baiviet")); 
                querySnapshot.forEach((doc) => {
                  data.push({
                    id: doc.id,
                    ...doc.data()
                  })
                })
               return data;
            }
          function email(eMail) {
              var name = eMail.replace(/@[^@]+$/, '');
              return name;
          }
         function firstImage(noiDung) {
                  var regExp = /<img.+src=[\'"]([^\'"]+)[\'"].*>/i;
                  var results = regExp.exec(noiDung);
                  console.log(results);
                  var image = './public/images/noimage.png';
                  if(results) image = results[1];
                  return image;
              }
        const result = await getDanhSachBaiViet();
        var output = ''
        const t = result.forEach((data=>{
          output += '<h5 class="card-header">'+data.TieuDe+'</h5>';
                      output += ' <div class="card-body">';
	                      output += '<p class="card-text small text-muted">Ngày đăng'+ data.NgayDang+'</p>';
	                      output += '<p class="card-text fw-bold"></p>';
	                      output += '<p class="card-text"></p>';
                      output += '</div>';

         output += '</div>';
        }))
      $('#HienThi').html(output);

    </script>
</body>

</html>