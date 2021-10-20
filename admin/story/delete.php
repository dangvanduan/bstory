<h1>Xóa tên truyện </h1>
<?php
require_once '../../util/dbConnect.php';
$story_id = $_GET['story_id'];
$query = "DELETE FROM story WHERE story_id = '{$story_id}'";
$result = $mysqli->query($query);
if ($result) {
    HEADER("Location: index.php?msg=Xoá truyện thành công !");
} else {
    HEADER("Location: index.php?msg=Xoá truyện không thành công!");
}
?>