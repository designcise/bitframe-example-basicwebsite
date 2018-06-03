<?php // Application dependencies configuration

use \BitFrame\Renderer\PlatesRenderer;
use \BitFrame\Renderer\TemplateInterface;

/**
 * Self-calling anonymous function to create local scope and 
 * keep the global namespace clean.
 */
$app['tpl'] = call_user_func(function() use ($app) {
    // global template data
    $data = [
        'page_title_prefix' => '',
        'page_title' => '',
        'page_title_suffix' => ' - BitFrame PHP Microframework',
        'css' => [],
        'js' => []
    ];
    
    $plates = new PlatesRenderer(TPL_DIR, TPL_EXT, $data);
    
    $req = $app->getRequest();
    
    /**
     * Register namespaced folders.
     */
    $plates->addPath(TPL_DIR . 'inc', 'component');
    
    
    /**
     * Register template params.
     */
    $plates->addDefaultParam(TemplateInterface::TEMPLATE_ALL, [
        'endpoints' => $req->getEndPoints(),
        'querystr' => $req->getQueryParams(),
        'uri' => $req->getUri(),
        'curr_path' => trim($req->getUri()->getPath(), '/')
    ]);

    
    /**
     * Register template functions.
     */
    $engine = $plates->getEngine();

    $engine->registerFunction('hasEndpoint', function ($endpoint, $base_path = '') use ($req) {
        return ($req->hasEndpoint($endpoint, $base_path, false));
    });

    $engine->registerFunction('isEndpoint', function ($endpoint, $base_path = '') use ($req) {
        return ($req->isEndpoint($endpoint, $base_path));
    });
    
    return $plates;
});