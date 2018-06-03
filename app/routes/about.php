<?php

$app->get("/about", function ($request, $response, $next) use ($app) {
    $data = [
        'page_title' => 'About',
        'css' => ['about.css'],
        'js' => ['about.js']
    ];
    
    $response->getBody()->write($app['tpl']->render('about', $data));
    
    return $response;
});