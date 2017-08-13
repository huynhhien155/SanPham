<form action="modules/quanlysp/xuly.php" method="post" enctype="multipart/form-data">
<table width="100%" border="1" cellpadding="5">
  <tr>
    <td colspan="2"><div align="center">Thêm sản phẩm</div></td>
    </tr>
  <tr>
    <td>Tên SP</td>
    <td><input type="text" name="tensp"></td>
  </tr>
  <tr>
    <td>Loại SP</td>
   <?php
  	include('config.php');
  	$sql="select * from loaisanpham";
	$run=mysqli_query($conn,$sql);
  	?>
    <td><select name="maloaisp">
    <?php
    while($dong=mysqli_fetch_array($run)){
		?>
    	<option value="<?php echo $dong['MaLoai'] ?>"><?php echo $dong['TenLoai']?></option>
        <?php
	}
		?>
    </select></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh"></td>
  </tr>
  <tr>
    <td>Tình Trạng</td>
    <td><input type="text" name="tinhtrang"></td>
  </tr>
  <tr>
    <td>Giá bán</td>
    <td><input type="text" name="giaban"></td>
  </tr>
  <tr>
    <td>Số lượng</td>
    <td><input type="text" name="soluong"></td>
  </tr>
  <tr>
    <td colspan="2">
      <div align="center"><button name="them" value="them">Thêm</button></div></td>
    </tr>
</table>

</form>