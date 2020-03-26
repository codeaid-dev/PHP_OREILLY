<?php
// 制御構文　解答
// ********** Q1 **********
$a = 1;
$b = 2;

if (($a++) && ($b > 3)) {
  print("評価はtrueでした\n");
} else {
  print("評価はfalseでした\n");
}
print($a . "\n");
// 評価はfalseでした
// 2


// ********** Q2 **********
$a = 1;
$b = 2;

if (($a > 3) || ($b > 1)) {
  print("評価はtrueでした\n");
} else {
  print("評価はfalseでした\n");
}
print($a . "\n");
// 評価はtrueでした
// 1


// ********** Q3 **********
for ($i = 1; $i <= 30; $i++) {
  if ($i % 2 == 0) {
    print($i . "\n");
  }
}


// ********** Q4 **********
print("年齢は？　");
$age = trim(fgets(STDIN));
if ($age < 20) {
  print("未成年\n");
  if ($age >= 6 && $age <= 15) {
    print("義務教育\n");
  }
} else if ($age < 65) {
  print("成人\n");
} else {
  print("高齢者\n");
}
