<div class="Detail">
 	<?php
 		$MaSP=$_GET['MaSP'];
 		$sql="select sp.TenHinhAnh,sp.TinhTrang,sp.TenSP,replace(ct.ChiTietSP,';','<br/>')as ChiTietSP,sp.GiaBan,sp.SoLuong from sanpham sp,chitietsp ct where ct.MaSP=sp.MaSP and ct.MaSP=".$MaSP." and sp.TinhTrang=1";
 		$result = DataProvider::ExecuteQuery($sql);
 		$rowcount=$result->num_rows;
 		if($rowcount==0)
 		{
 			echo "<span>Không Tìm Thấy Sản Phẩm</span>";
 		}
 		else
 		{
 			$row=mysqli_fetch_array($result);
 			$TenHinhAnh=$row['TenHinhAnh'];
 			$TenSP=$row['TenSP'];
 			$ChiTietSP=$row['ChiTietSP'];
 			$GiaBan=$row['GiaBan'];
 			$SoLuong = $row['SoLuong'];
 			echo"<div class='HinhAnh'>
 					<h2>".$TenSP."<h2>
					<img src='./Image/".$TenHinhAnh."' />"."
					<h2><font color='#FA1313'>Giá Bán: ".number_format($GiaBan,'0',',','.')."đ</font></h2>
				</div>
				<div class='ChiTietSP'>
					<h3>Thông Số Kỹ Thuật<br/><br /></h3>
					<span>".$ChiTietSP."</span><br /><br /><hr />
				</div>";
			if($SoLuong == 0)
 			{
 				echo "<div class='ThongBaoHetHang'><span>Sản Phẩm Hiện Đã Hết Hàng</span></div>";
 			}
 			else
 			{
 				echo "<div class='MuaHang'>
				<form name='order' id='order' method='post'>
						<span>Số Lượng&nbsp;&nbsp;&nbsp</span>
						<input name='SoLuong' id='SoLuong' type='number' min='1' max='".$SoLuong."' step='1' value='1'/><br />
						<input name='submitMuaHang' id='submitMuahang' type='submit' value='Mua Hàng'/>
				</form>
 				</div>";
 			}
				
 		}
 			if(isset($_POST['submitMuaHang']))
 			{
 				
 				$SoLuongCanMua = $_POST['SoLuong'];
 				if(!isset($_SESSION['Cart']))
 				{
 					/*
 					$_SESSION['MaSP']=$_GET['MaSP'];
 					$_SESSION['SoLuong']=$_POST['SoLuong'];
 					header('location: http://localhost:83/ShopDienThoai/Order.php?');*/
 					$Cart->add($_GET['MaSP'],$_POST['SoLuong'],$TenHinhAnh,$TenSP);
 					$_SESSION['Cart'] = serialize($Cart);
 					echo "<div id='ThongBaoThemGioHang'><span>Sản Phẩm Đã Được Thêm Vào Giỏ Hàng</span></div>";
				}
 				else
 				{
 					$Cart = unserialize($_SESSION['Cart']);
 					$Cart->add($_GET['MaSP'],$_POST['SoLuong'],$TenHinhAnh,$TenSP);
 					$_SESSION['Cart'] = serialize($Cart);
 					echo "<div id='ThongBaoThemGioHang'><span>Sản Phẩm Đã Được Thêm Vào Giỏ Hàng</span></div>";
 				}
			}
 	?>
</div>