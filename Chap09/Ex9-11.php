<?php
$fh = fopen('output.csv','wb');
$fd = fopen('dishes.csv','rb');

while((!feof($fd)) && ($info = fgetcsv($fd))) {
  print '<li>Cocking name: ' . $info[0] . ' Price: ' . $info[1] . ' Spicy level: ' . $info[2] . "</li>\n";
  fputcsv($fh, $info);
}
fclose($fh);
fclose($fd);
