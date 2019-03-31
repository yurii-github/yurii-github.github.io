<?php
/**
 * Personal Pages
 *
 * 2017 - 1029 (c) Yurii K.
 */

namespace App;

final class Helper
{
    public static function drawStars($stars, $maxStars = 10)
    {
        if ($stars === null) {
            return;
        }

        $output = '';
        $stars = (int)$stars;
        for ($i = 1; $i <= $maxStars; $i++) {
            if ($stars >= $i) {
                $output .= '<span class="mt">star</span>';
            } else {
                $output .= '<span class="mt">star_border</span>';
            }
        }

        echo $output;
    }

}