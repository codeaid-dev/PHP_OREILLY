<?php
// 変数・演算子　解答例
// ********** Q1 **********
$a = 1;
$b = 2;
$c = "1";
$d = "2";

print($a + $b + $c . "\n");
print($a . $b . $c . "\n");
print($c + $d . "\n");
// 4 121 3


// ********** Q2 **********
$a = 0;
$b = $a++;
$c = ++$a;
print($b . "\n");
print($c . "\n");
// 0 2


// ********** Q3 **********
$d = '1234-5678-9101-abcd';
print(substr($d, 5, 4) . "\n");


// ********** Q4 **********
$game = "ソリティア";
$year = 2020;
$month = 5;
$day = 10;
$price = 6500;
$rate = 0.1;
$tax = $price * $rate;
$tax_price = $price + $tax;
printf("%s\t\t%s\t\t%s", "ゲーム", "発売日", "価格\n");
printf("%s\t%d/%02d/%02d\t\\%d(税込\\%d)\n", $game, $year, $month, $day, $price, $tax_price);
