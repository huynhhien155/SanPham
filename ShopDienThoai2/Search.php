<div class="Content">
	<ul>
	<?php
		if(empty($_GET['searchbox']))
		{
			header('location: http://localhost:83/ShopDienThoai2/index.php');
		}
		else
		{
			$string=$_GET['searchbox'];
			$sql="select sp.MaSP,sp.TenSP,sp.TenHinhAnh,format(sp.GiaBan,'0','de_DE')as GiaBan from sanpham sp,loaisanpham l where sp.TinhTrang=1 and l.MaLoai=sp.MaLoai and (sp.TenSP like'%".$string."%' or l.TenLoai like'%".$string."%')";
			$result = DataProvider::ExecuteQuery($sql);
			$rowcount=$result->num_rows;
			if($rowcount != 0)
			{
				while($row=mysqli_fetch_array($result))
				{
					$MaSP=$row['MaSP'];
					$TenSP=$row['TenSP'];
					$TenHinhAnh=$row['TenHinhAnh'];
					$GiaBan=$row['GiaBan'];
					echo "<li class='item'><a href='?a=1&MaSP=".$MaSP."'><img src='./Image/".$TenHinhAnh."' width='150' height='150' /><h3>".$TenSP."</h3><h4>".$GiaBan."</h4></a>";
				}
			}
			else
			{
				echo "<h2>Không Tìm Thấy Sản Phẩm<h2>";
			}
		}
	?>
	</ul>
</div>