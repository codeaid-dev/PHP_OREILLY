<?php
// 関数　解答
// ********** Q1 **********
$a = 0;
function checkScope($a) {
  $a += 100;
  return $a;
}

print($a . " ");
print(checkScope($a) . " ");
print($a . "\n");


// ********** Q2 **********
function getTrue() {
  print("getTrue関数を実行\n");
  return true;
}
function getFalse() {
  print("getFalse関数を実行\n");
  return false;
}

if (getTrue() || getFalse()) {
  print("評価はtrue\n");
} else {
  print("評価はfalse\n");
}


// ********** Q3 **********
function getMax($nums) {
  $max = 0;
  for ($i = 0; $i < count($nums); $i++) {
    if ($nums[$i] > $max) {
      $max = $nums[$i];
    }
  }
  
  return $max;
}

$q = [10, 23, 52, 38, 34, 22, 37];
$ans = getMax($q);
print($ans . "\n");


// ********** Q4 **********
$a = 0;
function checkScope2($a) {
  $GLOBALS['a'] += 100;
  return $a;
}

print($a . " ");
print(checkScope2($a) . " ");
print($a . "\n");