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
$routes->get('/Signup', 'Home::signupView');
$routes->post('/signupProcess', 'Home::signupProcess');
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
$routes->post('/Add_Post', 'Cw_Post::Add_Post');
$routes->post('/Edit_Post', 'Cw_Post::Edit');
$routes->get('/Cw_Support', 'Cw_Support::index');
$routes->post('/Cw_SendSupport', 'Cw_Support::Save_Ticket');
$routes->post('/Delete_Ticket', 'Cw_Support::Delete_Ticket');

//ma starts here

$routes->get('/Admin_dashboard', 'Ma_Dashboard::index');
$routes->get('/Ma_Client_List', 'Ma_Client::index');
$routes->get('/Ma_Client_View', 'Ma_Client::view');
$routes->get('/Ma_Client_Add', 'Ma_Client::Add');
$routes->get('/Ma_Client_Edit', 'Ma_Client::edit');
$routes->get('/Ma_Rm_List', 'Ma_RelationManager::index');
$routes->get('/Ma_Rm_View', 'Ma_RelationManager::view');
$routes->get('/Ma_Rm_Add', 'Ma_RelationManager::Add');
$routes->get('/Ma_Rm_Edit', 'Ma_RelationManager::edit');

$routes->get('/Ma_Cw_List', 'Ma_ContentWriter::index');
$routes->get('/Ma_Cw_View', 'Ma_ContentWriter::view');
$routes->get('/Ma_Cw_Add', 'Ma_ContentWriter::Add');
$routes->get('/Ma_Cw_Edit', 'Ma_ContentWriter::edit');
$routes->get('/Ma_pc_List', 'Ma_ProductCategory::index');
$routes->get('/Ma_pc_Add', 'Ma_ProductCategory::Add');
$routes->get('/Ma_pc_Edit', 'Ma_ProductCategory::Edit');

$routes->get('/Ma_Product_List', 'Ma_Products::index');
$routes->get('/Ma_Product_Add', 'Ma_Products::Add');
$routes->post('/AddData', 'Ma_Products::AddData');
$routes->get('/Ma_Product_View', 'Ma_Products::View');
$routes->get('/Ma_Product_Edit', 'Ma_Products::Edit');
$routes->post('/EditData', 'Ma_Products::EditData');
$routes->get('/Ma_Post_List', 'Ma_Post::index');
$routes->post('/ArchivePost', 'Ma_Post::archive');
$routes->post('/UnArchivePost', 'Ma_Post::unarchive');
$routes->get('/Ma_Support_List', 'Ma_Support::index');
$routes->post('/Support_reply', 'Ma_Support::reply');


$routes->get('/Ma_pc_List', 'Ma_ProductCategory::index');


$routes->post('/CreateAccount', 'Ma_Client::CreateAccount');
$routes->post('/CreateAccount', 'Ma_ContentWriter::CreateAccount');
$routes->post('/CreateAccountForRm', 'Ma_RelationManager::CreateAccount');
$routes->post('/UpdateAccount', 'Ma_RelationManager::UpdateAccount');
$routes->post('/Rm_BlockUnblock', 'Ma_RelationManager::Rm_BlockUnblockAccount');
//$routes->post('/Ma_Client_List', 'Ma_Client::update');
//$routes->post('/Ma_Client_List', 'Ma_Client::update');

$routes->post('/UpdateAccount', 'Ma_Client::UpdateAccount');
$routes->post('/Client_BlockUnblock', 'Ma_Client::Client_BlockUnblockAccount');
$routes->post('/UpdateAccount', 'Ma_ContentWriter::UpdateAccount');
$routes->post('/Client_BlockUnblock', 'Ma_ContentWriter::Cw_BlockUnblockAccount');



//client starts here
$routes->get('/Client_dashboard', 'Client_Dashboard::index');
$routes->get('/Client_Rm_List', 'Client_Rm::index');
$routes->get('/Client_Rm_View', 'Client_Rm::view');
$routes->get('/Client_Product_List', 'Client_Product::index');
$routes->post('/ProductAvailabilityChange', 'Client_Product::changeSelect');
$routes->get('/Client_Post_List', 'Client_Post::index');
$routes->get('/Client_Post_View', 'Client_Post::view');
$routes->get('/Client_Support', 'Client_Support::index');
$routes->post('/Client_SendSupport', 'Client_Support::Save_Ticket');
$routes->post('/Delete_Query', 'Client_Support::Delete_Query');
$routes->get('/client_selectRm', 'Client_Chat::selectRm');
$routes->get('/Client_ChatView', 'Client_Chat::directChat');
$routes->post('/Save_ChatMessageForClient', 'Client_Chat::Save_ChatMessage');
$routes->get('/Client_Profile_View', 'Client_Profile::index');

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
