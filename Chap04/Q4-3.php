<!--<table> <tr><th>City</th><th>Population</th></tr>-->
<?php
// $censusの各要素は、都市名、州、人口を
// 含む3要素配列である
$census = [ ['New York', 'NY', 8175133],
            ['Los Angeles', 'CA' , 3792621],
            ['Chicago', 'IL' , 2695598],
            ['Houston', 'TX' , 2100263],
            ['Philadelphia', 'PA' , 1526006],
            ['Phoenix', 'AZ' , 1445632],
            ['San Antonio', 'TX' , 1327407],
            ['San Diego', 'CA' , 1307402],
            ['Dallas', 'TX' , 1197816],
            ['San Jose', 'CA' , 945942]];

$total = 0;
$state_totals = array();
printf("%-17s\t%s\n", "市", "人口");

foreach ($census as $city_info) {
  // 総人口を更新する
  $total += $city_info[2];
  // この州をまだ見ていない場合は、
  // 総人口を0に初期化する
  if (!array_key_exists($city_info[1], $state_totals)) {
  $state_totals[$city_info[1]] = 0;
  }
  // 州ごとの人口を更新する
  $state_totals[$city_info[1]] += $city_info[2];
//  print "<tr><td>$city_info[0], $city_info[1]</td><td>$city_info[2]</td></tr>\n";
  printf("%-17s, %s\t%s\n", $city_info[0], $city_info[1], $city_info[2]);
 
}
//print "<tr><td>Total</td><td>$total</td></tr>\n"; // 州ごとの合計を出力する
printf("合計\t\t\t%s\n", $total);
foreach ($state_totals as $state => $population) {
//  print "<tr><td>$state</td><td>$population</td></tr>\n";
  printf("%-17s\t%s\n", $state, $population);
}
//print "</table>";

/*
// HTML
foreach ($census as $city_info) {
  // 総人口を更新する
  $total += $city_info[2];
  // この州をまだ見ていない場合は、
  // 総人口を0に初期化する
  if (!array_key_exists($city_info[1], $state_totals)) {
  $state_totals[$city_info[1]] = 0;
  }
  // 州ごとの人口を更新する
  $state_totals[$city_info[1]] += $city_info[2];
  print "<tr><td>$city_info[0], $city_info[1]</td><td>$city_info[2]</td></tr>\n";
 
}
print "<tr><td>Total</td><td>$total</td></tr>\n"; // 州ごとの合計を出力する
foreach ($state_totals as $state => $population) {
  print "<tr><td>$state</td><td>$population</td></tr>\n";
}
print "</table>";
*/