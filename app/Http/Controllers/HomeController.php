<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Contact;
use App\CatePost;
use App\CategoryProductModel;
use App\Slider;
use App\PostFooter;
use App\Product;
use App\Icons;
use App\Http\Requests;
use App\Introduction;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    
    
    public function index(Request $request){
        //get icon social
        $icons = Icons::orderby('icons_id','DESC')->get();

        //category_post
        $category_post = CatePost::orderby('cate_post_id','DESC')->get();
        //slide
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status','0')->take(4)->get();
        //--Seo
        $meta_desc = "Chuyên bán thiết bị và phụ kiện công nghệ";
        $meta_keywords = "camera wifi, bộ phát wifi, loa và tai nghe bluetooth";
        $meta_title = "TekTop";
        $url_canonical = $request->url();
    	 //--Seo
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_parent','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $edit_introductions = DB::table('tbl_introduction')->where('introduction_status','0')->orderby('introduction_id','desc')->get(); 



        $min_price = Product::min('product_price');
        $max_price = Product::max('product_price');

         $cate_pro_tabs = CategoryProductModel::where('category_parent',0)->orderBy('category_id','ASC')->take(5)->get();

          // $contact_footer = Contact::orderby('info_id','DESC')->get();


          
         
          
         
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(6)->paginate(6); 

      	return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)->with('slider',$slider)->with('category_post',$category_post)->with('cate_pro_tabs',$cate_pro_tabs)->with('min_price',$min_price)->with('max_price',$max_price)->with('icons',$icons)->with('edit_introductions',$edit_introductions);
    }

    public function search(Request $request){
        //Lọc giá
        $min_price = Product::min('product_price');
        $max_price = Product::max('product_price');
        
        //category post
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
         //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','0')->take(3)->get();

        $edit_introductions = DB::table('tbl_introduction')->where('introduction_status','0')->orderby('introduction_id','desc')->get(); 


        //seo 
        $meta_desc = "Tìm kiếm sản phẩm"; 
        $meta_keywords = "Tìm kiếm sản phẩm";
        $meta_title = "Tìm kiếm sản phẩm";
        $url_canonical = $request->url();
        //--seo
        $keywords = $request->keywords_submit;

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get(); 


        return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('category_post',$category_post)->with('min_price',$min_price)->with('max_price',$max_price)->with('edit_introductions',$edit_introductions);


    }
    public function autocomplete_ajax(Request $request){
        $data = $request->all();

        if($data['query']){



            $product = Product::where('product_status',0)->where('product_name','LIKE','%'.$data['query'].'%')->get();

            $output = '
            <ul class="dropdown-menu" style="display:block; position:relative">'
            ;

            foreach($product as $key => $val){
             $output .= '
             <li class="li_search_ajax"><a href="#">'.$val->product_name.'</a></li>
             ';
         }

         $output .= '</ul>';
         echo $output;
     }


 }
   
}
