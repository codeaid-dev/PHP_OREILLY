<?php
require 'FormHelper.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  list($errors, $input) = validate_form();
  if ($errors) {
    show_form($errors);
  } else {
    process_form($input);
  }
} else {
  show_form();
}

function show_form($errors = array()) {
  $form = new FormHelper();

  if ($errors) {
    $errorHtml = '<ul><li>';
    $errorHtml .= implode('</li><li>', $errors);
    $errorHtml .= '</li></ul>';
  } else {
    $errorHtml = '';
  }

  print <<<_FORM_
      <form method="POST" action="{$form->encode($_SERVER['PHP_SELF'])}">
      $errorHtml
      Username: {$form->input('text',['name' => 'username'])} <br>
      Password: {$form->input('password',['name' => 'password'])} <br>
      {$form->input('submit',['value' => 'Log In'])}
      </form>
      _FORM_;
}

function validate_form() {
  $input = array();
  $errors = array();

  $users = array('alice' => password_hash('dog123',PASSWORD_DEFAULT), 'bob' => password_hash('my^pwd',PASSWORD_DEFAULT), 'charlie' => password_hash('**fun**',PASSWORD_DEFAULT));

  $input['username'] = $_POST['username'] ?? '';
  if (!array_key_exists($input['username'], $users)) {
    $errors[] = 'Please enter a valid username and password.';
  } else {
    $saved_password = $users[$input['username']];
    $submitted_password = $_POST['password'] ?? '';
    if (!password_verify($submitted_password, $saved_password)) {
      $errors[] = 'Please enter a valid username and password.';
    }
  }

  return array($errors, $input);
}

function process_form($input) {
  $_SESSION['username'] = $input['username'];
  print "Welcome, $_SESSION[username]";
}