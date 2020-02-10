<?php

/**
 * @var array $principles
 */
$title = 'Principles';
?>
@extends('_layout')
@section('title', $title)
@section('style')
    @parent
@endsection

@section('content')
    <div class="container centered">
        <h1><?php echo $title; ?> (mostly hipster names)</h1>
        <article class="centered">
            <?php foreach ($principles as $principle) { ?>
            <p><b><?php echo $principle[0]; ?></b> - <?php echo $principle[1]; ?></p>
            <?php } ?>
        </article>
    </div>
@endsection
