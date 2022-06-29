<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Echo_;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

class RegistrationController extends Controller {

    protected function create() {
        
        $request = request(); //Legge i dati della richiesta

        if ($this->countErrors($request) === 0) {
            $newUser =  User::create([
                'name' => $request['name'],
                'surname' => $request['surname'],
                'username' => $request['username'],
                'email' => $request['email'],
                'password' => $request['password'],
                ]);
            if ($newUser) {
                Session::put('username',$newUser->username);
                Session::put('user_id', $newUser->id);
                //return view('home')->with('username',session('username'));
                return redirect('home');
            } else {
                return redirect('registration')->withInput();
            }
        } else {
            return view('registration');//->with('errore',1)->with("csrf_token",csrf_token());
        }
        
    }

    public function countErrors($data) {
        //Creo un array contente tutti gli errori
        $error = array();
        
        # CONTROLLO USERNAME
        // Controlla che l'username rispetti il pattern specificato
        if(!preg_match('/^[a-zA-Z0-9_]{1,20}$/', $data['username'])) {
            $error[] = "Username non valido";
        } else {
            // Controllo se lo username esiste già
            $username = User::where('username', $data['username'])->first();
            if ($username !== null) {
                $error[] = "Username già utilizzato";
            }
        }

        # CONTROLLO EMAIL
        //Metto un filtro per controllare la validità dell'email
        //In particolare, Il filtro FILTER_VALIDATE_EMAIL convalida un indirizzo e-mail
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = User::where('email', $data['email'])->first();
            if ($email !== null) {
                $error[] = "Esiste già un account associato a quest'E-mail";
            }
        }

        # CONTROLLO PASSWORD
        if (strlen($data["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        }

        # CONTROLLO CONFERMA PASSWORD
        if (strcmp($data["password"], $data["conf_password"]) != 0) {
            $error[] = "Le password non coincidono";
        }

        return count($error);
    }

    public function checkUsername($username) {
        $exist = User::where('username', $username)->exists();
        return array(['exists' => $exist]);
    }

    public function checkEmail($email) {
        $exist = User::where('email', $email)->exists();
        return array(['exists' => $exist]);
    }

    public function index() {
        if(session('username') !== null)
            return redirect('home');
        else
            return view('registration');//->with('errore', 0)->with("csrf_token",csrf_token());
    }

}

?>