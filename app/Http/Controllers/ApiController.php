<?php

namespace App\Http\Controllers;

use Input;
use App\MetroQuickQuotes;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ApiController extends BaseController
{
	public function postQuote()
	{
		$quote = new MetroQuickQuotes();

        $quote->FirstName = Input::get('firstname');
        $quote->LastName = Input::get('lastname');
        $quote->PhoneNumber = Input::get('phone');
        $quote->PhoneNumberExt = Input::get('phone_ext');
        $quote->EmailAddress = Input::get('email');
        $quote->NumberOfVehicles = Input::get('num_vehicles');
        $quote->o = Input::get('o');
        $quote->oAreaId = Input::get('o_area_id');
        $quote->oTerm = Input::get('o_term');
        $quote->oAreaName = Input::get('o_area_name');
        $quote->d = Input::get('d');
        $quote->dTerm = Input::get('d_term');
        $quote->dAreaId = Input::get('d_area_id');
        $quote->dAreaName = Input::get('d_area_name');
        $quote->Details = Input::get('details');

        if (!$quote->save()) {
			return response()->json([
				'error'	=> [
					'errorCode'	=> 500,
					'message'	=> 'Quote could not be created',
				]
			], 500);
		}

        $quote->send_to_sales($quote->id);

		return response()->json([], 204);
	}
}