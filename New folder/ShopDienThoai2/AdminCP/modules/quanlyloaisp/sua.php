<?php
	$sql="select * from loaisanpham where MaLoai=$_GET[id]";
	$run=mysqli_query($conn,$sql);
	$dong=mysqli_fetch_array($run);
?>

<form action="modules/quanlyloaisp/xuly.php?id=<?php echo $dong['MaLoai'] ?>" method="post" enctype="multipart/form-data">
<table width="100%" border="1" cellpadding="5">
  <tr>
    <td colspan="2"><div align="center">Sửa sản phẩm</div></td>
  </tr>
  <tr>
    <td width="166">Tên loại sản phẩm</td>
    <td><input type="text" name="tenloaisp" value="<?php echo $dong['TenLoai']?>"> </td>
  </tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="sua" id="sua" value="Sửa">
    </div></td>
  </tr>
</table>
</form>