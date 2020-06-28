<?php
$html = '<span class="{class}">Fried Bean Curd<span>
<span class="{class}">oil-Soaked Fish</span>';
$my_class = 'lunch';
print str_replace('{class}', $my_class, $html);
?>
