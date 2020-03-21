<?php
$fp = fopen("foods.txt", "r");

while ((!feof($fp)) && ($line = fgets($fp))) {
  $info[] = trim($line);
}
fclose($pf);
$foods = implode(",", $info);
print($foods . "\n");


$contents = file_get_contents("foods.txt");
$foods = explode("\n", $contents);
$dsp = implode(",", $foods);
print($dsp . "\n");


$fh = fopen("menu.txt", "rb");
$menu = array();
while ((!feof($fh)) && ($line = fgets($fh))) {
  $line = trim($line);
  $info = explode(',', $line);
  $menu[$info[0]] = $info[1];
}
fclose($fh);

$fh = fopen("menu-tax.txt", "wb");
foreach ($menu as $key => $value) {
  $menu[$key] += $value*0.1;
  fwrite($fh, "$key,$menu[$key]\n");
}
fclose($fh);
