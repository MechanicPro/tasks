<?php

$router->get('', 'TasksController@index');
$router->get('login', 'PagesController@login');
$router->get('tasks/create' , 'PagesController@createTask');
$router->get('tasks/filter', 'TasksController@filter');
$router->get('tasks/sort', 'TasksController@sort');
$router->get('tasks', 'TasksController@index');
$router->get('logout', 'AuthController@logout');

$router->post('users/login', 'AuthController@login');
$router->post('tasks', 'TasksController@store');
$router->post('tasks/status', 'TasksController@updateStatus');
$router->post('tasks/delete', 'TasksController@deleteTask');




