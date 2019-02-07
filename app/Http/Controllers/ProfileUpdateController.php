<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\UserDetails;
use DB;

class ProfileUpdateController extends Controller
{
	public function updateEmergency(Request $request)
	{
		$draft = (object)[];

		$draft->emergency_name = $request->emergency_name;
		$draft->emergency_relationship = $request->emergency_relationship;
		$draft->emergency_number = $request->emergency_number;

		$request->session()->flash('draft', $draft);

		$this->validate($request, [
			'emergency_name' => 'required',
			'emergency_relationship' => 'required',
			'emergency_number' => 'required',
		]);

		$uid = $request->session()->get('user')->id;

		DB::transaction(function() use ($draft,$uid) {
		
			UserDetails::where('users_id', $uid)->update([
				'emergency_contact_name' => $draft->emergency_name,
				'emergency_contact_relationship' => $draft->emergency_relationship,
				'emergency_contact_number' => $draft->emergency_number
			]);
		});

		$request->session()->flush();

		$user = Users::with('details')->where('id', $uid)->get();
		$request->session()->put('user', $user[0]);
		
		$request->session()->flash('update', true);
		
		return redirect('/profile/edit');
	}
    public function updatePersonal(Request $request)
    {
    	$draft = (object)[];
		$draft->first_name = $request->first_name;
		$draft->last_name = $request->last_name;
		$draft->middle_name = $request->middle_name;
		$draft->nick_name = $request->nick_name;
		$draft->birthdate = date('Y-m-d H:i:s',strtotime($request->birthdate));
		$draft->gender = $request->radio_group_gender;
		$draft->group_tag = $request->group_name;
		$draft->nationality = $request->nationality;
		$draft->email = $request->email;
		$draft->contact_number = $request->mobile_no;
		$draft->country = $request->country;
		$draft->delivery_address = $request->full_address;
		$draft->avatar_img = $request->file('avatar_img');
		//

		$request->session()->flash('draft', $draft);

		$this->validate($request, [
			'first_name' => 'required',
			'last_name' => 'required',
			'middle_name' => 'required',
			'nick_name' => 'required',
			'birthdate' => 'required|date',
			'radio_group_gender' => 'required',
			'group_name' => 'required',
			'nationality' => 'required',
			'email' => 'required|email',
			'mobile_no' => 'required',
			'country' => 'required',
			'avatar_img' => 'image|mimes:png,jpeg,jpg'
		]);

		if($request->hasFile('avatar_img')) {
			$avatar_name = time() . '.' . $request->avatar_img->getClientOriginalExtension();
            $request->avatar_img->move(public_path('avatars'), $avatar_name);
            $avatar_url = asset('/avatars') . '/' . $avatar_name;
		} else {
			$avatar_url = $request->session()->get('user')->details->avatar_url;
		}

		$uid = $request->session()->get('user')->id;

		DB::transaction(function() use ($draft,$avatar_url,$uid) {
			Users::where('id', $uid)->update([
				'email' => $draft->email,
				'first_name' => $draft->first_name,
				'last_name' => $draft->last_name
			]);

			UserDetails::where('users_id', $uid)->update([
				'avatar_url' => $avatar_url,
				'middle_name' => $draft->middle_name,
				'nick_name' => $draft->nick_name,
				'birth_date' => $draft->birthdate,
				'gender' => $draft->gender,
				'contact_number' => $draft->contact_number,
				'group_tag' => $draft->group_tag,
				'nationality' => $draft->nationality,
				'country' => $draft->country,
				'delivery_address' => $draft->delivery_address,
			]);
		});

		$request->session()->flush();

		$user = Users::with('details')->where('id', $uid)->get();
		$request->session()->put('user', $user[0]);

		$request->session()->flash('update', true);

		return redirect('/profile/edit');
    }
}
