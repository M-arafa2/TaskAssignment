<?php

// load all classes in /classes folder
//with .class.php extension.
define('ROOT', dirname(__DIR__));
define('SLASH', DIRECTORY_SEPARATOR);

spl_autoload_register(function ($className) {
    $fileName = sprintf("%s%sTaskAssignment/classes%s%s.class.php", ROOT, SLASH, SLASH, str_replace("\\", "/", $className));

    if (file_exists($fileName)) {
        require($fileName);
    } else {
        echo "file not found {$fileName}";
    }
});
