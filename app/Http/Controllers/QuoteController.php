<?php namespace App\Http\Controllers;

use Input;
use Request;
use App\MetroQuickQuotes;

class QuoteController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('quote/CreateQuote');
    }

    public function Quote(){
        $quote = new MetroQuickQuotes();

        $quote->FirstName = Input::get('FirstName');
        $quote->LastName = Input::get('LastName');
        $quote->PhoneNumber = Input::get('PhoneNumber');
        $quote->PhoneNumberExt = Input::get('PhoneNumberExt');
        $quote->EmailAddress = Input::get('EmailAddress');
        $quote->NumberOfVehicles = Input::get('NumberOfVehicles');
        $quote->o = Input::get('o');
        $quote->oAreaId = Input::get('oAreaId');
        $quote->oTerm = Input::get('oTerm');
        $quote->oAreaName = Input::get('oAreaName');
        $quote->d = Input::get('d');
        $quote->dTerm = Input::get('dTerm');
        $quote->dAreaId = Input::get('dAreaId');
        $quote->dAreaName = Input::get('dAreaName');
        $quote->Details = Input::get('Details');
        $url_strings = explode('.', Request::url());
        $takeouthttp = explode('/', $url_strings[0]);
        $quote->request_subdomain = $takeouthttp[2];

        $quote->save();

        $quote->send_to_sales($quote->id);

        return view('quote/ShowQuote', array('data' => $quote));
    }

    public function SendQuote($id){

        $quote = MetroQuickQuotes::where('id', '=', $id)->first();
        return view('quote/QuoteTheQuote', array('QuickQuote' => $quote));
    }

    public function SendQuotePost($id){

        $quote = MetroQuickQuotes::where('id', '=', $id)->first();
        $quote->QuotedBy = Input::get('QuotedBy', '');
        $quote->Quote = Input::get('Quote', '');
        $quote->save();
        $quote->send_quote($id);

        return 'Quote Sent.  Close Window.';
    }

}
