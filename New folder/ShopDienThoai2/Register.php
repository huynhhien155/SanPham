<?php
	session_start();
	if(isset($_SESSION['MaTK']))
	{
		header("location: http://localhost:81/ShopDienThoai/index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Đăng Kí Tài Khoản</title>
	<link rel="stylesheet" href="./CSS/Style.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script type="text/javascript">
		function HideCaptchaError()
		{
			document.getElementById("CaptchaError").className="Hidden";
		}
	</script>
</head>
<body>
	<div id="Wrapper">
		<?php
			include_once("DataProvider.php");
			include_once("Header.php");
			$check = 1;
			$checkcaptcha = 0;
			ob_start();
		?>
	<div id="Wrapper-Reg">
		<div class="formreg">
			<form id="regaccount" name="regaccount" method="post">
				<table cellspacing="20">
					<tr>
						<td>Họ Tên</td>
						<td><input name="txtName" id="txtName" type="text" /></td>
						<td><font color="#FE1616">
							<?php
								if(empty($_POST['txtName']) && isset($_POST['buttonreg'] ))
								{
									echo 'Vui Lòng Nhập Họ Tên';
									$check = $check - 1;
								}
							?>
						</font></td>
					</tr>
					<tr>
						<td>Ngày Sinh</td>
						<td>
							<select id="cboNgay" name="cboNgay">
								<?php
									for($i=1;$i<=31;$i++){
										echo "<option value='". $i."'>".$i."</option>";
									}
								?>
							</select>
							<select name="cboThang" id="cboThang">
								<?php
									for($i=1;$i<=12;$i++){
										echo "<option value='". $i."'>Tháng ".$i."</option>";
									}
								?>
							</select>
							<select id="cboNam" name="cboNam">
								<?php
									for($i=1980;$i<=date('Y');$i++){
										echo "<option value='". $i."'>".$i."</option>";
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Nơi Sinh Sống</td>
						<td>
							<select id="cboTinhThanh" name="cboTinhThanh">
							<?php
								$sql="select MaTinh,TenTinh from dstinhthanh";
								$LayTinhThanh=DataProvider::ExecuteQuery($sql);
								while($row=mysqli_fetch_array($LayTinhThanh))
								{
									$MaTinh=$row['MaTinh'];
									$TenTinh=$row['TenTinh'];
									echo "<option value='".$MaTinh."'>".$TenTinh."</option>";
								}
							?>
							</select>
						</td>
					</tr>

					<tr>
						<td>Tên Đăng Nhập</td>
						<td><input name="txtUsername" id="txtUsername" type="text" pattern="(?=.*\d)(?=.*[a-z]).{8,15}" title="Tên Đăng Nhập không được có kí tự đặc biệt, có từ 8 đến 15 kí tự bao gồm chữ và số"/></td>
						<td><font color="#FE1616">
							<?php
								if(empty($_POST['txtUsername']) && isset($_POST['buttonreg'] ))
								{
									echo "Vui Lòng Nhập Tên Tài Khoản";
									$check = $check - 1;
								}
								if(isset($_POST['txtUsername']) && isset($_POST['buttonreg']))
								{
									$username=$_POST['txtUsername'];
									$sql="select MaTK from taikhoan where UserName='".$username."'";
									$kqCheckUsername=DataProvider::ExecuteQuery($sql);
									$rowcount=$kqCheckUsername->num_rows;
									if($rowcount != 0)
									{
										echo "Tên Tài Khoản Đã Tồn Tại";
										$check = $check - 1;
									}

								}
								
							?>
						</font></td>
					</tr>
					
					<tr>
						<td>Mật Khẩu</td>
						<td><input name="txtPassword" id="txtPassword" type="password" pattern="(?=.*\d)(?=.*[a-z]).{6,18}" title="Mật Khẩu không được có kí tự đặc biệt, có từ 6 đến 18 kí tự bao gồm chữ và số" /></td>
						<td><font color="#FE1616">
							<?php
								if(empty($_POST['txtPassword']) && isset($_POST['buttonreg'] ))
								{
									echo 'Vui Lòng Nhập Mật Khẩu';
									$check = $check - 1;
								}
							?>
						</font></td>
					</tr>
					<tr>
						<td>Xác Nhận Mật Khẩu</td>
						<td><input name="txtConfirmPassword" id="txtConfirmPassword" type="password" /></td>
						<td><font color="#FE1616">
							<?php
								if(isset($_POST['txtPassword']) && $_POST['txtConfirmPassword'] != $_POST['txtPassword'] && isset($_POST['buttonreg'] ))
								{
									echo 'Mật Khẩu Xác Nhận Không Đúng';
									$check = $check - 1;
								}
							?>
						</font></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input name="txtEmail" id="txtEmail" type="email"/></td>
						<td><font color="#FE1616">
							<?php
								if(empty($_POST['txtEmail']) && isset($_POST['buttonreg'] ))
								{
									echo 'Vui Lòng Nhập Email';
									$check = $check - 1;
								}
							?>
						</font></td>
					</tr>
					<tr>
						<td>Số Điện Thoại</td>
						<td><input name="txtDt" id="txtDt" type="tel" pattern="\d{10}|\d{11}" title="vui lòng nhập số điện thoại 10 số hoặc 11 số"/></td>
						<td><font color="#FE1616">
							<?php
								if(empty($_POST['txtDt']) && isset($_POST['buttonreg'] ))
								{
									echo 'Vui Lòng Nhập Số Điện Thoại';
									$check = $check - 1;
								}
							?>
						</font></td>
					</tr>
				</table>
				<div id=captcha>
				<table cellspacing="10">
					<tr>
					<td><div class="g-recaptcha" data-sitekey="6LfiChAUAAAAAMHHOLUP9uHW0a6Q10j7ahdIa3XQ"></div></td>
					<td id="CaptchaError" class="Visible"><font color="#FE1616">
						<?php
							if($checkcaptcha==0 && isset($_POST['buttonreg']))
							{
								echo 'Mã Capcha Không Đúng';
							}
						?>
					</font></td>
					</tr>
				</table>
				</div>
				<input name="buttonreg" id="buttonreg" type="submit" value="Đăng Kí" />
				
			</form>
			<?php
				if(isset($_POST['g-recaptcha-response']))
				{
					
					$secret = "6LfiChAUAAAAAPgkmtqHuc0A-gWhZv1ExWtuCJxp";
					$captcha = $_POST['g-recaptcha-response'];
					$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha);
					$result=json_decode($response);
					if($result->success==true)
					{
						$checkcaptcha = 1;
						echo "<script>HideCaptchaError();</script>";
					}
				}

				if($checkcaptcha == 1 && $check == 1 && isset($_POST['buttonreg']))
					{
						$stringNgaySinh=$_POST['cboNam']."-".$_POST['cboThang']."-".$_POST['cboNgay'];
						$MaTinhThanh=$_POST['cboTinhThanh'];
						$pass=md5($_POST['txtPassword']);
						$sql="insert into taikhoan(Username,Password,LoaiTaiKhoan,HoTen,Email,SoDienThoai,NgaySinh,MaTinhThanh) values('".$_POST['txtUsername']."','".$pass."',2,'".$_POST['txtName']."','".$_POST['txtEmail']."','".$_POST['txtDt']."','".$stringNgaySinh."',".$MaTinhThanh.")";
						$CheckThemThanhCong = DataProvider::ExecuteQuery($sql);
						
						if($CheckThemThanhCong==1)
						{
							$sql = "select MaTK,LoaiTaiKhoan from taikhoan where Username='".$_POST['txtUsername']."'";
							$kq = DataProvider::ExecuteQuery($sql);
							$row=mysqli_fetch_array($kq);
							$_SESSION['MaTK']=$row['MaTK'];
							$_SESSION['LoaiTaiKhoan']=$row['LoaiTaiKhoan'];
							$_SESSION['Username']=$_POST['txtUsername'];
							header("location: http://localhost:81/ShopDienThoai/index.php");
							ob_end_flush();
						}
					}

			?>

		</div>
		</div>
	</div>
</body>
</html>