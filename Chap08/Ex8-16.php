<?php
$make_things_cheaper = true;
try {
  $db = new PDO('mysql:host=mysql;dbname=restaurant;charset=utf8',
                'penguin',
                'top^hat');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if ($make_things_cheaper) {
    $q = $db->exec("DELETE FROM dishes WHERE price > 19.95");
  } else {
    $q = $db->exec("DELETE FROM dishes");
  }
} catch (PDOException $e) {
  print "Couldn't create table: " . $e->getMessage();
}