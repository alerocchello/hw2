<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Tshirt;

class StoreController extends BaseController {

    public function index() {
        $session_id = session('user_id');
        $user = User::find($session_id);
        if (!isset($user))
            return view('/login');

        return view("store")->with("user", $user);
    }

    public function returnTshirt($team_name) {
        $tshirt = Tshirt::where('team', $team_name)->get();
        return $tshirt;
    }
}
?>