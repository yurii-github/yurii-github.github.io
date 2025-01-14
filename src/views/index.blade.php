<?php

use app\SCPlayer;

function rating(?int $rating, ?bool $interest, mixed $dead): string
{
    $maxStarts = 10;
    $rating = null === $rating ? 0 : abs((int) $rating);
    $rating = min($rating, $maxStarts);
    $interest = !isset($interest) || $interest ? '' : 'x';
    $stars = [];

    for ($i = 1; $i <= $rating; ++$i) {
        $stars[] = "<span class=\"mt {$interest}\">star</span>";
    }
    for ($i = 0; $i < $maxStarts - $rating; ++$i) {
        $stars[] = "<span class=\"mt {$interest}\">star_border</span>";
    }

    if ($dead) {
        $dead = 'Dead'.(is_string($dead) ? " since {$dead}" : '.');
        $stars[] = '<img src="assets/skull.svg" alt="dead" title="'.$dead.'" class="dead"/>';
    }

    return implode('', $stars);
}

function getLastTouch(): string
{
    return date_format(new DateTime(), 'Y-m-d H:i:s.u');
}

?>
<?php
/**
 * @var array $skills
 */
?>
@extends('_layout')
@section('title', 'Homepage')
@section('style')
@parent
    <style>
        .skills {
            margin-left: auto;
            margin-right: auto;
            max-width: 900px;
            min-width: 900px;
            display: flex;
            flex-flow: column wrap;
            max-height: 1300px; /* CHANGE HERE FOR COLUMNS! */
        }

        .skills .group {
            margin: 5px;
            padding: 0;
        }

        .skills .group .header {
            font-weight: bold;
            border: 1px dashed;
            min-width: 17.2rem;
            padding: 0.2rem;
            margin-bottom: 0.3rem;
            margin-right: 0.5rem;
        }

        .skill > .title {
            float: left;
            min-width: 7rem;

        }

        img.dead {
            height: 0.9rem;
            display: inline-block;
            margin: 0;
            padding: 0;
        }

        img#github-logo {
            height: 2rem;
        }

        p.last-touch {
            font-size: small;
            font-style: italic;
            text-align: center;
        }

        #Archangel {
            top: 5%;
            z-index: -1;
            opacity: 0.0666;
            position: absolute;
            height: 1000px;
            width: 950px;
            background: url('assets/Archangel.png') no-repeat center;
            background-size: 900px 1000px;
        }
    </style>
@endsection
@section('content')
    <h1>
        <a href="https://github.com/yurii-github" target="_blank">
            <img id="github-logo" title="go to my github account" src="assets/GitHub_Logo.png" alt="github logo"/>
        </a>
    </h1>
    <div class="container centered">
        <article class="centered">
            <p>
                Hello. I'm Yurii. That's all you should really know about me.
                Those are my current skills I keep updated. <br>
                <em>Grayed skills are those I'm not interested in (good money may change that).</em>
            </p>
            <?php echo new SCPlayer(['url' => 'https://api.soundcloud.com/tracks/331965268'], true); ?>
            <p class="last-touch"><b>Last touch</b> {{ getLastTouch()  }}</p>
        </article>
        <hr style="width: 500px">
        <div class="skills">
            <code id="Archangel"></code>
            <?php foreach ($skills as $groupTitle => $rSkills) { ?>
            <div class="group">
                <div class="header"><?php echo $groupTitle; ?></div>
                <?php foreach ($rSkills as $skill) { ?>
                <div class="skill">
                    @if(isset($skill[3]))
                        <div class="title"><?php echo $skill[3] ? "<a href=\"{$skill[3]}\">{$skill[0]}</a>" : $skill[0]; ?></div>
                    @endif
                    <div class="rating"><?php echo rating($skill[1], $skill[2] ?? false, $skill[4] ?? false); ?></div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
@endsection
