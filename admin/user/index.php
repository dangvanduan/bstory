<?php require_once '../inc/header.php'; ?>
<?php require_once '../inc/leftbar.php'; ?>
<?php
$queryTSD = "SELECT count(id) AS TSD FROM users";
$resultTSD = $mysqli->query($queryTSD);
$tongsoDong = mysqli_fetch_assoc($resultTSD);

$limit_item = 5;
if (isset($_GET['page'])) {
    $current_page = $_GET['page'];
} else {
    $current_page = 1;
}
$tongsoTrang = ceil($tongsoDong['TSD'] / $limit_item);
$offset = ($current_page - 1) * $limit_item;

?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý người dùng</h2>
                <?php
                    if(isset($_GET['msg'])&&$_GET['msg']){
                        echo $_GET['msg'];
                    }
                ?>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="add.php" class="btn btn-success btn-md">Thêm</a>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <!-- <form method="post" action="">
                                        <input type="submit" name="search" value="Tìm kiếm" class="btn btn-warning btn-sm" style="float:right" />
                                        <input type="search" class="form-control input-sm" placeholder="Nhập tên truyện" style="float:right; width: 300px;" />
                                        <div style="clear:both"></div>
                                    </form><br /> -->
                                </div>
                            </div>

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên </th>             
                                        <th>Tên đầy đủ</th>                              
                                        <th width="160px">Chức năng</th>                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM users LIMIT $offset, $limit_item ";
                                    $result = $mysqli->query($query);
                                    while ($arUser = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr class="<?php echo $cl ?> gradeX">
                                            <td><?php echo $arUser['id'] ?></td>
                                            <td><?php echo $arUser['username']; ?></td>
                                            
                                            <td><?php echo $arUser['fullname']; ?></td>                        
                                            <td class="center">
                                                <a href="edit.php?id=<?php echo $arUser['id'] ?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                                <a href="delete.php?id=<?php echo $arUser['id'] ?>" onclick = "return confirm ('Bạn có thông tin người dùng này không ?')"  title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px"></div>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                        <ul class="pagination">
                                        <?php
                                            $active = "";
                                            for ($i = 1; $i <= $tongsoTrang; $i++) {
                                                if ($i == $current_page) {
                                                    $active = "active";
                                            ?>
                                                    <li class="paginate_button <?php echo $active ?>"><a href="admin/user?page=<?php echo $i; ?>"><?php echo $i ?></a></li>
                                                <?php
                                                } else {
                                                    // echo $tongsoTrang;
                                                ?>
                                                    <li class="paginate_button"><a href="admin/user?page=<?php echo $i; ?>"><?php echo $i ?></a></li>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>

</div>
<!-- /. PAGE INNER  -->
<?php require_once '../inc/footer.php'; ?>