<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use Wave\Facades\Wave;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AddTransactionController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VentureController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\UserRegisterController;
use App\Models\User;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\MentorController;


// Authentication routes
Auth::routes();

// Voyager Admin routes
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Wave routes
Wave::routes();

Route::get('/register-user', function () {
    return view('register_form');
});

Route::get('/register-user', [UserRegisterController::class, 'showForm'])->name('register.form');

Route::post('/register-user', [UserRegisterController::class, 'store'])->name('user.register');

Route::get('/', function () {
    return view('Home');
})->name('HomePage');

Route::get('/about', function () {
    return view('about');
});

Route::get('/venture', function () {
    return view('venture');
});

Route::get('/venture', [VentureController::class, 'create'])->middleware('auth')->name('show.venture');


Route::get('/venture/detail/{id}', [VentureController::class, 'details'])->name('venture.show')->middleware('auth');

Route::get('/venturedetail', function() {
    return view('venturedetail');});

Route::get('/ventures', [VentureController::class, 'create'])->middleware('auth'); // To show the form

Route::get('/ventures', [VentureController::class, 'showForm'])->name('ventures.create');

// Define the route to handle form submission with the name `submit.venture`
Route::post('/ventures', [VentureController::class, 'store'])->name('submit.venture');

Route::get('/venture-detail', function () {
    return view('venture_detail');
});

Route::get('/investor', function () {
    return view('investor');
})->name('show.investor');

Route::get('/organization', function () {
    return view('organization');
});

// Route::get('/mentor', function () {
//     return view('mentor');
// })->name('show.mentor');

Route::get('/mentor', [MentorController::class, 'index'])->name('show.mentor');

Route::get('/mentordetail', function () {
    return view('mentordetail');
})->name('show.mentordetails');

Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');

Route::get('/program/detail/{id}', [ProgramController::class, 'details'])->name('program.show')->middleware('auth');

Route::get('/programs/{program}/apply', [ProgramController::class, 'showApplyForm'])->name('programss.apply');
Route::post('/programs/{program}/apply', [ProgramController::class, 'submitApplication'])->name('programs.apply.submit');

// Route::middleware(['auth'])->group(function () {
//     Route::post('/programs/{id}/apply', [ProgramController::class, 'applyToProgram'])->name('programs.apply');
// });

Route::get('/form', function () {
    return view('new_register_form');
});
// Route::post('/admin/users/{id}/toggle-status', function ($id) {
//     $user = User::findOrFail($id);
//     $user->status = $user->status ? 0 : 1;
//     $user->save();

//     return redirect()->back()->with([
//         'message' => 'User status updated successfully!',
//         'alert-type' => 'success',
//     ]);
// })->name('users.toggle-status')->middleware(['web', 'admin.user']);

