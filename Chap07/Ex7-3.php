<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>例7-3</title>
</head>
<body>
  <form method="POST" action="Ex7-3.php">
  <input type="text" name="product_id">
  <select name="category">
  <option value="ovenmitt">Pot Holder</option>
  <option value="fryingpan">Frying Pan</option>
  <option value="torch">Kitchen Torch</option>
  </select>
  <input type="submit" name="submit">
  </form>
  Here are the submittted values:
  <br>
  product_id: <?php print $_POST['product_id'] ?? '' ?>
  <br>
  category: <?php print $_POST['category'] ?? '' ?>
</body>
</html>