<?php
function rating($rating, $interest, $dead = false)
{
    $maxStarts = 10;
    $rating = null === $rating ? 0 : abs((int) $rating);
    $rating = $rating > $maxStarts ? $maxStarts : $rating;
    $interest = !isset($interest) || $interest ? '' : 'x';
    $stars = [];

    for ($i = 1; $i <= $rating; ++$i) {
        $stars[] = "<span class=\"mt ${interest}\">star</span>";
    }
    for ($i = 0; $i < $maxStarts - $rating; ++$i) {
        $stars[] = "<span class=\"mt ${interest}\">star_border</span>";
    }

    if ($dead) {
        $dead = 'Dead' . (is_string($dead) ? " since $dead" : '.');
        $stars[] = '<img src="assets/skull.svg" alt="dead" title="'.$dead.'" class="dead"/>';
    }

    return implode('', $stars);
}
?>
<?php ob_start(); ?>
<style type="text/css">
    article {
        margin-right: auto;
        margin-left: auto;
        max-width: 880px;
    }
    .container {
        width: 80%;
        margin-right: auto;
        margin-left: auto;
        margin-bottom: 2rem;
        padding: 0;
    }
    .skills {
        margin-left: auto;
        margin-right: auto;
        max-width: 950px;
        min-width: 950px;
        display: flex;
        flex-flow: column wrap;
        max-height: 900px; /* CHANGE HERE FOR COLUMNS! */
    }
    .skills .group {
        margin: 5px;
        padding: 0;
    }
    .skills .group .header {
        font-weight: bold;
        border: 1px dashed;
        min-width: 17.2rem;
        padding: 0.2rem;
        margin-bottom: 0.3rem;
        margin-right:0.5rem;
    }
    .skill > .title {
        float: left;
        min-width: 7rem;

    }
    img.dead {
        height: 0.9rem;
      display: inline-block;
      margin: 0;
      padding: 0;
    }
    img#logo {
      height: 2rem;
    }
    #Archangel {
      top: 5%;
      z-index: -1;
      opacity: 0.0666;
      position: absolute;
      height: 1000px;
      width: 950px;
      background: url('assets/Archangel.png') no-repeat center;
      background-size: 850px 1000px;
    }
</style>
<?php
require_once dirname(__DIR__) . '/src/SCPlayer.php';

$style = ob_get_clean();
ob_start();
?>
<h1>
  <a href="https://github.com/yurii-github" target="_blank"><img id="logo" title="go to my github account" src="assets/GitHub_Logo.png" alt="github logo"/></a>
</h1>
<div class="container">
    <article>
        <p>
            Hello. I'm Yurii. That's all you should really know about me.
            Those are my current skills I keep updated. <br>
            <em>Grayed skills are those I'm not interested in (good money can change that).</em>
        </p>
        <?= new SCPlayer(['auto_play' => true, 'url' => 'https://api.soundcloud.com/tracks/331965268'], true); ?>
    </article>
  <div class="skills">
      <code id="Archangel"></code>
      <?php foreach (require_once 'data/skills.php' as $header => $rSkills) { ?>
        <div class="group">
          <div class="header"><?php echo $header; ?></div>
          <?php foreach ($rSkills as [$title, $rating, $interest, $url, $dead]) { ?>
            <?php // if(!isset($dead)) { file_put_contents('empty.txt', $title."\n", FILE_APPEND); }?>
            <div class="skill">
              <div class="title"><?php echo $url ? "<a href=\"${url}\">${title}</a>" : $title; ?></div>
              <div class="rating"><?php echo rating($rating, $interest, $dead); ?></div>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
  </div>
</div>
<?php
$title = 'Homepage';
$content = ob_get_clean();
require '_layout.php';
