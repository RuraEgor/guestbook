<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>

<!DOCTYPE html>

<html>
<head>
<title><?php echo $title ?></title>
<link rel="stylesheet" href=<?php echo $css ?> type="text/css">
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />

   </head>

    <body>
    <?php echo $content ?>
    </body>
</html>