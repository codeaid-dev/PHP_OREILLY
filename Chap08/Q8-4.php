<?php
// フォームヘルパークラスをロードする
require 'FormHelper.php';
// データベースに接続する
try {
  //$db = new PDO('mysql:host=localhost;dbname=restaurant;charset=utf8', 'penguin', 'top^hat');
  $db = new PDO('mysql:host=mysql;dbname=restaurant;charset=utf8', 'penguin', 'top^hat');
} catch (PDOException $e) {
  print "Can't connect: " . $e->getMessage();
  exit();
}
// DBエラー時の例外を設定する
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// フェッチモードを設定する：オブジェクトとしての行
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
// 料理のIDと名前はshow_form()とvalidate_form()で必要なので、
// グローバル配列に入れる
$dishes = array();
$sql = 'SELECT dish_id, dish_name FROM dishes ORDER BY dish_name';
$stmt = $db->query($sql);
while ($row = $stmt->fetch()) {
  $dishes[$row->dish_id] = $row->dish_name;
}
// メインページロジック：
// -フォームがサブミットされたら、検証して処理または再表示を行う
// -サブミットされていなければ、表示する
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // validate_form()がエラーを返したら、エラーをshow_form()に渡す
  list($errors, $input) = validate_form();
  if ($errors) {
    show_form($errors);
  } else {
    // サブミットされたデータが有効なので処理する
    process_form($input);
  }
} else {
  // フォームがサブミットされなかったので表示する
  show_form();
}

function show_form($errors = array()) {
  global $db, $dishes;

  //適切なデフォルトで$formオブジェクトを用意する
  $form = new FormHelper();

  // すべてのHTMLとフォーム表示をわかりやすくするため別のファイルに入れる
  include 'customer-form.php';
}

function validate_form() {
  global $dishes;
  $input = array();
  $errors = array();

  // dish_id値がサブミットされ、$dishesにあることを確認する
  // いくつかのdish_id値がサブミットされていれば問題ないとみなす
  // データベース内の料理と一致しなければ、
  // process_form()がその旨を報告する
  $input['dish_id'] = $_POST['dish_id'] ?? '';
  if (! array_key_exists($input['dish_id'], $dishes)) {
    $errors[] = 'Please select a valid dish.';
  }

  // 名前は必須
  $input['name'] = trim($_POST['name'] ?? '');
  if (0 === strlen($input['name'])) {
    $errors[] = 'Please enter a name.';
  }

  // 電話番号は必須
  $input['phone'] = trim($_POST['phone'] ?? '');
  if (0 === strlen($input['phone'])) {
    $errors[] = 'Please enter a phone number.';
  } else {
    // 米国を対象とし、電話番号には少なくとも
    // 10桁が含まれるようにする
    // そのために各文字にctype_digit()を使うのは
    // 最も効率的な方法ではないが、論理的には単純であり、
    // 正規表現を避けられる
    $digits = 0;
    for ($i = 0; $i < strlen($input['phone']); $i++) {
      if (ctype_digit($input['phone'][$i])) {
        $digits++;
      }
    }
    if ($digits < 10) {
      $errors[] = 'Phone number needs at least ten digits.';
    }
  }
  return array($errors, $input);
}

function process_form($input) {
  //この関数内でグローバル変数$dbにアクセスする
  global $db;

  //クエリを作成する。customer_idにはデータベースが自動的に一意の値を
  //割り当てるので、customer_idを指定する必要はない
  $sql = 'INSERT INTO customers (name,phone,favorite_dish_id) ' . 'VALUES (?,?,?)';

  //クエリをデータベースに送り、すべての行を取得する
  try {
    $stmt = $db->prepare($sql);
    $stmt->execute(array($input['name'],$input['phone'],$input['dish_id']));
    print '<p>Inserted new customer.</p>';
  } catch (Exception $e) {
    print "<p>Couldn't insert customer: {$e->getMessage()}.</p>";
  }
}
?>
