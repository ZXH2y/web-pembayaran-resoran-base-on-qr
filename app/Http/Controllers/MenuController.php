<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Item;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    // nomor meja
    public function index(Request $request){
        $tableNumber = $request->query('meja');
        if($tableNumber){
            Session::put('tableNumber', $tableNumber);
        }
        // mengambil menu yang aktif lalu mengurukan namanya berdasarkan abjad
        $items = Item::where('is_active', 1)->orderBy('name', 'asc')->get();

        return view('costumer.menu', compact('items', 'tableNumber'));


    }

    public function cart(){
        $cart = Session::get('cart');
        return view('costumer.cart', compact('cart'));    
    }

    public function addToCart(Request $request){
            $menuId = $request->input('id');
            $menu = Item::find($menuId);

            if(!$menu){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Menu not found'
                ]);
            }
            $cart = Session::get('cart');

            if(isset($cart[$menuId])){
                $cart[$menuId]['qty'] += 1;
            }else{
                $cart[$menuId] = [
                'id' => $menu->id,
                'name' => $menu->name,
                'price' => $menu->price,
                'image' => $menu->img,
                'qty' => 1
                ];

            }

            Session::put('cart', $cart);
            return response()->json([
                'status' => 'success',
                'message' => 'berhasil di tambahkan ke keranjang',
                'cart' => $cart
            ]);
    } 
}
