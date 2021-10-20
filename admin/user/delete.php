<h1>Xóa tên người dùng </h1>
<?php
require_once '../../util/dbConnect.php';
$id = $_GET['id'];
$query = "DELETE FROM users WHERE id = '{$id}'";
$result = $mysqli->query($query);
if ($result) {
    HEADER("Location: index.php?msg=Xoá thông tin người dùng thành công !");
} else {
    HEADER("Location: index.php?msg=Xoá thông tin người dùng không thành công!");
}
?>