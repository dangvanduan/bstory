
<?php
include_once 'templace/bstory/inc/header.php';
?>
<div class="content_resize">
  <div class="mainbar">
    <?php
    // $query = "SELECT * FROM story WHERE story_id ={$_GET['story_id']} ";
    // $result = $mysqli->query($query);
    // $arStory = mysqli_fetch_assoc($result);
    // $story_id = $_GET['story_id'];
    // Tổng số dòng
    $queryTSD = "SELECT count(*) AS TSD FROM story ";
    $resultTSD = $mysqli->query($queryTSD);
    $arTmp = mysqli_fetch_assoc($resultTSD);
    $tongSoDong = $arTmp['TSD'];
    // row count
    $row_count = 5;
    // Tổng số trang
    $tongsoTrang = ceil($tongSoDong / $row_count);
    // trang hiện tại
    $current_page = 1;
    if (isset($_GET['page'])) {
      $current_page = $_GET['page'];
    }
    //offset
    $offset = ($current_page - 1) * $row_count;

    ?>
    <?php
    $queryStory = "SELECT * FROM story ORDER BY story_id DESC LIMIT $offset, $row_count";
    $resultStory = $mysqli->query($queryStory);
    while ($arStory =  mysqli_fetch_assoc($resultStory)) {
      $nameReplace = utf8ToLatin($arStory['name']);
      $url =$nameReplace . '-' . $arStory['story_id'];
    ?>
      <div class="article">
        <h2><?php echo $arStory['name'] ?></h2>
        <p class="infopost"><?php echo "Ngày đăng:" . $arStory['created_at'] ?></p>
        <div class="clr"></div>
        <div class="img"><img src="file/upload/<?php echo $arStory['picture'] ?>" width="161" height="192" alt="" class="fl" /></div>
        <div class="post_content">
          <?php echo $arStory['preview_text'] ?>
          <p class="spec"><a href="<?php echo $url; ?>" class="rm">Chi tiết</a></p>

        </div>
        <div class="clr"></div>
      </div>
    <?php
    }
    ?>

    <p class="pages">
      <?php
      $i = 1;
      for ($i = 1; $i <= $tongsoTrang; $i++) {
      ?>
        <?php
        if ($i == $current_page) {
        ?>
          <span><?php echo $i; ?></span>
        <?php
        } else {
        ?>
          <a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
      <?php
        }
      }
      ?>
    </p>
  </div>
  <div class="sidebar">
    <?php include_once  'templace/bstory/inc/leftbar.php'; ?>
  </div>
  <div class="clr"></div>
</div>
<?php include_once  'templace/bstory/inc/footer.php'; ?>