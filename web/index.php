<?php
$title = 'Homepage';

$skills = require 'data/skills.php';

function rating($rating, $interest = true)
{
    $maxStarts = 10;
    $rating = is_null($rating) ? 0 : abs((int)$rating);
    $rating = $rating > $maxStarts ? $maxStarts : $rating;
    $interest = !isset($interest) || $interest ? '' : 'x';
    $stars = [];

    for ($i = 1; $i <= $rating; $i++) {
        $stars[] = "<span class=\"mt $interest\">star</span>";
    }
    for ($i = 0; $i < $maxStarts - $rating; $i++) {
        $stars[] = "<span class=\"mt $interest\">star_border</span>";
    }

    return implode('', $stars);
}
?>

<?php ob_start(); ?>
<style type="text/css">
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
    width: 18em;
  }

  .skills .group .header {
    font-weight: bold;
    border: 1px dashed;
    min-width: 17rem;
    padding: 0.2rem;
  }

  .skill > .title {
    float: left;
    min-width: 7rem;

  }
</style>
<?php
$style = ob_get_clean();
ob_start();
?>
<h1><img src="1f418.png" alt="elephant emoji"/></h1>
<h3>Last update: <time><?php echo date('Y-m-d H:i', filemtime(__FILE__)); ?></time></h3>
<div class="container page-about">
  <article style="margin-right: auto; margin-left: auto; max-width: 880px">
    <p>
      Hello. I'm Yurii. That's all you should really know about me.<br/>
      Those are my current skills I keep updated. Grayed skills are those I'm not interested in.
    </p>
    <hr />
  </article>
  <div class="skills">
      <?php foreach ($skills as $header => $rSkills): ?>
        <div class="group">
          <div class="header"><?php echo $header; ?></div>
          <?php foreach ($rSkills as [$title, $rating, $interest]): ?>
            <div class="skill">
              <div class="title"><?= $title; ?></div>
              <div class="rating"><?= rating($rating, $interest); ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
  </div>
</div>
<?php
$content = ob_get_clean();
require '_layout.php';
