<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class PremierController extends BaseController {

    public function index() {
        $session_id = session('user_id');
        $user = User::find($session_id);
        if (!isset($user))
            return view('/login');

        return view("premier")->with("user", $user);
    }

    public function classification() {
        $curl = curl_init();

        curl_setopt_array($curl, [
            // imposta l'url
            CURLOPT_URL => "https://transfermarket.p.rapidapi.com/competitions/get-table?id=GB1&seasonID=2020",
            // restituisce il risultato come stringa
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            // imposta il tipo di richiesta 
            CURLOPT_CUSTOMREQUEST => "GET",
            // API key
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: transfermarket.p.rapidapi.com",
                "X-RapidAPI-Key: 4bfcc78970mshce645f492d886cdp172b44jsn1426c44f320c"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

}
?>