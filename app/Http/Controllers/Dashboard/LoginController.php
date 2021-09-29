<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;

class LoginController extends Controller
{
    public function login()
    {

        return view('dashboard.auth.login');
    }


    public function postLogin(AdminLoginRequest $request)
    {
        if (auth()->guard('admin')->
        attempt(['phone_one' => $request->input("email"), 
        'password' => $request->input("password")])) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);

    }

    public function logout()
    {

        $gaurd = $this->getGaurd();
        $gaurd->logout();

        return redirect()->route('admin.login');
    }

    private function getGaurd()
    {
        return auth('admin');
    }
}
