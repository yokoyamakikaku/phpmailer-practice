<?php
require_once __DIR__ . '/../libs/mailer.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: /?error=Invalid request');
  exit;
}

$to = $_POST['to'] ?? null;
$subject = $_POST['subject'] ?? null;
$body = $_POST['body'] ?? null;

if (!$to || !$subject || !$body) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

$result = sendMail($to, $subject, $body);
if ($result) {
    echo json_encode(['success' => 'Email sent successfully']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to send email']);
}
?>

<html>
  <head>
    <title>メールの送信 | 送信結果</title>
  </head>
  <body>
    <h1>メールの送信</h1>
    <p>以下の内容で送信しました。</p>
    <div>
      <label for="to">宛先：</label>
      <span><?php echo $to; ?></span>
    </div>
    <div>
      <label for="subject">件名：</label>
      <span><?php echo $subject; ?></span>
    </div>
    <div>
      <label for="body">本文：</label>
      <span><?php echo $body; ?></span>
    </div>
    <hr />
    <h2>送信結果</h2>
    <?php if ($result): ?>
      <p>メールを送信しました。</p>
    <?php else: ?>
      <p>メールの送信に失敗しました。</p>
    <?php endif; ?>
    <hr />
    <a href="/">戻る</a>
  </body>
</html>
