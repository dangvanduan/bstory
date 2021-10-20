<?php
#b1 Khởi tạo đối tượng mysql
$mysqli = new mysqli(
    'localhost',
    'root',
    '',
    'bstory'
);
#b2. Thiết lập font chữ tiếng việt
$mysqli->set_charset('utf8');
#b3. Kiểm tra kết nối
if(mysqli_connect_errno()){
    echo "Lỗi";
    exit();
}
session_start();
?>