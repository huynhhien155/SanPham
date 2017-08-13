<?php
	include('config.php');
	$sql="select * from taikhoan, loaitaikhoan, dstinhthanh where taikhoan.LoaiTaiKhoan=loaitaikhoan.MaLoaiTK AND taikhoan.MaTinhThanh=dstinhthanh.MaTinh order by taikhoan.MaTK desc";
	$run=mysqli_query($conn,$sql);
?>
<table width="100%" border="1" cellpadding="5">
  <tr>
    <td>STT</td>
    <td>Mã TK</td>
    <td>Username</td>
    <td>Loại TK</td>
    <td>Họ tên</td>
    <td>Email</td>
    <td>Số điện thoại</td>
    <td>Ngày sinh</td>	
    <td>Tên tỉnh thành</td>
    <td>Quản trị</td>
  </tr>
  <?php
  $i=1;
  while($dong=mysqli_fetch_array($run)){
  ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $dong['MaTK'] ?></td>
    <td><?php echo $dong['Username'] ?></td>
    <td><?php echo $dong['TenLoaiTK'] ?></td>
    <td><?php echo $dong['HoTen'] ?></td>
    <td><?php echo $dong['Email'] ?></td>
    <td><?php echo $dong['SoDienThoai'] ?></td>
    <td><?php echo $dong['NgaySinh'] ?></td>
    <td><?php echo $dong['TenTinh'] ?></td>
    <td><a href="modules/quanlynguoidung/xuly.php?id=<?php echo $dong['MaTK'] ?>">Xóa</td>
  </tr>
  <?php
  $i++;
  }
  ?>
</table>
