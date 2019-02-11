<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Admins;

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

    public function index(Request $request)
    {
    	$this->initialize();

    	return view('admin.login');
    }
}
