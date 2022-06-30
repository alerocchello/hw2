<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Cart;
use App\Models\Tshirt;

class CartController extends BaseController {

    public function index() {
        $session_id = session('user_id');
        $user = User::find($session_id);
        if (!isset($user))
            return view('/login');

        return view("cart")->with("user", $user);
    }

    public function addToCart($id) {
        $cart = new Cart;
        $cart->username_utente = session('username');
        $cart->id_prodotto = $id;
        $cart->save();
    }

    public function removeFromCart($id) {
        $cart = Cart::where('username_utente', session('username'))
                    ->where('id_prodotto', $id)
                    ->first();
        $cart->delete();
    }

    public function returnCart() {
        $id_tshirts = DB::table('carts')
                        ->where('username_utente', session('username'))
                        ->orderBy('id_prodotto')
                        ->pluck('id_prodotto'); //restituisce solo i valori di una colonna

        foreach ($id_tshirts as $id_tshirt) {
            $tshirts[] = Tshirt::find($id_tshirt);
        }

        return $tshirts;
    }

}
?>
