<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\AuthController;

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