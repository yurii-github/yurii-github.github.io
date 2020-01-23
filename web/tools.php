<?php ob_start(); ?>
    <div class="container">
    <h1><?php echo $title; ?></h1>
    <article>
        <nav style="display: block; float: none">
            <a href="tools/prefix.html">Prefix</a>
            <a href="tools/decode.html">Decode</a>
            <a href="tools/cloth-size.html">Close Size</a>
        </nav>
    </article>
<?php
$title = 'Tools';
$content = ob_get_clean();
require '_layout.php';
