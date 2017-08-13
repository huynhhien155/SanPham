<?php
	$sql="select * from sanpham where MaSP='$_GET[id]'";
	$run=mysqli_query($conn,$sql);
	$dong=mysqli_fetch_array($run);
?>

<form action="modules/quanlysp/xuly.php?id=<?php echo $dong['MaLoai'] ?>" method="post" enctype="multipart/form-data">
<table width="100%" border="1" cellpadding="5">
  <tr>
    <td colspan="2"><div align="center">Sửa sản phẩm</div></td>
    </tr>
  <tr>
    <td>Tên SP</td>
    <td><input type="text" name="tensp" value="<?php echo $dong['TenSP'] ?>"></td>
  </tr>
  <tr>
   <?php
  	include('config.php');
  	$sql_loaisanpham="select * from loaisanpham";
	$run_loaisanpham=mysqli_query($conn,$sql_loaisanpham);
  	?>
    <td>Loại SP</td>
    <td><select name="maloaisp">
    <?php
    while($dong_loaisanpham=mysqli_fetch_array($run_loaisanpham)){
		if($dong['MaSP']==$dong_loaisanpham['MaSP']){
		?>
    	<option selected="selected" value="<?php echo $dong_loaisanpham['MaLoai'] ?>"><?php echo $dong_loaisanpham['TenLoai']?></option>
        <?php
	}else{
		?>
        <option value="<?php echo $dong_loaisanpham['MaLoai'] ?>"><?php echo $dong_loaisanpham['TenLoai']?></option>
        <?php
	}
	}
	?>
    </select></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh"><img src=".././Image/<?php echo $dong['TenHinhAnh'] ?>" width="60" height="60"></td>
  </tr>
  <tr>
    <td>Tình Trạng</td>
    <td><input type="text" name="tinhtrang" value="<?php echo $dong['TinhTrang'] ?>"></td>
  </tr>
  <tr>
    <td>Giá bán</td>
    <td><input type="text" name="giaban" value="<?php echo $dong['GiaBan'] ?>"></td>
  </tr>
  <tr>
    <td>Số lượng</td>
    <td><input type="text" name="soluong" value="<?php echo $dong['SoLuong'] ?>"></td>
  </tr>
  <tr>
    <td colspan="2">
      <div align="center">
        <button name="sua" value="sua">Sửa</button></div></td>
    </tr>
</table>

</form>