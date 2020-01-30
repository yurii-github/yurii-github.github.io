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
        $dead = 'Project is dead' . (is_string($dead) ? " since $dead" : '.');
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
        max-width: 1000px;
        min-width: 950px;
        display: flex;
        flex-flow: column wrap;
        max-height: 700px;
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
</style>
<?php
$style = ob_get_clean();
ob_start();
?>
<h1>
  <a href="https://github.com/yurii-github" target="_blank"><img src="assets/1f418.png" alt="elephant emoji"/></a>
</h1>
<div class="container">
    <article>
        <p>
            Hello. I'm Yurii. That's all you should really know about me.
            Those are my current skills I keep updated. <br>
            <em>Grayed skills are those I'm not interested in.</em>
        </p>
      <iframe width="100%" height="166" scrolling="no" frameborder="no" allow="autoplay"
              src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/331965268&color=%23dddddd&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe>
        <hr/>
    </article>
  <div class="skills">
      <?php foreach (require_once 'data/skills.php' as $header => $rSkills) { ?>
        <div class="group">
          <div class="header"><?php echo $header; ?></div>
          <?php foreach ($rSkills as [$title, $rating, $interest, $url, $dead]) { ?>
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
