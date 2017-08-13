<?php
	session_start();
	include_once("ShoppingCart.php");
	$Cart = new ShoppingCart();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shop Điện Thoại Infinity</title>
	<link rel="stylesheet" href="./CSS/Style.css">
</head>
<body>
	<div id="Wrapper">
		<?php
			include_once("DataProvider.php");
			
			include_once("Header.php");

			$a = 0;
			if(isset($_GET['a']))
			{
				$a=$_GET['a'];
			}
			if(isset($_GET['searchbox']) && isset($_GET['searchbutton']))
			{
				$a=3;
			}
			switch($a)
			{
				case 0:
				include_once("Content.php");
				break;
				case 1:
				include_once("Detail.php");
				break;
				case 2:
				include_once("Product.php");
				break;
				case 3:
				include_once("Search.php");
				break;
				case 4:
				include_once("Order.php");
				break;
				default:
				include_once("Content.php");
				break;
			}
			
		?>
		
	</div>
	<?php
		include_once("footer.php");
	?>
</body>
</html>