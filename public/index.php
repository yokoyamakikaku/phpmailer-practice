<?php
  $error = $_GET['error'] ?? null;
?>

<html>
  <head>
    <title>メールの送信 | 送信フォーム</title>
  </head>
  <body>
    <?php if ($error): ?>
      <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <h1>メールの送信</h1>
    <form action="./send.php" method="post">
      <div>
        <label for="to">宛先：</label>
        <input type="text" name="to" id="to" size="40" value="" />
      </div>
      <div>
        <label for="subject">件名：</label>
        <input type="text" name="subject" id="subject" size="40" value="" />
      </div>
      <div>
        <label for="body">本文：</label>
        <textarea name="body" id="body" rows="10" cols="40"></textarea>
      </div>
      <div>
        <input type="submit" value="送信" />
      </div>
    </form>
  </body>
</html>
