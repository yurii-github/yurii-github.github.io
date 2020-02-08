<?php
$title = 'Principles';
ob_start();
$principles = require __DIR__ . '/data/principles.php';
?>
  <div class="container centered">
    <h1><?php echo $title; ?> (mostly hipster names)</h1>
    <article class="centered">
        <?php foreach ($principles as $principle): ?>
          <p><b><?= $principle[0]; ?></b> - <?= $principle[1]; ?></p>
        <?php endforeach; ?>
    </article>
  </div>
<?php
$content = ob_get_clean();
require '_layout.php';
