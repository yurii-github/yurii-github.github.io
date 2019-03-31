<?php
/**
 * Personal Pages
 *
 * 2017 - 1029 (c) Yurii K.
 */
/**
 * @var \App\EngineInterface $this
 * @var string $content
 * @var string $title
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link rel="stylesheet" href="<?php $this->asset('style.css') ?>"/>
    <link rel="icon" type="image/png" href="<?php $this->asset('elephant.png') ?>"/>
</head>
<body>

<div class="container">
    <nav>
        <a class="mt" href="/">home</a>
        <a href="<?php echo $this->action('pages/frameworks') ?>">Frameworks</a>
        <a href="<?php echo $this->action('pages/patterns') ?>">Patterns</a>
        <a href="<?php echo $this->action('pages/principles') ?>">Principles</a>
        <a href="<?php echo $this->action('pages/tools/prefix') ?>">Prefix</a>
    </nav>

    <?php echo $content; ?>
</div>

</body>