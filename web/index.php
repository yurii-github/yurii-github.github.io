<?php
$title = 'Homepage';

?>
<?php ob_start(); ?>
<div>
    <h1><?php echo $title; ?></h1>
    <div class="container page-about">
        <article>
            <p> Hello.</p>
            <p>I'm Yurii. That's all you should really know about me.</p>
            <p>All info here is my subject view on the field. Any comments are welcome. If you agree or not, maybe you have some intel that can change my view on things.</p>

            <h2>PHP Frameworks</h2>
            <p>I do track some of PHP frameworks and CMS. I provide them with my comments in comparision table</p>

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

        var star = {full: '<span class="mt">star</span>', empty: '<span class="mt">star_border</span>'};
        var maxStarts = 10;
        var dl = document.getElementById('skills');

        skills.forEach((skill) => {
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
