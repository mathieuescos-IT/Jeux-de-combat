<?php

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    $class = str_replace(__NAMESPACE__, strtolower(__NAMESPACE__), $class);
    require $class.'.php';
});
