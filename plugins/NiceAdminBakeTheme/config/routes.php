<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'NiceAdminBakeTheme',
    ['path' => '/nice-admin-bake-theme'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
