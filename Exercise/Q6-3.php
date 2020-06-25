<?php
include "6-1.php";
include "Entree.php";

class PricedEntree extends Entree {
  public function __construct($name, $ingredients) {
    parent::__construct($name, $ingredients);
    foreach ($this->ingredients as $ingredient) {
      if (! $ingredient instanceof Ingredient) {
        throw new Exception('Elements of $ingredients must be
        Ingredient objects');
      }
    }
  }
  public function getCost() {
    $cost = 0;
    foreach ($this->ingredients as $ingredient) {
      $cost += $ingredient->getCost();
    }
    return $cost;
  }
}

$chicken = new Ingredient('chicken', 100);
$bread = new Ingredient('bread', 200);
$sandwich = new PricedEntree('Chicken Sandwich', array($bread, $chicken));
echo $sandwich->getCost(), "\n";
