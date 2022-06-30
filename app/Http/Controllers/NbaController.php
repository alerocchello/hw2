<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class NbaController extends BaseController {

    public function index() {
        $session_id = session('user_id');
        $user = User::find($session_id);
        if (!isset($user))
            return view('/login');

        return view("nba")->with("user", $user);
    }

    public function nbaTeams() {
			$curl = curl_init();

			curl_setopt_array($curl, [
				CURLOPT_URL => "https://nba-teams2.p.rapidapi.com/NBA",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => [
					"X-RapidAPI-Host: nba-teams2.p.rapidapi.com",
					"X-RapidAPI-Key: 4bfcc78970mshce645f492d886cdp172b44jsn1426c44f320c"
				],
			]);

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				return "cURL Error #:" . $err;
			} else {
				return $response;
			}
    }
}
?>