<?php

/** @var Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Laravel\Lumen\Routing\Router;
use Illuminate\Support\Facades\DB;

$router->get('/', function () use ($router) {
    dd(DB::getPdo());
    return $router->app->version();
});

$router->group(['prefix' => '/v1'], function () use ($router){
    $router->group(['prefix' => '/cert'], function () use ($router){
        $router->get('/generate-one', 'CertificateController@generateCertificateOptOne');
        $router->get('/generate-two', 'CertificateController@generateCertificateOptTwo');
        $router->get('/generate-three', 'CertificateController@generateCertificateOptThree');
        /***
         * Esta es la ruta para generar el certificado del ultimo ticket
         */
        $router->get('/dei', 'CertificateController@generateCertificateDei');
        $router->get('/request', 'CertificateController@demoRequest');
    });
});
