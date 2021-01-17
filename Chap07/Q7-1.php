<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  print ("[noodle]: ".$_POST['noodle']."<br>");
  if ($_POST['sweet'] != NULL) {
    foreach ($_POST['sweet'] as $val) {
      print "[sweet]: ".$val."<br>";
    }
  }
  print ("[sweet_q]: ".$_POST['sweet_q']);
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
  Sweet: <select name="sweet[]" multiple>
    <option value="puff"> Sesame Seed Puff</option>
    <option value="square"> Coconut Milk Gelatin Square</option>
    <option value="cake"> Brown Sugar Cake</option>
    <option value="ricemeat"> Sweet Rice and Meat</option>
  </select>
  <br/>
  Sweet Quantity: <input type="text" name="sweet_q">
  <br/>
  <input type="submit" name="submit" value="Order">
</form>