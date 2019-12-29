<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="icon" type="image/png" href="1f418.png"/>

    <?php echo isset($style) ? $style : ''; ?>
</head>
<body>
    <nav>
        <a class="mt" href="/">home</a>
        <a href="frameworks.php">Frameworks</a>
        <a href="patterns.php">Patterns</a>
        <a href="principles.php">Principles</a>
        <a href="tools.php">Tools</a>
    </nav>
    <?php echo $content; ?>
</body>
