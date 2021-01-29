<?php
?>

<section id="top_section">
  <h1 id="top_title">愛媛県庁デモサイト</h1>
  <!-- 画像表示を条件分岐 -->
  <?php if($n === '0'): ?>
    <img id="top_image" src="img/matsuyama_castle.jpg">
  <?php endif; ?>
</section>
<!-- 試験環境情報 -->
<div id="test_env_info_div">
  <!-- $n === '0' -->
  <?php if($n === '0'): ?>
    <div id="white_circle">
      <h2 id="ehime"><span style="font-size: .8em;">愛の国<br>笑顔あふれる<br></span>愛媛県
      </h2>
      <p><?= $user['rand_id']; ?></p>
    </div>
  <?php endif; ?>
  <!-- $n === '1' -->
  <?php if($n === '1'): ?>
    <p><?= $user['rand_id']; ?></p>
  <?php endif; ?>
</div>
<!-- 非常時用表示アラート -->
<?php if($n === '1'): ?>
<div id="emergency_alart">
  <h2><span style="font-size: 1.5em;">&#x26a0</span>非常時用表示</h2>
  <p>現在、県民の皆様によるアクセスが集中しております。サーバの負荷を軽減するため、当サイトの表示を簡易版切り替えています。</p>
</div>
<?php endif; ?>
