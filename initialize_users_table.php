<?php

require_once __DIR__ . '/mysqli/mysqli.php';

//関数宣言

//テーブルの削除
function dropTable ($link) {
  $dropTableSql = 'DROP TABLE IF EXISTS users;';
  $result = mysqli_query($link, $dropTableSql);

  if ($result) {
    echo 'テーブルを削除しました。' .PHP_EOL;
  }
  else {
    echo 'テーブルを削除できませんでした。' .PHP_EOL;
    echo 'Debbuging Error: ' . mysqli_error($link) .PHP_EOL;
  }
}

//テーブルの作成
function createTable ($link) {
  $createTableSql = <<<EOT
    CREATE TABLE users (
      id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
      addr VARCHAR(255),
      rand_id VARCHAR(8),
      n VARCHAR(1),
      date DATETIME,
      agent VARCHAR(255)
    ) DEFAULT CHARACTER SET=utf8mb4;
  EOT;

  $result = mysqli_query($link, $createTableSql);

  if ($result) {
    echo 'テーブルを作成しました。' .PHP_EOL;
  }
  else {
    echo 'テーブルを作成できませんでした。' .PHP_EOL;
    echo 'Debbuging Error: ' . mysqli_error($link) .PHP_EOL;
  }
}

//処理

$link = dbconnect();
dropTable($link);
createTable($link);
dbClose($link);
