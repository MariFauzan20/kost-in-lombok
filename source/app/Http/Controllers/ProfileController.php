<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function editProfile($id) {
        // cek id user yang terloggin
        $user_id = Auth::user()->id;

        if($id == $user_id){
            // ambil identitas user 
            $user_logged = Auth::user();

            return view("profile.editProfile", [
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

     // Fungsi edit profile 
     public function edit(Request $request, $id){

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
        $user = User::findOrFail($id_user_logged);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $new_password;

        // simpan di DB
        $user->save();
        return redirect("/edit-profile/$id_user_logged")->with('edit_profile_success', 'Edit profile berhasil');
    }

}
