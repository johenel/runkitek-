<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use DB;

class SignupController extends Controller
{
    public function register(Request $request)
    {
    	$draft = (object)[];
    	$draft->email = $request->email;
    	$draft->first_name = $request->first_name;
    	$draft->last_name = $request->last_name;
    	$draft->terms_and_agreement = $request->terms_and_agreement;

    	$request->session()->put('user', $draft);

    	$request->validate([  
    		'email' => 'required|unique:users',
    		'first_name' => 'required',
    		'last_name' => 'required',
    		'password' => 'required|confirmed',
    		'terms_and_agreement' => 'required|in:on'
    	]);

    	$user = new Users;

    	$user->email = $draft->email;
    	$user->first_name = $draft->first_name;
    	$user->last_name = $draft->last_name;
    	$user->accepted_terms_and_agreement = 1;
    	$user->password = Hash::make($request->password);
    	$user->save();

        $request->session()->put('user', $user);
    	return redirect('/profile');
    }
}
