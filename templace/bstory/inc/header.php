<?php require_once "util/dbConnect.php"; ?>
<?php require_once "util/utf8ToLatinUtil.php"; ?>

<head>
  <title>BStory | VinaEnter Edu</title>
  
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="templace/bstory/css/style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="templace/bstory/css/coin-slider.css" />
  <script type="text/javascript" src="templace/bstory/js/jquery-1.4.2.min.js"></script>
  <script type="text/javascript" src="templace/bstory/js/script.js"></script>
  <script type="text/javascript" src="templace/bstory/js/coin-slider.min.js"></script>
</head>

<body>
  <div class="main">
    <div class="header">
      <div class="header_resize">
        <div class="menu_nav">
          <ul>
            <li><a href="trang-chu"><span>Trang chủ</span></a></li>
            <li><a href="lien-he"><span>Liên hệ</span></a></li>
            <?php


            if (isset($_SESSION['users'])) {
              $info = $_SESSION['users'];
            ?>
              <li><a href="thong-tin"><span>Hi <?php echo $info['fullname']; ?></span></a></li>
            <?php
            } else { ?>
              <li><a href="dang-nhap"><span>Đăng nhập</span></a></li>
            <?php } ?>
          </ul>
        </div>
        <div class="logo">
          <h1><a href="/">BStory <small>Dự án khóa PHP tại VinaEnter Edu</small></a></h1>
        </div>
        <div class="clr"></div>
        <div class="slider">
          <div id="coin-slider"> <a href="#"><img src="templace/bstory/images/slice4.jpg" width="940" height="310" alt="" /> </a> <a href="#"><img src="templace/bstory/images/slice5.jpg" width="940" height="310" alt="" /> </a> <a href="#"><img src="templace/bstory/images/slice6.jpg" width="940" height="310" alt="" /> </a> </div>
          <div class="clr"></div>
        </div>
        <div class="clr"></div>
      </div>
    </div>
    <div class="content">