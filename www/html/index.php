<?php

try {
    require('../app/db-settings.php');
?>

<?php

} catch (PDOException $e) {

    echo '接続失敗' . $e->getMessage();
    exit();
}
