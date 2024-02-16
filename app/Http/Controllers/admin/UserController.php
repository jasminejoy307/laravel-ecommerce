<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with(['addresses'])->get();
        return view('user.list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'     => 'required|email|unique:users,email',
            'phone'     => 'required|digits:10',
            'password'     => 'required',
        ]);
        $password = $request->password;
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            return redirect()->back()->withInput()->withErrors(['password'=>'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.']);
        }
        $user = new User();
        $user->name   = $request->name;
        $user->email   = $request->email;
        $user->phone   = $request->phone;
      //  $user->password   = $request->password;
      $user->password   = bcrypt($password);
        $user->status   = 'Active';
        $result = $user->save();
        if ($result) {
            return redirect(route('user.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('user.index'))->with('error', 'Failure');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users=User::where('userId',$id)->first();
        return view('user.view',['user'=>$users]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users=User::where('userId',$id)->first();
        return view('user.edit',['user'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $request->validate([
            'name'     => 'required',
            // 'email'     => [
            //                     'required',
            //                     'email',
            //                     Rule::unique('users', 'email')->ignore($id, 'userId')->where('roleId', 1) //custom rule
            //                 ],
            'email'     => 'required|email|unique:users,email,'.$id.',userId',
            'phone'     => 'required|digits:10',
            // 'password'     => '',
            'status'     => 'required',
        ]);
        $user =  User::findOrFail($id);
        $user->name   = $request->name;
        $user->email   = $request->email;
        $user->phone   = $request->phone;
        if ($request->password != '') {
            $user->password   = bcrypt($request->password);
        }
        $user->status   = $request->status;
        $result = $user->save();
        if ($result) {
            return redirect(route('user.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('user.index'))->with('error', 'Failure');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = User::findOrFail($id)->delete(); 
        if ($result) {
            return redirect(route('user.index'))->with('success', 'Success');
        }
        else {
            return redirect(route('user.index'))->with('error', 'Failure');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with(['success'=>'You\'ve been logged out.']);
    }
}
