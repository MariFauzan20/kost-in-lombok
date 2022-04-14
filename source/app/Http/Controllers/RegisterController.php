<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class RegisterController extends Controller
{
    // View halaman login
    public function index(){
        return view("register.register",[
            "title" => "Register"
        ]);
    }

    // fungsi registrasi user baru
    public function store(Request $request){
        // Validasi data
        $request->validate([
            "username" =>'required|unique:users,username|max:128',
            'email' => 'required|unique:users,email|email:dns',
            "password" => 'required|min:5|max:128',
        ]);

        
        // jika validasi lolos, buat user baru
        $new_user = new User();
        
        $new_user->username = $request['username'];
        
        $new_user->email = $request['email'];
        
        $new_user->password = bcrypt($request['password']);
        
        $new_user->is_owner = isset($request['check-owner']) ? true : false;
        
        $new_user->save();

        // redirect ke halaman login dan beri pesan
        return redirect("/login")->with('success_registrasi', 'Registrasi Berhasil silahkan Login');
        
    }

}
