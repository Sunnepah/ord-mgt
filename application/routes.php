<?php

/*
|-------------------------------------------------------------------
| Registering all Application routes
|-------------------------------------------------------------------
*/

$app->router()->get('/',  'OrdersController:index');
$app->router()->get('/dashboard',  'OrdersController:index');

/** Orders Routes */
$app->router()->get('/orders', 'OrdersController:getAll');
$app->router()->post('/orders', 'OrdersController:create');

$app->router()->get('/order', 'OrdersController:getOne');
$app->router()->put('/orders', 'OrdersController:update');
$app->router()->delete('/orders', 'OrdersController:delete');
