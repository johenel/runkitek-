<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Admins;
use App\Models\Users;
use Validator;

class AdminController extends Controller
{
    private function initialize()
    {
    	if(count(Admins::all()) == 0) {
    		$time = time();
    		$admin = new Admins;
    		$admin->username = 'runkitekadmin';
    		$admin->password = Hash::make('runkite2019!');
    		$admin->save();
    	}
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect('/admin/login');
    }

    public function login(Request $request)
    {
        $request->session()->flash('username', $request->username);

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        $admins = Admins::where('username', $request->username)->get();

        if(!$this->validCredentials($admins,$request->password)) {
            $validator->after(function($validator) {
                $validator->errors()->add('credentials', 'Username or Password is incorrect');
            });
            if($validator->fails()) {
                $errors = $validator->errors();
                return redirect('/admin/login')->withErrors($validator);
            }
        }

        $request->session()->put('admin', $admins[0]);

        return redirect('/admin/participants');
    }

    private function validCredentials($admins,$password)
    {
        if(count($admins) == 0) {
            return false;
        } else {
            if(!Hash::check($password, $admins[0]->password)) {
                return false;
            }
        }
        return true;        
    }

    public function participantsIndex(Request $request)
    {
        $users = Users::with('details')->with('transactions')->get();

        $response = [];
        $response['participants'] = $users;

        return view('admin.dashboard', $response);
    }

    public function index(Request $request)
    {
    	$this->initialize();

    	return view('admin.login');
    }
}
