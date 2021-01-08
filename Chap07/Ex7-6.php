<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  process_form();
} else {
  show_form();
}

function process_form() {
  print "Hello, ". $_POST['my_name'];
}

function show_form() {
  print<<<_HTML_
    <form method="POST" action="$_SERVER[PHP_SELF]">
    Your name: <input type="text" name="my_name">
    <br>
    <input type="submit" value="Say Hello">
    </form>
    _HTML_;
}