<?php
/**
 * Personal Pages
 *
 * 2017 - 1029 (c) Yurii K.
 */

namespace App\models;

class Framework implements ModelInterface
{
    public $title;
    public $link;
    public $check;
    public $company;
    public $company_link;
    public $type;
    public $popularity;
    public $curve;
    public $template;
    public $license;
    public $speed;
    public $code_structure;
    public $architecture;
    public $extensions;
    public $extension_type;
    public $market_share;
    public $total_value;
    public $conclusion;

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
        $data = json_decode(file_get_contents(dirname(__DIR__) . "/data/frameworks.json"), true);
        $items = [];

        foreach ($data as $item) {
            $items[] = (new static())->load($item);
        }

        return $items;
    }


}