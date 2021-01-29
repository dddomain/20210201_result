<?php

//タイムゾーン
date_default_timezone_set('Asia/Tokyo');

//ファイルの読み込み
require_once __DIR__ . '/mysqli/mysqli.php';

// 関数宣言
function create_rand(){
  $str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
  $rand_id = null;
  for ($i = 0; $i < 8; $i++) {
    $rand_id .= $str[rand(0, count($str) - 1)];
  }
  return $rand_id;
}

function getUser($selectedAddrs){
  //ファイルを開いた（＝アクセスされた）時点で情報を変数に代入
  $user = [];
    //サイト表示の条件分岐
  // $n = '1';
  // if (count($selectedAddrs) > 19){ //2少ないので正しくなる
  //   $n = '1';
  // }
  $user['addr'] = $_SERVER["REMOTE_ADDR"];
  $user['date'] = date('Y-m-d H:i:s');
  $user['rand_id'] = create_rand();
  $user['n'] = $n;
  $user['agent'] = $_SERVER["HTTP_USER_AGENT"];

  return $user;
}

// ------------------- 処理 --------------------

//データベース接続
$link = dbConnect();
//データ取得
$selectedAddrs = selectUsers($link);
$user = getUser($selectedAddrs);
$n = $user['n'];

//IPアドレスが先に格納されているものと一致しなかったら
// if (in_array($user['addr'], $selectedAddrs)) {
  //変数の値をデータベースに格納
createUser($link, $user);
//データベース切断
dbClose($link);

?>
<!DOCKTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>県庁デモサイト</title>
  <!-- スタイルシートを条件分岐 -->
  <?php if($n === '0'): ?>
    <link rel="stylesheet" type="text/css" href="css/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="css/slick/slick-theme.css"/>
    <link href="css/normal.css" rel="stylesheet">
  <?php elseif($n === '1'): ?>
    <link href="css/emergency.css" rel="stylesheet">
  <?php endif; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <!-- contents -->
  <!-- sectionで条件分岐 -->
  <?php echo("hello"); ?>
  <?php include('contents/top.php'); ?>
  <?php if($n === '0') : ?>
    <?php include('contents/photo_gallery.php'); ?> 
  <?php endif; ?>
  <?php include('contents/kensei.php'); ?> 
  <?php include('contents/bousai.php'); ?>

  <!-- JSを条件分岐 -->
  <?php if ($n === '0'): ?>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/slick/slick.min.js"></script>		
    <script>
      // 画面幅を取得
      let intViewportWidth = window.innerWidth;
      console.log(intViewportWidth);

      $(document).ready(function(){
        $('.loop_wrap').slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          responsive: [
            {
              breakpoint: 1400,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000
              }
            },
            {
              breakpoint: 1000,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000
              }
            },
          ]
        });
      });
    </script>
  <?php endif; ?>
  <?php if($n === '0'): ?>
    <?php for ($i=1; $i <= 4000; $i++): ?>
      <?php echo '0'; ?>
    <?php endfor; ?>
  <?php elseif($n === '1'): ?>
    <?php for ($i=1; $i <= 1000; $i++): ?>
      <?php echo '1'; ?>
    <?php endfor; ?>
  <?php endif; ?>
</body>
</html>