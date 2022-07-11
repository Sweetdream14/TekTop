<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Slider;
use Session;
use Toastr;

use Illuminate\Support\Facades\Redirect;
session_start();
class SliderController extends Controller
{
	 public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function manage_slider(){
    	$all_slide = Slider::Orderby('slider_id','DESC')->paginate(2);
    	return view ('admin.slider.list_slider')->with(compact('all_slide'));
    }
    public function add_slider(){
    	return view ('admin.slider.add_slider');
    }
    public function unactive_slider($slider_id){
        $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=>1]);
        // Session::put('message','Không kích hoạt slider sản phẩm thành công');
        Toastr::success('Không kích hoạt slider sản phẩm thành công','Success');
        return Redirect::to('manage-slider');

    }
    public function active_slider($slider_id){
         $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=>0]);
         Toastr::success('Kích hoạt slider sản phẩm thành công','Success');
        return Redirect::to('manage-slider');

    }
     public function delete_slider($slider_id){
         $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->delete();
       Toastr::success('Xoá slider sản phẩm thành công','Success');
        return Redirect::to('manage-slider');
    }
    public function insert_slider(Request $request){
    	$this->AuthLogin();
    	$data = $request->all();
    	$get_image = $request->file('slider_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider',$new_image);
           	$slider = new Slider();
            	$slider->slider_name = $data['slider_name'];
           		$slider->slider_image = $new_image;
            	$slider->slider_status = $data['slider_status'];
            	$slider->slider_desc = $data['slider_desc'];
            	$slider->save();
             Toastr::success('Thêm slider sản phẩm thành công','Success');
             return Redirect::to('add-slider'); 	
    }else{
            Toastr::success('Làm ơn thêm hình ảnh','Success');
             return Redirect::to('add-slider');
    	}
    	
    
	}

	

}

