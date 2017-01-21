<?php

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable. Supports a fallback.
     *
     * @param  string $key
     * @param  mixed $default
     *
     * @return mixed
     */
    function env($key, $default = null)
    {
        return getenv($key) ?: $default;
    }
}

if (! function_exists('base_path')) {
    /**
     * Returns the full absolute path to the base directory.
     *
     * @param  string $path
     *
     * @return string
     */
    function base_path($path = '')
    {
        return realpath(__DIR__ . '/..') . '/' . $path;
    }
}

if (! function_exists('storage_path')) {
    /**
     * Returns the full absolute path to storage/ directory.
     *
     * @param  string $path
     *
     * @return string
     */
    function storage_path($path = '')
    {
        return base_path("storage/$path");
    }
}

if (! function_exists('config_path')) {
    /**
     * Returns the full absolute path to config/ directory.
     *
     * @param  string $path
     *
     * @return string
     */
    function config_path($path = '')
    {
        return base_path("config/$path");
    }
}
