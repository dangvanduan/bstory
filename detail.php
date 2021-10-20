
<?php include_once 'templace/bstory/inc/header.php'; ?>

<div id="fb-root"></div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="JS2YOiZf"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="nKYpBy2s"></script>
<script>
  document.getElementById("demo").innerHTML =
    "The full URL of this page is:<br>" + window.location.href;
</script>
<div class="content_resize">
  <div class="mainbar">
    <div class="article">
      <h1>Tiêu đề truyện</h1>
      <div class="clr"></div>
      <div class="vnecontent">
        <?php
        $story_id = $_GET['story_id'];
        $query = "SELECT * FROM story WHERE story_id='{$story_id}'";
        $result = $mysqli->query($query);
        while ($arStory = mysqli_fetch_assoc($result)) {
          $cat_id = $arStory['cat_id'];
        ?>
          <h3><?php echo $arStory['name'] ?></h3>
          <p>Lượt đọc: <?php echo $arStory['counter']; ?></p>
          <p>Ngày đăng: <?php echo $arStory['created_at']; ?></p>
          <p>Chi tiết: <?php echo $arStory['preview_text']; ?></p>
        <?php
        }
        ?>
      </div>
    </div>
    <div class="article">
      <h2><span>3</span> Truyện liên quan</h2>
      <div class="clr"></div>
      <?php
      
      $query2 = "SELECT * FROM story WHERE cat_id = '{$cat_id}' AND story_id!='{$story_id}'
      ORDER BY RAND(`story_id`)
      LIMIT 3 ";
      $result2 = $mysqli->query($query2);
      while ($arStory = mysqli_fetch_assoc($result2)) {
        $nameReplace = utf8ToLatin($arStory['name']);
        $url = $nameReplace . '-' . $story_id ;
      ?>
        <div class="comment"> <a href="#"><img src="file/upload/<?php echo $arStory['picture']; ?>" width="40" height="40" alt="" class="userpic" /></a>
          <h3><a href="<?php echo $url; ?>" title=""><?php echo $arStory['name']; ?></a></h3>
          <p><?php echo $arStory['preview_text'] ?></p>
        </div>
      <?php
      }
      ?>
    </div>
    <div class="comment">
      <div class="fb-like" data-href="http://localhost/" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
      <div class="fb-comments" data-href="window.location.href" data-width="" data-numposts="5"></div>
    </div>


  </div>
  <div class="sidebar">
    <?php include_once 'templace/bstory/inc/leftbar.php'; ?>
  </div>
  <div class="clr"></div>
</div>
<?php include_once 'templace/bstory/inc/footer.php'; ?>