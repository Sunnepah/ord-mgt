<?php

/*
|-------------------------------------------------------------------
| Registering all Application routes
|-------------------------------------------------------------------
*/

$app->router()->get('/',  'OrdersController:index');
$app->router()->get('/dashboard',  'OrdersController:index');

/** Orders Routes */
$app->router()->post('/orders', 'OrdersController:create');
$app->router()->get('/orders', 'OrdersController:index');

$app->router()->get('/order', 'OrdersController:getOne');
$app->router()->put('/order', 'OrdersController:update');
$app->router()->delete('/order', 'OrdersController:delete');
