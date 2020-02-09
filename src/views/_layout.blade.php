<!DOCTYPE html>
<html lang="en">
<!--
     __/)     (\__
  ,-'~~(       )~~`-.
 /      \  _  /      \
|       /_(_)_\       |
|     _(/(\_/)\)_     |
|    / // \ / \\ \    |
 \  |  '' / \ ''  |  /
  \  )   /   \   (  /
   )/   /     \   \(
   '    `-`-'-'    `
<?= 'Page build: ' . date('Y-m-d H:i:s T'); ?>
-->
<head>
    <meta charset="utf-8"/>
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link rel="stylesheet" href="assets/style.css"/>
    <link rel="icon" type="image/png" href="assets/Archangel.png"/>
    @yield('style')
</head>
<body>
<nav>
    <a class="mt" href="/">home</a>
    <a href="/bookmarks">Bookmarks</a>
    <a href="/frameworks">Frameworks</a>
    <a href="/patterns">Patterns</a>
    <a href="/principles">Principles</a>
    <a href="/tools">Tools</a>
</nav>
@yield('content')
</body>
</html>
