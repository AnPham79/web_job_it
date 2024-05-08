<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\Company;

use App\Http\Requests\StoreEmployeeRequest;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function register()
    {
        $registerData = session('register_data');
        if ($registerData) {
            return view('auth.register', ['name' => $registerData['name'], 'email' => $registerData['email'], 'avatar' => $registerData['avatar']]);
        }

        return view('Auth.register');
    }

    public function handleLogin()
    {  
        
    }

    public function handleRegister(StoreEmployeeRequest $request)
    {  
        $data = new Employee;
        $data->fill($request->except('_token'));
        $data->password = bcrypt($request->password);
        $data->save();

        session()->forget('register_data');

        return redirect()->route('login');
    }

    public function logout()
    {

    }
}
