<?php
use App\Http\Controllers\Admin\AttendenceController;
use App\Http\Controllers\admin\BobineController;
use App\Http\Controllers\Admin\ElectricienController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\MecanicienController;
use App\Http\Controllers\Admin\PieceController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Admin\QuincaillerieController;
use App\Http\Controllers\Admin\TourneurController;
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


Route::get('/dashboard', function () {
    return view('admin.layouts.template');
})->middleware(['auth'])->name('dashboard');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');

Route::controller(ProductController::class)->group(function () {
    Route::get('/admin/all-products', 'Index')->name('allproducts');
    Route::get('/admin/add-product', 'AddProduct')->name('addproduct');
    Route::post('/admin/store-product', 'StoreProduct')->name('storeproduct');
    Route::get('/admin/edit-product/{id}', 'EditProduct')->name('editproduct');
    Route::get('/admin/delete-product/{id}', 'DeleteProduct')->name('deleteproduct');
    Route::put('/admin/update-product/{id}', 'UpdateProduct')->name('updateproduct');
    Route::get('/admin/show-product/{id}', 'ShowProduct')->name('showproduct');

});
Route::controller(BobineController::class)->group(function () {
    Route::get('/admin/all-bobines', 'Index')->name('allbobines');
    Route::get('/admin/add-bobine', 'AddBobine')->name('addbobine');
    Route::post('/admin/store-bobine', 'StoreBobine')->name('storebobine');
    Route::get('/admin/edit-bobine/{id}', 'EditBobine')->name('editbobine');
    Route::get('/admin/delete-bobine/{id}', 'DeleteBobine')->name('deletebobine');
    Route::put('/admin/update-bobine/{id}', 'UpdateBobine')->name('updatebobine');
    Route::get('/admin/show-bobine/{id}', 'ShowBobine')->name('showbobine');
});
Route::controller(EmployeeController::class)->group(function () {
    Route::get('/admin/all-employees', 'Index')->name('allemployees');
    Route::get('/admin/add-employee', 'AddEmployee')->name('addemployee');
    Route::post('/admin/store-employee', 'StoreEmployee')->name('storeemployee');
    Route::get('/admin/edit-employee/{id}', 'EditEmployee')->name('editemployee');
    Route::get('/admin/delete-employee/{id}', 'DeleteEmployee')->name('deleteemployee');
    Route::put('/admin/update-employee/{id}', 'UpdateEmployee')->name('updateemployee');
    Route::get('/admin/show-employee/{id}', 'ShowEmployee')->name('showemployee');
});
Route::controller(AttendenceController::class)->group(function () {
    Route::get('/admin/all-attendences', 'Index')->name('allattendences');
    Route::get('/admin/add-attendence', 'AddAttendence')->name('addattendence');
    Route::post('/admin/store-attendence', 'StoreAttendence')->name('storeattendence');
    Route::get('/admin/edit-attendence/{id}', 'EditAttendence')->name('editattendences');
    Route::get('/admin/delete-attendence/{id}', 'DeleteAttendence')->name('deleteattendence');
    Route::put('/admin/update-attendence/{id}', 'UpdateAttendence')->name('updateattendence');
    Route::get('/admin/show-attendence/{id}', 'ShowAttendence')->name('showattendence');
});
Route::controller(QuincaillerieController::class)->group(function () {
    Route::get('/admin/all-quincailleries', 'Index')->name('allquincailleries');
    Route::get('/admin/add-quincaillerie', 'AddQuincaillerie')->name('addquincaillerie');
    Route::post('/admin/store-quincaillerie', 'StoreQuincaillerie')->name('storequincaillerie');
    Route::get('/admin/edit-quincaillerie/{id}', 'EditQuincaillerie')->name('editquincaillerie');
    Route::get('/admin/delete-quincaillerie/{id}', 'DeleteQuincaillerie')->name('deletequincaillerie');
    Route::put('/admin/update-quincaillerie/{id}', 'UpdateQuincaillerie')->name('updatequincaillerie');
    Route::get('/admin/show-quincaillerie/{id}', 'ShowQuincaillerie')->name('showquincaillerie');
});
Route::controller(MecanicienController::class)->group(function () {
    Route::get('/admin/all-mecaniciens', 'Index')->name('allmecaniciens');
    Route::get('/admin/add-mecanicien', 'AddMecanicien')->name('addmecanicien');
    Route::post('/admin/store-mecanicien', 'StoreMecanicien')->name('storemecanicien');
    Route::get('/admin/edit-mecanicien/{id}', 'EditMecanicien')->name('editmecanicien');
    Route::get('/admin/delete-mecanicien/{id}', 'DeleteMecanicien')->name('deletemecanicien');
    Route::put('/admin/update-mecanicien/{id}', 'UpdateMecanicien')->name('updatemecanicien');
    Route::get('/admin/show-mecanicien/{id}', 'ShowMecanicien')->name('showmecanicien');
});
Route::controller(TourneurController::class)->group(function () {
    Route::get('/admin/all-tourneurs', 'Index')->name('alltourneurs');
    Route::get('/admin/add-tourneur', 'AddTourneur')->name('addtourneur');
    Route::post('/admin/store-tourneur', 'StoreTourneur')->name('storetourneur');
    Route::get('/admin/edit-tourneur/{id}', 'EditTourneur')->name('edittourneur');
    Route::get('/admin/delete-tourneur/{id}', 'DeleteTourneur')->name('deletetourneur');
    Route::put('/admin/update-tourneur/{id}', 'UpdateTourneur')->name('updatetourneur');
    Route::get('/admin/show-tourneur/{id}', 'ShowTourneur')->name('showtourneur');
});
Route::controller(ElectricienController::class)->group(function () {
    Route::get('/admin/all-electriciens', 'Index')->name('allelectriciens');
    Route::get('/admin/add-electricien', 'AddElectricien')->name('addelectricien');
    Route::post('/admin/store-electricien', 'StoreElectricien')->name('storeelectricien');
    Route::get('/admin/edit-electricien/{id}', 'EditElectricien')->name('editelectricien');
    Route::get('/admin/delete-electricien/{id}', 'DeleteElectricien')->name('deleteelectricien');
    Route::put('/admin/update-electricien/{id}', 'UpdateElectricien')->name('updateelectricien');
    Route::get('/admin/show-electricien/{id}', 'ShowElectricien')->name('showelectricien');
});
Route::controller(PieceController::class)->group(function () {
    Route::get('/admin/all-pieces', 'Index')->name('allpieces');
    Route::get('/admin/add-piece', 'AddPiece')->name('addpiece');
    Route::post('/admin/store-piece', 'StorePiece')->name('storepiece');
    Route::get('/admin/edit-piece/{id}', 'EditPiece')->name('editpiece');
    Route::get('/admin/delete-piece/{id}', 'DeletePiece')->name('deletepiece');
    Route::put('/admin/update-piece/{id}', 'UpdatePiece')->name('updatepiece');
    Route::get('/admin/show-piece/{id}', 'ShowPiece')->name('showpiece');
});



require __DIR__.'/auth.php';
