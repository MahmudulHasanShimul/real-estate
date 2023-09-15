<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/agent-or-user/login',[AuthController::class,'agentOrUserLogin'])->name('agent-or-user.login');
Route::get('/create-new/profile',[AuthController::class,'createProfile'])->name('create.new.profile');
Route::post('/store-new/profile',[AuthController::class,'storeProfile'])->name('store.new.profile');

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/logout',[AuthController::class,'userLogOut'])->name('user.logout');
    Route::get('/user/profile',[UserController::class,'userProfile'])->name('user.profile');
    Route::post('/user/profile/update',[UserController::class,'userProfileUpdate'])->name('userProfile.update');
    Route::get('/user/change/password',[UserController::class,'userChangePassword'])->name('user.change.password');
    Route::post('/user/update/password',[UserController::class,'userUpdatePassword'])->name('user.update.password');
});

//For Agent Authentication
Route::middleware(['auth', 'role:agent'])->group(function(){

    Route::get('/agent/logout',[AuthController::class,'agentLogOut'])->name('agent.logout');
    Route::get('/agent/profile',[AgentController::class, 'agentProfile'])->name('agent.profile');
    Route::post('/agent/profile/update',[AgentController::class, 'agentProfileUpdate'])->name('agentProfile.update');
    Route::get('/agent/change/password',[AgentController::class, 'agentChangePassword'])->name('agent.change.password');
    Route::post('/agent/update/password',[AgentController::class, 'agentUpdatePassword'])->name('agent.update.password');

});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


require __DIR__.'/auth.php';

//For Admin Authentication
Route::get('/admin/login',[AdminController::class,'adminLogin'])->name('admin.login');

Route::middleware(['auth', 'role:admin'])->group(function(){

    Route::get('/admin/dashboard',[AdminController::class,'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class,'adminLogout'])->name('admin.logout');
    Route::get('/admin/profile',[AdminController::class,'adminProfile'])->name('admin.profile');
    Route::post('/admin/profile/update',[AdminController::class,'adminProfileUpdate'])->name('admin.profile.update');
    Route::get('/admin/change/password',[AdminController::class,'adminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password',[AdminController::class,'adminUpdatePassword'])->name('admin.update.password');

    //Property Type group controller
    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/admin/property-type/manage', 'propertyTypeManage')->name('propertyType.manage');
        Route::get('/admin/property-type/add', 'propertyTypeAdd')->name('propertyType.add');
        Route::post('/admin/property-type/store', 'propertyTypeStore')->name('propertyType.store');
        Route::get('/admin/property-type/edit/{id}', 'propertyTypeEdit')->name('propertyType.edit');
        Route::post('/admin/property-type/update/{id}', 'propertyTypeUpdate')->name('propertyType.update');
        Route::get('/admin/property-type/delete/{id}','propertyTypeDelete')->name('propertyType.delete');
    });

    Route::controller(PropertyTypeController::class)->group(function(){
        Route::get('/admin/amenity/manage','amenityManage')->name('amenity.manage');
        Route::get('/admin/amenity/add','amenityAdd')->name('amenity.add');
        Route::post('/admin/amenity/store','amenityStore')->name('amenity.store');
        Route::get('/admin/amenity/edit/{id}','amenityEdit')->name('amenity.edit');
        Route::post('/admin/amenity/update/{id}','amenityUpdate')->name('amenity.update');
        Route::get('/admin/amenity/delete/{id}','amenityDelete')->name('amenity.delete');
    });
});


