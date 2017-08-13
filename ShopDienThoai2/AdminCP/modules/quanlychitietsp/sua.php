<?php
	$sql="select * from chitietsp where MaSP=$_GET[id]";
	$run=mysqli_query($conn,$sql);
	$dong=mysqli_fetch_array($run);
?>
<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
<form action="modules/quanlychitietsp/xuly.php" method="post" enctype="multipart/form-data">
<table width="100%" border="1">
  <tr>
    <td colspan="2"><div align="center">Sửa chi tiết sp</div></td>
  </tr>
  <tr>
    <td>Mã SP</td>
    <td><input type="text" name="masp" value="<?php echo $dong['MaSP']?>"> </td>
  </tr>
  <tr>
    <td>Mô tả chi tiết SP</td>
    <td><textarea name="chitietsp" cols="40" rows="15"><?php echo $dong['ChiTietSP'] ?></textarea></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <button name="sua" value="Sửa">Sửa</button>
    </div></td>
  </tr>
</table>
</form>