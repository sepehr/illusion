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
