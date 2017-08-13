<?php
	session_start();
	if($_SESSION['LoaiTaiKhoan']!=1)
	{
		header("location: location: http://localhost:81/ShopDienThoai/index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Trang Quản Lí Sản Phẩm</title>
	<link rel="stylesheet" href="./CSS/Style.css">
</head>
<body>
	<div id="Wrapper">
		<div id="Header">
			<a href="index.php">
				<div id="logo">
			</div></a>
			<?php
				if(isset($_SESSION['Username']))
				{
					echo "<span id='helloaccount'><b>Hello ".$_SESSION['Username']."  </b><a href='Logout.php'>Logout</a></span>";
				}
			?>
		</div>
		<div id="navAdmin">
			<ul>
				<li><a href="?ql=1">Quản Lí Đơn Hàng</a></li>
				<li><a href="?ql=2">Quản Lí Sản Phẩm</a></li>
				<li><a href="?ql=3">Quản Lí Tài Khoản</a></li>
				<li><a href="?ql=4">Quản Lí Hãng Sản Phẩm</a></li>
			</ul>
		</div>
		<div id="Wrapper-QuanLi">
			
		</div>
	</div>
</body>
</html>