<?php
$title = 'Principles';

?>
<?php ob_start(); ?>
    <div class="container">
        <h1><?php echo $title;?></h1>
        <article>
            <p>Another list of retarded names that came from hipsters or simply retards:</p>
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
            <p>&nbsp;</p>
            <p>Summing up, one principle I think can be good is "<b>Boy Scout Rule - leave code more clean</b>"</p>
            <p><b>RUP</b> (Rational Unified Process) - true iterative development process created by professionals, not someone's project on milking money on useless certifications.</p>
        </article>
    </div>
<?php
$content = ob_get_clean();
require '_layout.php';