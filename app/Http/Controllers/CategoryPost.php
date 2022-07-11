<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\CatePost;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Slider;
use Toastr;




class CategoryPost extends Controller
{
	public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

	 public function add_category_post(){
         $this->AuthLogin();
    	return view('admin.category_post.add_category');
    }

     public function save_category_post(Request $request){
       $this->AuthLogin();
        $data = $request->all();
        $category_post = new CatePost;
        $category_post->cate_post_name = $data['cate_post_name'];
        $category_post->cate_post_slug = $data['cate_post_slug'];
        $category_post->cate_post_desc = $data['cate_post_desc'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();
        // Session::put('message','Thêm danh mục tin tức thành công');
        Toastr::success('Thêm danh mục tin tức thành công','Success');
        return redirect()->back();
}
     public function all_category_post(){
        $this->AuthLogin();
     	$category_post =  CatePost::orderBy('cate_post_id','DESC')->paginate(4);
     	
     	return view('admin.category_post.list_category')->with(compact('category_post'));


     }
  public function unactive_cate_post($cate_post_id){
        $this->AuthLogin();
        DB::table('tbl_category_post')->where('cate_post_id',$cate_post_id)->update(['cate_post_status'=>1]);
        // Session::put('message','Không kích hoạt tin tức thành công');
        Toastr::success('Không kích hoạt tin tức thành công','Success');
        return Redirect::to('all-category-post');

    }
    public function active_cate_post($cate_post_id){
         $this->AuthLogin();
        DB::table('tbl_category_post')->where('cate_post_id',$cate_post_id)->update(['cate_post_status'=>0]);
         Toastr::success('Kích hoạt tin tức thành công','Success');
        return Redirect::to('all-category-post');

    }
   
    public function edit_category_post($category_post_id){
        $this->AuthLogin();
        $category_post = CatePost::find($category_post_id);
 
        return view('admin.category_post.edit_category')->with(compact('category_post'));
    }
    public function update_category_post(Request $request, $cate_id){
        
        $data = $request->all();
        $category_post = CatePost::find($cate_id);
        $category_post->cate_post_name = $data['cate_post_name'];
        $category_post->cate_post_slug = $data['cate_post_slug'];
        $category_post->cate_post_desc = $data['cate_post_desc'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();
        // Session::put('message','Sửa danh mục tin tức thành công');
        Toastr::success('Sửa danh mục tin tức thành công','Success');
        return redirect('/all-category-post');
    }
    
     public function delete_category_post($cate_id){
         $category_post = CatePost::find($cate_id);
         $category_post->delete();
        // Session::put('message','Xoá danh mục tin tức thành công');
         Toastr::success('Xoá danh mục tin tức thành công','Success');
        return redirect()->back();
     }

    
    
}