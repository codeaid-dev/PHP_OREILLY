<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  process_form();
}

function print_array($ar) {
  print '<ul>';
  foreach ($ar as $k => $v) {
    if (is_array($v)) {
      print '<li>' . htmlentities($k) .':</li>';
      print_array($v);
    } else {
      print '<li>' . htmlentities($k) .'=' . htmlentities($v) . '</li>';
    }
}
  print '</ul>';
}
/* これはフォームデータを操作しているので、 検証した$input配列の代わりに$_POSTを直接調べる */
function process_form() {
  print_array($_POST);
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