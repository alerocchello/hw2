<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class HomeController extends BaseController {

    public function index() {
        $session_id = session('user_id');
        $user = User::find($session_id);
        if (!isset($user))
            return view('/login');

        return view("home")->with("user", $user);
    }

    public function spotify($song) {
        $song=urlencode($song);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://accounts.spotify.com/api/token");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); 
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode(env('SPOTIFY_CLIENT_ID').':'.env('SPOTIFY_CLIENT_SECRET'))));
        $token =json_decode(curl_exec($curl), true);
        curl_close($curl);

        $urlSpotify="https://api.spotify.com/v1/search?type=track&q=";
        $url=$urlSpotify .$song;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token["access_token"])); 
        $result=curl_exec($curl);
        curl_close($curl);
        return $result;
    }

}
?>