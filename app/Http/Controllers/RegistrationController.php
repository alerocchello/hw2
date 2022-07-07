<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

class RegistrationController extends Controller {

    protected function create() {
        
        $request = request();

        if($this->checkErrors($request) !== true) {
            $newUser =  User::create([
            'username' => $request['username'],
            'password' => password_hash($request['password'],PASSWORD_BCRYPT),
            'name' => $request['name'],
            'surname' => $request['surname'],
            'email' => $request['email'],
            ]);
            if ($newUser) {
                Session::put('user_id', $newUser->id);
                Session::put('username',$newUser->username);
                return redirect('home');
            } else {
                return view('registration')->with(['errore'=>"Errore nella creazione del tuo account"]);
            }
        } else 
        return view('registration')->with(['errore'=>"Errore nelle credenziali che hai inserito"]);
    }

    public function checkErrors($data) {
        $error=false;
        
        # USERNAME
        // Controlla che l'username rispetti il pattern specificato
        if(!preg_match('/^[a-zA-Z0-9_]{1,20}$/', $data['username'])) {
            $error=true;
        } else {
            $username = User::where('username', $data['username'])->first();
            if ($username !== null) {
                $error=true;
            }
        }

        # EMAIL
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error=true;
        } else {
            $email = User::where('email', $data['email'])->first();
            if ($email !== null) {
                $error=true;
            }
        }

        # PASSWORD
        if (strlen($data["password"]) < 8) {
            $error=true;
        }
        
        # CONFERMA PASSWORD
        if (strcmp($data["password"], $data["conf_password"]) != 0) {
            $error=true;
        }

        return $error;
    }

    public function checkUsername($username) {
        $exist = User::where('username', $username)->exists();
        if($exist!=null){
            return json_encode(true);
        }
        else{
            return json_encode(false);
        }
    }

    public function checkEmail($email) {
        $exist = User::where('email', $email)->exists();
        if($exist!=null){
            return json_encode(true);
        }
        else{
            return json_encode(false);
        }
    }

    public function index() {
        if(session('username') !== null)
            return redirect('home');
        else
            return view('registration');
    }

}

?>