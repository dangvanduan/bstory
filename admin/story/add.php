<?php require_once '../inc/header.php'; ?>
<?php require_once '../inc/leftbar.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Thêm truyện</title>

</head>

<body>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Thêm truyện</h2>
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
                                        $cat_id = $_POST['cat_id'];
                                        $counter = $_POST['counter'];
                                        $preview_text = $_POST['preview_text'];
                                    } else {
                                        $error['name'] = 'Chua nhap ten truyen';
                                        $error['cat_id'] = 'Chua nhap danh muc truyen';
                                        $error['counter'] = 'Chua luot doc truyen';
                                        $error['preview_text'] = 'Chưa nhập nội dung truyện';
                                        $error['picture'] = 'Vui lòng chọn ảnh';
                                    }
                                    // if ($_FILES['picture']['name']) {
                                    $filename = $_FILES['picture']['name'];
                                    $arFile = explode('.', $filename);
                                    $Typefile = end($arFile);
                                    $newFileName = $_POST['name'] . '-' . time() . '.' . $Typefile;
                                    $tmpName = $_FILES['picture']['tmp_name'];
                                    $resultUpload = move_uploaded_file($tmpName, '../../file/upload/' . $newFileName);

                                    if ($resultUpload) {
                                        $query = "INSERT INTO story (name,cat_id,counter,preview_text,picture) VALUE('{$name}','{$cat_id}','{$counter}','{$preview_text}','{$newFileName}')";
                                        $result1 = $mysqli->query($query);
                                    }
                                    if (isset($result1)) {
                                        HEADER("Location: index.php?msg=Thêm thành công");
                                    } else {

                                        echo "Lỗi! Không thể thêm truyện";
                                    }
                                    // }
                                }
                                ?>

                                <div class="col-md-12">
                                    <form method="POST" role="form" enctype="multipart/form-data" class="frmAdd">
                                        <div class="form-group">
                                            <label>Tên truyện</label><br />
                                            <input type="text" name="name" class="form-control" />
                                            <?php echo isset($error['name']) ? $error['name'] : '' ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Danh mục truyện</label>
                                            <select class="form-control" name="cat_id">
                                                <?php
                                                $query = "SELECT * FROM cat";
                                                $result = $mysqli->query($query);
                                                while ($arCAT = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <option value="<?php echo $arCAT['cat_id'] ?>">
                                                        <?php echo $arCAT['name'] ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <?php echo isset($error['cat_id']) ? $error['cat_id'] : '' ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Lượt đọc</label>
                                            <input class="form-control" rows="3" name="counter"></input>
                                            <?php echo isset($error['counter']) ? $error['counter'] : '' ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Hình ảnh</label>
                                            <input type="file" name="picture"></input>
                                            <?php echo isset($error['picture']) ? $error['picture'] : '' ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Chi tiết</label><br/>
                                            <textarea name="preview_text"></textarea>
                                            <script>
                                                CKEDITOR.replace('preview_text');
                                            </script>
                                            <!-- <textarea class="form-control" rows="3" name="preview_text"></textarea> -->
                                            <?php echo isset($error['preview_text']) ? $error['preview_text'] : '' ?>
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-success btn-md">Thêm</button>
                                    </form>

                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('.frmAdd').validate({
                                                rules: {
                                                    name: {
                                                        required: true,

                                                    },
                                                    cat_id: {
                                                        required: true,
                                                    },
                                                    counter: {
                                                        required: true,
                                                    },
                                                    picture:{
                                                        required: true,
                                                    },
                                                    preview_text: {
                                                        required: true,
                                                    }

                                                }
                                            });
                                        });
                                    </script>

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
</body>

</body>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

</html>
<!-- /. PAGE WRAPPER  -->
<?php require_once '../inc/footer.php'; ?>