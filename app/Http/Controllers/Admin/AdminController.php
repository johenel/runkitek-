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

    public function filterStatus(Request $request)
    {
        $filter = $request->rg_status;
        $date = $request->date;

        if($filter == 'all') {
            $users = Users::with('details')->with('transactions');
        } else {
            $users = Users::whereHas('transactions', function($q) use ($filter) {
                $q->where('status', $filter);
            })->with('details')->with('transactions');
        }

        if($date) {
            $date = date('Y-m-d',strtotime($date));
            $users = $users->where('created_at', 'LIKE', '%'.$date.'%')->get();
        } else {
            $users = $users->get();
        }
        

        $response = [];
        $response['participants'] = $users;
        $response['filter_status'] = $request->rg_status;
        $response['filter_date'] = $request->date;

        return view('admin.dashboard', $response);
    }

    public function participantsIndex(Request $request)
    {
        $users = Users::with('details')->with('transactions')->get();

        $response = [];
        $response['participants'] = $users;
        $response['filter_status'] = 'all';
        $response['filter_date'] = '';

        return view('admin.dashboard', $response);
    }

    public function index(Request $request)
    {
    	$this->initialize();

    	return view('admin.login');
    }
}
