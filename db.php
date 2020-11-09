<?php
require "config.php";

try {
  $connection = new PDO(
    'mysql:host=' . constant('DB_HOST') . ';dbname=' . constant('DB_NAME') . '',
    constant('DB_USER'),
    constant('DB_PASS')
  );
} catch (PDOException $e) {
  echo "Error" . $e->getMessage();
}

?>
