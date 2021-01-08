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
  print "Year: ". $input['year']. "<br>";
  print "Month: ". $input['month']. "<br>";
  print "Day: ". $input['day']. "<br>";
}

function show_form($errors = '') {
  if ($errors) {
    print 'Please correct these error: <ul><li>';
    print implode('</li><li>', $errors);
    print '</li></ul>';
  }
  print<<<_HTML_
    <form method="POST" action="$_SERVER[PHP_SELF]">
    Year: <input type="text" name="year"><br>
    Month: <input type="text" name="month"><br>
    Day: <input type="text" name="day">
    <br>
    <input type="submit" value="Send">
    </form>
    _HTML_;
}

function validate_form() {
  $range_start = new DateTime('6 months ago');
  $range_end = new DateTime();

  $input['year'] = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT,
                              array('options' => array('min_range' => 1900,
                                                      'max_range' => 2100)));
  $input['month'] = filter_input(INPUT_POST, 'month', FILTER_VALIDATE_INT,
                              array('options' => array('min_range' => 1,
                                                      'max_range' => 12)));
  $input['day'] = filter_input(INPUT_POST, 'day', FILTER_VALIDATE_INT,
                              array('options' => array('min_range' => 1,
                                                      'max_range' => 31)));

  if ($input['year'] && $input['month'] && $input['day'] &&
      checkdate($input['month'], $input['day'], $input['year'])) {
    $submitted_date = new DateTime('@'.strtotime($input['year'] . '-' . $input['month'] . '-' . $input['day']));
    //$submitted_date = new DateTime($input['year'] . '-' . $input['month'] . '-' . $input['day']);
    if (($range_start > $submitted_date) || ($range_end < $submitted_date)) {
      $errors[] = 'Please choose a date less than six months old.';
    }
  } else {
    $errors[] = 'Please enter a valid date.';
  }

  return array($errors, $input);
}