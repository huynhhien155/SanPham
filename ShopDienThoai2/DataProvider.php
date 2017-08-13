<?php 
	+define("SERVER", "localhost");
	+define("DATABASE", "shopdienthoai");
	+define("USERNAME","root");
	+define("PASSWORD", "");

	class DataProvider
	{
		public static Function ExecuteQuery($sql)
		{
			$Connect = mysqli_connect(SERVER,USERNAME,PASSWORD,DATABASE);
			$Connect->set_charset("utf8");
			$result = $Connect->query($sql);
			mysqli_close($Connect);
			return $result;
		}
		
	}

 ?>