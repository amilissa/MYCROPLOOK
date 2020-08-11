<?php

use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//click sa buyers profile

Route::get('/users/profile-info', ['uses' => 'MyAccountController@getProfileInfo', 'as' => 'buyers.prof-info']);
Route::get('/users/delivery-info', ['uses' => 'MyAccountController@getDeliveryAddress', 'as' => 'buyers.delivery-add']);
Route::get('/users/billing-info', ['uses' => 'MyAccountController@getBillingAddress', 'as' => 'buyers.billing-add']);
Route::get('/users/order-history', ['uses' => 'MyAccountController@getOrderHistory', 'as' => 'buyers.order-history']);
Route::get('/users/add-lands', ['uses' => 'MyLandsController@addlands', 'as' => 'farmers.lands']);


Route::post('users/{bil_id}/billing-info', 'MyAccountController@updateBillingInfo')->name('users.billing-info');
Route::post('users/{del_id}/delivery-info', 'MyAccountController@updateDeliveryInfo')->name('users.delivery-info');

//click sa reserve crop
Route::get(
    '/reservation/start-reservation/{id}',
    [
        'uses' => 'ReservationController@startReservation',
        'as' => 'reservation.startReservation', 'middleware' => 'auth'
    ]
);
//terms and agreement
Route::get(
    '/croplook-terms-and-conditions',
    [
        'uses' => 'PagesController@getTermsAndAgreement',
        'as' => 'terms.agreement'
    ]
);


//click sa reservations
Route::get(
    '/reservation/my-reservations',
    [
        'uses' => 'ReservationController@getReservations',
        'as' => 'reservation.reservationCart'
    ]
);

// //click navbar reservation
// Route::get('/reservation/navbar',
// ['uses' => 'ReservationController@getReservationsNavbar',
// 'as' => 'reservation.navbarReservation']);


//reduce one in reservation cart
Route::get(
    'reduce/{id}',
    [
        'uses' => 'ReservationController@getReduceByOne',
        'as' => 'reservation.reduceByOne'
    ]
);

//add crop in reservation cart
Route::get(
    'additional/{id}',
    [
        'uses' => 'ReservationController@getAddByOne',
        'as' => 'reservation.addByOne'
    ]
);


//remove crop in reservation cart
Route::get(
    'remove/{id}',
    [
        'uses' => 'ReservationController@getRemoveItem',
        'as' => 'reservation.removeItem'
    ]
);

//click sa place-order
Route::get(
    '/reservation/checkout',
    [
        'uses' => 'ReservationController@getCheckout',
        'as' => 'checkout',
        'middleware' => 'auth'
    ]
);

//click sa place order
Route::post(
    '/reservation/checkout',
    [
        'uses' => 'ReservationController@postCheckout',
        'as' => 'checkout',
        'middleware' => 'auth'
    ]
);



//click sa delivered orders
Route::get(
    '/users/delivering/{deli_id}',
    [
        'uses' => 'DashboardController@getDeliveredOrder',
        'as' => 'dashboard.DeliveredOrder'
    ]
);

//click sa confirm orders
Route::get(
    '/users/confirming/{conf_id}',
    [
        'uses' => 'DashboardController@getConfirmedOrders',
        'as' => 'dashboard.ConfirmedOrder'
    ]
);

// click sa decline orders
Route::get(
    '/users/declining/{decl_id}',
    [
        'uses' => 'DashboardController@getDeclinedOrders',
        'as' => 'dashboard.DeclinedOrder'
    ]
);

// click sa cancel orders
Route::get(
    '/users/cancelling/{canc_id}',
    [
        'uses' => 'MyAccountController@getCancelledOrders',
        'as' => 'myaccount.CancelledOrder'
    ]
);

// click sa report orders
Route::get(
    '/users/reporting/{repo_id}',
    [
        'uses' => 'MyAccountController@getReportOrders',
        'as' => 'myaccount.ReportOrder'
    ]
);

// click sa received orders
Route::get(
    '/users/receiving/{rece_id}',
    [
        'uses' => 'MyAccountController@getReceivedOrders',
        'as' => 'myaccount.ReceivedOrder'
    ]
);
//for images controller

