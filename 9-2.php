<?php
//アドレス数を累積する配列
$addresses = array();

$fh = fopen('addresses.txt','rb');
if(! $fh){
  die("Can't open addresses.txt: $php_errormsg");
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
  die("Can't close addresses.txt: $php_errormsg");
}

// $addressesを要素値で逆順（最大値が最初）にソートする
arsort($addresses);

$fh = fopen('addresses-count.txt','wb');
if(! $fh){
  die("Can't open addresses-count.txt: $php_errormsg");
}
foreach ($addresses as $address => $count) {
  //末尾に改行を忘れない
  if (fwrite($fh, "$count,$address\n") === false) {
    die("Can't write $count,$address: $php_errormsg");
  }
}
if (! fclose($fh)) {
  die("Can't close addresses-count.txt: $php_errormsg");
}
