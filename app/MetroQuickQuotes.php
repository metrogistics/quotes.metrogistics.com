<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;


class MetroQuickQuotes extends Model {

    protected $table = 'MetroQuickQuotes';

    public function send_to_sales($id){

        $QuickQuote = MetroQuickQuotes::where('id', '=', $id)->first();

        $email_token = rand(0, 9999999);
        $QuoteEmailAddress = "Quotes+" . $email_token . "@metrogistics.com";
        $QuoteSubject = "Quote Request: " . $QuickQuote->FirstName . " " . $QuickQuote->LastName;

        Mail::send('emails.QuickQuote', ['QuickQuote' => $QuickQuote], function ($m) use ($QuickQuote, $QuoteEmailAddress, $QuoteSubject) {
            //
            $m->from($QuoteEmailAddress, 'Quote Generator');
            $m->to('sales@metrogistics.com', 'Sales')->subject($QuoteSubject);
            //$m->from('c.clayton+quote@metrogistics.com', 'Quote Generator');
            //$m->to('c.clayton@metrogistics.com', 'Sales')->subject('subject');

        });

        return true;
    }

    public function send_quote($id){

        $QuickQuote = MetroQuickQuotes::where('id', '=', $id)->first();

        $email_token = rand(0, 9999999);
        $QuoteEmailAddress = "Quotes+" . $email_token . "@metrogistics.com";
        $QuoteSubject = "Quote Request for " . $QuickQuote->FirstName . " " . $QuickQuote->LastName;

        Mail::send('emails.Sent_QuickQuote', ['QuickQuote' => $QuickQuote], function ($m) use ($QuickQuote, $QuoteEmailAddress, $QuoteSubject) {
            //
            $m->from($QuoteEmailAddress, 'MetroGistics Quotes');
            $m->replyTo('sales@metrogistics.com', 'Sales');
            $m->to($QuickQuote->EmailAddress, $QuickQuote->FirstName . " " . $QuickQuote->LastName)->subject($QuoteSubject);

        });

        return true;
    }

}
