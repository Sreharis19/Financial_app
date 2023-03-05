<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::index');
$routes->post('/signInProcess', 'Home::signInProcess');
$routes->get('/logout', 'Home::logOut');

// rm starts here
$routes->get('/Rm_dashboard', 'Rm_Dashboard::index');
$routes->get('/Rm_Client_List', 'Rm_Client::index');
$routes->get('/Rm_Client_View', 'Rm_Client::view');
$routes->get('/Rm_Post_List', 'Rm_Post::index');
$routes->get('/Rm_Post_View', 'Rm_Post::view');
$routes->get('/Rm_Post_SendTo', 'Rm_Post::SendTo');
$routes->post('/Rm_SendPost', 'Rm_Post::Rm_SendPost');
$routes->get('/step1', 'Rm_Chat::step1');
$routes->get('/Rm_DirectChat', 'Rm_Chat::directChat');
$routes->post('/Save_ChatMessage', 'Rm_Chat::Save_ChatMessage');
$routes->get('/Rm_Support', 'Rm_Support::index');
$routes->post('/Rm_SendSupport', 'Rm_Support::Save_Ticket');
$routes->post('/Delete_Ticket', 'Rm_Support::Delete_Ticket');
// rm ends here

//cw starts here
$routes->get('/Cw_dashboard', 'Cw_Dashboard::index');
$routes->get('/Cw_Post_List', 'Cw_Post::index');
$routes->get('/Cw_Post_View', 'Cw_Post::view');
$routes->get('/Cw_Add_Post', 'Cw_Post::Create_Post_view');
$routes->get('/Cw_Post_Edit', 'Cw_Post::Update_Post_view');
$routes->get('/Cw_Support', 'Cw_Support::index');
$routes->post('/Cw_SendSupport', 'Cw_Support::Save_Ticket');
$routes->post('/Delete_Ticket', 'Cw_Support::Delete_Ticket');


//client starts here
$routes->get('/Client_dashboard', 'Client_Dashboard::index');
$routes->get('/Client_Rm_List', 'Client_Rm::index');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
