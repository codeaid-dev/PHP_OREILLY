<?php
// テキストと数の操作　解答例
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
printf("%s\t%d/%02d/%02d\t%d円(税込%d円)\n", $game, $year, $month, $day, $price, $tax_price);
