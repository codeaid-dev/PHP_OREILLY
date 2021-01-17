<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  process_form();
}

function process_form() {
  print '<ul>';
  foreach ($_POST as $k => $v) {
      print '<li>' . htmlentities($k) .'=' . htmlentities($v) . '</li>';
}
  print '</ul>';
}
?>
<form method="POST" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
  Braised Noodles with: <select name="noodle">
    <option>crab meat</option>
    <option>mushroom</option>
    <option>barbecued pork</option>
    <option>shredded ginger and green onion</option>
  </select>
  <br/>
  Sweet: <br>
  <input type="radio" name="sweet" value="puff" checked>Sesame Seed Puff
  <input type="radio" name="sweet" value="square">Coconut Milk Gelatin Square
  <input type="radio" name="sweet" value="cake">Brown Sugar Cake
  <input type="radio" name="sweet" value="ricemeat">Sweet Rice and Meat
  <br>
  Sweet Quantity: <input type="text" name="sweet_q">
  <br/>
  <input type="submit" name="submit" value="Order">
</form>