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
            return view('login')
            ->with('csrf_token', csrf_token());
        }
    }

    public function checkLogin() {
        $user = User::where('username', request('username'))
                ->where('password', request('password'))
                ->first();

        if($user->exists()) {
            Session::put('user_id', $user->id);
            Session::put('username', $user->username);
            return redirect('home');//->with('errore', 1)->with('csrf_token', csrf_token());
        }
        else {
            return redirect('login')->withInput();
        }
    }

    public function logout() {
        Session::flush();
        return redirect('login');
    }
}

?>