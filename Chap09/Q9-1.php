<?php
$now = new DateTime();
// varsをキー => 値だけでできるだけ簡単に表現する
$vars = array('title' => 'Man Bites Dog',
              'headline' => 'Man and Dog Trapped in Biting Fiasco',
              'byline' => 'Ireneo Funes',
              'article' => <<<_HTML_
<p>While walking in the park today, Bioy Casares took a big juicy
bite out of his dog, Santa's Little Helper. When asked why he did
it, Mr. Casares said, "I was hungry."</p>
_HTML_
              ,
              'date' => $now->format('l, F j, Y'));

// キーを{}で囲み、テンプレート構文に合致するバージョンの
// $varsを作成する
$template_vars = array();
foreach ($vars as $k => $v) {
  $template_vars['{'.$k.'}'] = $v;
}
//テンプレートをロードする
$template = file_get_contents('template.html');
if ($template === false) {
  die("Can't read template.html: $php_errormsg");
}
//検索する文字列の配列と置換文字列の配列を指定すれば、
// str_replace()が置換をすべて一度に行う
$html = str_replace(array_keys($template_vars),
                    array_values($template_vars),
                    $template);
//新しいHTMLページを書き出す
$result = file_put_contents('article.html', $html);
if ($result === false) {
  die("Can't write article.html: $php_errormsg");
}
