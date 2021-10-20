<?php include_once 'templace/bstory/inc/header.php'; ?>
<div class="content_resize">
  <div class="mainbar">
    <div class="article">
      <h2><span>Liên hệ</span></h2>
      <div class="clr"></div>
      <p>Nếu có thắc mắc hoặc góp ý, vui lòng liên hệ với chúng tôi theo thông tin dưới đây.</p>
    </div>
    <div class="article">
      <h2>Form liên hệ</h2>
      <div class="clr"></div>
      <?php
      if (isset($_POST['submit'])) {
        $error = array();
        if ($_POST['name']) {
          $name = $_POST['name'];
          $website = $_POST['website'];
          $email = $_POST['email'];
          $content = $_POST['content'];
        } else {
          $error['name'] = 'Chua nhap ten lien he';
          $error['website'] = 'Chua nhap dia chi website';
          $error['email'] = 'Chưa nhập email';
          $error['content'] = 'Chưa nhập content';
        }
        if (empty($error)) {
          $query = "INSERT INTO contact (name,website,email,content) VALUE('{$name}','{$website}','{$email}','{$content}')";
          $result = $mysqli->query($query);
          if ($result) {
            HEADER("Location: index.php?msg=Thêm liên hệ thành công!");
          } else {
            echo "Lỗi, Không thể thêm liên hệ";
          }
        }
      }
      ?>

      <form action="#" method="post" id="sendemail">
        <ol>
          <li>
            <label for="name">Họ tên (required)</label>
            <input id="name" name="name" class="text" />
            <?php echo isset($error['name']) ? $error['name'] : '' ?>
          </li>
          <li>
            <label for="email">Email (required)</label>
            <input id="email" name="email" class="text" />
            <?php echo isset($error['email']) ? $error['email'] : '' ?>
          </li>
          <li>
            <label for="website">Website</label>
            <input id="website" name="website" class="text" />
            <?php echo isset($error['website']) ? $error['website'] : '' ?>
          </li>
          <li>
            <label for="content">Nội dung</label>
            <textarea id="content" name="content" rows="8" cols="50"></textarea>
            <?php echo isset($error['content']) ? $error['content'] : '' ?>
          </li>
          <li>
            <input type="submit" name="submit" value="Gửi" id="imageField" src="templace/bstory/images/submit.gif" class="send" />
            <div class="clr"></div>
          </li>
        </ol>
      </form>
    </div>
  </div>
  <div class="sidebar">
    <?php include_once 'templace/bstory/inc/leftbar.php'; ?>
  </div>
  <div class="clr"></div>
</div>
<?php include_once 'templace/bstory/inc/footer.php'; ?>