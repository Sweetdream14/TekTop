<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\PostFooter;
use App\CatePost;
use App\Slider;
use App\Product;
use DB;
use Session;
use Toastr;
session_start();

class PostFooterController extends Controller
{
    public function add_post_footer(){
    	$PostFooter = PostFooter::orderBy('post_footer_id','DESC')->get(); 
       
        return view('admin.postfooter.add_post_footer')->with(compact('PostFooter'));
    }

    public function save_post_footer(Request $request){
     
    	// $data = $request->all();
        $data = $request->validate(
            [
                'post_footer_title'=>'required|unique:tbl_posts_footer|max:255',
                'post_footer_content'=>'required',
                'post_footer_meta_desc'=>'required',
                'post_footer_meta_keywords'=>'required'
            
            ],[
                'post_footer_content.required' => 'Nội dung dài 255 ký tự',
               
            ]

        );
    	$PostFooter = new PostFooter();

    	$PostFooter->post_footer_title = $data['post_footer_title'];
    	$PostFooter->post_footer_slug = $data['post_footer_slug'];
    	
    	$PostFooter->post_footer_content = $data['post_footer_content'];
    	$PostFooter->post_footer_meta_desc = $data['post_footer_meta_desc'];
    	$PostFooter->post_footer_meta_keywords = $data['post_footer_meta_keywords'];
    	$PostFooter->post_footer_status = $data['post_footer_status'];  
    	$PostFooter->save();
        Session::put('message','Thêm bài viết chân trang thành công');
        return redirect()->back();
    }

    public function all_post_footer(){
        $all_post_footer = PostFooter::orderBy('post_footer_id','DESC')->paginate(10);
       	return view('admin.postfooter.list_post_footer')->with(compact('all_post_footer'));
    }
    public function edit_post_footer($post_footer_id){
   		//$PostFooter = PostFooter::find('post_footer_id');
   		 //return view('admin.postfooter.edit_post_footer')->with(compact('PostFooter'));
        $PostFooter = PostFooter::find($post_footer_id);
        return view('admin.postfooter.edit_post_footer', compact('PostFooter'));   
   	}

    public function update_post_footer(Request $request,$post_footer_id){
        
        $data = $request->all();
        $PostFooter = PostFooter::find($post_footer_id);

        $PostFooter->post_footer_title = $data['post_footer_title'];
        $PostFooter->post_footer_slug = $data['post_footer_slug'];
  
        $PostFooter->post_footer_content = $data['post_footer_content'];
        $PostFooter->post_footer_meta_desc = $data['post_footer_meta_desc'];
        $PostFooter->post_footer_meta_keywords = $data['post_footer_meta_keywords'];
       
        $PostFooter->post_footer_status = $data['post_footer_status'];

       
      
      
        $PostFooter->save();
        // Session::put('message','Sửa bài viết thành công');
        Toastr::success('Sửa bài viết thành công','Success');
        return redirect()->back();
    }
    public function unactive_post_footer($post_footer_id){
        
        DB::table('tbl_posts_footer')->where('post_footer_id',$post_footer_id)->update(['post_footer_status'=>1]);

        Toastr::success('Không kích hoạt danh mục chân trang bài viết thành công','Success');
        // Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-post-footer');

    }

    public function active_post_footer($post_footer_id){
         
        DB::table('tbl_posts_footer')->where('post_footer_id',$post_footer_id)->update(['post_footer_status'=>0]);
        Toastr::success('Kích hoạt danh mục chân trang bài viết thành công','Success');
        return Redirect::to('all-post-footer');
    
        
    }
     public function delete_post_footer($post_footer_id){
        
        $PostFooter = PostFooter::find($post_footer_id);
        $PostFooter->delete();
        
       Toastr::success('Xoá danh mục chân trang bài viết thành công','Success');
        return redirect()->back();
    }
    public function bai_viet_chan_trang(Request $request, $post_footer_slug){
      
       
        //category post
        $category_post = CatePost::orderBy('cate_post_id','DESC')->get();
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','0')->take(4)->get();

    
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        // $catepost = CatePost::where('cate_post_slug',$post_slug)->take(1)->get();

       $PostFooter_by_id = PostFooter::where('post_footer_status',0)->where('post_footer_slug',$post_footer_slug)->get();


        foreach($PostFooter_by_id as $key => $postfoot){
            //seo 
            $meta_desc = $postfoot->post_footer_meta_desc;
            $meta_keywords = $postfoot->post_footer_meta_keywords;
            $meta_title = $postfoot->post_footer_title;
            $url_canonical = $request->url();

           
            
        }
       
       
        return view('pages.postfooter.baivietchantrang')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('slider',$slider)->with('PostFooter_by_id',$PostFooter_by_id)->with('category_post',$category_post);
    }
}
