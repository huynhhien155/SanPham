<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
<form action="modules/quanlychitietsp/xuly.php" method="post" enctype="multipart/form-data">
<table width="100%" border="1">
  <tr>
    <td colspan="2"><div align="center">Thêm chi tiết sp</div></td>
  </tr>
  <?php
  	include('config.php');
  	$sql="select * from sanpham";
	$run=mysqli_query($conn,$sql);
  ?>
  <tr>
    <td>Mã SP</td>
    <td><select name="masp">
    <?php
    while($dong=mysqli_fetch_array($run)){
		?>
    	<option value="<?php echo $dong['MaSP'] ?>"><?php echo $dong['MaSP']?></option>
        <?php
	}
		?>
    </select></td>
  </tr>
  <tr>
    <td>Mô tả chi tiết SP</td>
    <td><textarea name="chitietsp" cols="40" rows="15"></textarea></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <button name="them" value="Thêm">Thêm</button>
    </div></td>
  </tr>
</table>
</form>