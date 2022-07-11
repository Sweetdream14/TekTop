<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Slider;
use App\CatePost;
use App\Brand;
use App\Product;
use Toastr;
session_start();
class BrandProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    
    public function add_brand_product(){
        $this->AuthLogin();
    	return view('admin.add_brand_product');
    }
    public function all_brand_product(){
         $this->AuthLogin();
    	$all_brand_product = DB::table('tbl_brand')->paginate(3);
    	$manager_brand_product  = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
    	return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);


    }
    public function save_brand_product(Request $request){
        $this->AuthLogin();
    	$data = array();
    	$data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_slug'] = $request->brand_slug;
        $data['meta_keywords'] = $request->brand_product_keywords;
    	$data['brand_status'] = $request->brand_product_status;

    	DB::table('tbl_brand')->insert($data);
    	// Session::put('message','Thêm thương hiệu sản phẩm thành công');
        Toastr::success('Thêm thương hiệu sản phẩm thành công','Success');
    	return Redirect::to('add-brand-product');
    }
    public function unactive_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
        // Session::put('message','Không kích hoạt thương hiệu sản phẩm thành công');
        Toastr::success('Không kích hoạt thương hiệu sản phẩm thành công','Success');
        return Redirect::to('all-brand-product');

    }
    public function active_brand_product($brand_product_id){
         $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
        // Session::put('message','Kích hoạt thương hiệu sản phẩm thành công');
         Toastr::success('Kích hoạt thương hiệu sản phẩm thành công','Success');
        return Redirect::to('all-brand-product');

    }
    public function edit_brand_product($brand_product_id){
         $this->AuthLogin();
        $edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_product_id)->get();

        $manager_brand_product  = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);

        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }
    public function update_brand_product(Request $request, $brand_product_id){
         $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['meta_keywords'] = $request->brand_product_keywords;
        $data['brand_slug'] = $request->brand_slug;

        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update($data);
        // Session::put('message','Sửa thương hiệu sản phẩm thành công');
        Toastr::success('Sửa thương hiệu sản phẩm thành công','Success');
        return Redirect::to('all-brand-product');
    }
    public function delete_brand_product($brand_product_id){
         $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->delete();
        // Session::put('message','Xóa thương hiệu sản phẩm thành công');
        Toastr::success('Xoá thương hiệu sản phẩm thành công','Success');
        return Redirect::to('all-brand-product');
    }

      public function show_brand_home(Request $request, $brand_slug){
        //category_post
        $category_post = CatePost::orderby('cate_post_id','DESC')->get();
         //slide
       $slider = Slider::orderBy('slider_id','desc')->where('slider_status','0')->take(4)->get();
       
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

         $edit_introductions = DB::table('tbl_introduction')->where('introduction_status','0')->orderby('introduction_id','desc')->get();  

         
        $brand_slug = Brand::where('brand_slug',$brand_slug)->get();

        $min_price = Product::min('product_price');
        $max_price = Product::max('product_price');

        $min_price_range = $min_price + 50000;
        $max_price_range = $max_price + 100000;

         foreach($brand_slug as $key => $brand){
            $brand_id = $brand->brand_id;
        }

    if(isset($_GET['sort_by'])){

        $sort_by = $_GET['sort_by'];

        if($sort_by=='giam_dan'){

            $brand_by_id = Product::with('brand')->where('brand_id',$brand_id)->orderBy('product_price','DESC')->paginate(6)->appends(request()->query());

        }elseif($sort_by=='tang_dan'){

            $brand_by_id = Product::with('brand')->where('brand_id',$brand_id)->orderBy('product_price','ASC')->paginate(6)->appends(request()->query());

        }elseif($sort_by=='kytu_za'){

            $brand_by_id = Product::with('brand')->where('brand_id',$brand_id)->orderBy('product_name','DESC')->paginate(6)->appends(request()->query());


        }elseif($sort_by=='kytu_az'){

            $brand_by_id = Product::with('brand')->where('brand_id',$brand_id)->orderBy('product_name','ASC')->paginate(6)->appends(request()->query());
    }

        }elseif(isset($_GET['start_price']) && ($_GET['end_price'])){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];

            $brand_by_id = Product::with('brand')->whereBetween('product_price',[$min_price,$max_price])->orderBy('product_price','ASC')->paginate(6);

        }else{
            $brand_by_id = Product::with('brand')->where('brand_id',$brand_id)->orderBy('product_id','DESC')->paginate(6);
    }

    
 $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_slug',$brand_slug)->limit(1)->get();

        foreach ($brand_product as $key => $val) {
         //--Seo
        $meta_desc = $val->brand_desc;
        $meta_keywords = $val->meta_keywords;
        $meta_title =  $val->brand_name;
        $url_canonical = $request->url();
         //--Seo
     }
      

     
       

        return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)->with('slider',$slider)->with('brand_slug',$brand_slug)->with('category_post',$category_post)->with('min_price',$min_price)->with('max_price',$max_price)->with('edit_introductions',$edit_introductions);
    }
     
}
