<?php
try {
  //$db = new PDO('mysql:host=localhost;dbname=restaurant;charset=utf8', 'penguin', 'top^hat');
  $db = new PDO('mysql:host=mysql;dbname=restaurant;charset=utf8', 'penguin', 'top^hat');
} catch (PDOException $e) {
  print "Can't connect: " . $e->getMessage();
  exit();
}

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$q = $db->query('SELECT dish_name, price FROM dishes');
while ($row = $q->fetch()) {
  print "$row[dish_name], $row[price] \n";
}