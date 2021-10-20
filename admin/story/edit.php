<?php require_once '../inc/header.php'; ?>
<?php require_once '../inc/leftbar.php'; ?>

<head>
    <meta charset="utf-8">
    <title>Cập nhật truyện</title>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
</head>

<body>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Cập nhật truyện</h2>
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
                                    $story_id = $_GET['story_id'];
                                    $select = "SELECT * FROM story WHERE story_id ={$story_id}";
                                    if ($mysqli->query($select)) {
                                        $infoStory = mysqli_fetch_assoc($mysqli->query($select));
                                    }
                                    #UPDATE
                                    if (isset($_POST['submit'])) {

                                        $name = $_POST['name'];
                                        $cat_id = $_POST['cat_id'];
                                        $picture = $_FILES['picture']['name'];
                                        $counter = $_POST['counter'];
                                        $preview_text = $_POST['preview_text'];

                                        if ($picture == '') {
                                            $query1 = "UPDATE story SET name = '{$name}', cat_id = '{$cat_id}', counter = '{$counter}', preview_text='{$preview_text}' WHERE story_id = '{$story_id}'";

                                            $result1 = $mysqli->query($query1);
                                            if ($result1) {
                                                HEADER("LOCATION: index.php?msg=Sửa thành công");
                                            } else {
                                                echo "Lỗi! Không thể sửa truyện";
                                            }
                                        } else if ($picture != '') {
                                
                                            $arFile = explode('.', $picture);
                                            $Typefile = end($arFile);
                                            $newFileName = $infoStory['name']  . time() . '.' . $Typefile;

                                            $tmpName = $_FILES['picture']['tmp_name'];
                                            $resultUpload = move_uploaded_file($tmpName, '../../file/upload/' . $newFileName);
                                            $query2 = "UPDATE story SET name = '{$name}', cat_id = '{$cat_id}', counter = '{$counter}', picture='{$newFileName}', preview_text='{$preview_text}' WHERE story_id = '{$story_id}'";

                                            $result2 = $mysqli->query($query2);
                                            if ($result2) {
                                                HEADER("LOCATION: index.php?msg=Sửa thành công");
                                            } else {
                                                echo "Lỗi! Không thể sửa truyện";
                                            }
                                        
                                    }
                                }

                                    ?>
                                    <form method="POST" role="form" enctype="multipart/form-data" class="frmEdit">
                                        <div class="form-group">
                                            <label>Tên truyện</label><br />
                                            <input type="text" value="<?php echo $infoStory['name'] ?>" name="name" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label>Danh mục truyện</label>
                                            <select class="form-control" name="cat_id">
                                                <?php
                                                $query = "SELECT * FROM cat";
                                                $result = $mysqli->query($query);
                                                while ($arCAT = mysqli_fetch_assoc($result)) {
                                                ?>
                                                    <option selected value="<?php echo $arCAT['cat_id'] ?>">
                                                        <?php echo $arCAT['name'] ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>


                                        </div>
                                        <div class="form-group">
                                            <label>Lượt đọc</label>
                                            <input type="text" value="<?php echo $infoStory['counter'] ?>" name="counter" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label>Hình ảnh</label><br />
                                            <?php echo $infoStory['picture'] ?>
                                            <input type="file" value="<?php echo $infoStory['picture'] ?>" name="picture" class="form-control" />

                                        </div>
                                        <div class="form-group">
                                            <label>Chi tiết</label>
                                            <textarea name="preview_text" id="editor1" class="form-control " value=""><?php echo $infoStory['preview_text'] ?></textarea>
                                            <script type="text/javascript">
                                                CKEDITOR.replace('editor1', {
                                                    filebrowserBrowseUrl: '/library/ckfinder_php_3.5.1.2/ckfinder/ckfinder.html',
                                                    filebrowserImageBrowseUrl: '/library/ckfinder_php_3.5.1.2/ckfinder/ckfinder.html?type=Images',
                                                    filebrowserUploadUrl: '/library/ckfinder_php_3.5.1.2/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                                    filebrowserImageUploadUrl: '/library/ckfinder_php_3.5.1.2/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
                                                });
                                            </script>
                                            <!-- <script>
                                                CKEDITOR.replace('preview_text');
                                            </script> -->
                                            <!-- <textarea class="form-control" rows="3" name="preview_text"></textarea> -->

                                        </div>
                                        <button type="submit" name="submit" class="btn btn-success btn-md">Sửa</button>
                                    </form>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('.frmEdit').validate({
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
<!-- /. PAGE WRAPPER  -->
<?php require_once '../inc/footer.php'; ?>