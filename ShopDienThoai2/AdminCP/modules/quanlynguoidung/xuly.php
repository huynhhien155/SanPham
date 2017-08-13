<?php
	include('./config.php');
	$id=$_GET['id'];
	$tenloaisp=$_POST['tenloaisp'];
	if(isset($_POST['them'])){
		//them
	}elseif(isset($_POST['sua'])){
		//sua

	}else{
		//xoa
		$sql="delete from taikhoan where MaTK='$id'";
		mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlynguoidung&ac=them');
	}
?>