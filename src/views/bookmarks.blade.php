<?php

/**
 * @var array
 */
$title = 'Bookmarks';
?>
@extends('_layout')
@section('title', $title)
@section('style')
    @parent
@endsection

@section('content')
    <div class="container centered">
        <h1><?php echo $title; ?></h1>
        <article class="centered">
            <?php foreach ($bookmarks as $bookmark) { ?>
            <p><a href="<?php echo $bookmark[1]; ?>" target="_blank"><b><?php echo $bookmark[0]; ?></b> - <?php echo $bookmark[1]; ?></a></p>
            <?php } ?>
        </article>
    </div>
@endsection
