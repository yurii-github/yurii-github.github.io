<?php
$title = 'Homepage';

$skills = require 'data/skills.php';

function skill($skill)
{
    $title = $skill['title'];
    $rating = $skill['rating'] ?? null;
    $interest = (bool)$skill['interest'] ? '' : 'x';
    $maxStarts = 10;
    $result = '';

    if ($rating !== null) {
        for ($i = 1; $i <= $rating; $i++) {
            $result .= "<span class=\"mt $interest\">star</span>";
        }
        for ($i = 0; $i < $maxStarts - $rating; $i++) {
            $result .= "<span class=\"mt $interest\">star_border</span>";
        }
    }

    return <<<HTML
<dt>$title</dt>
<dd>$result</dd>
HTML;
}

?>
<?php ob_start(); ?>
<h1><img src="1f418.png" alt="elephant emoji"/></h1>
<h3>Last update:
  <time><?php echo date('Y-m-d H:i', filemtime(__FILE__)); ?></time>
</h3>
<div class="container page-about">
  <article>
    <p>Hello. I'm Yurii. That's all you should really know about me.</p>
    <p>Those are my current skills I keep updated. Grayed skills are those I'm not interested in.</p>
  </article>
  <dl>
      <?php foreach ($skills as $skill) {
          echo skill($skill);
      } ?>
  </dl>
</div>

<?php
$content = ob_get_clean();

require '_layout.php';
