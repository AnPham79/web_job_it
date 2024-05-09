<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostsController;

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
    return view('Layouts.master');
})->name('welcome');

// --------------------- view --------------------------------------------------------

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handle-login');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'handleRegister'])->name('handle-register');

// --------------------- Đăng kí bằng google ----------------------------------
Route::get('/Auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google-auth');
 
Route::get('/Auth/google/callback', function () {
    $user = Socialite::driver('google')->user();

    session(['register_data' => [
        'name' => $user->name,
        'email' => $user->email,
        'avatar' => $user->avatar ?? null,
    ]]);

    $check_account = Employee::where('email', $user->email)->first();

    if($check_account) {

        $role = strtolower($check_account->role);

        session()->put('role', $role);

        if($role === 'admin') {
            session()->put('role', $role);
            return redirect()->route('admin.welcome');
        } else if($role === 'hr') {
            return redirect()->route('hr.welcome');
        } else {
            return redirect()->route('welcome');
        }
        
    } else {
        return redirect()->route('register');
    }
});

// ------------------------------ end ------------------------------------------

// --------------------------đăng kí bằng git hub -----------------------------
Route::get('/auth/github', function () {
    return Socialite::driver('github')->redirect();
})->name('github-auth');
 
Route::get('/auth/github/callback', function () {
    $user = Socialite::driver('github')->user();

    session(['register_data' => [
        'name' => $user->name,
        'email' => $user->email,
        'avatar' => $user->avatar ?? null,
    ]]);

    $check_account = Employee::where('email', $user->email)->first();

    if($check_account) {

        $role = strtolower($check_account->role);

        session()->put('role', $role);

        if($role === 'admin') {
            return redirect()->route('admin.welcome');
        } else if($role === 'hr') {
            return redirect()->route('hr.welcome');
        } else {
            return redirect()->route('welcome');
        }
        
    } else {
        return redirect()->route('register');
    }
});

// -------------------------- end -----------------------------------------------


// -------------------------- employee manager--------------------------------------------

Route::group(['prefix' => 'employee', 'as' => 'employee.'] , function() {

    Route::get('/', [UserController::class,'index'])->name('employee-index-manager');

    Route::delete('/delete-employee/{id}', [UserController::class, 'destroy'])->name('destroy-employee');

    Route::post('/export-excel', [UserController::class, 'exportIntoExcel'])->name('export-excel');

    Route::post('/export-csv', [UserController::class, 'exportIntoCSV'])->name('export-csv');

});
// ------------------------ end emplyee manager ------------------------------------------


// -------------------------- Posts manager--------------------------------------------

Route::group(['prefix' => 'posts', 'as' => 'posts.'] , function() {

    Route::get('/', [PostsController::class,'index'])->name('posts-index-manager');

    Route::get('/posts-create', [PostsController::class, 'create'])->name('posts-create');

    Route::post('/export-excel', [PostsController::class, 'exportIntoExcel'])->name('export-excel');

    Route::post('/export-csv', [PostsController::class, 'exportIntoCSV'])->name('export-csv');

    Route::post('/form-import-excel', [PostsController::class, 'formImportIntoExcel'])->name('form-import-excel');

    Route::post('/import-excel', [PostsController::class, 'importIntoExcel'])->name('import-excel');

});

// ------------------------ end posts manager ------------------------------------------