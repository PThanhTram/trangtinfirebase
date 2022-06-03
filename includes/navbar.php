<nav class="navbar navbar-expand-lg navbar-light bg-warning">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php">Tin Tức</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				
				<?php
					session_start();
					if(!isset($_SESSION['uid'])) {
				?>
					<li class="nav-item">
						<a class="nav-link" href="dangnhap.php">Đăng nhập</a>
					</li>
				<?php
					} else {
				?>
				
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Quản lý
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="chude.php">Chủ đề</a></li>
							<li><a class="dropdown-item" href="baiviet.php">Bài viết</a></li>
							<li><hr class="dropdown-divider"></li>
              				<li><a class="dropdown-item" href="taikhoan.php">Tài khoản đăng nhập</a></li>
							
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="dangxuat.php"><?php echo $_SESSION['email'] ?> [Đăng xuất]</a>
					</li>
				<?php
					}
				?>
			</ul>
			<form class="d-flex">
				<input class="form-control me-2" type="search" placeholder="Tìm kiếm bài viết" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Tìm</button>
			</form>
		</div>
	</div>
</nav>
