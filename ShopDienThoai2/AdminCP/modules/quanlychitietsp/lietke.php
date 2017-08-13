<?php
	include('config.php');
	$sql="select * from chitietsp, sanpham where chitietsp.MaSP=sanpham.MaSP order by sanpham.MaSP desc";
	$run=mysqli_query($conn,$sql);
?>

<table width="100%" border="1" cellpadding="5">
  <tr>
    <td>STT</td>
    <td>Mã SP</td>
    <td>Tên SP</td>
    <td>Thông tin chi tiết</td>
    <td colspan="2">Quản trị</td>
  </tr>
  <?php
  $i=1;
  while($dong=mysqli_fetch_array($run)){
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $dong['MaSP'] ?></td>
    <td><?php echo $dong['TenSP'] ?></td>
    <td><?php echo $dong['ChiTietSP'] ?></td>
    <td><a href="index.php?quanly=quanlychitietsp&ac=sua&id=<?php echo $dong['MaSP'] ?>">Sửa</td>
    <td><a href="modules/quanlychitietsp/xuly.php?id=<?php echo $dong['MaSP'] ?>"> Xóa</td>
  </tr>
  <?php
  $i++;
  }
  ?>
</table>