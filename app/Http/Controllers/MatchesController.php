<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Event;
use App\Models\Comment;

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

    public function getOne($id) {
        return Event::find($id);
    }

    public function loadComments($id){
        return Comment::where('id_match', $id)->get(); 
    }

    public function addComment($id_match, $commento){
        $newcomment = new Comment( ['username_utente' => session('username'),
                                    'id_match' => $id_match,
                                    'commento' => $commento,
                                    'data' => now()
                                    ]);
        $newcomment->save();
    }

}

?>