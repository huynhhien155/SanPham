<div class="content">
	<?php
	if(isset($_GET['quanly'])){
		$tam=$_GET['quanly'];
	}else{
		$tam='';
	}if($tam=='quanlyloaisp'){
		include('quanlyloaisp/main.php');
	}if($tam=='quanlychitietsp'){
		include('quanlychitietsp/main.php');
	}
	if($tam=='quanlysp'){
		include('quanlysp/main.php');
	}
	if($tam=='quanlynguoidung'){
	include('quanlynguoidung/main.php');
	}
	?>
</div>
<div class="clear"></div>