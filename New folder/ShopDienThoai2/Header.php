		<script type="text/javascript">
		function HideLogin()
		{
			document.getElementById("RegAndLogin").className="Hidden";
		}
		function QuanLi()
		{
			document.getElementById("QuanLi").className="Visible";
		}
		</script>

		<div id="Header">
			<a href="index.php">
				<div id="logo">
			</div></a>
			<form name="searchform" id="searchform" method="get">
				<tr>
					<td><input name="searchbox" id="searchbox" type="text" placeholder="Nhập Tên Sản Phẩm" /></td>
					<td><input name="searchbutton" id="searchbutton" type="submit" value="" /></td>
				</tr>
			</form>

			<div class="account">
				<div id="RegAndLogin" class="Visible">
					<span><a href="login.php"><b>Đăng Nhập</b></a></span>
					<span><b>|</b><span>
					<span><a href="Register.php"><b>Đăng Kí</b></a></span>
				</div>
			</div>
			<?php
				if(isset($_SESSION['MaTK']))
				{
					echo "<span id='helloaccount'><b>Hello ".$_SESSION['Username']."  </b><a href='Logout.php'>Logout</a></span>";
					echo "<script>HideLogin();</script>";
				}
			?>
		</div>
		<div id="nav">
			<ul>
				<li><a href="index.php?a=0">Trang Chủ</a></li>
				<li>
					<a href="#">Sản Phẩm</a>
					<ul class="submenu">
						<?php
							$sql="select MaLoai,TenLoai from loaisanpham";
							$kq=DataProvider::ExecuteQuery($sql);
							while($row=mysqli_fetch_array($kq))
							{
								echo "<li><a href='index.php?a=2&id=".$row['MaLoai']."' >".$row['TenLoai']."</a></li>";
							}
						?>
						
					</ul>
				</li>
				<li><a href="#">Đang Giảm Giá</a></li>
				<li><a href="Searchplus.php">Tìm Kiếm Nâng Cao</a></li>
				<li><a href="Order.php">Giỏ Hàng</a></li>
				<?php
					if(isset($_SESSION['LoaiTaiKhoan']) && $_SESSION['LoaiTaiKhoan']==1)
					{
						echo "<li><a href='QuanLi.php'>Quản Lí</a></li>";
					}
				?>

			</ul>
			<?php
				if(isset($_SESSION['LoaiTaiKhoan']) && $_SESSION['LoaiTaiKhoan']==1 )
				{
					echo "<script>QuanLi();</script>";
				}
				if(isset($_GET['searchbutton']) && !empty($_GET['searchbox']) && isset($_GET['searchbox']))
				{
					header("location: http://localhost:83/ShopDienThoai2/index.php?searchbox=".$GET['searchbox']."&searchbutton=");
				}
			?>
		</div>