<?php

use App\Http\Controllers\statusController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth'])->name('admin.dashboard');

Route::get('/dashboard', 'DashboardController@index')->middleware(['auth'])->name('dashboard');
Route::get('/location/index', 'LocationController@index')->middleware(['auth'])->name('location');
Route::get('/company/index', 'CompanyController@index')->middleware(['auth'])->name('company');
Route::get('/client/index', 'ClientController@index')->middleware(['auth'])->name('client');
Route::get('/campaign/index', 'CampaignController@index')->middleware(['auth'])->name('campaign');
Route::get('/category/index', 'CategoryController@index')->middleware(['auth'])->name('category');
Route::get('/type/index', 'TypeController@index')->middleware(['auth'])->name('type');
Route::get('/item/index', 'ItemController@index')->middleware(['auth'])->name('item');
Route::get('/department/index', 'DepartmentController@index')->middleware(['auth'])->name('department');
Route::get('/staff/index', 'StaffController@index')->middleware(['auth'])->name('staff');
Route::get('/asm/index', 'AsmController@index')->middleware(['auth'])->name('asm');
Route::get('/status/index','statusController@index')->middleware(['auth'])->name('status');
Route::get('/user/index', 'UserController@index')->middleware(['auth'])->name('user');
Route::get('/group/index', 'GroupController@index')->middleware(['auth'])->name('group');
Route::get('/distribution/index', 'DistributionController@index')->middleware(['auth'])->name('distribution');
Route::get('/priority/index', 'PriorityController@index')->middleware(['auth'])->name('priority');
Route::get('/sla/index', 'SlaController@index')->middleware(['auth'])->name('sla');
Route::get('/ticket/index', 'TicketController@index')->middleware(['auth'])->name('ticket');
Route::get('/ticket/index/{id}', 'TicketController@filtertickets')->middleware(['auth'])->name('inprogressticket');


Route::get('/location/create', 'LocationController@create')->middleware(['auth'])->name('locationcreate');
Route::post('/location/save', 'LocationController@save')->middleware(['auth'])->name('locationsave');
Route::get('/location/edit/{id}', 'LocationController@edit')->middleware(['auth'])->name('locationupdate');
Route::any('/location/modify/{id}', 'LocationController@modify')->middleware(['auth'])->name('locationupdate');
Route::get('/location/delete/{id}', 'LocationController@delete')->middleware(['auth'])->name('locationdelete');

Route::get('/company/create', 'CompanyController@create')->middleware(['auth'])->name('Companycreate');
Route::post('/company/save', 'CompanyController@save')->middleware(['auth'])->name('Companysave');
Route::get('/company/edit/{id}', 'CompanyController@edit')->middleware(['auth'])->name('Companyupdate');
Route::any('/company/modify/{id}', 'CompanyController@modify')->middleware(['auth'])->name('Companyupdate');
Route::get('/company/delete/{id}', 'CompanyController@delete')->middleware(['auth'])->name('Companydelete');

Route::get('/client/create', 'ClientController@create')->middleware(['auth'])->name('Clientcreate');
Route::post('/client/save', 'ClientController@save')->middleware(['auth'])->name('Clientsave');
Route::get('/client/edit/{id}', 'ClientController@edit')->middleware(['auth'])->name('Clientupdate');
Route::any('/client/modify/{id}', 'ClientController@modify')->middleware(['auth'])->name('Clientupdate');
Route::get('/client/delete/{id}', 'ClientController@delete')->middleware(['auth'])->name('Clientdelete');

Route::get('/campaign/create', 'CampaignController@create')->middleware(['auth'])->name('Campaigncreate');
Route::post('/campaign/save', 'CampaignController@save')->middleware(['auth'])->name('Campaignsave');
Route::get('/campaign/edit/{id}', 'CampaignController@edit')->middleware(['auth'])->name('Campaignupdate');
Route::any('/campaign/modify/{id}', 'CampaignController@modify')->middleware(['auth'])->name('Campaignupdate');
Route::get('/campaign/delete/{id}', 'CampaignController@delete')->middleware(['auth'])->name('Campaigndelete');

Route::get('/category/create', 'CategoryController@create')->middleware(['auth'])->name('Categorycreate');
Route::post('/category/save', 'CategoryController@save')->middleware(['auth'])->name('Categorysave');
Route::get('/category/edit/{id}', 'CategoryController@edit')->middleware(['auth'])->name('Categoryupdate');
Route::any('/category/modify/{id}', 'CategoryController@modify')->middleware(['auth'])->name('Categoryupdate');
Route::get('/category/delete/{id}', 'CategoryController@delete')->middleware(['auth'])->name('Categorydelete');

Route::get('/type/create', 'TypeController@create')->middleware(['auth'])->name('typecreate');
Route::post('/type/save', 'TypeController@save')->middleware(['auth'])->name('typesave');
Route::get('/type/edit/{id}', 'TypeController@edit')->middleware(['auth'])->name('typeupdate');
Route::any('/type/modify/{id}', 'TypeController@modify')->middleware(['auth'])->name('typeupdate');
Route::get('/type/delete/{id}', 'TypeController@delete')->middleware(['auth'])->name('typedelete');

Route::get('/item/create', 'ItemController@create')->middleware(['auth'])->name('itemcreate');
Route::post('/item/save', 'ItemController@save')->middleware(['auth'])->name('itemsave');
Route::get('/item/edit/{id}', 'ItemController@edit')->middleware(['auth'])->name('itemupdate');
Route::any('/item/modify/{id}', 'ItemController@modify')->middleware(['auth'])->name('itemupdate');
Route::get('/item/delete/{id}', 'ItemController@delete')->middleware(['auth'])->name('itemdelete');

