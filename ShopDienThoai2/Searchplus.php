<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tìm Kiếm Nâng Cao</title>
    <link rel="stylesheet" href="./CSS/Style.css">
</head>
<body>
    <div id="Wrapper">
        <?php
            include_once("DataProvider.php");
            include_once("Header.php");
        ?>
    <div id="Wrapper-Searchplus">
        <div class="itemSearchplus">
            <form action="Searchplus.php" id="formSearchplus" name="formSearchplus" method="get">
                <table cellspacing="20">
                    <tr>
                        <td>Tên Sản Phẩm</td>
                        <td><input name="TuKhoa" id="TuKhoa" type="text" /></td>
                    </tr>
                    <tr>
                        <td>Hãng</td>
                        <td><select select name="cbohang" id="cbohang">
                            <option value="">(Chọn hãng)</option>
                            <?php
                                $a = 1;
                                $sql = "SELECT TenLoai FROM `loaisanpham`";
                                $list = DataProvider::ExecuteQuery($sql);
                                while ($row = mysqli_fetch_array($list))
                                {
                            ?>
                                    <option value="<?php echo $row["TenLoai"]; ?>"><?php echo $row["TenLoai"]; ?></option> 
                            <?php
                                }
                            ?>
                        </select>
                        </td>
                        <td><font color="#FE1616"></font></td>
                    </tr>

                    <tr>
                        <td>Giá Từ</td>
                        <td><select name="cbomin" id="cbomin">
                            <option value="1000000">1.000.000đ</option>
                            <option value="2000000">2.000.000đ</option>
                            <option value="3000000">3.000.000đ</option>
                            <option value="4000000">4.000.000đ</option>
                            <option value="5000000">5.000.000đ</option>
                        </select></td>
                        <td>Đến</td>
                        <td><select name="cbomax" id="cbomax">
                            <option value="10000000">10.000.000đ</option>
                            <option value="12500000">12.500.000đ</option>
                            <option value="13500000">13.500.000đ</option>
                            <option value="16000000">16.000.000đ</option>
                        </select></td>
                    </tr>                    
                </table>
                    <input type="submit" name="spbutton" id="spbutton" value="Tìm Kiếm" />
        </div>
		<div class="Content">
		<ul>
        <?php
            $phone_name = "";
            $phone_branch = "";
            $phone_min = "";
            $phone_max = "";

            if(isset($_GET['txtphonename'])){
                $phone_name = $_GET['txtphonename'];
            }

            if(isset($_GET['cbohang'])){
                $phone_branch = $_GET['cbohang'];
            }

            if(isset($_GET['cbomin'])){
                $phone_min = $_GET['cbomin'];
            }

            if(isset($_GET['cbomax'])){
                $phone_max = $_GET['cbomax'];
            }

            if(empty($phone_min) && isset($_GET['spbutton']))
            {
                $sql = "SELECT sp.MaSP,sp.TenSP,sp.TenHinhAnh,format(sp.GiaBan,'0','de_DE')as GiaBan FROM sanpham sp,loaisanpham l WHERE sp.TinhTrang=1 and l.MaLoai=sp.MaLoai and (sp.GiaBan >= '10000' and sp.GiaBan <= '16000000')";

            }
            else{
                $sql = "SELECT sp.MaSP,sp.TenSP,sp.TenHinhAnh,format(sp.GiaBan,'0','de_DE')as GiaBan FROM sanpham sp,loaisanpham l WHERE sp.TinhTrang=1 and l.MaLoai=sp.MaLoai and (sp.GiaBan >= '".$phone_min."' and sp.GiaBan <= '".$phone_max."')";

            }
            
            if(isset($phone_name) && isset($_GET['spbutton']))
            {
                $sql = $sql." and sp.TenSP like'%".$phone_name."%' ";
            }
            
            if(isset($phone_branch) && isset($_GET['spbutton']))
            {
                $sql = $sql." and l.TenLoai like'%".$phone_branch."%' ";
            }

            if(isset($_GET['spbutton']))
            {
            	$result = DataProvider::ExecuteQuery($sql);
            	$rowcount = $result->num_rows;
           		if($rowcount != 0)
                {
                    while($row=mysqli_fetch_array($result))
                    {
                        $MaSP=$row['MaSP'];
                        $TenSP=$row['TenSP'];
                        $TenHinhAnh=$row['TenHinhAnh'];
                        $GiaBan=$row['GiaBan'];
                        echo "<li class='item'><a href='index.php?a=1&MaSP=".$MaSP."'><img src='./Image/".$TenHinhAnh."' width='150' height='150' /><h3>".$TenSP."</h3><h4>".$GiaBan."</h4></a>";
                    }
                }
                else
                {
                    echo "<h2>Không Tìm Thấy Sản Phẩm<h2>";
                }
            }
            
        ?>

        <?php
        
        ?>
		</ul>
		</div>
		</div>
        </div>
    </div>
    <?php
        include_once("Footer.php");
    ?>
</body>
</html>