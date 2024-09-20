<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('Index', 'Home::index');

$routes->get('Logout', 'Home::Logout');


$routes->post('delete_data','Home::delete_data');
$routes->post('update_data','Home::update_data');


$routes->get('Dashboard', 'Home::Dashboard');
$routes->get('Upload', 'Home::UploadData');

$routes->get('Roles','Home::Roles');
$routes->get('Users','Home::Users');
$routes->get('Preview','Home::Preview');

$routes->get('showRoomEnterRecord','Home::showRoomEnterRecord');

$routes->post('ShowRoomSave','Home::ShowRoomSave');



$routes->post('VerifyLogin','Home::validateLogin');


$routes->post('CreateRole','Home::NewRole');
$routes->post('UpdateRole','Home::UpdateRole');

$routes->post('CreateUser','Home::NewUser');
$routes->post('UpdateUser','Home::UpdateUser');


$routes->post('submitEntries','Home::submitEntries');


$routes->get('verify','Home::Verify');
$routes->post('verify','Home::Verify');
$routes->post('redemption','Home::redemption');


$routes->get('Draws','Home::Draws');

$routes->post('Draws','Home::Draws');

$routes->get('Enteries','Home::Enteries');
$routes->post('Enteries','Home::Enteries');
$routes->post('export','Home::exportToExcel');

$routes->post('ChangePin','Home::changepassword');



$routes->post('bulkinsert', 'Home::upload');



