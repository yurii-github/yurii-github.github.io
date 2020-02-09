<?php

/**
 * @var array $principles
 */
$title = 'Principles';
?>
@extends('_layout')
@section('title', 'DUMMY')
@section('style')
    @parent
@endsection

@section('content')
    <div class="container centered">
        <h1><?php echo $title; ?> (mostly hipster names)</h1>
        <article class="centered">
            <?php foreach ($principles as $principle): ?>
            <p><b><?= $principle[0]; ?></b> - <?= $principle[1]; ?></p>
            <?php endforeach; ?>
        </article>
    </div>
@endsection
