<?php

require_once 'dbconfig.php';

if($_POST)
{
    $poi_name 		= mysql_real_escape_string($_POST['poi_name']);
    $group_id       = mysql_real_escape_string($_POST['group_id']);
    $poi_kana       = mysql_real_escape_string($_POST['poi_kana']);
    $poi_lon        = mysql_real_escape_string($_POST['poi_lon']);
    $icon_lat       = mysql_real_escape_string($_POST['icon_lat']);
    $icon_lon       = mysql_real_escape_string($_POST['icon_lon']);
    $poi_lat        = mysql_real_escape_string($_POST['poi_lat']);
    $point_type     = mysql_real_escape_string($_POST['point_type']);
    // $icon_type      = mysql_real_escape_string($_POST['icon_type']);
    $ev_flag        = mysql_real_escape_string($_POST['ev_flag']);
    $next_voice_id  = mysql_real_escape_string($_POST['next_voice_id']);
    $voice_id       = mysql_real_escape_string($_POST['voice_id']);
    $admin_id       = mysql_real_escape_string($_POST['admin_id']);
    $tourist_detail = mysql_real_escape_string($_POST['tourist_detail']);
    $business_hours = mysql_real_escape_string($_POST['business_hours']);
    $parking        = mysql_real_escape_string($_POST['parking']);
    $closing_day    = mysql_real_escape_string($_POST['closing_day']);
    $pay            = mysql_real_escape_string($_POST['pay']);
    $credit_card    = mysql_real_escape_string($_POST['credit_card']);

    $joining_date 	= date('Y-m-d H:i:s');
	
	//password_hash see : http://www.php.net/manual/en/function.password-hash.php
	$poi_lat 	= password_hash( $poi_lat, PASSWORD_BCRYPT, array('cost' => 11));
	
    try
    {
        $stmt = $db_con->prepare("SELECT * FROM tbl_users WHERE poi_name=:pname");
        $stmt->execute(array(":pname"=>$poi_name));
        $count = $stmt->rowCount();
		
        if($count==0){
            $stmt = $db_con->prepare("INSERT INTO tbl_users(poi_name, group_id, poi_kana,  joining_date, poi_lat, poi_lon, icon_lat, icon_lon,  point_type, next_voice_id, voice_id, admin_id, ev_flag, tourist_detail,business_hours,parking,closing_day,pay,credit_card) VALUES(:pname, :grid, :pkana, :jdate, :plat, :plon, :ilat, :ilon,  :ptype, :nvid, :vid, :adid, :eflag, :tode,:busho, :park, :cloday, :pay, :crecard )");
            $stmt->bindParam(":pname",$poi_name);
            $stmt->bindParam(":grid",$group_id);

            $stmt->bindParam(":pkana",$poi_kana); 
            $stmt->bindParam(":jdate",$joining_date);

            $stmt->bindParam(":plat",$poi_lat);
            $stmt->bindParam(":plon",$poi_lon);

            $stmt->bindParam(":ilat",$icon_lat);
            $stmt->bindParam(":ilon",$icon_lon);

            $stmt->bindParam(":ptype",$point_type);
            
            $stmt->bindParam(":eflag",$ev_flag);

            $stmt->bindParam(":nvid",$next_voice_id);
            $stmt->bindParam(":vid",$voice_id);
            $stmt->bindParam(":adid",$admin_id);

            $stmt->bindParam(":tode",$tourist_detail);
            $stmt->bindParam(":busho",$business_hours);
            $stmt->bindParam(":park",$parking);
            $stmt->bindParam(":cloday",$closing_day);
            $stmt->bindParam(":pay",$pay);
            $stmt->bindParam(":crecard",$credit_card);

            if($stmt->execute())
            {
                echo "registered";
            }
            else
            {
                echo "Query could not execute !";
            }

        }
        else{

            echo "1"; //  not available
        }

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>

