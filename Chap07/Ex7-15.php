<?php
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

function process_form($input) {
  print "Hello, ". $input['name']. "<br>";
  print "Your age is ". $input['age']. "<br>";
  print "Price is ". $input['price']. "<br>";
}

function show_form($errors = '') {
  if ($errors) {
    print 'Please correct these error: <ul><li>';
    print implode('</li><li>', $errors);
    print '</li></ul>';
  }
  print<<<_HTML_
    <form method="POST" action="$_SERVER[PHP_SELF]">
    Your name: <input type="text" name="name"><br>
    Your age: <input type="text" name="age"><br>
    Price: <input type="text" name="price">
    <br>
    <input type="submit" value="Send">
    </form>
    _HTML_;
}

function validate_form() {
  $errors = array();
  $input = array();

  $input['age'] = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT,
                              array('options' => array('min_range' => 18,
                                                      'max_range' => 65)));
  if (is_null($input['age']) || ($input['age'] === false)) {
    $errors[] = 'Please enter a valid age between 18 and 65.';
  }

  // FILTER_VALIDATE_FLOATはmin_rangeとmax_rangeオプションをサポートしていないため
  // 自らで比較する
  $input['price'] = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
  if (is_null($input['price']) || ($input['price'] === false) ||
      ($input['price'] < 10.00) || ($input['price'] > 50.00)) {
    $errors[] = 'Please enter a valid price between $10 and $50.';
  }

  $input['name'] = trim($_POST['name'] ?? '');
  if (strlen($input['name']) == 0) {
    $errors[] = 'Your name is required.';
  }

  return array($errors, $input);
}