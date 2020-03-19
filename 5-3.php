<?php
//前の演習のhtml_img2()関数はこのファイルに保存されている
include "5-2.php";
$image_path = 'images/';
print html_img2('hanami_inu.png');
print html_img2('hanami_neko.png','neko');
print html_img2('hanami_kuma.png',null,300,300);