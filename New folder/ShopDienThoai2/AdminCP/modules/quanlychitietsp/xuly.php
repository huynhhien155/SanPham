<?php
	include('./config.php');
	$id=$_GET['id'];
	$masp=$_POST['masp'];
	$chitietsp=$_POST['chitietsp'];
	if(isset($_POST['them'])){
		//them
		$sql="insert into chitietsp (MaSP,ChiTietSP) values ('$masp','$chitietsp')";
		mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlychitietsp&ac=them');
	}elseif(isset($_POST['sua'])){
		//sua
		$sql="update chitietsp set MaSP ='$masp', ChiTietSP='$chitietsp' where MaSP='$id'";
		mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlychitietsp&ac=sua&id='.$id);
	}else{
		//xoa
		$sql="delete from chitietsp where MaSP='$id'";
		mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlychitietsp&ac=them');
	}
?>