// click sa Completed Transaction of Buyers
Route::get('/users/completed-transactions-for-buyers/', ['uses' => 'MyAccountController@getCompletedTransactionsOfBuyer', 'as' => 'myaccount.CompletedTransactionsOfBuyer']);

// click sa Cancelled orders
Route::get('/users/cancelled-orders-for-buyers/', ['uses' => 'MyAccountController@getCancelledOrdersView', 'as' => 'myaccount.CancelledOrderOfBuyer']);



//click sa completed orders by farmers
Route::get('/users/completed-transactions/', ['uses' => 'DashboardController@getCompletedTransaction', 'as' => 'dashboard.CompletedTransaction']);

Route::get('/reservation/confirm-reservations', ['uses' => 'ReservationController@confirmReservation', 'as' => 'placeorder']);

Route::post('/reservation/confirm-reservations', ['uses' => 'ReservationController@postConfirmReservation', 'as' => 'placeorder']);

// user profile
Route::get('/users/user-profile', ['uses' => 'MyAccountController@index', 'as' => 'myaccount']);
// my orders
Route::get('/users/my-orders', ['uses' => 'MyAccountController@myOrders', 'as' => 'myorders']);

// create profile
Route::get('/users/create-profile', ['uses' => 'MyAccountController@createprofile', 'as' => 'users.createprofile']);
// edit profile
Route::get('/users/edit-profile', ['uses' => 'MyAccountController@editprofile', 'as' => 'users.editprofile']);
// user lands
Route::get('/users/user-lands', ['uses' => 'MyLandsController@userlands', 'as' => 'users.userlands']);

// add new button user lands
//Route::get('/users/add-lands/', ['uses' => 'MyLandsController@addlands', 'as' => 'users.addlands']);
// inside add-lands
Route::post('/users/user-lands/', ['uses' => 'MyLandsController@storelands']);
// view farmer
Route::get('/explore-farms/view-farmer/', ['uses' => 'ExploreFarmsController@viewFarmer', 'as' => 'farm.viewDFarmer']);


// product statistics
Route::get('/users/prod-statistics/', ['uses' => 'DashboardController@prodStat', 'as' => 'users.prod-stat']);
//orders dashboard
Route::get('/users/orders-dashboard/', ['uses' => 'DashboardController@getOrdersConfirmation', 'as' => 'users.orders-dashboard']);

//

// invoice

// messages
Route::get('/chat', ['uses' => 'MyAccountController@messages', 'as' => 'user.chat']);


//chat-app
Route::get('/contacts', 'ContactsController@get');

Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
//Route::get('/conversation/{id}',  ['uses' => 'ContactsController@getMessagesForF', 'as' => 'individual.chat']);
Route::post('/conversation/send', 'ContactsController@send');


// admin page
Route::get('/admin', 'AdminController@index');

Route::get('/admin/crop-lists', 'AdminController@getCropLists');
Route::get('/admin/banners', 'AdminController@getBanners');
Route::get('/admin/statistics', ['uses' => 'AdminController@getStatistics', 'as' => 'admin.statistics']);
Route::get('/admin/seasonal-crops', ['uses' => 'AdminController@getSeasonalCrops', 'as' => 'admin.seasonal-crops']);
Route::get('/admin/confirm-users', ['uses' => 'AdminController@getConfirmUsers', 'as' => 'admin.confirm-users']);
Route::get('/admin/admin-users', ['uses' => 'AdminController@getAdminUsers', 'as' => 'admin.admin-users']);

Route::post(
    '/reservation/crop-lists',
    [
        'uses' => 'AdminController@storeCrop',
        'middleware' => 'auth'
    ]
);



// time using carbon
Route::get('/time', function () {

    $dt =  new Carbon();
    $dt->timezone('GMT+8');
    echo $dt->today();
});



Route::get('/', 'PagesController@index');
Route::get('/products', 'PagesController@products');
Route::get('/homepage', 'PagesController@homepage');

Route::get('/search-products', 'ExploreProductsController@search');

Route::get('/search-farms', 'ExploreFarmsController@search');

Route::resource('/explore-products', 'ExploreProductsController');
Route::resource('/explore-farms', 'ExploreFarmsController');
Route::resource('/users', 'MyAccountController');
Route::resource('/admin', 'AdminController');
Auth::routes();


Route::get('/dashboard', 'DashboardController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
