<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'brand_name', 'meta_keywords', 'brand_desc','brand_status','brand_slug'
    ];
    protected $primaryKey = 'brand_id';
 	protected $table = 'tbl_brand';

 	public function product(){
 		return $this->hasMany('App\Product');

	}
}