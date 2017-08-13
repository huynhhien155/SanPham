<div class="Content">
	<ul>
	<?php
		$sql="select MaSP,TenSP,TenHinhAnh,GiaBan from sanpham where TinhTrang=1";
		$result = DataProvider::ExecuteQuery($sql);
		while($row=mysqli_fetch_array($result))
		{
			$MaSP=$row['MaSP'];
			$TenSP=$row['TenSP'];
			$TenHinhAnh=$row['TenHinhAnh'];
			$GiaBan=$row['GiaBan'];
			echo "<li class='item'><a href='?a=1&MaSP=".$MaSP."'><img src='./Image/".$TenHinhAnh."' width='150' height='150' /><h3>".$TenSP."</h3><h4>".number_format($GiaBan,'0',',','.')."đ</h4></a>";
		}
	?>
	</ul>
</div>