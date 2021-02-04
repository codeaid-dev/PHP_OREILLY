<?php
//フォームヘルパークラスをロードする
require 'FormHelper.php';
//データベースに接続する
try {
  //$db = new PDO('mysql:host=localhost;dbname=restaurant;charset=utf8', 'penguin', 'top^hat');
  $db = new PDO('mysql:host=mysql;dbname=restaurant;charset=utf8', 'penguin', 'top^hat');
} catch (PDOException $e) {
  print "Can't connect: " . $e->getMessage();
  exit();
}
// DBエラー時の例外を設定する
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//フェッチモードを設定する：オブジェクトとしての行
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
//メインページロジック：
// -フォームがサブミットされたら、検証して処理または再表示を行う
// -サブミットされていなければ、表示する
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // validate_form()がエラーを返したら、エラーをshow_form()に渡す
  list($errors, $input) = validate_form();
  if ($errors) {
    show_form($errors);
  } else {
    //サブミットされたデータが有効なので処理する
    process_form($input);
  }
} else {
  //フォームがサブミットされなかったので表示する
  show_form();
}

function show_form($errors = array()) {
  //適切なデフォルトで$formオブジェクトを用意する
  $form = new FormHelper();
  //すべてのHTMLとフォーム表示をわかりやすくするため別のファイルに入れる
  include 'price-form.php';
}

function validate_form() {
  $input = array();
  $errors = array();
  //最低価格は有効な浮動小数点数で指定する
  $input['min_price'] = filter_input(INPUT_POST,'min_price',
  FILTER_VALIDATE_FLOAT);
  if ($input['min_price'] === null || $input['min_price'] === false) {
    $errors[] = 'Please enter a valid minimum price.';
  }
  return array($errors, $input);
}

function process_form($input) {
  //この関数内でグローバル変数$dbにアクセスする
  global $db;
  //クエリを作成する
  $sql = 'SELECT dish_name, price, is_spicy FROM dishes WHERE price >= ?';
  //クエリをデータベースに送り、すべての行を取得する
  $stmt = $db->prepare($sql);
  $stmt->execute(array($input['min_price']));
  $dishes = $stmt->fetchAll();
  if (count($dishes) === 0) {
    print 'No dishes matched.';
  } else {
    print '<table>';
    print '<tr><th>Dish Name</th><th>Price</th><th>Spicy?</th></tr>';
    foreach ($dishes as $dish) {
      if ($dish->is_spicy === 1) {
        $spicy = 'Yes';
      } else {
        $spicy = 'No';
      }
      printf('<tr><td>%s</td><td>$%.02f</td><td>%s</td></tr>',
      htmlentities($dish->dish_name), $dish->price, $spicy);
    }
    print '</table>';
  }
}
?>
