<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Bài viết - Trang Tin</title>
  </head>
  <body>
    <div class="container">
      <!-- Menu: sử dụng navbar -->
      <?php include 'includes/navbar.php'; ?>
      
      <!-- Nội dung: sử dụng card -->
      <div class="card mt-3">
        <div class="card-header">Bài viết</div>
        <div class="card-body">
          <a href="baiviet_them.php" class="btn btn-success mb-2">Thêm mới</a>
          <table class="table table-bordered table-hover table-sm mb-0">
            <thead class="text-center">
              <tr>
                <th width="5%">#</th>
                <th width="15%">Người đăng</th>
                <th width="20%">Chủ đề</th>
                <th width="35%">Tiêu đề</th>
                <th width="10%">Ngày đăng</th>
                <th width="5%" title="Tình trạng kiểm duyệt?">D?</th>
                <th width="5%">Sửa</th>
                <th width="5%">Xóa</th>
              </tr>
            </thead>
            <tbody id="HienThi">
              
            </tbody>
          </table>
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
  
    const result = await getDanhSachBaiViet();
    var output = ''
    let i = 1
    const t = result.forEach((data=>{
     
      output += '<tr>';
            output += '<td class="align-middle">' + i + '</td>';
              output += '<td class="align-middle">' + data.NguoiDang + '</td>';
              output += '<td class="align-middle"><b>' + data.TenChuDe + '</td>';
              output += '<td class="align-middle"><b>' + data.TieuDe + '</td>';
              output += '<td class="align-middle"><b>' +  data.NgayDang.toDate().toLocaleDateString('vi-VN')+ '</td>';
              output += '<td class="align-middle text-center"><a href="baiviet_sua.php?id=' + data.id + '">Sửa</a></td>';
              output += '<td class="align-middle text-center"><a onclick="return confirm(\'Bạn có muốn xóa địa điểm ' + data.TieuDe + ' không?\')" href="baiviet_xoa.php?id=' + data.id + '">Xóa</a></td>';
          output += '</tr>';
          i++;
    }))
  $('#HienThi').html(output);

    </script>
  </body>
</html>