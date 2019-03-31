<?php
/**
 * Personal Pages
 *
 * 2017 - 1029 (c) Yurii K.
 */

namespace App\models;

use App\Helper;

class Skill implements ModelInterface
{
    public $title;
    public $rating;
    public $interested = false;

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


    public function rating($asStar = true)
    {
        if (!$asStar) {
            return $this->rating;
        }

        Helper::drawStars($this->rating, 10, $this->interested ? 'mt' : 'mt-g');
    }
}