<?php

function controller_home($request, $response) {
    global $app;
    
    $data = [
        'page_title' => 'Home'
    ];
    
    $response->getBody()->write($app['tpl']->render('home', $data));

    return $response;
}

// home page
$app->get('/', 'controller_home');
$app->get('/home', 'controller_home');