<?php
$title = 'Homepage';

?>
<?php ob_start(); ?>
<div>
    <h1><img src="1f418.png" alt="elephant emoji"/></h1>
    <h3>Last update: <time><?php echo date('Y-m-d H:i', filemtime(__FILE__)); ?></time></h3>
    <div class="container page-about">
        <article>
            <h2>About Me</h2>
            <p>Hello. I'm Yurii. That's all you should really know about me.</p>
            <p>But here are some more things to clarify:
            <ol>
                <li>All info here is my subjective view on the field.</li>
                <li>Those are my current skills I keep updated. Grayed skills are those I'm not interested in.</li>
                <li>I'm not fond of naming errors like 'bugs' etc. I do not follow human stupidity.</li>
                <li>Hypes and other nonsense don't work for me.</li>
                <li>I'm not able to read minds. Luckily.</li>
            </ol>
            </p>
            <p></p>

            <h2>PHP Frameworks</h2>
            <p>When I have time and will I do track some PHP frameworks and CMS.</p>
            <h2>Patterns</h2>
            <p>Many of patterns are just regular OOP principles which people ignore to know. Instead, they create ton of useless names.</p>
            <p>To simplify things I provide aliases for patterns like 'Wrapper', because most of those patterns are simply basic or a bit complex wrappers over other objects or classes.</p>
            <p>I've added to patterns so-called by hipsters 'antipatterns' because they still are patterns and are valid in many cases.</p>

            <h2>Principles</h2>
            <p>Contains programming principles, at least, known as. For most part it is just another nonsense.</p>
        </article>

        <aside>
            <dl id="skills"></dl>
            <div class="clear-both"></div>
        </aside>
        <div class="clear-both"></div>
    </div>
</div>

<script>
    let skills = <?php echo require 'data/skills.php';?>;

    function rating(star, rate, maxStarts)
    {
        var val = parseInt(rate, 10);
        var rating = '';
        if (!isNaN(val)) {
            for (let i = 1; i <= val; i++) {
                rating += star.full;
            }
            for (let i = 0; i < maxStarts - val; i++) {
                rating += star.empty;
            }
        }
        return rating;
    }

    function drawStars()
    {
        console.log('Homepage: componentDidMount');

        var maxStarts = 10;
        var dl = document.getElementById('skills');

        skills.forEach((skill) => {
            if (skill.interest == 0) {
                var star = {full: '<span class="mt x">star</span>', empty: '<span class="mt x">star_border</span>'};
            } else {
                var star = {full: '<span class="mt">star</span>', empty: '<span class="mt">star_border</span>'};
            }
            var _dt = document.createElement('dt');
            _dt.innerHTML = skill.title;
            var _dd = document.createElement('dd');
            _dd.innerHTML = rating(star, skill.rating, maxStarts);
            dl.appendChild(_dt);
            dl.appendChild(_dd);
        });

        // RESIZE
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
    }
    drawStars();
</script>
<?php
$content = ob_get_clean();

require '_layout.php';