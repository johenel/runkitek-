<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Carbon\Carbon;
use App\Models\Transactions;

class TransactionsController extends Controller
{
	public function index(Request $request)
	{
		$response = [];
		$t = Transactions::where('users_id', $request->session()->get('user')->id)->get();


		
		if(count($t) > 0) {
			$t_status = $this->search($t[0]->reference_no);

			if($t_status->status == 404) {
				$response['error'] = true;
				$response['success'] = true;
				$response['transaction'] = $t[0];
			} else {
				$response['success'] = true;
				$response['transaction'] = $t[0];
			}
		} else {
			$response['success'] = false;
		}
		return view('transaction-list', $response);
	}

	private function search($refno)
	{
		$response = null;

		$curl = curl_init();

		$request_url = 'https://institution.multipay.ph/api/v1/transactions/';

		curl_setopt_array($curl, array(
		    CURLOPT_URL => $request_url,
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "UTF-8",
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 30000,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "GET",
		    CURLOPT_HTTPHEADER => array(
		        'X-MultiPay-Token:dcd375796d4a8049dba1846d0c43e986ec13dc5e',
			    'X-MultiPay-Code:PAR_DEV',
		        'Content-Type:application/json',
		    ),
		));

		$result = json_decode(curl_exec($curl));

		return $result;
	}

	public function callback(Request $request)
	{
		dd($request->all());
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
    	$draft = $request->session()->get('transaction_draft');

    	$transaction = new Transactions;
    	$transaction->users_id = $request->session()->get('user')->id;
    	$transaction->category = $request->category;
    	$transaction->delivery_type = $request->delivery_type;
    	$transaction->size = $request->shirt_size;
    	$transaction->amount = $request->amount;
    	$transaction->save();

    	$base = $request->root();
    	$cb_url = $base . '/transactions/callback';
    	$url = $base . '/transaction/expired';

    	$data1 = [
    		'name' => $request->session()->get('user')->first_name . ' ' . $request->session()->get('user')->last_name,
    		'email' => $request->session()->get('user')->email,
		    'txnid' =>  $transaction->id,
		    'amount' => floatval($transaction->amount),
		    'description[url]' => $cb_url,
		    'callback_url' => $url,
		];

		$curl = curl_init();

		curl_setopt_array($curl, array(
		    CURLOPT_URL => "https://institution.multipay.ph/api/v1/transactions/generate",
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "UTF-8",
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 30000,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "POST",
		    CURLOPT_POSTFIELDS => json_encode($data1),
		    CURLOPT_HTTPHEADER => array(
		        'X-MultiPay-Token:dcd375796d4a8049dba1846d0c43e986ec13dc5e',
			    'X-MultiPay-Code:PAR_DEV',
		        'Content-Type:application/json',
		    ),
		));

		$response = json_decode(curl_exec($curl));

		$uri_parts = explode('/', $response->data->url);
    	$refno = end($uri_parts);

		Transactions::where('id', $transaction->id)->update([
			'reference_no' => $refno,
			'digest' => $response->data->url
		]);

    	return redirect('/transactions');
    }

    public function expired(Request $request)
    {
    	return view('transaction-expired');
    }
}
