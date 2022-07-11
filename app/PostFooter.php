<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostFooter extends Model
{
     public $timestamps = false; //set time to false
    protected $fillable = [
    	'post_footer_title','post_footer_slug','post_footer_content','post_footer_meta_desc','post_footer_meta_keywords','post_footer_status'
    ];
    protected $primaryKey = 'post_footer_id';
 	protected $table = 'tbl_posts_footer';
}
