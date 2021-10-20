<h1>Xóa tên danh mục </h1>
<?php
require_once '../../util/dbConnect.php';
$cat_id = $_GET['cat_id'];
$query = "DELETE FROM cat WHERE cat_id = '{$cat_id}'";
$result = $mysqli->query($query);
if ($result) {
    HEADER("Location: ../cat.php?msg=Xoa danh muc thanh cong!");
}else {
    HEADER("Location: ../cat.php?msg=Xoa danh muc khong thanh cong!");
}
?>
