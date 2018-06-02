<?php
$title = 'Tools';

?>
<?php ob_start(); ?>
    <div class="container">
    <h1><?php echo $title; ?></h1>
    <article>
        <nav style="display: block; float: none">
            <a href="tools/prefix.html">1.Prefix</a>
            <a href="tools/cloth-size.html">2.Close Size</a>
        </nav>
    </article>
<?php
$content = ob_get_clean();
require '_layout.php';
