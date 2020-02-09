<?php

/**
 * @var array $bookmarks
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
        <h1><?= $title; ?></h1>
        <article class="centered">
            <?php foreach ($bookmarks as $bookmark): ?>
            <p><a href="<?= $bookmark[1];?>" target="_blank"><b><?= $bookmark[0];?></b> - <?= $bookmark[1];?></a></p>
            <?php endforeach; ?>
        </article>
    </div>
@endsection
