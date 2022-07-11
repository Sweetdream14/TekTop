<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'product_name','category_id','brand_id','product_desc','product_content','product_price','product_image','product_status','product_slug','product_view','price_cost','rating_id',
    ];
    protected $primaryKey = 'product_id';
 	protected $table = 'tbl_product';

 	public function comment(){
 		return $this->hasMany('App\Comment','comment_product_id');
 	}

 	public function category(){
 		return $this->belongsTo('App\CategoryProductModel','category_id');
 	}
 	
 	public function brand(){
 		return $this->belongsTo('App\Brand','brand_id');

 	}
 	public function rating(){
 		return $this->hasMany('App\Rating','rating_id');
  	}
}

