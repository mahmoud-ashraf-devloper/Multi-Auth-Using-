<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;

class SellerController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:sellers,email',
            'password' => 'required|min:5|max:30',
            'cpassword' => 'required|min:5|max:30|same:password',
        ]);

        $seller = new Seller();

        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->password = Hash::make($request->password);

        $saved = $seller->save();

        if ($saved) {
            return redirect()->route('seller.register')->with('success', 'Your Account Have been created successfully.');
        } else {
            return redirect()->route('seller.register')->with('fail', 'Sorry something went wrong!');
        }
    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:sellers,email',
            'password' => 'required|min:5|max:30'
        ]);

        $creds = $request->only('email', 'password');

        $logged = Auth::guard('seller')->attempt($creds);
        if ($logged) {
            return redirect()->route('seller.home');
        } else {
            return redirect()->route('seller.login')->with('fail', 'Email Or Password is incorrect');
        }
    }
}
