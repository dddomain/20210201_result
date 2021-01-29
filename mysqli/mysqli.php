<?php

require __DIR__ . '/../vendor/autoload.php';

//関数宣言

//接続
function dbConnect() {
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
  $dotenv->load();
  //環境変数を変数に代入
  $dbHost = $_ENV['DB_HOST'];
  $dbUsername = $_ENV['DB_USERNAME'];
  $dbPassword = $_ENV['DB_PASSWORD'];
  $dbDatabase = $_ENV['DB_DATABASE'];

  $link = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbDatabase);

  //例外処理
  if (!$link) {
    echo "Error: データベースに接続できません。".PHP_EOL;
    exit;
  }

  return $link;
}

//データの取得
function selectUsers ($link) {

  $selectUsersSql = 'SELECT addr FROM users;';
  $result = mysqli_query($link, $selectUsersSql);

  $selectedAddrs = [];
  foreach($result as $selectedAddr){
    array_push($selectedAddrs, $selectedAddr['addr']);
  }

  //例外処理
  if (!$result) {
    echo "Error: データを取得できませんでした。". PHP_EOL;
    echo "Debbuging Error: " . mysqli_error($link) . PHP_EOL;
    exit;
  }

  return $selectedAddrs;
}

//データの追加
function createUser ($link, $user) {

  $createUserSql = <<<EOT
    INSERT INTO users (
      addr,
      date,
      rand_id,
      n,
      agent
    ) VALUES (
      "{$user['addr']}",
      "{$user['date']}",
      "{$user['rand_id']}",
      "{$user['n']}",
      "{$user['agent']}"
    )
  EOT;

  $result = mysqli_query($link, $createUserSql);

  //例外処理
  if (!$result) {
    echo "Error: データを追加できませんでした。". PHP_EOL;
    echo "Debbuging Error: " . mysqli_error($link) . PHP_EOL;
    exit;
  }
}

//切断
function dbClose ($link) {
  mysqli_close($link);
}