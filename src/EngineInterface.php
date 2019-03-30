<?php
/**
 * Personal Pages
 *
 * 2017 - 1029 (c) Yurii K.
 */

namespace App;

interface EngineInterface
{
    /**
     * Handles request
     *
     * @return mixed
     */
    public function handle();

    /**
     * Returns proper asset web location
     *
     * @param string $path
     *
     * @return string
     */
    public function asset(string $path);
}