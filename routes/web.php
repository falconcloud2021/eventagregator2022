<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ParserController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\BellsController;
use App\Http\Controllers\LettersController;
use App\Http\Controllers\LogReaderController;

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

Route::get('/', function () {return view('welcome');});
Route::get('/dashboarddefault', function() {return view('dashboarddefault');});

Route::middleware(['auth:sanctum', 'verified'])->group(function (){

    // 1. Part Navigate sidebar dashboard:
    Route::get('/dashboard',                [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/charts',                   [AdminController::class, 'charts_list'])->name('charts');
    Route::get('/widgets',                  [AdminController::class, 'widgets_list'])->name('widgets');
    Route::get('/users',                    [AdminController::class, 'users_list'])->name('users');
    Route::get('/organizer',                [AdminController::class, 'organizer'])->name('organizer');
	Route::get('/dashboard2',               [AdminController::class, 'dashboard2'])->name('dashboard2');
	Route::get('/bells',                    [AdminController::class, 'bells_list'])->name('bells');

    // 2. Events methods:
                                    // * 2.1 events SHOW methods;
    Route::get('/events',                       [EventsController::class, 'eventsList'])->name('events');
    Route::get('/event/show/{id}',              [EventsController::class, 'eventShow'])->name('event_show');
    Route::get('/events/top-list',              [EventsController::class, 'eventsTopList'])->name('events_top');
    Route::get('/events/archived',              [EventsController::class, 'archivedEvents'])->name('archived_events');
    Route::get('/event/archive/{id}',           [EventsController::class, 'archiveEventItem'])->name('archive_event');
    Route::get('/events/related',               [EventsController::class, 'eventsRelatedFilter'])->name('related_events');
                                    // * 2.2 events CRUD methods;
	Route::get('/event/create',                 [EventsController::class, 'eventCreateForm'])->name('event_create');
    Route::post('/event/store',                 [EventsController::class, 'eventStoreForm'])->name('event_store');
	Route::get('/event/edit/{id}',              [EventsController::class, 'eventEditForm'])->name('event_edit');
	Route::post('/event/save/{id}',             [EventsController::class, 'eventSaveForm'])->name('event_save');
    Route::any('/event/add-to-archive/{id}',    [EventsController::class, 'eventSendToArchiveForm'])->name('event_archive');
	Route::any('/event/delete/{id}',            [EventsController::class, 'eventDeleteForm'])->name('event_delete');
                                    // * 2.3 CategoriesEvents SHOW\CRUD methods;
    Route::get('/categories/categories-types',  [CategoriesController::class, 'showCategoriesTypes'])->name('categoryType');
    Route::post('/categories/store-category',   [CategoriesController::class, 'storeCategory'])->name('storeCategory');
    Route::post('/categories/store-type',       [CategoriesController::class, 'storeTypes'])->name('storeType');
    Route::any('/category/delete/{id}',         [CategoriesController::class, 'deleteCategory'])->name('categoryDelete');
    Route::any('/type/delete/{id}',             [CategoriesController::class, 'deleteType'])->name('typeDelete');
    // 3. Parser methods:
    Route::get('/parser',                       [ParserController::class, 'parsedDataList'])->name('parsed');
    Route::get('/parser/show/{id}',             [ParserController::class, 'parseShowItem']);

    // 4. Widgets methods:
    Route::get('/widget/show/{id}',             [ReportsController::class, 'widget_show_item']);

    // 5. Partners methods:
    Route::get('/partners',                     [PartnersController::class, 'partners_list'])->name('partners');
    Route::get('/partner/show/{id}',            [PartnersController::class, 'partner_show_item']);

    // 6. Organizer methods:
    Route::get('/todo/list',                    [OrganizerController::class, 'todo_list']);

    // 7. Manager methods:
    Route::get('manager/dashboard3',            [ManagerController::class, 'dashboard3'])->name('dashboard3');
    Route::get('manager/gallery2',              [ManagerController::class, 'gallery2List'])->name('gallery2');
    Route::get('manager/reports',               [ManagerController::class, 'reportsList'])->name('reports');
    Route::get('manager/report/show/{id}',      [ManagerController::class, 'reportShowItem'])->name('report_item');
    Route::get('manager/invoices',              [ManagerController::class, 'invoicesList'])->name('invoices');
    Route::get('manager/invoice/show/{id}',     [ManagerController::class, 'invoiceShowItem'])->name('invoice_item');

    // 8. Bells methods:
    Route::post('/bell/create',             [BellsController::class, 'bell_create']);
    Route::get('/bell/push',                [BellsController::class, 'bell_push']);
    Route::get('/bell/show/{id}',           [BellsController::class, 'bell_show_item']);
    Route::put('/bell/edit/{id}',           [BellsController::class, 'bell_edit_item']);
    Route::delete('/bell/delete/{id}',      [BellsController::class, 'bell_delete_item']);

    // 9. Letters methods:
    Route::get('/letters',                  [LettersController::class, 'letters_list'])->name('letters');
    Route::post('/letter/create',           [LettersController::class, 'letter_create']);
    Route::get('/letter/show/{id}',         [LettersController::class, 'letter_show_item']);
    Route::delete('/letter/delete/{id}',    [LettersController::class, 'letter_delete_item']);
    Route::get('/notes',                    [LettersController::class, 'notes_list'])->name('notes');
    Route::get('/recited',                  [LettersController::class, 'recited_list'])->name('recited');
    Route::get('/sent',                     [LettersController::class, 'sent_list'])->name('sent');
    Route::get('/archive',                  [LettersController::class, 'archive_list'])->name('archive');
    Route::get('/indicated',                [LettersController::class, 'indicated_list'])->name('indicated');
    Route::get('/board',                    [LettersController::class, 'board_list'])->name('board');
    Route::get('/public',                   [LettersController::class, 'public_list'])->name('public');

    // 10. Logs list:
    Route::get('/logs-monitor',             [AdminController::class, 'logsMonitor']);
    Route::get('/logs',                     [LogReaderController::class, 'getIndexLogs']);
    Route::get('/get-logs',                 [LogReaderController::class, 'getLogs']);

    Route::group([
        'namespace' => '\LaravelLogReader\Controllers',
        'middleware' => config('laravel-log-reader.middleware')
        ], function () {
            Route::get(config('laravel-log-reader.view_route_path'), 'LogReaderController@getIndex');
            Route::post(config('laravel-log-reader.view_route_path'), 'LogReaderController@postDelete');
            Route::get(config('laravel-log-reader.api_route_path'), 'LogReaderController@getLogs');
        });

});
