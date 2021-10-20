
<?php
include_once 'templace/bstory/inc/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="templace/admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="templace/admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="templace/bstory/css/changepass.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <title>Thay đổi mật khẩu</title>
</head>

<body>
    <?php
    $mess = "";


    if (isset($_POST['submit'])) {
        if ($_POST['password'] == '') {
            $mess = 'Vui lòng nhập đầy đủ các trường';
        } elseif (isset($_POST['password'])) {
            if (isset($_SESSION['users'])) {
                $info = $_SESSION['users'];

                if (md5($_POST['password']) == $info['password']) {
                    $mess = '';
                    if (isset($_POST['newpassword']) && isset($_POST['repassword'])) {
                        if ($_POST['newpassword'] == $_POST['repassword']) {
                            $username = $info['username'];
                            $newpassword = md5($_POST["newpassword"]);
                            $fullname = $info["fullname"];
                            $id = $info['id'];
                            $query = "UPDATE users SET username = '{$username}', password = '{$newpassword}', fullname = '{$fullname}' WHERE id = '{$id}'";
                            $result = $mysqli->query($query);
                            if ($result) {
                                HEADER("Location: logout.php?msg=Thay đổi mật khẩu thành công");
                            } else {
                                $mess = "Lỗi, không thể thay đổi mật khẩu ";
                            }
                        } else {
                            $mess = 'Mật khẩu mới và nhập lại mật khẩu mới không khớp';
                        }
                    }
                } elseif (md5($_POST['password']) != $info['password']) {
                    $mess = 'Mật khẩu cũ sai';
                } else {
                    $mess = 'Vui lòng nhập đầy đủ các trường';
                }
            } else {
                $mess = 'Lỗi';
            }
        } else {
            $mess = 'Vui lòng nhập mật khẩu cũ';
        }
    }

    ?>
    <div class="main">
        <img src="templace/admin/assets/img/find_user.png" width="200 px" ,height="300px" alt="">
        <label for="">
            <h2>Thay đổi mật khẩu</h2>
        </label>
        <h6><span style="color:red;"><?php echo $mess; ?></span></h6>
        <form method="POST" action role="form">

            <div class="form-group">
                <label>Mật khẩu cũ</label>
                <input type="password" name="password" class="form-control" />

            </div>
            <div class="form-group">
                <label>Mật khẩu mới</label>
                <input type="password" name="newpassword" class="form-control" />

            </div>
            <div class="form-group">
                <label>Nhập lại mật khẩu mới</label>
                <input type="password" name="repassword" class="form-control" />

            </div>
            <button type="submit" name="submit" class="btn btn-success btn-md">Xác nhận</button>
        </form>
    </div>
    <div class="rightbar">
    </div>

    </div>

</body>

</html>
<?php include_once  'templace/bstory/inc/footer.php'; ?>