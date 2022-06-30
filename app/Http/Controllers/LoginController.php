<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class LoginController extends BaseController
{
    
    public function login() {
        if(session('user_id') != null) {
            return redirect("home");
        }
        else {
            return view('login');
        }
    }

    public function checkLogin() {
        $user = User::where('username', request('username'))->first();

        if($user != null && password_verify(request('password'), $user->password)) {
            Session::put('user_id', $user->id);
            Session::put('username', $user->username);
            return redirect('home');
        }
        else {
            return view('login')->with(['errore'=>"L'account associato a queste credenziali non esiste"]);
        }
    }

    public function logout() {
        Session::flush();
        return redirect('login');
    }
}

?>