Route::get('/department/create', 'DepartmentController@create')->middleware(['auth'])->name('departmentcreate');
Route::post('/department/save', 'DepartmentController@save')->middleware(['auth'])->name('departmentsave');
Route::get('/department/edit/{id}', 'DepartmentController@edit')->middleware(['auth'])->name('departmentupdate');
Route::any('/department/modify/{id}', 'DepartmentController@modify')->middleware(['auth'])->name('departmentupdate');
Route::get('/department/delete/{id}', 'DepartmentController@delete')->middleware(['auth'])->name('departmentdelete');

Route::get('/staff/create', 'StaffController@create')->middleware(['auth'])->name('staffcreate');
Route::post('/staff/save', 'StaffController@save')->middleware(['auth'])->name('staffsave');
Route::get('/staff/edit/{id}', 'StaffController@edit')->middleware(['auth'])->name('staffupdate');
Route::any('/staff/modify/{id}', 'StaffController@modify')->middleware(['auth'])->name('staffupdate');
Route::get('/staff/delete/{id}', 'StaffController@delete')->middleware(['auth'])->name('staffdelete');

Route::get('/asm/create', 'AsmController@create')->middleware(['auth'])->name('asmcreate');
Route::post('/asm/save', 'AsmController@save')->middleware(['auth'])->name('asmsave');
Route::get('/asm/edit/{id}', 'AsmController@edit')->middleware(['auth'])->name('asmupdate');
Route::any('/asm/modify/{id}', 'AsmController@modify')->middleware(['auth'])->name('asmupdate');
Route::get('/asm/delete/{id}', 'AsmController@delete')->middleware(['auth'])->name('asmdelete');

Route::get('/status/create','statusController@create')->middleware(['auth'])->name('status');
Route::post('/status/save','statusController@save')->middleware(['auth'])->name('statussave');
Route::get('/status/delete/{id}','statusController@delete')->middleware(['auth'])->name('statusdelete');
Route::get('/status/edit/{id}','statusController@edit')->middleware(['auth'])->name('statusedit');
Route::any('/status/modify/{id}','statusController@modify')->middleware(['auth'])->name('statusmodify');


Route::get('/user/create', 'UserController@create')->middleware(['auth'])->name('usercreate');
Route::post('/user/save', 'UserController@save')->middleware(['auth'])->name('usersave');
Route::get('/user/edit/{id}', 'UserController@edit')->middleware(['auth'])->name('userupdate');
Route::any('/user/modify/{id}', 'UserController@modify')->middleware(['auth'])->name('userupdate');
Route::get('/user/delete/{id}', 'UserController@delete')->middleware(['auth'])->name('userdelete');

Route::get('/group/create', 'GroupController@create')->middleware(['auth'])->name('groupcreate');
Route::post('/group/save', 'GroupController@save')->middleware(['auth'])->name('groupsave');
Route::get('/group/edit/{id}', 'GroupController@edit')->middleware(['auth'])->name('groupupdate');
Route::any('/group/modify/{id}', 'GroupController@modify')->middleware(['auth'])->name('groupupdate');
Route::get('/group/delete/{id}', 'GroupController@delete')->middleware(['auth'])->name('groupdelete');

Route::get('/distribution/create', 'DistributionController@create')->middleware(['auth'])->name('distributioncreate');
Route::post('/distribution/save', 'DistributionController@save')->middleware(['auth'])->name('distributionsave');
Route::get('/distribution/edit/{id}', 'DistributionController@edit')->middleware(['auth'])->name('distributionupdate');
Route::any('/distribution/modify/{id}', 'DistributionController@modify')->middleware(['auth'])->name('distributionupdate');
Route::get('/distribution/delete/{id}', 'DistributionController@delete')->middleware(['auth'])->name('distributiondelete');

Route::get('/priority/create', 'PriorityController@create')->middleware(['auth'])->name('prioritycreate');
Route::post('/priority/save', 'PriorityController@save')->middleware(['auth'])->name('prioritysave');
Route::get('/priority/edit/{id}', 'PriorityController@edit')->middleware(['auth'])->name('priorityupdate');
Route::any('/priority/modify/{id}', 'PriorityController@modify')->middleware(['auth'])->name('priorityupdate');
Route::get('/priority/delete/{id}', 'PriorityController@delete')->middleware(['auth'])->name('prioritydelete');



Route::get('/sla/create', 'SlaController@create')->middleware(['auth'])->name('slacreate');
Route::post('/sla/save', 'SlaController@save')->middleware(['auth'])->name('slasave');
Route::get('/sla/edit/{id}', 'SlaController@edit')->middleware(['auth'])->name('slaupdate');
Route::any('/sla/modify/{id}', 'SlaController@modify')->middleware(['auth'])->name('slaupdate');
Route::get('/sla/delete/{id}', 'SlaController@delete')->middleware(['auth'])->name('sladelete');

Route::get('/ticket/create', 'TicketController@create')->middleware(['auth'])->name('ticketcreate');
Route::post('/ticket/save', 'TicketController@save')->middleware(['auth'])->name('ticketsave');
Route::get('/ticket/edit/{id}', 'TicketController@edit')->middleware(['auth'])->name('ticketupdate');
Route::any('/ticket/modify/{id}', 'TicketController@modify')->middleware(['auth'])->name('ticketupdate');
Route::get('/ticket/delete/{id}', 'TicketController@delete')->middleware(['auth'])->name('ticketdelete');
// Route::group(['prefix' => 'auth', 'middleware' => 'auth', 'namespace' => 'Auth'], function () {
//     Route::get('/dashboard', 'DashboardController@index')->name('login');
// });

require __DIR__.'/auth.php';
