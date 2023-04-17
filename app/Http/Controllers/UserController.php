<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Message;
use App\Models\Rentdetail;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function message()
    {
        return view('user-message');
    }
    public function rent()
    {
        $car=Car::all();
        return view('rent-car',compact('car'));
    }
    public function dashboard()
    {
        return view('user-dashboard');
    }
    public function messagesubmit()
    {
        Message::create([
            'name'=>request('name'),
            'email'=>request('email'),
            'phone'=>request('phone'),
            'url'=>request('url'),
            'message'=>request('message')
        ]);
        return redirect()->route('user.message')->with('message', 'Invalid credentials');
    }
    public function bookcar()
    {
        Rentdetail::create([
            'name'=>request('name'),
            'email'=>request('email'),
            'carname'=>request('carname'),
            'quantity'=>request('quantity'),
            'date'=>request('date'),
            'days'=>request('days'),
        ]);
        $carname=request('carname');
        $quantity=request('quantity');
        $total_quantity=Car::where('name','=',$carname)->first();
        $available=$total_quantity->quantity;
        $balance=$available-$quantity;
        $total_quantity->update([
            'quantity'=>$balance,
        ]);
        return redirect()->route('rent.car')->with('message', 'Invalid credentials');
    }
    public function rentdelete($id)
    {
        $Rent = Rentdetail::find(decrypt($id))->first();
        $Rent->delete();
        return redirect()->route('rent.car')->with('message', 'Invalid credentials');
    }

}

