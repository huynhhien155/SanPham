<?php
	session_start();
	include_once("ShoppingCart.php");
	include_once("DataProvider.php");
	if(isset($_SESSION['Cart']))
	{
		$Cart = unserialize($_SESSION['Cart']);
	}
	if(isset($_POST['submitCapNhatGioHang']))
	{
		foreach($_POST['SanPham'] as $MaSP => $value)
		{
			$Cart->update($MaSP,$value);
		}
		$_SESSION['Cart'] = serialize($Cart);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Giỏ Hàng</title>
	<link rel="stylesheet" href="./CSS/Style.css">
	<script type="text/javascript">
		function HideCart(){
			document.getElementById("ThongTinGioHang").className="Hidden";
			document.getElementById("ThongBaoGioHang").className="Hidden";
			document.getElementById("ThanhToan").className="Hidden";
			document.getElementById("LoiGioHang").className="Hidden";
		}
		function ErrorCart(ThongBaoLoi){
			document.getElementById("LoiGioHang").innerHTML=ThongBaoLoi;
			document.getElementById("LoiGioHang").className="Visible";
		}
	</script>
</head>
<body>
	<div id="Wrapper">
		<?php
			include_once("DataProvider.php");
			include_once("Header.php");
			echo "<div id='Wrapper-GioHang'>";
			if(!isset($_SESSION['Cart']) || (isset($_SESSION['Cart']) && count($Cart->listProduct) == 0))
			{
				echo "<div id='ThongBaoGioHang'><span>Giỏ Hàng Của Bạn Hiện Chưa Có Sản Phẩm</span></div>";
			}
			else
			{
				echo "<div id='ThongBaoGioHang' class='Visible'><span>Giỏ Hàng Của Bạn Hiện Có ".count($Cart->listProduct)." Sản Phẩm </span></div>";
				echo "<div id='LoiGioHang' class='Hidden'></div>";
				if(count($Cart->listProduct)>0)
				{
					echo "<div class='ThongTinGioHang' id='ThongTinGioHang'>
						<table border='1' cellspacing='20' width='800px'><tr id='title'><td height='30px'>Hình Ảnh</td><td>Tên Sản Phẩm</td><td>Số Lượng</td><td>Giá Tiền</td><td>Xóa</td></tr><form id='CapNhatSoLuong' name='CapNhatSoLuong' method='post' >";
						$TongTien = 0;
						$listSoLuong=array();
						for($i=0;$i<count($Cart->listProduct);$i++)
						{	
							$sql="select GiaBan,SoLuong from sanpham where MaSP=".$Cart->listProduct[$i]->MaSP;
							$kq=DataProvider::ExecuteQuery($sql);
							$row = mysqli_fetch_array($kq);
							$GiaBan = $row['GiaBan'] * $Cart->listProduct[$i]->SoLuong;
							$TongTien=$TongTien + $GiaBan;
							echo "<tr><td><img src='./Image/".$Cart->listProduct[$i]->TenHinhAnh."' width='150' height='150' /></td><td>".$Cart->listProduct[$i]->TenSP."</td><td><input type='number' name='SanPham[".$Cart->listProduct[$i]->MaSP."]' min='1' max='".$row['SoLuong']."' step='1' value='".$Cart->listProduct[$i]->SoLuong."'/></td><td>".number_format($GiaBan,'0',',','.')."đ</td><td><a href=RemoveCart.php?MaSP=".$Cart->listProduct[$i]->MaSP." >Xóa</a></td></tr>";
						}
						echo "<tr id='TongTien'><td>Tổng Tiền</td><td colspan='4'>".number_format($TongTien,'0',',','.')."đ</td></tr></table></div><div class='ThanhToan' id='ThanhToan'><input id='submitCapNhatGioHang' name='submitCapNhatGioHang' type='submit' value='Cập Nhật Giỏ Hàng'></form><form id='formThanhToan' name='formThanhToan' method='post'><input id='submitThanhToan' name='submitThanhToan' type='submit' value='Thanh Toán'/></form></div>";
						if(!isset($_SESSION['MaTK']) && isset($_POST['submitThanhToan']))
						{
							header('location: http://localhost:81/ShopDienThoai/login.php');
						}
						if(isset($_SESSION['MaTK']) && isset($_POST['submitThanhToan']))
						{
							$ThongBaoLoi="Thanh Toán Thất Bại<br />";
							$Check = 1;
							for($i=0;$i<count($Cart->listProduct);$i++)
							{
								$sql="select SoLuong from sanpham where MaSP=".$Cart->listProduct[$i]->MaSP;
								$kq=DataProvider::ExecuteQuery($sql);
								$row=mysqli_fetch_array($kq);
								$SoLuongDB = $row['SoLuong'];
								if($Cart->listProduct[$i]->SoLuong > $SoLuongDB)
								{
									$Check = 0;
									if($SoLuongDB == 0)
									{
										$ThongBaoLoi=$ThongBaoLoi." Sản Phẩm ".$Cart->listProduct[$i]->TenSP." Đã Hết Hàng<br />";
									}
									else
									{
										$ThongBaoLoi=$ThongBaoLoi."Sản Phẩm ".$Cart->listProduct[$i]->TenSP." chỉ còn ".$SoLuongDB."<br />";
									}

								}

							}
							if($Check == 1)
							{
								for($i=0;$i<count($Cart->listProduct);$i++)
								{
									$sql = "select GiaBan from sanpham where MaSP=".$Cart->listProduct[$i]->MaSP;
									$kq=DataProvider::ExecuteQuery($sql);
									$row=mysqli_fetch_array($kq);
									$sql="insert into donhang(MaTK,MaSP,SoLuong,GiaTien,TinhTrang) values(".$_SESSION['MaTK'].",".$Cart->listProduct[$i]->MaSP.",".$Cart->listProduct[$i]->SoLuong.",".$Cart->listProduct[$i]->SoLuong * $row['GiaBan'].",1)";
									$kq=DataProvider::ExecuteQuery($sql);
									$sql="update sanpham set SoLuong=SoLuong -".$Cart->listProduct[$i]->SoLuong." where MaSP=".$Cart->listProduct[$i]->MaSP;
									$result=DataProvider::ExecuteQuery($sql);
									
								}
								if($kq==1 && $result == 1)
									{
										unset($_SESSION['Cart']);
										echo '<script>HideCart();</script>';
										echo "<div id='ThongBaoThanhToan'><span>Chúc Mừng Bạn Đã Thanh Toán Thành Công</span>";
									}
								
							}
							if($Check == 0)
							{
								echo "<script>ErrorCart('".$ThongBaoLoi."');</script>";
							}
						}
				}
				
						
			}
		?>
		</div>
	</div>
	<?php
		include_once("Footer.php");
	?>
</body>
</html>