<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

$controller_path = 'App\Http\Controllers';

Auth::routes();

Route::prefix('/')->middleware('auth')->group(function(){

  $controller_path = 'App\Http\Controllers';

  // ROUTES
  Route::get('/', $controller_path . '\CalendarsController@index')->name('calendar');

  // ROUTES
  Route::get('dashboard', $controller_path . '\DashboardsController@index')->name('dashboard');

  // ROUTES GUESTS
  Route::get('guests', $controller_path . '\GuestsController@index')->name('guests');


  Route::post('guest-select-data', $controller_path .'\Select2Controller@guest');

  // ROUTES ROOMS
  Route::get('rooms-room', $controller_path . '\RoomsController@index')->name('rooms-room');
  Route::post('fetch-all-rooms', $controller_path . '\RoomsController@fetch_all');
  Route::get('fetch-room-data/{id}', $controller_path . '\RoomsController@show');
  Route::post('create-room', $controller_path . '\RoomsController@store');
  Route::post('update-room/{id}', $controller_path . '\RoomsController@update');
  Route::post('delete-room/{id}', $controller_path . '\RoomsController@destroy');

  // ROUTES ROOM TYPES
  Route::get('rooms-room-types', $controller_path . '\RoomTypesController@index')->name('rooms-room-types');
  Route::post('fetch-all-room-types', $controller_path . '\RoomTypesController@fetch_all');
  Route::get('fetch-room-type-data/{id}', $controller_path . '\RoomTypesController@show');
  Route::post('create-room-type', $controller_path . '\RoomTypesController@store');
  Route::post('update-room-type/{id}', $controller_path . '\RoomTypesController@update');
  Route::post('delete-room-type/{id}', $controller_path . '\RoomTypesController@destroy');

  // ROUTES USERS
  Route::get('settings-users', $controller_path . '\UsersController@index')->name('settings-users');
  Route::post('fetch-all-user', $controller_path . '\UsersController@fetch_all_user');
  Route::get('fetch-user-data/{id}', $controller_path . '\UsersController@show');
  Route::post('create-user', $controller_path . '\UsersController@store');
  Route::post('update-user-data/{id}', $controller_path . '\UsersController@update');
  Route::post('update-user-password/{id}', $controller_path . '\UsersController@update_password');
  Route::post('delete-user/{id}', $controller_path . '\UsersController@destroy');


  //ROUTE BOOKING SOURCE
  Route::get('settings-source', $controller_path . '\BookingSourceController@index')->name('settings-source');
  Route::post('fetch-all-source', $controller_path . '\BookingSourceController@fetch_all');
  Route::get('fetch-source-data/{id}', $controller_path . '\BookingSourceController@show');
  Route::post('create-source', $controller_path . '\BookingSourceController@store');
  Route::post('update-source-data/{id}', $controller_path . '\BookingSourceController@update');
  Route::post('delete-source/{id}', $controller_path . '\BookingSourceController@destroy');


  //ROUTE DISCOUNTS
  Route::get('settings-discount', $controller_path . '\DiscountsController@index')->name('settings-discount');
  Route::post('fetch-all-discount', $controller_path . '\DiscountsController@fetch_all');
  Route::get('fetch-discount-data/{id}', $controller_path . '\DiscountsController@show');
  Route::post('create-discount', $controller_path . '\DiscountsController@store');
  Route::post('update-discount-data/{id}', $controller_path . '\DiscountsController@update');
  Route::post('delete-discount/{id}', $controller_path . '\DiscountsController@destroy');


  //ROUTE HOTEL CHARGES
  Route::get('settings-charges', $controller_path . '\HotelChargesController@index')->name('settings-charges');
  Route::post('fetch-all-charges', $controller_path . '\HotelChargesController@fetch_all');
  Route::get('fetch-charges-data/{id}', $controller_path . '\HotelChargesController@show');
  Route::post('create-charges', $controller_path . '\HotelChargesController@store');
  Route::post('update-charges-data/{id}', $controller_path . '\HotelChargesController@update');
  Route::post('delete-charges/{id}', $controller_path . '\HotelChargesController@destroy');


  // ROUTES PERMISSION
  Route::get('settings-permissions', $controller_path . '\PermissionsController@index')->name('settings-permission');

  //ROUTES SELECT2
  Route::get('get-rooms', $controller_path . '\Select2Controller@rooms');
  Route::get('get-rooms', $controller_path . '\Select2Controller@room_type');
});

