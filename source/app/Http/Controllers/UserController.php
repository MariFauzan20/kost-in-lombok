<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    // View halaman login
    public function loginView(){
        return view("user.login", [
            "title" => "Login"
        ]);
    }

    // View halaman register
    public function registerView(){
        return view("user.register",[
            "title" => "Register"
        ]);
    }

    // View halaman edit profile
    public function editProfileView($id) {
        // cek id user yang terloggin
        $user_id = Auth::user()->id;

        if($id == $user_id){
            // ambil identitas user 
            $user_logged = Auth::user();

            return view("user.editProfile", [
                'user'=> $user_logged,
                "title" => "Edit Profile"
            ]);
        }else {
            // kembalikan ke halaman owner atau home jika id user tidak sesuai
            if(Auth::user()->is_owner == 1){
                return redirect("/owner")->with("id_user_tidak_sesuai", "Id User tidak sesuai");
            } else{
                return redirect("/")->with("id_user_tidak_sesuai", "Id User tidak sesuai");
            }
        }
    }

    // fungsi registrasi user baru
    public function registerUser(Request $request){
        // Validasi data
        $request->validate([
            "username" =>'required|unique:users,username|max:16',
            'email' => 'required|unique:users,email|email:dns',
            "password" => 'required|min:5|max:20',
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

    // Fungsi edit profile 
    public function editProfile(Request $request, $id){

        // ambil user id yang ter-loggin
        $id_user_logged = $id;
        
        // validasi username dan email
        $request->validate([
            'username' => 'required|max:255|unique:users,username,'.$id_user_logged ,
            'email' => 'required|email:dns|unique:users,email,'.$id_user_logged 
        ]);
        
        // Cek nilai password
        if(is_null($request->password)){
            // kalau input kosong pakai password lama
            $new_password = Auth::user()->password;
        }else {
            // kalau input ada, pakai passoword baru tapi minimal 5 dan maximal 255 
            $request->validate([
                'password'=> 'min:5|max:255'
            ]);

            $new_password = bcrypt($request->password);
        }

        // edit data user sesuai input
        $user = User::find($id_user_logged);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $new_password;

        // simpan di DB
        $user->save();
        return redirect("/edit-profile/$id_user_logged")->with('edit_profile_success', 'Edit profile berhasil');
    }

    // fungsi autentikasi login
    public function autentikasi(Request $request){
        // validasi input value
        $credentials = $request->validate([
            "username"=>"required",
            "password"=>"required"
        ]);

        // cek kesesuian username dan passsword
        if(Auth::attempt($credentials)){
            // buat session baru jika sesuai
            $request->session()->regenerate();

            // cek role user
            if(Auth::user() && Auth::user()->is_owner == 1){
                // jika role user adalah owner maka redirect ke halaman owner
                return redirect('/owner');
            }else {
                // jika role user adalah customer maka redirect ke halaman utama
                return redirect('/');
            }   
        }

        // jika username dan password tidak sesuuai kembalikan ke halaman login
        return redirect('/login')->with('invalid', 'username atau password salah');

    }

    // Fungsi Autentikasi Logout
    public function logout(Request $request){
        // Logout-kan user
        Auth::logout();
        
        // Hapus session 
        $request->session()->invalidate();
        
        // Buat token baru
        $request->session()->regenerateToken();
 
        return redirect('/login');
    }

}
