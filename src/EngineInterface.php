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

    /**
     * Returns data by its name
     *
     * @param string $name
     *
     * @return \stdClass[]
     */
    public function getData(string $name);

    /**
     * Returns last update time
     *
     * @param string $filename
     *
     * @return string
     */
    public function mtime(string $filename);
}