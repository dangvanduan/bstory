<?php require_once '../inc/header.php'; ?>
<?php require_once '../inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Cập nhật liên hệ</h2>
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
                                $contact_id = $_GET['contact_id'];
                                $select = "SELECT * FROM contact WHERE contact_id = {$contact_id}";
                                if ($mysqli->query($select)) {
                                    $infoContact = mysqli_fetch_assoc($mysqli->query($select));
                                }
                                #UPDATE
                                if (isset($_POST['submit'])) {
                                    $error = array();
                                    if ($_POST['name']) {
                                        $name = $_POST['name'];
                                        $email = $_POST['email'];
                                        $website = $_POST['website'];
                                        $content = $_POST['content'];                                     
                                    } else {
                                        $error['name'] = 'Chua nhap ten lien he';
                                        $error['email'] = 'Chua nhap email';
                                        $error['website'] = 'Chua nhap website';
                                        $error['content'] = 'Chua nhap noi dung';                                       
                                    }
                                    if (empty($error)) {
                                        $query = "UPDATE contact SET name = '{$name}', email = '{$email}', website = '{$website}',content='{$content}' WHERE contact_id = '{$contact_id}'";
                                        $result = $mysqli->query($query);
                                        if ($result) {
                                            HEADER("Location: index.php?msg=Cap nhat thong tin lien he thanh cong!");
                                        } else {
                                            echo "Lỗi, Không thể sửa thông tin liên hệ";
                                        }
                                    }
                                }
                                ?>
                                <form method="POST" role="form">
                                    <div class="form-group">
                                        <label>Tên </label><br />
                                        <input type="text" value="<?php echo $infoContact['name'] ?>" name="name" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" value="<?php echo $infoContact['email'] ?>" name="email" class="form-control" />                  
                                    </div>
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" value="<?php echo $infoContact['website'] ?>" name="website" class="form-control" />             
                                    </div>
                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <input type="text" value="<?php echo $infoContact['content'] ?>" name="content" class="form-control" />             
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