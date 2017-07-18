<?php namespace App;

use Carbon\Carbon;
use CarlosIO\Geckoboard\Widgets\NumberAndSecondaryStat;
use CarlosIO\Geckoboard\Client;
use Illuminate\Database\Eloquent\Model;

class Stats extends Model {

    public static function UpdateMonthToDateTotals(){

    }
    public static function UpdateDailyToDateTotals(){

    }
    public static function UpdateWeeklyToDateTotals(){

    }

    public static function ComparedToAverageMonth(){

    }

    public static function ComparedToLastMonth(){

    }

    public static function QuotesToday(){

        $start = (new Carbon('now'))->hour(0)->minute(0)->second(0);
        $end = (new Carbon('now'))->hour(23)->minute(59)->second(59);

        $count = MetroQuickQuotes::whereBetween('created_at', [$start, $end])->get()->count();

        $widget = new NumberAndSecondaryStat();
        $widget->setId('89245-d6c7156a-46aa-44ef-abd5-8aaf6d87d63e');
        $widget->setMainValue($count);

        $geckoboardClient = new Client();
        $geckoboardClient->setApiKey('c7170d57cba84da58113b49284bd69db');
        $geckoboardClient->push($widget);

        return $count;
    }

}
