<?php
/*
// ファイル操作　解答
// *********** Q1 **********
// fgets()を使った例
$fp = fopen("foods.txt", "r");

while ((!feof($fp)) && ($line = fgets($fp))) {
  $info[] = trim($line);
}
fclose($pf);
$foods = implode(",", $info);
print($foods . "\n");

// file_get_contents()を使った例
$contents = file_get_contents("foods.txt");
$foods = explode("\n", $contents);
$dsp = implode(",", $foods);
print($dsp . "\n");

// *********** Q2 **********
// fgets()を使った例 fgetcsv()を使ってもよい
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
*/

// ********** Q3 **********
$page = file_get_contents('color-template.html');
if ($page === false) {
  $e = error_get_last();
  print($e['message']);
} else {
  // タイトルを挿入
  $page = str_replace('{page_title}', 'Q3解答', $page);
  // 見出し
  $page = str_replace('{heading}', '色表示', $page);
  // ブロック要素の幅
  $page = str_replace('{width}', '640px', $page);
  // ブロック要素の高さ
  $page = str_replace('{height}', '480px', $page);
  // ブロック要素の背景色が月・金は青、それ以外は赤
  if (date('w') == 1 || date('w') == 5) {
    $page = str_replace('{color}', 'blue', $page);
  } else {
    $page = str_replace('{color}', 'red', $page);
  }
}
//新しいHTMLページを書き出す
$result = file_put_contents('color.html', $page);
if ($result === false) {
  $e = error_get_last();
  print($e['message']);
}
