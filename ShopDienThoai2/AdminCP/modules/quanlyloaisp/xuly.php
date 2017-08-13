<?php
	include('./config.php');
	$id=$_GET['id'];
	$tenloaisp=$_POST['tenloaisp'];
	if(isset($_POST['them'])){
		//them
		$sql="insert into loaisanpham (TenLoai) values ('$tenloaisp')";
		mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlyloaisp&ac=them');
	}elseif(isset($_POST['sua'])){
		//sua
		$sql="update loaisanpham set TenLoai='$tenloaisp' where MaLoai='$id'";
		mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlyloaisp&ac=sua&id='.$id);

	}else{
		//xoa
		$sql="delete from loaisanpham where MaLoai='$id'";
		mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlyloaisp&ac=them');
	}
?>