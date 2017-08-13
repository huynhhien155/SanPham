<?php
	$tenmaychu='localhost';
	$tentaikhoan='root';
	$pass='';
	$csdl='shopdienthoai';
	$conn=mysqli_connect($tenmaychu,$tentaikhoan,$pass,$csdl) or die('Khong ket noi duoc');
	$conn->set_charset("utf8");
	mysqli_select_db($conn,$csdl);
?>