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
  global $db;

  //適切なデフォルトで$formオブジェクトを用意する
  $form = new FormHelper();
  //データベースから使用する料理名のリストを取得する
  $sql = 'SELECT dish_id, dish_name FROM dishes ORDER BY dish_name';
  $stmt = $db->query($sql);
  $dishes = array();
  while ($row = $stmt->fetch()) {
    $dishes[$row->dish_id] = $row->dish_name;
  }
  //すべてのHTMLとフォーム表示をわかりやすくするため別のファイルに入れる
  include 'dish-form.php';
}

function validate_form() {
  $input = array();
  $errors = array();

  // いくつかのdish_id値がサブミットされていれば問題ないとみなす
  // データベース内の料理と一致しなければ、
  // process_form()がその旨を報告する
  if (isset($_POST['dish_id'])) {
    $input['dish_id'] = $_POST['dish_id'];
  } else {
    $errors[] = 'Please select a dish.';
  }
  return array($errors, $input);
}

function process_form($input) {
  //この関数内でグローバル変数$dbにアクセスする
  global $db;

  //クエリを作成する
  $sql = 'SELECT dish_id, dish_name, price, is_spicy FROM dishes WHERE dish_id = ?';
  //クエリをデータベースに送り、すべての行を取得する
  $stmt = $db->prepare($sql);
  $stmt->execute(array($input['dish_id']));
  $dish = $stmt->fetch();
  if (count($dish) === 0) {
    print 'No dishes matched.';
  } else {
    print '<table>';
    print '<tr><th>ID</th><th>Dish Name</th><th>Price</th>';
    print '<th>Spicy?</th></tr>';
    if ($dish->is_spicy === 1) {
      $spicy = 'Yes';
    } else {
      $spicy = 'No';
    }
    printf('<tr><td>%d</td><td>%s</td><td>$%.02f</td><td>%s</td></tr>', $dish->dish_id, htmlentities($dish->dish_name), $dish->price, $spicy);
    print '</table>';
  }
}
?>