Route::get('/logout',  $controller_path. '\UsersController@logout')->name('logout');


// Main Page Route
// Route::get('/', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');

// layout
Route::get('/layouts/without-menu', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu');
Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar');
Route::get('/layouts/fluid', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid');
Route::get('/layouts/container', $controller_path . '\layouts\Container@index')->name('layouts-container');
Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', $controller_path . '\pages\AccountSettingsAccount@index')->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', $controller_path . '\pages\AccountSettingsNotifications@index')->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', $controller_path . '\pages\AccountSettingsConnections@index')->name('pages-account-settings-connections');
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', $controller_path . '\authentications\ForgotPasswordBasic@index')->name('auth-reset-password-basic');

// cards
Route::get('/cards/basic', $controller_path . '\cards\CardBasic@index')->name('cards-basic');

// User Interface
Route::get('/ui/accordion', $controller_path . '\user_interface\Accordion@index')->name('ui-accordion');
Route::get('/ui/alerts', $controller_path . '\user_interface\Alerts@index')->name('ui-alerts');
Route::get('/ui/badges', $controller_path . '\user_interface\Badges@index')->name('ui-badges');
Route::get('/ui/buttons', $controller_path . '\user_interface\Buttons@index')->name('ui-buttons');
Route::get('/ui/carousel', $controller_path . '\user_interface\Carousel@index')->name('ui-carousel');
Route::get('/ui/collapse', $controller_path . '\user_interface\Collapse@index')->name('ui-collapse');
Route::get('/ui/dropdowns', $controller_path . '\user_interface\Dropdowns@index')->name('ui-dropdowns');
Route::get('/ui/footer', $controller_path . '\user_interface\Footer@index')->name('ui-footer');
Route::get('/ui/list-groups', $controller_path . '\user_interface\ListGroups@index')->name('ui-list-groups');
Route::get('/ui/modals', $controller_path . '\user_interface\Modals@index')->name('ui-modals');
Route::get('/ui/navbar', $controller_path . '\user_interface\Navbar@index')->name('ui-navbar');
Route::get('/ui/offcanvas', $controller_path . '\user_interface\Offcanvas@index')->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', $controller_path . '\user_interface\PaginationBreadcrumbs@index')->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', $controller_path . '\user_interface\Progress@index')->name('ui-progress');
Route::get('/ui/spinners', $controller_path . '\user_interface\Spinners@index')->name('ui-spinners');
Route::get('/ui/tabs-pills', $controller_path . '\user_interface\TabsPills@index')->name('ui-tabs-pills');
Route::get('/ui/toasts', $controller_path . '\user_interface\Toasts@index')->name('ui-toasts');
Route::get('/ui/tooltips-popovers', $controller_path . '\user_interface\TooltipsPopovers@index')->name('ui-tooltips-popovers');
Route::get('/ui/typography', $controller_path . '\user_interface\Typography@index')->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', $controller_path . '\extended_ui\PerfectScrollbar@index')->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', $controller_path . '\extended_ui\TextDivider@index')->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', $controller_path . '\icons\Boxicons@index')->name('icons-boxicons');

// form elements
Route::get('/forms/basic-inputs', $controller_path . '\form_elements\BasicInput@index')->name('forms-basic-inputs');
Route::get('/forms/input-groups', $controller_path . '\form_elements\InputGroups@index')->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', $controller_path . '\form_layouts\VerticalForm@index')->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', $controller_path . '\form_layouts\HorizontalForm@index')->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', $controller_path . '\tables\Basic@index')->name('tables-basic');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
