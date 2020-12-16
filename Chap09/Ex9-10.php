<?php
$fh = fopen('dishes.csv','rb');

while((!feof($fh)) && ($info = fgetcsv($fh))) {
  print '<li>Cocking name: ' . $info[0] . ' Price: ' . $info[1] . ' Spicy level: ' . $info[2] . "</li>\n";
}
fclose($fh);
