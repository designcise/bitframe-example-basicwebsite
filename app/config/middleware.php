<?php // Application middlewares

use \BitFrame\ErrorHandler\WhoopsErrorHandler;
use \BitFrame\Message\DiactorosResponseEmitter;
use \BitFrame\Router\FastRouteRouter;

// run error handler to register it immediately
$app->run(new WhoopsErrorHandler(
    //(ENV === 'dev' && DEBUG_MODE) ? 
        // auto determine error handler in production environment
        //'auto' : 
        // custom error handler in live environment
        function($exception, $inspector, $error_handler) use ($app) {
            $req = $app->getRequest();
    
            // is an ajax request?
            if ($req->isXhr()) {
                header('Content-Type: application/json');

                // error format compatible with json:api
                // @see http://jsonapi.org
                $response = [
                    'errors' => [
                        [
                            'type' => $inspector->getExceptionName(),
                            'message' => $exception->getMessage()
                        ]
                    ]
                ];

                // add additional error data in debug mode
                if (DEBUG_MODE) {
                    $response['errors'][0]['file'] = $exception->getFile();
                    $response['errors'][0]['line'] = $exception->getLine();
                }

                // send error to client
                $json = json_encode($response);
                // output as json or jsonp?
                echo (
                    ($req->getMethod() === 'GET' && 
                     ! empty($callback = $req->getQueryParam('callback', ''))
                    ) ? "{$callback}($json)" : $json
                );
            } else {
                $data = [
                    'page_title' => 'There was an error!',
                    'is_error' => true,
                    'css' => ['error.css'],
                    
                    'err_line' => $exception->getLine(),
                    'err_type' => $inspector->getExceptionName(),
                    'err_msg' => $exception->getMessage(),
                    'err_file' => $exception->getFile(),
                    'err_trace' => $exception->getTrace(),
                    'err_inspector' => $inspector
                ];

                // error tpl
                echo $app['tpl']->render('error', $data);
            }

            return \Whoops\Handler\Handler::QUIT;
        }, 
    true
));

// add middlewares
$emitter = new DiactorosResponseEmitter();
$router = new FastRouteRouter();

$app->addMiddleware([
    $emitter,
    $router
]);