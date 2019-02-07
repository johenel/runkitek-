<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Validator;
use Hash;

class LoginController extends Controller
{
    public function index(Request $request)
    {
    	return view('login');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect('/signin');
    }

    public function login(Request $request)
    {
    	$request->session()->flash('email', $request->email);

    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = Users::with('details')->where('email', $request->email)->get();

        if(!$this->validCredentials($user,$request->password)) {
            $validator->after(function($validator) {
                $validator->errors()->add('credentials', 'Username or Password is incorrect');
            });
            if($validator->fails()) {
                $errors = $validator->errors();
                return redirect('/signin')->withErrors($validator);
            }
        }
        
        $request->session()->put('user', $user[0]);

        return redirect('/profile');
    }

    private function validCredentials($user,$password)
    {
        if(count($user) == 0) {
            return false;
        } else {
            if(!Hash::check($password, $user[0]->password)) {
                return false;
            }
        }
        return true;        
    }
}
