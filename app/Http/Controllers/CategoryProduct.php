<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Slider;
use App\CatePost;
use App\Product;
use App\CategoryProductModel;
use Toastr;
session_start();

class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_product(){
         $this->AuthLogin();
         $category = CategoryProductModel::where('category_parent',0)->orderBy('category_id','DESC')->get();
       
    	return view('admin.add_category_product')->with(compact('category'));
    }
   
    public function all_category_product(){

       $this->AuthLogin();
     
        $category_product = CategoryProductModel::where('category_parent',0)->orderBy('category_id','DESC')->get();
    	$all_category_product = DB::table('tbl_category_product')->orderBy('category_parent','DESC')->paginate(3);

    	$manager_category_product  = view('admin.all_category_product')->with('all_category_product',$all_category_product)->with('category_product',$category_product);;
        
    	return view('admin_layout')->with('admin.all_category_product', $manager_category_product);


    }
    public function save_category_product(Request $request){
        $this->AuthLogin();
    	$data = array();
    	$data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['slug_category_product'] = $request->slug_category_product;
        $data['category_parent'] = $request->category_parent;
        $data['meta_keywords'] = $request->category_product_keywords;
        $data['category_status'] = $request->category_product_status;

    	DB::table('tbl_category_product')->insert($data);
    	// Session::put('message','Thêm danh mục sản phẩm thành công');
        Toastr::success('Thêm danh mục tin tức thành công','Success');
    	return Redirect::to('add-category-product');
    }
    public function unactive_category_product($category_product_id){
         $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        // Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
         Toastr::success('Không kích hoạt danh mục sản phẩm thành công','Success');
        return Redirect::to('all-category-product');

    }
    public function active_category_product($category_product_id){
         $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        // Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        Toastr::success('Kích hoạt danh mục sản phẩm thành công','Success');
        return Redirect::to('all-category-product');
    }
    public function edit_category_product($category_product_id){
        $this->AuthLogin();
          $category = CategoryProductModel::orderBy('category_id','DESC')->get();

        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();

        $manager_category_product  = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product)->with('category',$category);

        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }
    public function update_category_product(Request $request,$category_product_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['meta_keywords'] = $request->category_product_keywords;
        $data['slug_category_product'] = $request->slug_category_product;

        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        // Session::put('message','Sửa danh mục sản phẩm thành công');
        Toastr::success('Sửa danh mục sản phẩm thành công','Success');
        return Redirect::to('all-category-product');
    }
    public function delete_category_product($category_product_id){
         $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        // Session::put('message','Xóa danh mục sản phẩm thành công');
        Toastr::success('Xoá danh mục sản phẩm thành công','Success');
        return Redirect::to('all-category-product');
    }
     //End Function Admin Page
    public function show_category_home(Request $request, $slug_category_product){
        //category_post
        $category_post = CatePost::orderby('cate_post_id','DESC')->get();
        
       //slide
       $slider = Slider::orderBy('slider_id','desc')->where('slider_status','0')->take(4)->get();
       
        
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();

        $edit_introductions = DB::table('tbl_introduction')->where('introduction_status','0')->orderby('introduction_id','desc')->get(); 

        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

       
        
        $category_by_slug = CategoryProductModel::where('slug_category_product',$slug_category_product)->get();

        $min_price = Product::min('product_price');
        $max_price = Product::max('product_price');
        $max_price_range = $max_price + 100000;

         foreach($category_by_slug as $key => $cate){
            $category_id = $cate->category_id;
        }

    if(isset($_GET['sort_by'])){

        $sort_by = $_GET['sort_by'];

        if($sort_by=='giam_dan'){

            $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_price','DESC')->paginate(6)->appends(request()->query());

        }elseif($sort_by=='tang_dan'){

            $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_price','ASC')->paginate(6)->appends(request()->query());

        }elseif($sort_by=='kytu_za'){

            $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_name','DESC')->paginate(6)->appends(request()->query());


        }elseif($sort_by=='kytu_az'){

            $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_name','ASC')->paginate(6)->appends(request()->query());
            }

        }elseif(isset($_GET['start_price']) && ($_GET['end_price'])){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];

             $category_by_id = Product::with('category')->whereBetween('product_price',[$min_price,$max_price])->orderBy('product_price','ASC')->paginate(6);

        }else{
            $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_id','DESC')->paginate(6);
    }

    $category_name = DB::table('tbl_category_product')->where('tbl_category_product.slug_category_product',$slug_category_product)->limit(1)->get();


     foreach ($cate_product as $key => $val) {
         //--Seo
        $meta_desc = $val->category_desc;
        $meta_keywords = $val->meta_keywords;
        $meta_title =  $val->category_name;
        $url_canonical = $request->url();
         //--Seo
     }
         

      
        
    return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)->with('slider',$slider)->with('category_post',$category_post)->with('min_price',$min_price)->with('max_price',$max_price)->with('edit_introductions',$edit_introductions);
    
    }
    public function product_tabs(Request $request){


    $data = $request->all();

    $output = '';

    $subcategory = CategoryProductModel::where('category_parent',$data['cate_id'])->get();

    $sub_array = array();

    foreach ($subcategory as $key => $sub) {
        $sub_array[] = $sub ->category_id;
    }
    array_push($sub_array, $data['cate_id']);
    

    $product =Product::whereIn('category_id',$sub_array)->orderby('product_id','DESC')->get();

    

    $product_count = $product->count();

    if($product_count>0){

        $output.= ' <div class="tab-content">
            <div class="tab-pane fade active in" id="tshirt">
            ';
            foreach ($product as $key => $val) {
               $output.= '
                <input type="hidden" value="'.$val->product_id.'" class="cart_product_id_'.$val->product_id.'">

                                            <input type="hidden" id="wishlist_productname'.$val->product_id.'" value="'.$val->product_name.'" class="cart_product_name_'.$val->product_id.'">

                                            <input type="hidden" value="'.$val->product_image.'" class="cart_product_image_'.$val->product_id.'">

                                             <input type="hidden" value="'.$val->product_quantity.'" class="cart_product_quantity_'.$val->product_id.'">

                                            <input type="hidden" id="wishlist_productprice'.$val->product_id.'" value="'.$val->product_price.'" class="cart_product_price_'.$val->product_id.'">

                                            <input type="hidden" value="1" class="cart_product_qty_'.$val->product_id.'">

                                            <a id="wishlist_producturl'.$val->product_id.'" href="'.url('chi-tiet-san-pham/'.$val->product_slug).'">
                                            
               <a href="'.url('chi-tiet-san-pham/'.$val->product_slug).'"> <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-product">
                            <div class="productinfo text-center">
                                <img src ="'.url('public/uploads/product/'.$val->product_image).'" alt="'.$val->product_name.'"/>
                                <h2>'.number_format($val->product_price,0,',','.').' VNĐ</h2>
                                <p>'.$val->product_name.'</p>
                                </a>

                                
                                     <button class="btn btn-default" id="'.$val->product_id.'" onclick="Addtocart(this.id);">Thêm giỏ hàng</button>
                            </div>

                        </div>

                    </div>
                </div>';
            }
                $output.= '
             </div>
         </div>
        ';
            

   }else{
    $output.='<div class="tab-content">
                <div class="tab-pane fade active in" id="tshirt">
                    <div class="col-sm-12">
                        <p style="color:red;text-align:center;">Hiện chưa có sản phẩm trong danh mục này</p>
                    </div>
                </div>

    </div>';
   } 


   echo $output;

   

    }
  
}
