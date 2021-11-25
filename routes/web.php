<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\CollaborateurController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

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
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Toutes les routes relatives aux entreprises

Route::get('entreprise', [EnterpriseController::class, "showAllData"])->middleware(['auth'])->name('entreprise'); //visualiser toutes les entreprises

Route::post('entreprise/create', [EnterpriseController::class, "showAdd"])->middleware(['auth']); //aller sur la page d'ajout

Route::post('entreprise/createforme', [EnterpriseController::class, "addData"])->middleware(['auth']); //pour ajouter les valeurs

//Route::get('entreprise/{id}', [EnterpriseController::class, "showEnterpriseData"]); //visualiser une entreprise

Route::get('entreprise/update/{id}',[EnterpriseController::class, "editData"])->name('editEntreprise'); //page de modification

Route::post('entreprise/update/updateform/{id}',[EnterpriseController::class, "updateData"])->name('updateDataEntreprise'); //form de modification

Route::delete('entreprise/delete/{id}', [EnterpriseController::class, "destroyData"])->middleware(['auth']); //suppression

Route::get('entreprise/search', [EnterpriseController::class, "searchData"])->middleware(['auth']);

//Toutes les routes relatives aux collaborateurs

Route::get('collaborateur', [CollaborateurController::class, "showAllData"])->middleware(['auth'])->name('collaborateur');

Route::post('collaborateur/create', [CollaborateurController::class, "showAdd"])->middleware(['auth']);

Route::post('collaborateur/createformc', [CollaborateurController::class, "addData"])->middleware(['auth']);

//Route::get('collaborateur/{id}', [CollaborateurController::class, "showCollaborateurData"]);

Route::get('collaborateur/update/{id}',[CollaborateurController::class, "editData"])->middleware(['auth'])->name('editCollab');

Route::post('collaborateur/update/updateform/{id}',[CollaborateurController::class, "updateData"])->middleware(['auth'])->name('updateDatacollab');

Route::delete('collaborateur/delete/{id}', [CollaborateurController::class, "destroyData"])->middleware(['auth']);

Route::get('collaborateur/search', [CollaborateurController::class, "searchData"])->middleware(['auth']);


