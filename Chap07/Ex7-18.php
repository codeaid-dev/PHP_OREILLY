<?php
$sweets = array('Sesame Seed Puff', 'Coconut Milk Gelatin Square', 'Brown Sugar Cake', 'Sweet Rice and Meat');

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

function generate_options($options) {
  $html = '';
  foreach ($options as $option) {
    $html .= "<option>$option</option>\n";
  }
  return $html;
}

function process_form($input) {
  print "Your order is ". $input['order']. "<br>";
}

function show_form($errors = '') {
  $sweets = generate_options($GLOBALS['sweets']);
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
  if (!in_array($input['order'], $GLOBALS['sweets'])) {
    $errors[] = 'Please choose a valid order.';
  }

  return array($errors, $input);
}