<?php
$sweets = array('puff' => 'Sesame Seed Puff',
              'square' => 'Coconut Milk Gelatin Square',
              'cake' => 'Brown Sugar Cake',
              'ricemeat' => 'Sweet Rice and Meat');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  list($form_errors, $input) = validate_form();
  if ($form_errors) {
    show_form($form_errors);
  } else {
    process_form($input);
  }
} else {
  show_form();
}

function generate_options_with_value($options) {
  $html = '';
  foreach ($options as $value => $option) {
    $html .= "<option value=\"$value\">$option</option>\n";
  }
  return $html;
}

function process_form($input) {
  print "Your order's value is ". $input['order']. "<br>";
}

function show_form($errors = '') {
  $sweets = generate_options_with_value($GLOBALS['sweets']);
  if ($errors) {
    print 'Please correct these error: <ul><li>';
    print implode('</li><li>', $errors);
    print '</li></ul>';
  }
  print<<<_HTML_
    <form method="POST" action="$_SERVER[PHP_SELF]">
    Your Order: <select name="order">
    $sweets
    </select>
    <br>
    <input type="submit" value="Order">
    </form>
    _HTML_;
}

function validate_form() {
  $input['order'] = $_POST['order'];
  if (!array_key_exists($input['order'], $GLOBALS['sweets'])) {
    $errors[] = 'Please choose a valid order.';
  }

  return array($errors, $input);
}