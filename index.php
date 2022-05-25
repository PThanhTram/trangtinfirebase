<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
        <title>Trang Tin</title>
    </head>
    <body>
        <div class="container">
            <!-- Menu: sử dụng navbar -->
            <?php include 'includes/navbar.php'; ?>
            
            <!-- Nội dung: sử dụng card -->
            <div class="card mt-3">
                <div class="card-header">Trang chủ</div>
                <div class="card-body">
                   <div class="row row-cols-1 row-cols-md-2 g-4" id="HienThi">

                </div>
                </div>
            </div>
            
            <!-- Footer: tự code -->
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
               
          output += ' <div class="col">';
                  output += '<div class="card">';
                      output += ' <img src="'+firstImage(data.NoiDung)+'" class="card-img-top" alt="..." height="200">';
                      output += '<div class="card-body">';
                      output += '<h4 class="card-title">'+  data.TieuDe +'</h4>';
                       output += '<h5 class="card-title">'+ email(data.NguoiDang) +" - "+ data.NgayDang.toDate().toLocaleDateString('vi-VN')+'</h5>';
                      output += '<p class="card-text">'+data.TomTat+'</p>';
                      output += '<a href="baiviet_chitiet.php?id=' + data.TieuDe + '" class="btn btn-warning">Đọc tiếp...</a></p>';
                  output += '</div>';
                                output += '</div>';

         output += '</div>';
        }))
      $('#HienThi').html(output);

    </script>
    </body>
</html>