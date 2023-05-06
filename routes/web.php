<?php

use App\Http\Controllers\Admin\ChatsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Jobs\JobsAppliedController;
use App\Http\Controllers\Admin\Jobs\JobsCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\QrCodeController;
use App\Http\Controllers\Admin\User\ProfileController;
use App\Http\Controllers\Admin\User\UserSettingController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\Admin\Post\ArticleController;
use App\Http\Controllers\Admin\Post\CategoryController;
use App\Http\Controllers\Admin\Post\UploadController;
use App\Http\Controllers\Admin\Settings\ConfigurationController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ScreenController;
use App\Http\Controllers\Frontend\ScreensController;
use App\Http\Controllers\Admin\Jobs\JobsController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\Post\TagController;
use App\Http\Controllers\Admin\Settings\RolePermissionController;
use App\Http\Controllers\Frontend\JobsController as FrontendJobsController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\VendorController;
use App\Http\Livewire\ArticleCategoriesTable;

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

// Route::get('/', [HomeController::class, 'index']);
Route::get('/', function(){
    return redirect()->route('login');
});
Route::get('/post/{slug}', [ScreenController::class, 'post']);
Route::get('/posts', [ScreensController::class, 'posts']);
Route::get('/jobs', [FrontendJobsController::class, 'index'])->name('jobs-list');
Route::get('/jobs/{slug}', [FrontendJobsController::class, 'show'])->name('jobs-detail');
Route::post('apply', [FrontendJobsController::class, 'store'])->name('jobs-apply');


// BACKEND DASHBOARD
Route::group(['middleware' => ['role:super admin|writer|admin']], function () {
    Route::get('qrcodes', [QrCodeController::class, 'index']);
    Route::resource('friends', FriendsController::class);
    Route::controller(FriendsController::class)->group(function(){
        Route::get('/friends', 'friends')->name('profile.friends');
        Route::get('/friends/add/{id}', 'add')->name('addfriends');
        Route::get('/friends/delete/{id}', 'unfriends')->name('profile.friends.delete');
    });

    Route::prefix('cms')->group(function (){
        Route::resource('vendors', VendorController::class);
        Route::resource('items', ItemController::class);
        Route::resource('divisions', ItemController::class);
        Route::resource('productions', ItemController::class);
        Route::resource('packings', ItemController::class);

        Route::resource('articles', ArticleController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('tags', TagController::class);

        Route::resource('chats', ChatsController::class);
        Route::resource('userssetting', UserSettingController::class);
        Route::post('changepassword', [UserSettingController::class, 'changePassword'])->name('changepassword');
        Route::controller(ProfileController::class)->group(function(){
            Route::get('/profile', 'index')->name('profile.index');
        });

        Route::resource('configuration', ConfigurationController::class);
    });

});

Route::group(['middleware' => ['role:super admin|admin']], function () {
    Route::resource('menu', MenuController::class);
    Route::resource('users', UserController::class);
    Route::get('/user/trashed', [UserController::class, 'showTrashed'])->name('usershowTrashed');

    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('role-permission', RolePermissionController::class);
    Route::get('/permission', [RolePermissionController::class, 'createPermission'])->name('permission');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('phpinfo', fn () => phpinfo());

Route::get('/sitemap', [MetaController::class, 'sitemap']);
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
