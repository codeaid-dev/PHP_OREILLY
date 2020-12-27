<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>例7-5</title>
</head>
<body>
  <form method="POST" action="Ex7-5.php">
    <select name="lunch[]" multiple>
      <option value="pork">BBQ Pork Bun</option>
      <option value="chicken">Chicken Bun</option>
      <option value="lotus">Lotus Seed Bun</option>
      <option value="bean">Bean Paste Bun</option>
      <option value="nest">Bird-Nest Bun</option>
    </select>
    <input type="submit" name="submit">
  </form>
  Selected buns:
  <br>
  <?php
  if (isset($_POST['lunch'])) {
    foreach ($_POST['lunch'] as $choice) {
      print "You want a $choice bun. <br>";
    }
  }
  ?>
</body>
</html>