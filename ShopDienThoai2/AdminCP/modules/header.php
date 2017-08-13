<div class="header">
<h3 style="text-align:center;color:#F00;line-height:120px;">
	<?php
	session_start();
	if(isset($_SESSION['Username']))
	{
		echo "<span id='helloaccount'><b>Xin chào ".$_SESSION['Username'].". Chúc bạn một ngày tốt lành!</b></span>";
	}
	?>
</div>