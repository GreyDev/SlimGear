<?php

define('VENDOR', ROOT.'/vendor/');
require VENDOR . 'autoload.php';
require 'config.php';

// init app
$app = New \SlimController\Slim(array(
    'controller.class_prefix'   => APPLICATION . '\controllers',
    'controller.method_suffix'  => 'Action',

    'templates.path'            => ROOT . APPLICATION . '/views',
    'view'                      => new \Slim\Views\Twig(),
));

$app->view()->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
);

$resourceUri = $_SERVER['REQUEST_URI'];
$rootUri = $app->request()->getRootUri();
$assetUri = $rootUri;

$app->view()->appendData(
    array(
        'app' => $app,
        'rootUri' => $app->request()->getRootUri(),
        'resourceUri' => $_SERVER['REQUEST_URI']
));

$app->addRoutes(array(
    '/'             => 'home:index',
    '/hello/:name'  => 'home:hello',
    '/hello/'       => 'home:hello',
));

$app->run();
