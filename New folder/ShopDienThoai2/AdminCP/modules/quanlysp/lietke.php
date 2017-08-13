<?php
	include('config.php');
	$sql="select * from sanpham, loaisanpham, tinhtrangsp where sanpham.MaLoai=loaisanpham.MaLoai AND sanpham.TinhTrang=tinhtrangsp.MaTinhTrang order by sanpham.MaSP desc";
	$run=mysqli_query($conn,$sql);
?>
<table width="100%" border="1" cellpadding="5">
  <tr>
    <td>STT</td>
    <td>Mã SP</td>
    <td>Tên SP</td>
    <td>Loại SP</td>
    <td>Hình Ảnh</td>
    <td>Tình trạng</td>
    <td>Giá bán</td>
    <td>Số lượng</td>
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
    <td><?php echo $dong['TenLoai'] ?></td>
    <td><img src=".././Image/<?php echo $dong['TenHinhAnh'] ?>" " width="60" height="60">
    </td>
    <td><?php echo $dong['TenTinhTrang'] ?></td>
    <td><?php echo $dong['GiaBan'] ?></td>
    <td><?php echo $dong['SoLuong'] ?></td>
    <td><a href="index.php?quanly=quanlysp&ac=sua&id=<?php echo $dong['MaSP'] ?>">Sửa</td>
    <td><a href="modules/quanlysp/xuly.php?id=<?php echo $dong['MaSP'] ?>">Xóa</td>
  </tr>
  <?php
  $i++;
  }
  ?>
</table>
