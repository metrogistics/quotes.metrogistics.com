<?php namespace App\Http\Controllers;
use Input;
use Response;

class LocationsController extends Controller {


    public function __construct()
    {

    }

    public function select2(){

        $q = Input::get('q', 'Glen');
        $q = trim($q);
        $branches = \App\Locations::where('Name', 'LIKE', "%" . $q . "%")->orderBy('Priority', 'DESC')->take(20)->get();

        $x = array();
        $x["results"] = array();
        $results = array();
        $count = 0;

        foreach($branches as $branch){
            $results[$count]["term"] = $q;
            $results[$count]["id"] = $branch["id"];
            $results[$count]["Name"] = $branch["Name"];
            $results[$count]["AreaId"] = $branch["AreaId"];
            $results[$count]["AreaName"] = $branch["AreaName"];

            $count = $count + 1;

        }

        $x["more"] = false;
        $x["results"] = $results;

        return Response::json($results);
    }

}