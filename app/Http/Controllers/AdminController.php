<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        return view('admin.login');
    }
    public function register(Request $request)
    {
        return view('admin.register');
    }
    public function postlogin (Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:2|max:10',
        ]);
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/beranda')->with('Sukses','Login Berhasil');
        }else{
            return redirect()->back()->with('password','password salah');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    public function beranda(Request $request)
    {
        return view('admin.beranda');
    }
   
}
