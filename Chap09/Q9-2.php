<?php
//アドレス数を累積する配列
$addresses = array();

$fh = fopen('addresses.txt','rb');
if(! $fh){
  $e = error_get_last();
  die("addresses.txtのオープン失敗: ". $e['message'] . "\n");
//  die("Can't open addresses.txt: $php_errormsg");
}
while ((! feof($fh)) && ($line = fgets($fh))) {
  $line = trim($line);
  // $addressesではアドレスをキーとして使う
  //値はアドレスの出現回数
  if (! isset($addresses[$line])) {
    $addresses[$line] = 0;
  }
  $addresses[$line] = $addresses[$line] + 1;
}
if (! fclose($fh)) {
  $e = error_get_last();
  die("addresses.txtのクローズ失敗: ". $e['message'] . "\n");
//  die("Can't close addresses.txt: $php_errormsg");
}

// $addressesを要素値で逆順（最大値が最初）にソートする
arsort($addresses);

$fh = fopen('addresses-count.txt','wb');
if(! $fh){
  $e = error_get_last();
  die("addresses-count.txtのオープン失敗: ". $e['message'] . "\n");
//  die("Can't open addresses-count.txt: $php_errormsg");
}
foreach ($addresses as $address => $count) {
  //末尾に改行を忘れない
  if (fwrite($fh, "$count,$address\n") === false) {
    $e = error_get_last();
    die("$count,$address の書き込み失敗: ". $e['message'] . "\n");
//    die("Can't write $count,$address: $php_errormsg");
  }
}
if (! fclose($fh)) {
  $e = error_get_last();
  die("addresses-count.txtのクローズ失敗: ". $e['message'] . "\n");
//  die("Can't close addresses-count.txt: $php_errormsg");
}
