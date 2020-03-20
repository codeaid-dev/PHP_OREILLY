<?php

$teams = ["team-A", "team-B", "team-C", "team-D", "team-E"];
for ($i = 0; $i < count($teams); $i++) {
  for ($j = $i+1; $j < count($teams); $j++) {
    print($teams[$i] . " vs " . $teams[$j] . "\n");
  }
}


$seasons = ["春" => "桜", "夏" => "向日葵", "秋" => "秋桜", "冬" => "梅"];

foreach ($seasons as $key => $value) {
  print($key .  "は" . $value . "\n");
}


$teams = ["team-A" => ["本拠地" => "大阪", "選手数" => 20],
         "team-B" => ["本拠地" => "東京", "選手数" => 30],
         "team-C" => ["本拠地" => "名古屋", "選手数" => 15],
         "team-D" => ["本拠地" => "福岡", "選手数" => 22],
         "team-E" => ["本拠地" => "札幌", "選手数" => 25]];

foreach ($teams as $key => $value) {
  print($key . "の本拠地は" . $value["本拠地"] . "で選手数は" . $value["選手数"] . "\n");
}


$drinks = ["コーヒー" => 230, "紅茶" => 200, "ケーキ" => 300, "アップルパイ" => 350];
print("ご注文は？　");
$ans = trim(fgets(STDIN));
if (isset($drinks[$ans])) {
  print($ans . "は" . $drinks[$ans] . "円です\n");
} else {
  print("メニューにはありません\n");
}
