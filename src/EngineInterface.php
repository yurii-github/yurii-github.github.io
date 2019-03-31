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
     * Returns proper action link
     *
     * @param string $pageName
     *
     * @return string
     */
    public function action(string $pageName);

    /**
     * Returns proper asset web location
     *
     * @param string $path
     *
     * @return string
     */
    public function asset(string $path);

    /**
     * Returns last update time
     *
     * @param string $filename
     *
     * @return string
     */
    public function mtime(string $filename);

    /**
     * Returns routes as [url => view]
     *
     * @return array
     */
    public function routes();

    /**
     * Renders view
     *
     * @param string $name view name
     * @param array $params
     *
     * @return string
     */
    public function view(string $name, array $params = []);
}