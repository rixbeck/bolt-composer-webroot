<?php
use Symfony\Component\HttpFoundation\Request;

require_once "../vendor/autoload.php";

$configuration = new Bolt\Configuration\Composer(dirname(__DIR__));
$configuration->setPath("web", "web");
$configuration->setPath("files", "web/files");
$configuration->setPath("themebase", "web/theme");
$configuration->getVerifier()->removeCheck('apache');
$configuration->compat();
$configuration->verify();

$app = new Bolt\Application(array(
    'resources' => $configuration
));
$app->initialize();

/*
 * Setup your stack here like this
 *
 * $map = array(
 * '/foo' => Stack\lazy(function () {
 *    $app = new Foo\Application();
 *    $app->initialize();
 *    return $app;
 * }),
 * '/bar' => Stack\lazy(function () {
 *    $app = new Bar\Application();
 *    $app->initialize();
 *    return $app;
 * })
 *);
 */

/*
 * dummy map, replace with your stack components array and watchout
 * for which one can be used by lazily and which one can't
 */

$map = array();

$builder = new Stack\Builder();
$app = $builder->push('Stack\UrlMap', $map)->resolve($app);

Stack\run($app);
