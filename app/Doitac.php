<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doitac extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'name_doitac', 'link_doitac', 'image_doitac'
    ];
    protected $primaryKey = 'doitac_id';
 	protected $table = 'tbl_doitac';
}
