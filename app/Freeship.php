<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freeship extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'free_matp', 'free_maqh','free_xaid','free_feeship'
    ];
    protected $primaryKey = 'free_id';
 	protected $table = 'tbl_freeship';

 	public function city(){
 		return $this->belongsTo('App\City', 'free_matp');
 	}
 	public function province(){
 		return $this->belongsTo('App\Province', 'free_maqh');
 	}
 	public function wards(){
 		return $this->belongsTo('App\Wards', 'free_xaid');
 	}
}
