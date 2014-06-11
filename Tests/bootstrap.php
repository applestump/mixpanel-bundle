<?php

$file = __DIR__.'/../vendor/autoload.php';
if (!file_exists($file)) {
    throw new RuntimeException('Install dependencies to run test suite.');
}

$autoload = require_once $file;

use Doctrine\Common\Annotations\AnnotationRegistry;
AnnotationRegistry::registerLoader(function($class) {
    if (strpos($class, 'Applestump\MixpanelBundle\Annotations\\') === 0) {
        $path = __DIR__.'/../'.str_replace('\\', '/', substr($class, strlen('Applestump\MixpanelBundle\\'))) .'.php';
        require_once $path;
    }

    return class_exists($class, false);
});