<?php
// varsをキー => 値だけでできるだけ簡単に表現する
$vars = array('title' => '鬼滅の刃全23巻',
              'headline' => '鬼滅の刃最終巻が12月に販売された',
              'article' => <<<_HTML_
<p>作者の要望もあり鬼滅の刃は2020年5月で連載が終了した。その最終話が掲載されている最終巻の23巻が同年12月に販売された。23巻の販売をもってシリーズ累計発行部数は1億2000万部を突破している。</p>
_HTML_
);

// キーを{}で囲み、テンプレート構文に合致するバージョンの
// $varsを作成する
$template_vars = array();
foreach ($vars as $k => $v) {
  $template_vars['{'.$k.'}'] = $v;
}
//テンプレートをロードする
$template = file_get_contents('template.html');
if ($template === false) {
  $e = error_get_last();
  die("template.htmlの読み込み失敗: ". $e['message'] . "\n");
//  die("Can't read template.html: $php_errormsg");
}
//検索する文字列の配列と置換文字列の配列を指定すれば、
// str_replace()が置換をすべて一度に行う
$html = str_replace(array_keys($template_vars),
                    array_values($template_vars),
                    $template);
//新しいHTMLページを書き出す
$result = file_put_contents('article.html', $html);
if ($result === false) {
  $e = error_get_last();
  die("article.htmlの読み込み失敗: ". $e['message'] . "\n");
//  die("Can't write article.html: $php_errormsg");
}
