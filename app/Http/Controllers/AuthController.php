<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $client = new Client();
        $client->user_id = $user->id;
        $client->save();

        return redirect('register')->with('success', 'Berhasil Mendaftar, silahkan login untuk masuk');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->get();
        if (count($user) > 0) {
            if (Hash::check($request->password, $user[0]->password)) {
                $data = [
                    'id' => $user[0]->id,
                    'name' => $user[0]->name,
                    'email' => $user[0]->email,
                ];
                session()->put('user', $data);

                return redirect('profile');
            } else {
                return redirect('login')->with('fails', 'Password akun salah');
            }
        } else {
            return redirect('login')->with('fails', 'Email salah/belum terdaftar');
        }
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('/');
    }
}
