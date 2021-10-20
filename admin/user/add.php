<?php require_once '../inc/header.php'; ?>
<?php require_once '../inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm người dùng</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <?php
                            if (isset($_POST['submit'])) {
                                $error = array();
                                if ($_POST['username']) {
                                    $username = $_POST['username'];
                                    $password = md5($_POST['password']);
                                    $fullname = $_POST['fullname'];
                                } else {
                                    $error['username'] = 'Chua nhap ten nguoi dung';
                                    $error['password'] = 'Chua nhap mat khau';
                                    $error['fullname'] = 'Chua nhap ten day du';
                                }
                                //Bắt lỗi trùng tài khoản
                                $query1 = "SELECT * FROM users WHERE username='$username'";
                                $result1 = $mysqli->query($query1);
                                $count = mysqli_num_rows($result1);
                                if ($count != 0) {
                                    echo "Tài khoản đã tồn tại, vui lòng chọn tài khoản khác";
                                } else {

                                    if (empty($error)) {
                                        $query = "INSERT INTO users (username,password,fullname) VALUE('{$username}','{$password}','{$fullname}')";
                                        $result = $mysqli->query($query);
                                        if ($result) {
                                            HEADER("Location: index.php?msg=Them nguoi dung thanh cong!");
                                        } else {
                                            echo "Loi, khong the them nguoi dung";
                                        }
                                    }
                                }
                            }
                            ?>
                            <div class="col-md-12">
                                <form method="post" action role="form">

                                    <div class="form-group">
                                        <label>Tên người dùng</label>
                                        <input type="text" name="username" class="form-control" />
                                        <?php echo isset($error['username']) ? $error['username'] : '' ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" name="password" class="form-control" />
                                        <?php echo isset($error['password']) ? $error['password'] : '' ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Tên đầy đủ</label>
                                        <input type="text" name="fullname" class="form-control" />
                                        <?php echo isset($error['fullname']) ? $error['fullname'] : '' ?>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Thêm</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<?php require_once '../inc/footer.php'; ?>