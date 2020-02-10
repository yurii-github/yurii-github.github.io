<?php

$title = 'Tools';
?>
@extends('_layout')
@section('title', $title)
@section('style')
    @parent
@endsection

@section('content')
    <div class="container">
        <h1><?php echo $title; ?></h1>
        <article>
            <nav style="display: block; float: none">
                <a href="/tools/prefix">Prefix</a>
                <a href="/tools/decode">Decode</a>
                <a href="/tools/cloth-size">Close Size</a>
            </nav>
        </article>
    </div>
@endsection
