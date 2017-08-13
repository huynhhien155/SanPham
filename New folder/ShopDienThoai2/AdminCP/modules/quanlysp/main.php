<div class="left">
	<?php
	if(isset($_GET['ac'])){
		$tam=$_GET['ac'];
	}else{
		$tam='';
	}if($tam=='them'){
		include('modules/quanlysp/them.php');
	}if($tam=='sua'){
		include('modules/quanlysp/sua.php');
	}
	?>
</div>
<div class="right">
	<?php
	include('modules/quanlysp/lietke.php');
	?>
</div>
