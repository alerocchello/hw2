<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\News;

class NewsController extends BaseController {

    public function index() {
        $session_id = session('user_id');
        $user = User::find($session_id);
        if (!isset($user))
            return view('/login');

        return view("news")->with("user", $user);
    }

    public function warehouse() {
        return News::all();
    }
}
?>