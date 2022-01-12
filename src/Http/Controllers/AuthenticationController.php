<?php

namespace Davidaprilio\LaravelStarter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Actions\DavPack\LoginAction;

class AuthenticationController extends Controller
{
    use LoginAction;

    /**
     * Show form Login
     */
    public function show()
    {
        if (Auth::check()) {
            return redirect()->route($this->home);
        }
        return view('auth.login');
    }


    /**
     * Login action
     */
    public function store(Request $request)
    {
        // $this->loginAddLogic();

        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($credentials, $this->remember)) {
            $request->session()->regenerate();
            return redirect()->route($this->home)->with('login-success', 'Login Berhasil');
        } else {
            return redirect()->back()->withErrors([
                'not-match-credential' => 'User atau Password anda salah'
            ])->withInput();
        }
    }

    /**
     * Logout action
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to('/');
    }
}
