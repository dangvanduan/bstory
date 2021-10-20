<?php require_once '../inc/header.php'; ?>
<?php require_once '../inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm danh mục</h2>
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
                                } else {
                                    $error['name'] = 'Chua nhap ten danh muc';
                                }
                                if (empty($error)) {
                                    $query = "INSERT INTO cat (name) VALUE('{$name}')";
                                    $result = $mysqli->query($query);
                                    if ($result) {
                                        HEADER("Location: index.php?msg=Them danh muc thanh cong!");
                                    } else {
                                        echo "Loi, khong the them danh muc";
                                    }
                                }
                            }
                            ?>
                            <div class="col-md-12">
                                <form method="Post" role="form">

                                    <div class="form-group">
                                        <label>Tên danh mục</label><br />
                                        <input type="text" name="name" class="form-control" />
                                        <?php echo isset($error['name']) ? $error['name'] : '' ?>                               
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