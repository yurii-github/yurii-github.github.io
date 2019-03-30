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

    /**
     * create file with content, and create folder structure if doesn't exist
     * @param String $filepath
     * @param String $data
     */
    public static function filePutContents($filepath, $data)
    {
        $isInFolder = preg_match("/^(.*)\/([^\/]+)$/", $filepath, $filepathMatches);
        if ($isInFolder) {
            $folderName = $filepathMatches[1];
            $fileName = $filepathMatches[2];
            if (!is_dir($folderName)) {
                mkdir($folderName, 0777, true);
            }
        }
        file_put_contents($filepath, $data);
    }
}