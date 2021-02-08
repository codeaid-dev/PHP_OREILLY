<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP OREILLY</title>
</head>
<body>
  <form method="POST" action="<?= $form->encode($_SERVER['PHP_SELF']) ?>">
    <table>
      <?php if ($errors) { ?>
        <tr>
          <td>You need to correct the following errors:</td>
          <td><ul>
            <?php foreach ($errors as $error) { ?>
              <li><?= $form->encode($error) ?></li>
            <?php } ?>
          </ul></td>
        </tr>
      <?php } ?>
      <tr><th>Product</th><td>Quantity</td></tr>
      <?php foreach ($products as $code => $name) { ?>
        <tr><td><?= htmlentities($name) ?>:</td>
          <td><?= $form->input('text', ['name' => "quantity_$code"]) ?></td></tr>
      <?php } ?>
        <tr><td colspan="2" align="center">
          <?= $form->input('submit', ['value' => 'Order']) ?>
        </td></tr>
    </table>
  </form>
</body>
</html>