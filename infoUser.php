<?php
require_once 'util/checkUserBstory.php';
include_once 'templace/bstory/inc/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="templace/bstory/css/infoUser.css" rel="stylesheet" type="text/css" />
    <title>Thông tin người dùng</title>
</head>
<body>

<div class="main">
<img src="templace/admin/assets/img/find_user.png" width="200 px",height="300px" alt="">
<label for=""><h2>Thông tin người dùng</h2></label>
<label for="" ><font size="4" >Tên tài khoản:</font></label>
<label for="" ><font size="4" color="red">
<?php
  $info = $_SESSION['users'];
  echo $info['username'];
?>
</font></label>

<br/>
<label for="" ><font size="4" >Tên đầy đủ:</font></label>
<label for="" ><font size="4" color="red">
<?php
    echo $info['fullname'];
?>
</font></label>


<br/>
<!-- <button type="button" class="btn btn-primary btn-sm">Cập nhật thông tin</button> -->
<button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='doi-mat-khau/'" >Thay đổi mật khẩu</button>
<button type="button" class="btn btn-primary btn-sm1" onclick="window.location.href='logout.php'" >Đăng xuất</button>



<div class="rightbar">
</div>

</div>

</body>
</html>
<?php include_once  'templace/bstory/inc/footer.php'; ?>

