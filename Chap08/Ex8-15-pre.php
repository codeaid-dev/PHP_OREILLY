<?php
try {
  //$db = new PDO('mysql:host=localhost;dbname=restaurant;charset=utf8', 'penguin', 'top^hat');
  $db = new PDO('mysql:host=mysql;dbname=restaurant;charset=utf8', 'penguin', 'top^hat');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $q = $db->exec("INSERT INTO dishes (dish_name, price, is_spicy)
                  VALUES ('Eggplant with Chili Sauce', 3.50, 0)");
  $q = $db->exec("INSERT INTO dishes (dish_name, price, is_spicy)
                  VALUES ('Lobster with Chili Sauce', 10.50, 0)");
} catch (PDOException $e) {
  print "Couldn't create table: " . $e->getMessage();
}