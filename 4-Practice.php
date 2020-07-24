<?php
// 配列の操作　解答例
// ********** Q1 **********
$teams = ["team-A", "team-B", "team-C", "team-D", "team-E"];
for ($i = 0; $i < count($teams); $i++) {
  for ($j = $i+1; $j < count($teams); $j++) {
    print($teams[$i] . " vs " . $teams[$j] . "\n");
  }
}

// ********** Q2 **********
$seasons = ["Spring" => "桜", "Summer" => "向日葵", "Autumn" => "秋桜", "Winter" => "梅"];

foreach ($seasons as $key => $value) {
  print($key .  "は" . $value . "\n");
}

// ********** Q3 **********
$tanaka = array("name"=>"田中", "class"=>"Aクラス", "mail"=>"tanaka@hoge.com");
$suzuki = array("name"=>"鈴木", "class"=>"Wクラス", "mail"=>"suzuki@hoge.com");
$sato = array("name"=>"佐藤", "class"=>"Aクラス", "mail"=>"sato@hoge.com");
$meibo = array("2020001"=>$tanaka, "2020002"=>$suzuki, "2020003"=>$sato);
var_dump($meibo);

// ********** Q4 **********
$teams = ["team-A" => ["home" => "大阪", "number" => 20],
         "team-B" => ["home" => "東京", "number" => 30],
         "team-C" => ["home" => "名古屋", "number" => 15],
         "team-D" => ["home" => "福岡", "number" => 22],
         "team-E" => ["home" => "札幌", "number" => 25]];

foreach ($teams as $key => $value) {
  print($key . "の本拠地は" . $value["home"] . "で選手数は" . $value["number"] . "\n");
}


// ********** Q5 **********
$drinks = ["Coffee" => 230, "Tea" => 200, "Cake" => 300, "Pie" => 350];
print("ご注文は？");
$ans = trim(fgets(STDIN));
if (isset($drinks[$ans])) {
  print($ans . "は" . $drinks[$ans] . "円です\n");
} else {
  print("メニューにはありません\n");
}

// ********** Q6 **********
print "入力：";
$str = trim(fgets(STDIN));
$result = [];
while (strlen($str) > 0) {
  $target = substr($str, 0, 1);
  $count = 1;
  for ($i=1; $i<strlen($str); $i++) {
    $w = substr($str, $i, 1);
    if ($target == $w) {
      $count++;
    }
  }
  $result[$target] = $count;
  $str = str_replace($target, "", $str);
}
var_dump($result);

// ********** Q7 **********
$total = 0;
for ($i = 0; $i < 5; $i++) {
  $nums[] = rand(1,10);
  $total += $nums[$i];
}
print implode(" ", $nums) . "\n";
print "合計値：" . $total . "\n";
$average = $total / count($nums);
print "平均値：" . $average . "\n";
$big = "平均値以上：";
$small = "平均値未満：";
for ($i = 0; $i < count($nums); $i++) {
  if ($nums[$i] >= $average) {
    $big .= $nums[$i] . " ";
  } else {
    $small .= $nums[$i] . " ";
  }
}
print $big . "\n";
print $small . "\n";

// ********** Q8 **********
print "入力：";
$nums = explode(",", trim(fgets(STDIN)));
for ($i = 0; $i < count($nums); $i++) {
  print $nums[$i] . " ";
  for ($j = 1; $j <= $nums[$i]; $j++) {
    if ($j % 5 == 0) {
      print "* ";
    } else {
      print "*";
    }
  }
  print "\n";
}

// ********** Q9 **********
$months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
$days = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
$count = 0;

foreach ($months as $key => $month) {
  for ($i = 1; $i <= $days[$key]; $i++) {
    if ($month == (floor($i / 10) + $i % 10)) {
      $count++;
      printf("%02d/%d%d\n", $month, floor($i / 10), $i % 10);
    }
  }
}
print "全部で" . $count . "個\n";

