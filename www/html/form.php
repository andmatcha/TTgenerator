<?php

$live_stmt = $db->query("select * from lives");
$lives = $live_stmt->fetchall();
print_r($lives);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>練習TT作成支援ツール | シャンソン研究会</title>
</head>

<body>
  <form action="./tt.php" method="GET">
    <select name="live_id">
      <?php foreach ($lives as $live) : ?>
        <option value="<?= $live['id'] ?>"><?= $live['name'] ?></option>
      <?php endforeach; ?>
    </select>
    <input type="submit" value="表示">
  </form>
</body>

</html>
