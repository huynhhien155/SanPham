<?php
	include('./config.php');
	$id=$_GET['id'];
	$tensp=$_POST['tensp'];
	$maloaisp=$_POST['maloaisp'];
	$tinhtrang=$_POST['tinhtrang'];
	$giaban=$_POST['giaban'];
	$soluong=$_POST['soluong'];
	
	//include('../../../Image/test.php');
	
	$hinhanh=$_FILES['hinhanh']['name'];
	$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
	move_uploaded_file($hinhanh_tmp,'../../../Image/'.$hinhanh);
	if(isset($_POST['them'])){
		//them
		$sql="insert into sanpham (TenSP,MaLoai,TenHinhAnh,TinhTrang,GiaBan,SoLuong) values ('$tensp','$maloaisp','$hinhanh','$tinhtrang','$giaban','$soluong')";
		mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlysp&ac=them');
	}elseif(isset($_POST['sua'])){
		//sua
		
		if($hinhanh!=''){
		$sql="update sanpham set TenSP='$tensp',MaLoai='$maloaisp',TinhTrang='$tinhtrang',GiaBan='$giaban',SoLuong='$soluong' where MaSP='$id'";
		}else{
			$sql="update sanpham set TenSP='$tensp',MaLoai='$maloaisp',TenHinhAnh='$hinhanh',TinhTrang='$tinhtrang',GiaBan='$giaban',SoLuong='$soluong' where MaSP='$id'";
		}
		mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlysp&ac=sua&id='.$id);
	}else{
		//xoa
		$sql="delete from sanpham where MaSP='$id'";
		mysqli_query($conn,$sql);
		header('location:../../index.php?quanly=quanlysp&ac=them');
	}
?>