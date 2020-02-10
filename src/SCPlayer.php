<?php

namespace app;

/**
 * Dummy wrapper for SoundCloud Player.
 */
class SCPlayer
{
    protected const URL = 'https://w.soundcloud.com/player';
    protected array $options = [
        'url' => 'https://api.soundcloud.com/tracks/331965268',
        'color' => '#dddddd',
        'buying' => false,
        'download' => false,
        'following' => false,
        'visual' => false,
        'auto_play' => true,
        'hide_related' => false,
        'inverse' => false,
        'liking' => false,
        'sharing' => false,
        'show_artwork' => false,
        'show_comments' => false,
        'show_playcount' => true,
        'show_user' => false,
        'show_reposts' => false,
        'show_teaser' => false,
        'single_active' => true,
        'locale' => 'en',
    ];
    protected string $id;
    protected bool $isMini;

    public function __construct(array $options, bool $isMini = false, $id = 'sc-player')
    {
        $this->options = array_merge($this->options, $options);
        $this->isMini = $isMini;
        $this->id = $id;
    }

    public function __toString()
    {
        return $this->render();
    }

    public function render()
    {
        $miniStyle = $this->isMini ? 'height: 20px;' : ''; // hax
        return <<<HTML
<style>
iframe#{$this->id} {
    border: none;
    width: 100%;
    margin-bottom: 1rem;
    ${miniStyle}
}
</style>
<iframe id="{$this->id}" allow="autoplay" allowtransparency="true" src="{$this->buildPlayerUrl()}"></iframe>
HTML;
    }

    protected function buildPlayerUrl()
    {
        $query = http_build_query(array_map(function ($val) {
            return \is_bool($val) ? ['false', 'true'][$val] : $val;
        }, $this->options));

        return static::URL.'?'.$query;
    }
}
