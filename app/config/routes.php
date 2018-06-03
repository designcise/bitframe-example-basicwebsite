<?php // Proxy incoming routes to their corresponding handler files

/**
 * Self-calling anonymous function to create local scope and 
 * keep the global namespace clean.
 */
call_user_func(function() use ($app) {
    $req = $app->getOriginalRequest();
    
    // is the site under maintenance?
    if (MAINTENANCE_MODE) {
        $app->get('/' . $req->getUri()->getPath(), function ($request, $response, $next) use ($app) {
            $data = [
                'page_title' => 'Under Maintenance'
            ];

            $response->getBody()->write($app['tpl']->render('maintenance', $data));

            return $response;
        });
    }
    else {
        $req_path = $req->getEndpoint(1);
        
        // file name for requested route
        // if empty string, show default "HOME_PAGE"
        $route_file = pathinfo(($req_path ?: HOME_PAGE), PATHINFO_FILENAME) . '.php';

        // full file path + file name for requested route
        $route_file_path = ROUTES_DIR . $route_file;
        
        // register routes
        if (file_exists($route_file_path)) {
            require $route_file_path;
        }
    }
});