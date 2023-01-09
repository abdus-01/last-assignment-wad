<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data = food::all();
        $data1 = Chef::all();

        return view('home', compact('data', 'data1'));
    }

    public function redirects()
    {
        $data1 = Chef::all();
        $data = food::all();
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.adminhome');
        } else {
            $user_id = Auth::id();
            $count = Cart::where('user_id', $user_id)->count();

            return view('home', compact('data', 'data1', 'count'));
        }
    }

    public function addcart(Request $request, $id)
    {
        if (Auth::id()) {
            $user_id = Auth::id();
            $foodid = $id;
            $quantity = $request->quantity;
            $cart = new Cart;
            $cart->user_id = $user_id;
            $cart->food_id = $foodid;
            $cart->quantity = $quantity;
            $cart->save();

            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }

    public function showcart(Request $request, $id)
    {
        $count = Cart::where('user_id', $id)->count();
        if (Auth::id() == $id) {
            $data2 = Cart::select('*')->where('user_id', '=', $id)->get();
            $data = Cart::where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();

            return view('showcart', compact('count', 'data', 'data2'));
        } else {
            return redirect()->back();
        }
    }

    public function deletecart($id)
    {
        $data2 = Cart::findOrFail($id);
        $data2->delete();

        return redirect()->back();
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'foodname' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
        foreach ($request->foodname as $key => $foodname) {
            $data = new Order;
            $data->foodname = $foodname;
            $data->price = $request->price[$key];
            $data->quantity = $request->quantity[$key];
            $data->name = $request->name;
            $data->address = $request->address;
            $data->phone->$request->phone;
            $data->save();
        }

        return redirect()->back()->with(['success', 'order placed successfully']);
    }
}
