<?php
$routes->post('api/auth/register','AuthController::register');
$routes->post('api/auth/login','AuthController::login');
$routes->post('api/teachers','TeacherController::create');
$routes->get('api/teachers','TeacherController::list');
