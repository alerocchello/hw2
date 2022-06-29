<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Event;

class MatchesController extends BaseController {

    public function index() {
        $session_id = session('user_id');
        $user = User::find($session_id);
        if (!isset($user))
            return view('/login');

        return view("matches")->with("user", $user);
    }

    public function warehouse() {
        return Event::all();
    }
}
?>