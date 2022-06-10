<?php
if (!function_exists('setInterval')) {
    function setInterval($f, $milliseconds)
    {
        $seconds = (int)$milliseconds / 1000;
        while (true) {
            $f();
            sleep($seconds);
        }
    }
}
