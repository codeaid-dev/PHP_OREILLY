<?php
function html_img2($file, $alt = null, $height = null, $width = null) {
  if (isset($GLOBALS['image_path'])) {
    $file = $GLOBALS['image_path'] . $file;
  }
    $html = '<img src="' . $file . '"';
  if (isset($alt)) {
    $html .= ' alt="' . $alt . '"';
  }
  if (isset($height)) {
    $html .= ' height="' . $height . '"';
  }
  if (isset($width)) {
    $html .= ' width="' . $width . '"';
  }
  $html .= '/>';
  return $html;
}

//$image_path = 'images/';
//echo html_img2('hanami_usagi.png', 'usagi', 700, 700);
