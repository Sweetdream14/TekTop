<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Product;
use App\Video;
use App\Customer;
use App\Post;
use App\PostFooter;
use App\Order;
use App\Icons;
use App\Doitac;



use App\Contact;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         view()->composer('*',function($view) {
             //get infomation
           $PostFooters = PostFooter::where('post_footer_status',0)->orderByDesc('post_footer_id','DESC')->get();
         
            

            //get infomation
          
            $contact_footer = Contact::orderby('info_id','DESC')->get();
            //get icon social
            $icons = Icons::orderby('icons_id','DESC')->get();

            //get doitac
            $doitac = Doitac::orderby('doitac_id','DESC')->get();

            $min_price = Product::min('product_price');
            $max_price = Product::max('product_price');

            $min_price_range = $min_price ;
            $max_price_range = $max_price;
            
            $app_product = Product::all()->count();
            $app_post = Post::all()->count();
            $app_order = Order::all()->count();
            $app_video = Video::all()->count();
            $app_customer = Customer::all()->count();
            $share_image = '';

            $view->with('min_price', $min_price )->with('max_price', $max_price )->with('min_price_range', $min_price_range )->with('max_price_range', $max_price_range )->with('app_product', $app_product )->with('app_post', $app_post )->with('app_order', $app_order )->with('app_video', $app_video )->with('app_customer', $app_customer )->with('share_image',$share_image)->with('icons',$icons)->with('doitac',$doitac)->with('contact_footer',$contact_footer)->with('PostFooters',$PostFooters);

        });
    }
}
