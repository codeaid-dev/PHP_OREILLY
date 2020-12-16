<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$fh = fopen("menu.txt", "rb");
$menu = array();
while ((!feof($fh)) && ($line = fgets($fh))) {
  $line = trim($line);
  $info = explode('|', $line);
  $menu[$info[0]] = $info[1];
}
fclose($fh);

$fh = fopen("menu-tax.txt", "wb");
foreach ($menu as $key => $value) {
  $menu[$key] += $value*0.1;
  fwrite($fh, "$key|$menu[$key]\n");
}
fclose($fh);