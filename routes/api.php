<?php
/**
 *
 * @SWG\Swagger(
 *   schemes={"http"},
 *   basePath="/",
 *   @OA\Server(url="https://api.kxxb.ru")
 *   @OA\Info(
 *     title="kxxb API",
 *     version="0.0.1"
 *    )
 * @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT",
 * ),
 *   @SWG\Info(
 *     title="Pilot Wheels API",
 *     version="0.0.1"
 *   )
 * )
 */
$router->group(['prefix' => '/api'], function () use ($router) {
    $controller = "ApiController";
    $router->get('/swagger', $controller . '@swagger');

    $router->get('/blog/all', $controller . '@getAll');
    $router->get('/blog/post/{id}', $controller . '@getPost');
    $router->get('/blog/post/{id}/comments', $controller . '@getPostComments');

    $router->get('/settings', $controller . '@getSettings');

});



