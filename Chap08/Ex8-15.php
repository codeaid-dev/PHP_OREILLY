<?php
try {
  //$db = new PDO('mysql:host=localhost;dbname=restaurant;charset=utf8', 'penguin', 'top^hat');
  $db = new PDO('mysql:host=mysql;dbname=restaurant;charset=utf8', 'penguin', 'top^hat');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $q = $db->exec("UPDATE dishes SET is_spicy = 1
                  WHERE dish_name = 'Eggplant with Chili Sauce'");
  $q = $db->exec("UPDATE dishes SET is_spicy = 1, price = price * 2
                  WHERE dish_name = 'Lobster with Chili Sauce'");
} catch (PDOException $e) {
  print "Couldn't create table: " . $e->getMessage();
}