<?php require_once '../inc/header.php'; ?>
<?php require_once '../inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm liên hệ</h2>
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
                                if ($_POST['name']) {
                                    $name = $_POST['name'];
                                    $website = $_POST['website'];
                                    $email = $_POST['email'];
                                    $content = $_POST['content'];
                                } else {
                                    $error['name'] = 'Chua nhap ten lien he';
                                    $error['website'] = 'Chua nhap dia chi website';
                                    $error['email'] = 'Chưa nhập email';
                                    $error['content'] = 'Chưa nhập content';
                                }
                                if (empty($error)) {
                                    $query = "INSERT INTO contact (name,website,email,content) VALUE('{$name}','{$website}','{$email}','{$content}')";
                                    $result = $mysqli->query($query);
                                    if ($result) {
                                        HEADER("Location: index.php?msg=Thêm liên hệ thành công!");
                                    } else {
                                        echo "Lỗi, Không thể thêm liên hệ";
                                    }
                                }
                            }
                            ?>
                            <div class="col-md-12">
                                <form method="POST" role="form" enctype="multipart/form">
                                    <div class="form-group">
                                        <label>Tên </label><br />
                                        <input type="text" name="name" class="form-control" />
                                        <?php echo isset($error['name']) ? $error['name'] : '' ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Email </label><br />
                                        <input type="text" name="email" class="form-control" />
                                        <?php echo isset($error['email']) ? $error['email'] : '' ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Website </label><br />
                                        <input type="text" name="website" class="form-control" />
                                        <?php echo isset($error['website']) ? $error['website'] : '' ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea class="form-control" rows="3" name="content"></textarea>
                                        <?php echo isset($error['content']) ? $error['content'] : '' ?>
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