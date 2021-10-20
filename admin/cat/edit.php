<?php require_once '../inc/header.php'; ?>
<?php require_once '../inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Cập nhật danh mục</h2>
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
                                $cat_id = $_GET['cat_id'];
                                $select = "SELECT * FROM cat WHERE cat_id ={$cat_id}";
                                if ($mysqli->query($select)) {
                                    $infoCat = mysqli_fetch_assoc($mysqli->query($select));
                                }

                                #UPDATE
                                if (isset($_POST['submit'])) {
                                    $error = array();
                                    if ($_POST['name']) {
                                        $name = $_POST['name'];
                                    } else {
                                        $error['name'] = 'Chua nhap ten danh muc';
                                    }
                                    if (empty($error)) {
                                        $query = "UPDATE cat SET name = '{$name}' WHERE cat_id = '{$cat_id}'";
                                        $result = $mysqli->query($query);
                                        if ($result) {
                                            HEADER("Location: index.php?msg=Cap nhat danh muc thanh cong!");
                                        } else {
                                            echo "Loi, khong the sua danh muc";
                                        }
                                    }
                                }

                                ?>
                                <form role="form" method="POST">
                                    <div class="form-group">
                                        <label>Tên danh mục</label><br />
                                        <input type="text" value="<?php echo $infoCat['name'] ?>" name="name" class="form-control" />
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