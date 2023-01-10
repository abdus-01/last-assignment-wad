<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Food;
use App\Models\Order;
use App\Models\Reserve;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function user()
    {
        $data = user::all();

        return view('admin.users', compact('data'));
    }

    public function adduser()
    {
        return view('admin.adduser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'usertype' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;

        $user->password = Hash::make($request->password); //or some random hash generator
        $user->usertype = $request->usertype;

        //set as empty string

        $user->save();

        return back()->with(['sucess' => 'user added successfully']);
    }

    public function update(Request $request, $id)
    {
        $data = user::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'usertype' => 'required',
        ]);

        $use->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->usertype = $request->usertype;
        $userdata->save();

        return redirect()->back()->with(['sucess' => 'user updated successfully']);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $data = new food;
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        $data->image = $imagename;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();

        return redirect()->back();
    }

    public function edituser($id)
    {
        return view('admin.edituser');
    }

    public function deleteuser($id)
    {
        $data = user::findOrFail($id);
        $data->delete();

        return redirect()->back();
    }

    public function foodmenu()
    {
        $data = food::all();

        return view('admin.foodmenu', compact('data'));
    }

    public function deletefood($id)
    {
        $data = food::findOrFail($id);
        $data->delete();

        return redirect()->back();
    }

    public function updateview($id)
    {
        $data = food::findOrFail($id);

        return view('admin.updateview', compact('data'));
    }

    public function updatefood(Request $request, $id)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $data = food::findOrFail($id);
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);
        $data->image = $imagename;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();

        return redirect()->back()->with(['sucess' => 'food updated successfully']);
    }

    public function reserve(Request $request)
    {
        /*$request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'guest' => 'required',
            'date' => 'required',
            'time' => 'required',
            'message' => 'required',
        ]);*/
        $data = new Reserve;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;
        $data->save();

        return redirect()->back()->with(['sucess' => 'reservation made successfully']);
    }

    public function viewreserve()
    {
        $data = Reserve::all();

        return view('admin.adminreserve', compact('data'));
    }

    public function updatereserve($id)
    {
        $data = Reserve::findOrFail($id);

        return view('admin.updatereserve', compact('data'));
    }

    public function editreserve(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'guest' => 'required',
            'date' => 'required',
            'time' => 'required',
            'message' => 'required',
        ]);
        $data = Reserve::findOrFail($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;
        $data->save();

        return redirect()->back()->with(['sucess' => 'reservation made successfully']);
    }

    public function deletereserve($id)
    {
        $data = Reserve::findOrFail($id);
        $data->delete();

        return redirect()->back()->with(['success', 'reservation deleted successfully']);
    }

    public function viewchef()
    {
        $data = Chef::all();

        return view('admin.adminchefs', compact('data'));
    }

    public function uploadchef(Request $request)
    {
        $data = new Chef;
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefimage', $imagename);
        $data->image = $imagename;
        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->save();

        return back()->with(['success' => 'chef added successfully']);
    }

    public function updatechef(Request $request, $id)
    {
        $data = Chef::findOrFail($id);

        return view('admin.updatechef', compact('data'));
    }

    public function editchef(Request $request, $id)
    {
        $data = Chef::findOrFail($id);
        $image = $request->image;
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('chefimage', $imagename);
            $data->image = $imagename;
        }

        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->save();

        return back()->with(['success' => 'chef updated successfully']);
    }

    public function deletechef($id)
    {
        $data = Chef::findOrFail($id);
        $data->delete();

        return redirect()->back()->with(['success', 'chef deleted successfully']);
    }

    public function vieworders()
    {
        $data = Order::all();

        return view('admin.orders', compact('data'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $data = Order::where('name', 'Like', '%'.$search.'%')->orWhere('foodname', 'Like', '%'.$search.'%')->get();

        return view('admin.orders', compact('data'));
    }
}
