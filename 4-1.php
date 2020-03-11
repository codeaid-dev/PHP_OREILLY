<table>
  <tr>
    <th>街</th>
    <th>人口</th>
  </tr>
<?php
$census = ['New York, NY' => 8175133,
        'Los Angeles, CA' => 3792621,
        'Chicago, IL' => 2695598,
        'Houston, TX' => 2100263,
        'Philadelphia, PA' => 1526006,
        'Phoenix, AZ' => 1445632,
        'San Antonio, TX' => 1327407,
        'San Diego, CA' => 1307402,
        'Dallas, TX' => 1197816,
        'San Jose, CA' => 945942];
$total = 0;

foreach ($census as $city => $population) {
  $total += $population;
  print "<tr><td>$city</td><td>$population</td></tr>\n";
}

print "<tr><td>合計</td><td>$total</td></tr>\n"; print "</table>";
