<?php
/**
 * Personal Pages
 *
 * 2017 - 2019 (c) Yurii K.
 */
/**
 * @var \App\EngineInterface $this
 * @var string $content
 * @var string $title
 */

$title = 'Homepage';

$skills = \App\models\Skill::all();
$maxStars = 10;

?>
<div class="row">
    <header class="col col-12">
        <h1><img src="<?php $this->asset('elephant.png') ?>" alt="elephant emoji"/></h1>
        <?php $this->mtime(__FILE__) ?>
    </header>
</div>

<div class="row">
    <aside class="col col-4">
        <dl id="my-skills">
            <?php foreach ($skills as $skill): ?>
                <dt><?php echo $skill->title ?></dt>
                <dd><?php $skill->rating() ?></dd>
            <?php endforeach; ?>
        </dl>
        <div class="clear-both"></div>
    </aside>
    <article class="col col-8">
        <h2>About Me</h2>
        <p>Hello. I'm Yurii. That's all you should really know about me.</p>
        <p>But here are some more things to clarify: </p>
        <ol>
            <li>All info here is my subjective view on the field.</li>
            <li>On the left side are my current skills I keep updated. Grayed items are not interesting.</li>
            <li>I'm not fond of naming errors like 'bugs' etc. I do not follow human stupidity.</li>
            <li>Hypes and other nonsense don't work for me.</li>
            <li>I'm not able to read minds. Luckily.</li>
            <li>You have some mental problems? Close this page. You were warned.</li>
        </ol>

        <h2>PHP Frameworks</h2>
        <p>When I have time and will I do track some PHP frameworks and CMS.</p>
        <h2>Patterns</h2>
        <p>Many of patterns are just regular OOP principles which people ignore to know. Instead, they create ton of
            useless names.</p>
        <p>To simplify things I provide aliases for patterns like 'Wrapper', because most of those patterns are
            simply basic or a bit complex wrappers over other objects or classes.</p>
        <p>I've added to patterns so-called by hipsters 'antipatterns' because they still are patterns and are valid
            in many cases.</p>

        <h2>Principles</h2>
        <p>Contains programming principles, at least, known as. For most part it is just another nonsense.</p>
    </article>
</div>