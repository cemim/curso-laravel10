<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Criar Usuário Teste
// php artisan tinker
// $admin = new App\Models\Admin
// $admin->name = 'adm'
// $admin->email = 'adm@teste.com'
// $admin->password = Hash::make('adm123')
// $admin->age = 34
// $admin->save();

class AdminLoginControlador extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $isAuth = Auth::guard('admin')->attempt($credentials, $request->remember);

        if ($isAuth) {
            return redirect()->intended(route('admin.dashboard'));
        }
        
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function index() {
       return view('auth.admin-login');
    }
}
