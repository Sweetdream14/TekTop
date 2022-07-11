<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icons extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'name_icons', 'image_icons', 'link_icons'
    ];
    protected $primaryKey = 'icons_id';
 	protected $table = 'tbl_icons';

}
