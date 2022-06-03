<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <title>Chủ đề - Trang Tin</title>
  </head>
  <body>
    <div class="container">
      <!-- Menu: sử dụng navbar -->
      <?php include 'includes/navbar.php'; ?>
      
      <!-- Nội dung: sử dụng card -->
      <div class="card mt-3">
        <div class="card-header">Chủ đề</div>
        <div class="card-body">
          <a href="chude_them.php" class="btn btn-success mb-2">Thêm mới</a>
          <input style="float: right; height: 35px; margin-bottom: 10px;" type="text" id="myInput" onkeyup='tableSearch()' placeholder="Tìm kiếm">

          <table class="table table-bordered table-hover table-sm mb-0" id="myTable">
            <thead class="text-center">
              <tr>
                <th width="10%">#</th>
                <th width="60%">Tên chủ đề</th>
                <th width="15%">Sửa</th>
                <th width="15%">Xóa</th>
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
      let i=1;
      import { getFirestore, collection, getDocs } from 'https://www.gstatic.com/firebasejs/9.8.1/firebase-firestore.js';
      const db = getFirestore();
      const querySnapshot = await getDocs(collection(db, 'chude'));
      var output = '';
      querySnapshot.forEach((doc) => {
        output += '<tr>';
        output += '<td class="align-middle text-center">' + i + '</td>';
          output += '<td class="align-middle text-center">' + doc.data().TenChuDe + '</td>';
          output += '<td class="align-middle text-center"><a class="btn btn-primary" href="chude_sua.php?id=' + doc.id + '"><i class="bi bi-pencil-square"></i></a></td>';
          output += '<td class="align-middle text-center"><a class="btn btn-danger" onclick="return confirm(\'Bạn có muốn xóa chủ đề ' + doc.data().TenChuDe + ' không?\')" href="chude_xoa.php?id=' + doc.id + '"><i class="bi bi-x-square"></i></a></td>';
        output += '</tr>';
        i++;
      });
      $('#HienThi').html(output);
    </script>
    <script type="application/javascript">
        function tableSearch() {
            let input, filter, table, tr, td, txtValue;

            //Intialising Variables
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for (let i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }

        }
    </script>
  </body>
</html>

