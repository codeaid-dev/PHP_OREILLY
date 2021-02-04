<?php
try {
  //$db = new PDO('mysql:host=localhost;dbname=restaurant;charset=utf8', 'penguin', 'top^hat');
  $db = new PDO('mysql:host=mysql;dbname=restaurant;charset=utf8', 'penguin', 'top^hat');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $q = $db->exec("CREATE TABLE dishes (
                  dish_id INT,
                  dish_name VARCHAR(255),
                  price DECIMAL(4,2),
                  is_spicy INT)");
} catch (PDOException $e) {
  print "Couldn't create table: " . $e->getMessage();
}