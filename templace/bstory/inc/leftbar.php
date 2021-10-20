<div class="gadget">
  <h2 class="star">Danh mục truyện</h2>
  <div class="clr"></div>
  <ul class="sb_menu">
    <?php
    $query = "SELECT * FROM cat ";
    $result = $mysqli->query($query);
    while ($arCat = mysqli_fetch_assoc($result)) {
      $cat_id = $arCat['cat_id'];
      $name = $arCat['name'];
      $nameReplaces = utf8ToLatin($name);
      $url = $nameReplaces.'-c-'.$cat_id;
    ?>
      <li>
        <h3><a href="<?php echo $url; ?>"><?php echo $arCat['name']; ?></a></h3>
      </li>
      <hr />
    <?php
    }
    ?>
  </ul>
</div>

<div class="gadget">
  <h2 class="star"><span>Truyện mới</span></h2>
  <div class="clr"></div>
  <ul class="ex_menu">
    <?php
    $query = "SELECT * FROM story ORDER BY story_id DESC LIMIT 5";
    $result = $mysqli->query($query);
    while ($arStory = mysqli_fetch_assoc($result)) {
      $nameReplace = utf8ToLatin($arStory['name']);
      $url = $nameReplace . '-' . $arStory['story_id'];

    ?>
      <li>
        <h3><a href="<?php echo $url; ?>"><?php echo $arStory['name']; ?></a><br /></h3>
      </li>
      <hr />
    <?php
    }
    ?>
  </ul>
</div>