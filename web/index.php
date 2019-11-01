<?php
$title = 'Homepage';

$skills = require 'data/skills.php';

function skill($skill)
{
    $title = $skill['title'];
    $rating = $skill['rating'] ?? null;
    $interest = $skill['interest'];
    $maxStarts = 10;
    $result = '';

    if ($rating !== null) {
        for ($i = 1; $i <= $rating; $i++) {
            $result .= '<span class="mt ' . ($interest ? '' : 'x') . '">star</span>';
        }

        for ($i = 0; $i < $maxStarts - $rating; $i++) {
            $result .= '<span class="mt ' . ($interest ? '' : 'x') . '">star_border</span>';
        }
    }

    return "<dt>$title</dt><dd>$result</dd>";
}

?>
<?php ob_start(); ?>
<div>
    <h1><img src="1f418.png" alt="elephant emoji"/></h1>
    <h3>Last update: <time><?php echo date('Y-m-d H:i', filemtime(__FILE__)); ?></time></h3>
    <div class="container page-about">
        <article>
            <p>Hello. I'm Yurii. That's all you should really know about me.</p>
            <p>But here are some more things to clarify:</p>
            <ol>
                <li>All info here is my subjective view on the field.</li>
                <li>Those are my current skills I keep updated. Grayed skills are those I'm not interested in.</li>
                <li>I'm not fond of naming errors like 'bugs' etc. I do not follow human stupidity.</li>
                <li>Hypes and other nonsense don't work for me.</li>
                <li>I'm not able to read minds. Luckily.</li>
            </ol>
        </article>

        <aside>
            <dl id="skills">
                <?php foreach ($skills as $skill) {
                    echo skill($skill);
                } ?>
            </dl>
            <div class="clear-both"></div>
        </aside>
        <div class="clear-both"></div>
    </div>
</div>

<script>
window.addEventListener('resize', function(e){
//TODO: cont width 80%
var articleEl = document.getElementsByTagName('article')[0];
var effectiveW = Math.round(window.innerWidth*0.8) - 40;
var skillsW = 270;

if(effectiveW >= 770) {
  let articleW = effectiveW - skillsW;
  articleEl.style['width'] = articleW+'px';
} else {
  let articleW = effectiveW;
  articleEl.style['width'] = articleW+'px';
}
});

window.dispatchEvent(new Event('resize'));
</script>
<?php
$content = ob_get_clean();

require '_layout.php';
