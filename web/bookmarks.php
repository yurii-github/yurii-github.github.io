<?php
ob_start();
$title = 'Bookmarks';
$bookmarks = require __DIR__ .'/data/bookmarks.php';
?>
  <div class="container centered">
    <h1><?php echo $title; ?></h1>
    <article class="centered">
        <?php foreach ($bookmarks as $bookmark): ?>
        <p><a href="<?= $bookmark[1];?>" target="_blank"><b><?= $bookmark[0];?></b> - <?= $bookmark[1];?></a></p>
        <?php endforeach; ?>
    </article>
  </div>
<?php
$content = ob_get_clean();
require '_layout.php';
