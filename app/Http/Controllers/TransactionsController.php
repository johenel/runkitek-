<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Models\Transactions;
use Validator;

class TransactionsController extends Controller
{
	public function index(Request $request)
	{
		$response = [];
		$t = Transactions::where('users_id', $request->session()->get('user')->id)->orderBy('created_at', 'DESC')->get();

		$response['success'] = true;
		$response['transactions'] = $t;

		return view('transaction-list', $response);
	}

	private function checkStatus($transaction, $root) 
	{
		$curl = curl_init();

		$params = [
			'txnid' => $transaction->id,
			'refno' => $transaction->reference_no,
			'payment_channel' => $transaction->payment_channel,
			'status' => $transaction->status,
			'message' => $transaction->message
		];

		$multipay_code = env('MULTIPAY_CODE');
		$multipay_token = env('MULTIPAY_TOKEN');

    	$multipay_base_url = env('MULTIPAY_BASE_URL');

    	$search = $multipay_base_url . '/transactions/' . $transaction->reference_no;

		curl_setopt_array($curl, array(
		    CURLOPT_URL => $search,
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "UTF-8",
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 30000,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "POST",
		    CURLOPT_POSTFIELDS => json_encode($params),
		    CURLOPT_HTTPHEADER => array(
		        'X-MultiPay-Token:'.$multipay_token,
			    'X-MultiPay-Code:'.$multipay_code,
		        'Content-Type:application/json',
		    ),
		));

		$response = json_decode(curl_exec($curl));

		return $response;
	}

	public function callback(Request $request)
	{
		$txnid = $request->txnid;
		$refno = $request->refno;
		$status = $request->status;
		$payment_channel = $request->payment_channel;
		$message = $request->message;

		Transactions::where('id', $txnid)->update([
			'reference_no' => $refno,
			'status' => $status,
			'payment_channel' => $payment_channel,
			'message' => $message
		]);



		return 'good';
	} 

	public function newIndex(Request $request)
	{
		$draft = (object)[];
    	$draft->name = $request->session()->get('user')->first_name . ' ' . $request->session()->get('user')->last_name;
    	$draft->category = $request->category;
    	$draft->size = $request->shirt_size;
    	$draft->delivery_type = $request->delivery_type;
    	$draft->amount = $request->amount;
    	$draft->date = Carbon::now();

    	$request->session()->put('transaction_draft', $draft);

    	$response = [];
    	$response['draft'] = $draft;

		return view('transactions', $response);
	}

    public function new(Request $request)
    {
    	$draft = (object)[];
    	$draft->category = $request->category;
    	$draft->delivery_type = $request->delivery_type;
    	$draft->size = $request->shirt_size;
    	$draft->amount = $request->amount;
    	$draft->pickup_location = $request->pickup_location;

    	if($request->delivery_type == 'PICK UP') {
    		$request->validate([
    			'category' => 'required',
    			'pickup_location' => 'required',
    			'amount' => 'required',
    			'shirt_size' => 'required'
    		]);
    	} else {
    		$request->validate([
    			'category' => 'required',
    			'delivery_type' => 'required',
    			'amount' => 'required',
    			'shirt_size' => 'required'
    		]);
    	}

    	$validator = Validator::make($request->all(), [
            'category' => 'required',
        ]);

        $userTransactions = Transactions::where('users_id', $request->session()->get('user')->id)->get();

        // if(count($userTransactions) > 0) {
        // 	$validator->after(function($validator) {
        //         $validator->errors()->add('error', 'A TRANSACTION already exist');
        //     });
        //     if($validator->fails()) {
        //         $errors = $validator->errors();
        //         return redirect('/events')->withErrors($validator);
        //     }
        // }

        $amount = $request->amount;

        if($request->delivery_type == 'DELIVERY') {
        	if($request->session()->get('user')->details['delivery_region'] == 'LUZON') {
        		$amount = $request->amount + 150;
        	} else {
        		$amount = $request->amount + 200;
        	}
        	
        }

    	$transaction = new Transactions;
    	$transaction->users_id = $request->session()->get('user')->id;
    	$transaction->category = $request->category;
    	$transaction->delivery_type = $request->delivery_type;
    	$transaction->size = $request->shirt_size;
    	$transaction->amount = $amount;
    	$transaction->pickup_location = $request->pickup_location;
    	$transaction->save();

    	$base = $request->root();
    	$cb_url = $base . '/transactions/callback';
    	$url = $base . '/transaction/expired';

    	$data1 = [
    		'name' => $request->session()->get('user')->first_name . ' ' . $request->session()->get('user')->last_name,
    		'email' => $request->session()->get('user')->email,
		    'txnid' =>  $transaction->id,
		    'amount' => floatval($transaction->amount),
		    'description[url]' => $url,
		    'callback_url' => $cb_url,
		];

		$curl = curl_init();

		$multipay_base_url = env('MULTIPAY_BASE_URL');
		$multipay_code = env('MULTIPAY_CODE');
		$multipay_token = env('MULTIPAY_TOKEN');

		curl_setopt_array($curl, array(
		    CURLOPT_URL => $multipay_base_url . '/transactions/generate',
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "UTF-8",
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 30000,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "POST",
		    CURLOPT_POSTFIELDS => json_encode($data1),
		    CURLOPT_HTTPHEADER => array(
		        'X-MultiPay-Token:'.$multipay_token,
			    'X-MultiPay-Code:'.$multipay_code,
		        'Content-Type:application/json',
		    ),
		));

		$response = json_decode(curl_exec($curl));

		Transactions::where('id', $transaction->id)->update([
			'digest' => $response->data->url
		]);

    	return redirect('/transactions');
    }

    public function expired(Request $request)
    {
    	$response = [];
    	$response['pgi'] = $request->session()->get('pgi');
    	return view('transaction-expired', $response);
    }
}
