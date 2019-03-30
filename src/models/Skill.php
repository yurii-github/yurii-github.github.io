<?php
/**
 * Personal Pages
 *
 * 2017 - 1029 (c) Yurii K.
 */

namespace App\models;

class Skill implements ModelInterface
{
    public $title;
    public $rating;

    public function load($data)
    {
        foreach ($data as $k => $v) {
            $this->$k = $v;
        }

        return $this;
    }

    /**
     * @return static[]
     */
    public static function all()
    {
        $data = json_decode(file_get_contents(dirname(__DIR__) . "/data/skills.json"), true);
        $items = [];

        foreach ($data as $item) {
            $items[] = (new static())->load($item);
        }

        return $items;
    }


}