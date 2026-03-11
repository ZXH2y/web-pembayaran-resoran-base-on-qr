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
}
