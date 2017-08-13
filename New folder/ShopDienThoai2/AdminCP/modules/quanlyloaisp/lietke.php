<?php
	include('config.php');
	$sql="select * from loaisanpham order by MaLoai desc";
	$run=mysqli_query($conn,$sql);
?>
<table width="100%" border="1" cellpadding="5">
  <tr>
    <td>STT</td>
    <td>Mã loại</td>	
    <td>Tên loại</td>
    <td colspan="2">Quản trị</td>
  </tr>
  <?php
  $i=1;
  while($dong=mysqli_fetch_array($run)){
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $dong['MaLoai'] ?></td>
    <td><?php echo $dong['TenLoai'] ?></td>
    <td><a href="index.php?quanly=quanlyloaisp&ac=sua&id=<?php echo $dong['MaLoai'] ?>">Sửa</td>
    <td><a href="modules/quanlyloaisp/xuly.php?id=<?php echo $dong['MaLoai'] ?>"> Xóa</td>
  </tr>
  <?php
  $i++;
  }
  ?>
</table>
