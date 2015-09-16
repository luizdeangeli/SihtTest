<?php

function AutoLoadApplication($pClassName) {
    $fileClass = "./" . $pClassName . ".php";
    if (file_exists($fileClass))
        require_once $fileClass;
}

spl_autoload_register("AutoLoadApplication");


