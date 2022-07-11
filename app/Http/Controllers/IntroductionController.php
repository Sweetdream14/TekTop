<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Introduction;
use Session;
use Toastr;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class IntroductionController extends Controller
{
   	public function add_introduction(){
   	   	$add_introduction = Introduction::orderBy('introduction_id','DESC')->get();   
   		return view('admin.introduction.add_introduction')->with('add_introduction',$add_introduction);
   }
   	public function save_introduction(Request $request){
   		$data = array();
    	$data['introduction_desc'] = $request->introduction_desc;
      $data['introduction_status'] = $request->introduction_status;
    	DB::table('tbl_introduction')->insert($data);
      Toastr::success('Thêm giới thiệu thành công','Success');
    	// Session::put('message','Thêm giới thiệu thành công');
    	return Redirect::to('add-introduction');
   }
   public function all_introduction(){
   		$all_introduction = Introduction::orderBy('introduction_id','DESC')->get();
   		return view('admin.introduction.all_introduction')->with('all_introduction',$all_introduction);
   }
   public function edit_introduction($introduction_id){
   	  $edit_introduction = DB::table('tbl_introduction')->where('introduction_id',$introduction_id)->get();
      return view('admin.introduction.edit_introduction')->with('edit_introduction',$edit_introduction);
   }
   public function update_introduction(Request $request, $introduction_id){
      $data = array();
      $data['introduction_desc'] = $request->introduction_desc;
      $data['introduction_status'] = $request->introduction_status;
      DB::table('tbl_introduction')->where('introduction_id',$introduction_id)->update($data);
      Toastr::success('Sửa giới thiệu thành công','Success');
      return Redirect::to('all-introduction');
   }

   public function unactive_introduction($introduction_id){
       
        DB::table('tbl_introduction')->where('introduction_id',$introduction_id)->update(['introduction_status'=>1]);
        Toastr::success('Không kích hoạt giới thiệu thành công','Success');
        return Redirect::to('all-introduction');

    }
    public function active_introduction($introduction_id){
        
        DB::table('tbl_introduction')->where('introduction_id',$introduction_id)->update(['introduction_status'=>0]);
       Toastr::success('Kích hoạt giới thiệu thành công','Success');
        return Redirect::to('all-introduction');
      }
    public function delete_introduction($introduction_id){
       DB::table('tbl_introduction')->where('introduction_id',$introduction_id)->delete();
        S Toastr::success('Xoá giới thiệu thành công','Success');
        return Redirect::to('all-introduction');
    }
}
