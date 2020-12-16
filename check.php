<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$fh = fopen('books.csv','rb');
if (! $fh) {
  $e = error_get_last();
  die("dishes.csvのオープン失敗: ". $e['message'] . "\n");
}
print "<table border=\"1\">\n";
while ((! feof($fh)) && ($line = fgetcsv($fh))) {
    print "<tr><td>" . implode("</td><td>", $line) . "</td></tr>\n";
}
print "</table>";
