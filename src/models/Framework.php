<?php
/**
 * Personal Pages
 *
 * 2017 - 1029 (c) Yurii K.
 */

namespace App\models;

use App\Helper;

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

    public function popularity($asStar = true)
    {
        return $this->asStar('popularity', $asStar);
    }

    public function market_share($asStar = true)
    {
        return $this->asStar('market_share', $asStar);
    }

    public function curve($asStar = true)
    {
        return $this->asStar('curve', $asStar);
    }

    public function speed($asStar = true)
    {
        return $this->asStar('speed', $asStar);
    }

    public function code_structure($asStar = true)
    {
        return $this->asStar('code_structure', $asStar);
    }

    public function extensions($asStar = true)
    {
        return $this->asStar('extensions', $asStar);
    }

    protected function asStar($attribute, $asStar = true)
    {
        if (!$asStar) {
            return $this->$attribute;
        }

        Helper::drawStars($this->$attribute, 5);
    }

    public function link()
    {
        return "<a target=\"_blank\" rel=\"nofollow\" href=\"{$this->link}\">{$this->title}</a>";
    }

}