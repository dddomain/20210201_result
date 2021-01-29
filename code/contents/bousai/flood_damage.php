<?php

  //GETパラメータの取得
  if (isset($_GET['n'])) {
    $n = $_GET['n'];
    if ($_GET['n'] === '') {
      //GETパラメータが空文字であるときの例外処理
      $n = '0';
    }
  }
  else {
    //GETパラメータがセットされていないときの例外処理
    $n = '0';
  }
  
?>
<!DOCKTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>県庁デモサイト</title>
  <!-- スタイルシートを条件分岐 -->
  <?php if($n === '0'): ?>
    <!-- <link rel="stylesheet" type="text/css" href="../../css/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="../../css/slick/slick-theme.css"/> -->
    <link href="../../css/normal.css" rel="stylesheet">
  <?php elseif($n === '1'): ?>
    <link href="css/emergency.css" rel="stylesheet">
  <?php endif; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <section>
    <h2 id="flood_damage_title">雨量・水位・ダム・土砂災害警戒情報</h2>
    <nav id="flood_damage_div">
      <ul id="flood_damage_ul">
        <li>愛媛県災害対策本部・警戒本部関係情報</li>
        <li>愛媛県被災地支援本部</li>
        <li>雨量・水位・ダム・土砂災害警戒情報</li>
        <li>道路通行規制情報</li>
        <li>災害時の伝言ダイヤル等</li>
        <li>ライフライン障害情報（通信・電気・ガス）</li>
      </ul>
    </nav>
  </section>
</body>