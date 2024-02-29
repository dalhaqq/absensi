<?php

use App\Controllers\Admins;
use App\Controllers\Approvals;
use App\Controllers\Departments;
use App\Controllers\Employees;
use App\Controllers\Home;
use App\Controllers\Login;
use App\Controllers\Proposals;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('', ['filter' => 'guest'], function ($routes) {
    $routes->get('login', [Login::class, 'index'], ['as' => 'login']);
    $routes->post('login', [Login::class, 'login'], ['as' => 'login.post']);
});

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', [Home::class, 'index'], ['as' => 'home']);
    $routes->group('departments', ['filter' => ['auth', 'access:admin,super']], function ($routes) {
        $routes->get('/', [Departments::class, 'index'], ['as' => 'departments']);
        $routes->get('create', [Departments::class, 'create'], ['as' => 'departments.create']);
        $routes->post('create', [Departments::class, 'store'], ['as' => 'departments.store']);
        $routes->get('edit/(:num)', [Departments::class, 'edit/$1'], ['as' => 'departments.edit']);
        $routes->post('edit/(:num)', [Departments::class, 'update/$1'], ['as' => 'departments.update']);
        $routes->post('delete/(:num)', [Departments::class, 'destroy/$1'], ['as' => 'departments.destroy']);
    });
    $routes->group('employees', ['filter' => ['auth', 'access:admin,super']], function ($routes) {
        $routes->get('/', [Employees::class, 'index'], ['as' => 'employees']);
        $routes->get('create', [Employees::class, 'create'], ['as' => 'employees.create']);
        $routes->post('create', [Employees::class, 'store'], ['as' => 'employees.store']);
        $routes->get('edit/(:num)', [Employees::class, 'edit/$1'], ['as' => 'employees.edit']);
        $routes->post('edit/(:num)', [Employees::class, 'update/$1'], ['as' => 'employees.update']);
        $routes->post('delete/(:num)', [Employees::class, 'destroy/$1'], ['as' => 'employees.destroy']);
    });
    $routes->group('admins', ['filter' => ['auth', 'access:super']], function ($routes) {
        $routes->get('/', [Admins::class, 'index'], ['as' => 'admins']);
        $routes->get('create', [Admins::class, 'create'], ['as' => 'admins.create']);
        $routes->post('create', [Admins::class, 'store'], ['as' => 'admins.store']);
        $routes->get('edit/(:num)', [Admins::class, 'edit/$1'], ['as' => 'admins.edit']);
        $routes->post('edit/(:num)', [Admins::class, 'update/$1'], ['as' => 'admins.update']);
        $routes->post('delete/(:num)', [Admins::class, 'destroy/$1'], ['as' => 'admins.destroy']);
    });
    $routes->group('approvals', ['filter' => ['auth', 'role:SPV']], function ($routes) {
        $routes->get('pending', [Approvals::class, 'pending'], ['as' => 'approvals.pending']);
        $routes->post('approve/(:num)', [Approvals::class, 'approve/$1'], ['as' => 'approvals.approve']);
        $routes->post('reject/(:num)', [Approvals::class, 'reject/$1'], ['as' => 'approvals.reject']);
        $routes->get('history', [Approvals::class, 'history'], ['as' => 'approvals.history']);
    });
    $routes->group('proposals', ['filter' => ['auth', 'role:STF']], function ($routes) {
        $routes->get('create', [Proposals::class, 'create'], ['as' => 'proposals.create']);
        $routes->post('create', [Proposals::class, 'store'], ['as' => 'proposals.store']);
        $routes->get('pending', [Proposals::class, 'pending'], ['as' => 'proposals.pending']);
        $routes->post('cancel/(:num)', [Proposals::class, 'cancel/$1'], ['as' => 'proposals.cancel']);
        $routes->get('history', [Proposals::class, 'history'], ['as' => 'proposals.history']);
    });
    $routes->get('forbidden', [Home::class, 'forbidden'], ['as' => 'forbidden']);
    $routes->get('logout', [Login::class, 'logout'], ['as' => 'logout']);
});
