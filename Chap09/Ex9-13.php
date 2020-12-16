<?php
// 「dishes.csv」というCSVファイルが送られてくることをWebクライアントに通知する
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="dishes-download.csv"');

$fh = fopen('php://output','wb');
$fd = fopen('dishes.csv','rb');

while((!feof($fd)) && ($info = fgetcsv($fd))) {
  fputcsv($fh, $info);
}
fclose($fh);
fclose($fd);
