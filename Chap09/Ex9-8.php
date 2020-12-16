<?php
$fh = fopen('output.txt', 'wb');

foreach (file('people.txt') as $line) {
  $line = trim($line);
  $info = explode('|', $line);
  fwrite($fh, "mail address is $info[0] for $info[1]\n");
}
fclose($fh);
