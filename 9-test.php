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
