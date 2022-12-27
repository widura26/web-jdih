<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\public\PublicController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Home\HomeController;
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

Route::group(['prefix' => 'home/'], function () {
    Route::get('/homepage', [HomeController::class, 'homepageView'])->name('homepageView');
    Route::get('/detail', [HomeController::class, 'detailView'])->name('detailView');
});

Route::prefix('/admin')->middleware('usermiddle')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboardView'])->name('dashboardView');

    //dokumen
    Route::get('/semua-dokumen', [AdminController::class, 'daftarDokumen'])->name('admin.semuaDokumen');
    Route::get('/tambah-dokumen', [AdminController::class, 'tambahDokumen'])->name('admin.tambahDokumen');
    Route::post('/tambah-dokumen', [AdminController::class, 'tambahDokumenProses'])->name('admin.prosesTambahDokumen');
    
    Route::get('/ubah-dokumen/{id}', [AdminController::class, 'ubahDokumen'])->name('admin.ubahDokumen');
    Route::post('/ubah-dokumen/{id}', [AdminController::class, 'ubahDokumenProses'])->name('admin.prosesUbahDokumen');
    Route::get('/hapus-dokumen/{id}', [AdminController::class, 'hapusDokumen'])->name('admin.hapusDokumen');
    Route::get('/dokumen-terkait/{id}', [AdminController::class, 'dokumenTerkait'])->name('admin.dokumenTerkait');
    Route::post('/dokumen-terkait/{id}', [AdminController::class, 'dokumenTerkaitProses'])->name('admin.dokumenTerkaitProses');
    Route::get('/dokumen-pengganti/{id}', [AdminController::class, 'dokumenPengganti'])->name('admin.dokumenPengganti');
    Route::post('/dokumen-pengganti/{id}', [AdminController::class, 'dokumenPenggantiProses'])->name('admin.dokumenPenggantiProses');

    //ADMINISTRATOR
    Route::get('/view_admin', [AdminController::class, 'adminView'])->name('adminView')->middleware('can:read-admin');
    Route::get('/view_register_admin', [AdminController::class, 'viewRegisterAdmin'])->name('registerView')->middleware('can:read-admin');
    Route::post('/input_admin', [AdminController::class, 'registerAdmin'])->name('registerAdmin')->middleware('can:create-admin');
    Route::get('/view_edit_admin/{id}', [AdminController::class, 'viewEditAdmin'])->name('editAdmin')->middleware('can:update-admin');
    Route::post('/edit_admin/{id}', [AdminController::class, 'updateAdmin'])->name('updateAdmin')->middleware('can:update-admin');
    Route::get('/delete_admin/{id}', [AdminController::class, 'deleteAdmin'])->name('deleteAdmin')->middleware('can:delete-admin');

    //ROLES
    Route::get('/view_roles', [RoleController::class, 'viewRole'])->name('roleView')->middleware('can:read-role');
    Route::get('/add_role', [RoleController::class, 'view_add_role'])->name('roleAdd')->middleware('can:create-role');
    Route::post('/input_role', [RoleController::class, 'addRole'])->name('roleInput')->middleware('can:create-role');
    Route::get('/delete_role/{id}', [RoleController::class, 'deleteRole'])->name('roleDelete')->middleware('can:delete-role');
    Route::get('/update_role/{id}', [RoleController::class, 'viewEditRole'])->name('roleUpdate')->middleware('can:update-role');
    Route::post('/edit_role/{id}', [RoleController::class, 'updateRole'])->name('roleEdit')->middleware('can:update-role');

    //PERMISION
    Route::get('/permission/{id}', [RoleController::class, 'viewPermission'])->name('viewPermission')->middleware('can:read-permission');
    Route::post('/input_permission/{id}', [RoleController::class, 'inputPermission'])->name('inputPermission')->middleware('can:update-permission');
    // Route::get('/add_permission', [RoleController::class, 'addPermission'])->name('addPermission');

    //LOG_AKTIVITAS
    Route::get('/aktivitas', [AdminController::class, 'viewAktivitas'])->name('viewAktivitas');

});

Route::group(['prefix' => 'auth/'], function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('loginView')->middleware('notusermiddle');
    Route::post('/loginPost', [AuthController::class, 'authenticate'])->name('loginPost');
});

Route::get('/logout', [AuthController::class, 'logout']);

route::prefix('public')->group(function(){

    Route::get('/dashboard', [PublicController::class, 'dashboard'])->name('public.dashboard');
    Route::get('/detail-dokumen/{id}', [PublicController::class, 'detailDokumen'])->name('public.detailDokumen');
    Route::get('/kategori/{kategori:jenis}', [PublicController::class, 'dokBasedKategori'])->name('public.dokBasedKategori');
    Route::get('/contact', [PublicController::class, 'contactView'])->name('public.contact');
    Route::get('/semua-dokumen', [PublicController::class, 'semuaDokumen'])->name('public.semuaDokumen');
});
