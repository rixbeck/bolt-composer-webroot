<?php
require_once "../vendor/autoload.php";
$configuration = new Bolt\Configuration\Composer(dirname(__DIR__));
$configuration->setPath("web","web");
$configuration->setPath("files","web/files");
$configuration->setPath("themebase","web/theme");
$configuration->getVerifier()->removeCheck('apache');
$configuration->compat();
$configuration->verify();
$app = new Bolt\Application(array('resources'=>$configuration));
$app->initialize();
$app->run();
