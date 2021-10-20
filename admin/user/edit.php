<?php require_once '../inc/header.php'; ?>
<?php require_once '../inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Cập nhật người dùng</h2>
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
                            <div class="col-md-12">
                                <?php
                                #SELECT
                                $id = $_GET['id'];
                                $select = "SELECT * FROM users WHERE id ={$id}";
                                if ($mysqli->query($select)) {
                                    $infoUser = mysqli_fetch_assoc($mysqli->query($select));
                                }

                                #UPDATE
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
                                    if (empty($error)) {
                                        $query = "UPDATE users SET username = '{$username}', password = '{$password}', fullname = '{$fullname}' WHERE id = '{$id}'";
                                        $result = $mysqli->query($query);
                                        if ($result) {
                                            HEADER("Location: index.php?msg=Cap nhat thong tin nguoi dung thanh cong!");
                                        } else {
                                            echo "Loi, khong the sua thong tin nguoi dung";
                                        }
                                    }
                                }
                                ?>
                                <form method="POST" role="form">
                                    <div class="form-group">
                                        <label>Tên người dùng</label>
                                        <input type="text" value="<?php echo $infoUser['username'] ?>" name="username" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" value="<?php echo $infoUser['password'] ?>" name="password" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Tên đầy đủ</label>
                                        <input type="text" value="<?php echo $infoUser['fullname'] ?>" name="fullname" class="form-control" />
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Sửa</button>
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