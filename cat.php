<?php require_once 'templace/bstory/inc/header.php'; ?>
<div class="content_resize">
  <div class="mainbar">
    <div class="article">
      <?php

      $query = "SELECT * FROM cat WHERE cat_id={$_GET['cat_id']} ";
      $result = $mysqli->query($query);
      $arCat = mysqli_fetch_assoc($result);
      $cat_id = $_GET['cat_id'];

      // Tổng số dòng
      $queryTSD = "SELECT count(*) AS TSD FROM story WHERE cat_id={$cat_id} ";
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

      
      <h1><?php echo $arCat['name']; ?></h1>
      <?php
      $query1 = "SELECT * FROM story WHERE cat_id={$_GET['cat_id']} LIMIT $offset, $row_count";
      $result1 = $mysqli->query($query1);
      while ($arStory = mysqli_fetch_assoc($result1)) {
        $name = $arStory['name'];
        $story_id = $arStory['story_id'];
        $cat_id = $arStory['cat_id'];
        $nameReplaceStory = utf8ToLatin($name);
        $url = $nameReplaceStory . '-' . $story_id;
      ?>
        <h3><?php echo $arStory['name'] ?></h3>
        <p class="infopost">Ngày đăng: <?php echo $arStory['created_at'] ?>. Lượt đọc: <?php echo $arStory['counter'] ?></p>
        <div class="clr"></div>
        <div class="img"><img src="file/upload/<?php echo $arStory['picture'] ?>" width="161" height="192" alt="" class="fl" /></div>
        <div class="post_content">
          <p><?php echo $arStory['preview_text'] ?></p>
          <p class="spec"><a href="<?php echo $url; ?>" class="rm">Chi tiết</a></p>
        </div>
        <div class="clr"></div>
      <?php
      }
      ?>

    </div>
    <p class="pages">
      <?php
      $i = 1;
      for ($i = 1; $i <= $tongsoTrang; $i++) {
        $nameReplace = utf8ToLatin($arCat['name']);
        $url = $nameReplace . '-' . $cat_id . '-page-' . $i;
      ?>
        <?php
        if ($i == $current_page) {
        ?>
          <span><?php echo $i; ?></span>
        <?php
        } else {
        ?>
          <a href="<?php echo $url; ?>"><?php echo $i; ?></a>
      <?php
        }
      }
      ?>
    </p>
  </div>
  <div class="sidebar">
    <?php include_once 'templace/bstory/inc/leftbar.php'; ?>
  </div>
  <div class="clr"></div>
</div>
<?php require_once 'templace/bstory/inc/footer.php'; ?>