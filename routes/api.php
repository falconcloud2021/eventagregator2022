<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\FrontUserController;
use App\Http\Controllers\FrontController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Routing send tokens API "mobile applications"
// Route::post('/sanctum/token', function (Request $request) {
//     $request->validate(['email' => 'required|email', 'password' => 'required', 'device_name' => 'required',]);
//     $user = User::where('email', $request->email)->first();
//         if (! $user || ! Hash::check($request->password, $user->password)) {
//             throw ValidationException::withMessages(['email' => ['The provided credentials are incorrect.'],]);
//         }
//         return $user->createToken($request->device_name)->plainTextToken;
// });
// Default opened routing send tokens API "desktop web version" for all users
Route::get('/',                     [FrontController::class,'index'])->name('expenses.indexPage');
Route::get('/event/show/{id}',      [FrontController::class,'eventShowItem'])->name('expenses.itemEvent');
Route::post('/events/selection',    [FrontController::class,'eventsSelect'])->name('expenses.selectEvent');
// // Authorize user auth:api
Route::middleware('auth:sanctum', 'verified')->group(function () {
    Route::get('user/comments',     [FrontUserController::class,'frontUsersCommentsList'])->name('users.listComments');
    Route::get('user/rate',         [FrontUserController::class,'frontUserRate'])->name('users.rateLevel');
    Route::post('user/add-comment', [FrontUserController::class,'frontUsersAddComment'])->name('users.addComment');
 });
// // Authorize user auth:sanctum
// CRUD roles routing send tokens API "desktop web version" / "authorized partners-users"
Route::middleware('auth:sanctum', 'verified')->group(function () {
    Route::get('partner/events',            'api\FrontPartnersController@frontEventsList')->name('partners.listEvents');
    Route::post('partner/event/store',      'api\FrontPartnersController@frontEventStore')->name('partners.storeEvent');
    Route::get('partner/event/show',        'api\FrontPartnersController@frontEventShow')->name('partners.showEvent');
    Route::put('partner/event/update',      'api\FrontPartnersController@frontEventUpdate')->name('partners.updateEvent');
    Route::delete('partner/event/destroy',  'api\FrontPartnersController@frontEventDestroy')->name('partners.destroyEvent');
});
