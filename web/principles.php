<?php
$title = 'Principles';
?>
<?php ob_start(); ?>
    <div class="container">
        <h1><?php echo $title; ?></h1>
        <article>
            <p>List of principles (hipster names):</p>
            <p><b>SRP</b> (single responsibility principle)</p>
            <p><b>DIP</b> (dependency injection principle)</p>
            <p><b>TDD</b> (test driven development)</p>
            <p><b>BDD</b> (behavior driven development)</p>
            <p><b>DRY</b> (Don't repeat yourself)</p>
            <p><b>KISS</b> (Keep it simple, stupid), I would call it 'Keep it simply stupid'</p>
            <p><b>DIE</b> (Duplication is evil)</p>
            <p><b>XP</b> (extreme programing)</p>
            <p><b>Agile</b> (stolen RUP with faster cycles)</p>
            <p><b>Scrum</b> (stolen RUP with faster cycles and process names created specifically for kids)</p>
            <p><b>SOLID</b> (another nonsense from people without OOP background)</p>
            <p><b>* Boy Scout Rule</b> (leave code more clean) - <i>one principle I think is good</i></p>
            <p><b>* RUP</b> (Rational Unified Process) - <i>true iterative development process created by professionals, not someone's project on milking money on useless certifications</i>
            <p><b>Waterfall</b> (people should return to <a href="https://www.youtube.com/watch?v=DMZzGynP2OE" target="_blank">waterfall</a>, relax and enjoy..)</p>
        </article>
    </div>
<?php
$content = ob_get_clean();
require '_layout.php';
