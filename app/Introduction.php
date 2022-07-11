<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Introduction extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'introduction_desc','introduction_status'
    ];
    protected $primaryKey = 'introduction_id';
 	protected $table = 'tbl_introduction';
}
