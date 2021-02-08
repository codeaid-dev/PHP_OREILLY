<?php
  // 最初にセッションを開始するので、後で$_SESSIONを自由に使える
  session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Background Color Example</title>
</head>
<body style="background-color:<?= $_SESSION['background_color'] ?>">
  <p>What color did you pick?</p>
</body>
</html>
