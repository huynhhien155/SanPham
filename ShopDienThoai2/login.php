<?php
	session_start();
	if(isset($_SESSION['MaTK']))
	{
		header("location: http://localhost:81/");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Đăng Nhập Tài Khoản</title>
	<link rel="stylesheet" href="./CSS/Style.css">
	<script type="text/javascript">
		function RaiseError()
		{
			document.getElementById("AccountError").className="Visible";
		}
		
	</script>
</head>
<body>
	<div id="Wrapper" >
	<?php
		include_once("DataProvider.php");
		include_once("Header.php");
	?>
	<div id="wrapper-login">
			<div id="AccountError" class="Hidden">
				<span>Tên Tài Khoản Hoặc Mật Khẩu Không Đúng!</span>
			</div>
			<div id="formlogin">
			<form name="loginaccount" id="loginaccount" method="post">
				<table cellspacing="20">
					<tr>
						<td>Tên Đăng Nhập</td>
						<td><input name="username" id="username" type="text"></td>
					</tr>
					<tr>
						<td>Mật Khẩu</td>
						<td><input name="password" id="password" type="password"></td>
					</tr>
				</table>
				<input name="buttonlogin" id="buttonlogin" type="submit" value="Đăng Nhập" />
			</form>
			</div>
			<div id="regandforgetpw">
				<span>Bạn Chưa <a href="Register.php">Đăng Kí</a> Tài Khoản / <a href="Forgetpw.php">Quên Mật Khẩu</a><span>
			</div>
		</div>
	</div>
	<?php
		if(isset($_POST['buttonlogin']))
		{
			$name = $_POST['username'];
			$pass = md5($_POST['password']);
			$sql = "select MaTK,LoaiTaiKhoan,Username from taikhoan where Username='".$name."' and Password='".$pass."'";
			$kq=DataProvider::ExecuteQuery($sql);
			$rowcount = $kq->num_rows;
			if($rowcount==1)
			{
				$row = mysqli_fetch_array($kq);
				$_SESSION['MaTK'] = $row['MaTK'];
				$_SESSION['LoaiTaiKhoan']=$row['LoaiTaiKhoan'];
				$_SESSION['Username']=$row['Username'];
				if($_SESSION['LoaiTaiKhoan']==1)
				{
					header('Location: http://localhost:81/ShopDienThoai/AdminCP/index.php');
				}
				else
				{
					header('location: http://localhost:81/ShopDienThoai/index.php');
				}
			}
			if($rowcount != 1)
			{
				echo '<script> RaiseError(); </script>';
			}

		}

	?>
</body>
</html>

