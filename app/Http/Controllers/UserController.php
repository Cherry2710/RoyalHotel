<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(Request $request){
        $login =[
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        if(Auth::attempt($login)){
            $user =Auth::user();
            Session::put('user', $user);
            echo '<script>
                alert("Đăng nhập thành công.");
                window.location.assign("/homepage");
              </script>';

        }else{
            echo '<script>
                alert("Đăng nhập không thành công.");
                window.location.assign("/login");
              </script>';
        }
    }

    public function register(Request $request) {
        $input = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        $input['password'] = bcrypt($input['password']);
        User::create($input);

        echo '<script>
                alert("Success register! Please login.");
                window.location.assign("/login");
              </script>';
    }
    public function logout()
        {
        Session::forget('user');
        return redirect('/homepage');
    }

}
