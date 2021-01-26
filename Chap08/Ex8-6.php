<?php
try {
  $db = new PDO('mysql:host=mysql;dbname=restaurant;charset=utf8',
                'penguin',
                'top^hat');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $q = $db->exec("INSERT INTO dishes (dish_name, price, is_spicy) VALUES ('Sesame Seed Puff', 2.50, 0)");
} catch (PDOException $e) {
  print "Couldn't create table: " . $e->getMessage();
}