<h1>Xóa Liên hệ </h1>
<?php
require_once '../../util/dbConnect.php';
$contact_id = $_GET['contact_id'];
$query = "DELETE FROM contact WHERE contact_id = '{$contact_id}'";
$result = $mysqli->query($query);
if ($result) {
    HEADER("Location: index.php?msg=Xoá liên hệ thành công !");
} else {
    HEADER("Location: index.php?msg=Xoá liên hệ không thành công!");
}
?>