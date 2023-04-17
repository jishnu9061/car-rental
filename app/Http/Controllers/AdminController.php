<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Message;
use App\Models\Rentdetail;
use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin-login');
    }
    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => request('email'), 'password' => request('password')])) {
            return view('admin-dashboard');
        } else {
            return redirect()->route('admin.login')->with('message', 'Invalid credentials');

     }

    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin-login');
    }
    public function userdetail()
    {
        $user=User::all();
        return view('admin-users',compact('user'));
    }
    public function userdelete($id)
    {
        $user = User::find(decrypt($id))->first();
        $user->delete();
        return redirect()->route('user.detail')->with('message', 'User updated successfully');


    }
    public function useredit($id)
    {
        $user=User::find(decrypt($id));
        return view('edit-form',compact('user'));

    }
    public function userchange($id)
    {
        $user = User::find(decrypt($id))->first();
        $user->update([
            'name' => request('name'),
            'email' => request('email'),
        ]);
        return redirect()->route('user.detail')->with('message', 'User updated successfully');

    }
    public function adminpanel()
    {
        return view('admin-dashboard');
    }
    public function cardetail()
    {
        $car=Car::all();
        return view('car-detail',compact('car'));
    }
    public function addcar()
    {
        return view('add-car');
    }
    public function addnewcar()
    {
        $input=[
            'name'=>request('name'),
            'company'=>request('company'),
            'price'=>request('price'),
            'quantity'=>request('quantity'),
            'description'=>request('description'),
        ];
        if(request()->hasFile('image')){
            $extension=request('image')->extension();
            $fileName='user_pic'.time().'.'.$extension;
            request('image')->storeAs('images',$fileName);
            $input['image'] = 'images/' . $fileName;
         }
         $user=Car::create($input);
         return redirect()->route('add.car')->with('message', 'User updated successfully');
    }
    public function rentalhistory()
    {
        $rent=Rentdetail::all();
        return view('rental-history',compact('rent'));
    }
    public function message()
    {
        $message=Message::all();
        return view('admin-message',compact('message'));
    }
    public function messagedelete($id)
    {
        $Message = Message::find(decrypt($id))->first();
        $Message->delete();
        return redirect()->route('admin.message')->with('message', 'User updated successfully');
    }
}
