<?php

// Định nghĩa một hằng số bảo vệ project ngăn chặn ngi khác xâm nhập được địa chỉ /admin/index.php nếu ko phải là admin
define("IN_SITE", true);
 
// Lấy module và action trên URL
$module = isset($_GET['m']) ? $_GET['m'] : '';
$action = isset($_GET['a']) ? $_GET['a'] : '';
 
// Trường hợp người dùng không truyền module và action
// thì ta lấy module mặc định là common
// và action mặc định là login
if (empty($module) || empty($action)){
    $module = 'common';
    $action = 'login';
}
 
// Tạo đường dẫn và lưu vào biến $path
$path = 'modules/'.$module . '/' . $action . '.php';
 
// Trường hợp URL chạy đúng
if (file_exists($path)) {
    include_once ('../libs/session.php');
    include_once ('../libs/database.php');
    include_once ('../libs/role.php');
    include_once ('../libs/helper.php');
    include_once ($path);
} 
else {
    // Trường hợp URL không tồn tại thì thông báo lỗi
    include_once ('modules/common/404.php');
}

?>