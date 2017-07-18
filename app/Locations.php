<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model {

    protected $table = 'Locations';
    public $timestamps = false;
    protected $softDelete = false;

}
