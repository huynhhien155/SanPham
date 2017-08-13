<?php
	session_start();
	include_once("ShoppingCart.php");
	if(!isset($_SESSION['Cart']))
	{
		header('location: http://localhost:83/ShopDienThoai2/Order.php');
	}
	if(isset($_SESSION['Cart']))
	{
		$Cart = unserialize($_SESSION['Cart']);
		$MaSP=$_GET['MaSP'];
		$Cart->delete($MaSP);
		$_SESSION['Cart'] = serialize($Cart);
		header('location: http://localhost:83/ShopDienThoai2/Order.php');
	}
?>