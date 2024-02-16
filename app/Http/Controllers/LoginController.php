<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view ('login');
    }
    
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            // 'email'     => 'required',
            'email'     => 'required|email|unique:users,email',
            'phone'     => 'required|digits:10',
            'password'     => 'required',
        ]);
        $user = new User();
        $user->name   = $request->name;
        $user->email   = $request->email;
        $user->phone   = $request->phone;
        $user->password   = bcrypt($request->password);
        $user->status   = 'Active';
        $result = $user->save();
        if ($result) {
            return redirect(route('login'))->with('success', 'Success');
        }
        else {
            return redirect(route('/'))->with('error', 'Failure');
        }
    }

    public function form_login(Request $request)
    {
        $attributes = request()->validate([
            'email'=>'required',
            'password'=>'required' 
        ]);
        
        if(Auth::attempt($attributes))
        {
            session()->regenerate();
            $user = auth()->user();
            if ($user->roleId==1) { //customer
                return redirect()->route('user.profile');
            }
            else{ //admin
                return redirect('product')->with(['success'=>'You are logged in.']);
            }
        }
        else{
            return back()->with(['error'=>'Username or password invalid.']);
        }

    }
}
