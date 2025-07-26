<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    protected array $methodsToConvert = ['register', 'login'];
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        $credentials = $request->only('email', 'password');

        // Increase login session time
//        config(['session.lifetime' => 43200]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'ایمیل یا رمز اشتباه است']);
        }

        $request->session()->regenerate();

        Auth::user();
        return $this->defineRoute($user);
    }


    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        $user->assignRole(Role::find($data['role'])->name);

        return redirect()->route('login.form');
    }

    public function showRegister()
    {
        $roles = Role::whereNotIn('name', ['super_admin', 'admin'])->get();
        return view('auth.register', compact('roles'));
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.form');
    }

    private function defineRoute($user)
    {
        $role = $user->getRoleNames()->first();

        return match ($role) {
            'admin', 'super_admin' => redirect()->route('admin.dashboard'),
            'seller' => redirect()->route('seller.dashboard'),
            default  => redirect()->route('site.home'),
        };
    }
    public function showLogoutError(): void
    {
        abort('403', 'امکان انجام این درخواست وجود ندارد');
    }
}
