<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;


class MetroQuickQuotes extends Model {

    protected $table = 'MetroQuickQuotes';

    public function send_to_sales($id){

        $QuickQuote = MetroQuickQuotes::where('id', '=', $id)->first();

        $email_token = rand(0, 9999999);
        $QuoteEmailAddress = "Quotes+" . $email_token . "@metrogistics.com";
        $QuoteSubject = $this->getEmailSubject($QuickQuote);
        Mail::send('emails.QuickQuote', ['QuickQuote' => $QuickQuote], function ($m) use ($QuickQuote, $QuoteEmailAddress, $QuoteSubject) {
            //
            $m->from($QuoteEmailAddress, 'Quote Generator');
            if($QuickQuote->request_subdomain == 'quotes') {
                $m->to('sales@metrogistics.com', 'Sales')->subject($QuoteSubject);
            } else {
                $m->to('niadasupport@metrogistics.com', 'NIADA Sales')->subject($QuoteSubject);
            }
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
            if($QuickQuote->request_subdomain == 'quotes') {
                $m->replyTo('sales@metrogistics.com', 'Sales');
            } else {
                $m->replyTo('niada@metrogistics.com', 'NIADA Sales');
            }
            $m->to($QuickQuote->EmailAddress, $QuickQuote->FirstName . " " . $QuickQuote->LastName)->subject($QuoteSubject);

        });

        return true;
    }

    public function getEmailSubject(MetroQuickQuotes $quote)
    {
        if($quote->request_subdomain == 'quotes') {
            return "Quote Request: " . $quote->FirstName . " " . $quote->LastName;
        } else {
            return "NIADA Preferred Member Quote: " . $quote->FirstName . " " . $quote->LastName;
        }
    }

}
