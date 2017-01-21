<?php

/*
|-------------------------------------------------------------------
| Registering all Application routes
|-------------------------------------------------------------------
*/

$app->router()->get('/',  'AppController:index');

/** Orders Routes */
$app->router()->post('/orders', 'OrdersController:create');
$app->router()->get('/orders', 'OrdersController:getAll');

$app->router()->get('/order', 'OrdersController:getOne');
$app->router()->put('/order', 'OrdersController:update');
$app->router()->delete('/order', 'OrdersController:delete');
