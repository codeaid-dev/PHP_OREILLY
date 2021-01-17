<?php
include "Entree.php";

class ComboMeal extends Entree {

  public function __construct($name, $entrees) {
    parent::__construct($name, $entrees);
    foreach ($entrees as $entree) {
      if (!$entree instanceof Entree) {
        throw new Exception('Elements of $entrees must be Entree objects');
      }
    }
  }

  public function hasIngredient($ingredient) {
    foreach ($this->ingredients as $entree) {
      if ($entree->hasIngredient($ingredient)) {
        return true;
      }
    }
    return false;
  }
}

try {
  $soup = new Entree('Chicken Soup', array('chicken', 'water'));

  $sandwich = new Entree('Chicken Sandwich', array('chicken', 'bread'));

  $combo = new ComboMeal('Soup + Sandwich', array($soup, $sandwich));

  foreach (['chicken', 'water', 'pickles'] as $ing) {
    if ($combo->hasIngredient($ing)) {
      print "Something in the combo contains $ing.\n";
    }
  }
} catch (Exception $e) {
  print "Could't create soup sandwich combo: " . $e->getMessage();
}