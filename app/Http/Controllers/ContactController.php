<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\CatePost;
use App\Slider;
use App\Contact;
use App\Icons;
use App\Product;
use App\Doitac;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Toastr;
session_start();

class ContactController extends Controller
{

  public function delete_doitac(){
    $id = $_GET['id'];

    $doitac = Doitac::find($id);

    $doitac->delete();

  }

  public function list_doitac(){
      $doitac = Doitac::orderby('doitac_id','DESC')->get();
      //dd($doitac);
      $output = '';
      $output .=' 
      <table class="table table-hover">
          <thead>
              <tr>
                  <th>Tên đối tác</th>
                  <th>Hình ảnh </th>
                  <th>Link</th>
                  <th>Quản lý</th>
              </tr>
          </thead>
        <tbody>';
        foreach ($doitac as $dota) {
              $output .='<tr>
                <td>'.$dota->name_doitac.'</td>
                <td><img height="32px" width="32px" src="'.url('/public/uploads/icons/'.$dota->image_doitac).'"></td>
                <td>'.$dota->link_doitac.'</td>
                <td><button id="'.$dota->doitac_id.'" class="btn btn-danger" onclick="delete_doitac(this.id)">Xoá</button></td>        
              </tr>';
              }
             
        $output .='</tbody>
      </table>';
      echo $output;
  }
    

  public function add_doitac(Request $request){
     $data = $request->all();

    $doitac = new Doitac();
    //dd($doitac);
    $name = $data['name_doitac'];
    $link = $data['link_doitac'];
  
    $get_image = $request->file('file');
   

        $path = 'public/uploads/icons/';
        
        //them hinh anh
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            
           
        }
            $doitac->name_doitac = $name;
            $doitac->link_doitac = $link;
            $doitac->image_doitac = $new_image;
            $doitac->save();
  }

  public function add_nut(Request $request){
    $data = $request->all();
    $icons = new Icons();
    $name = $data['name_icons'];
    $link = $data['link_icons'];
  
    $get_image = $request->file('file');
   

        $path = 'public/uploads/icons/';
        
        //them hinh anh
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
           
           
        }
            $icons->name_icons = $name;
            $icons->link_icons = $link;
            $icons->image_icons = $new_image;
            $icons->save();
  }

  public function delete_icons(){
    $id = $_GET['id'];

    $icons = Icons::find($id);

    $icons->delete();

  }

  public function list_nut(){
      $icons = Icons::orderby('icons_id','DESC')->get();
      //dd($icons);
      $output = '';
      $output .=' 
      <table class="table table-hover">
          <thead>
              <tr>
                  <th>Tên mạng xã hội</th>
                  <th>Hình ảnh </th>
                  <th>Link</th>
                  <th>Quản lý</th>
              </tr>
          </thead>
        <tbody>';
        foreach ($icons as $ico) {
              $output .='<tr>
                <td>'.$ico->name_icons.'</td>
                <td><img height="32px" width="32px" src="'.url('/public/uploads/icons/'.$ico->image_icons).'"></td>
                <td>'.$ico->link_icons.'</td>
                <td><button id="'.$ico->icons_id.'" class="btn btn-danger" onclick="delete_icons(this.id)">Xoá</button></td>        
              </tr>';
              }
             
        $output .='</tbody>
      </table>';
      echo $output;
  }
    
   public function lien_he(Request $request){
     //Lọc giá
        $min_price = Product::min('product_price');
        $max_price = Product::max('product_price');
   	//category_post
        $category_post = CatePost::orderby('cate_post_id','DESC')->get();
        //slide
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status','0')->take(4)->get();

          $edit_introductions = DB::table('tbl_introduction')->where('introduction_status','0')->orderby('introduction_id','desc')->get();

        //--Seo
        $meta_desc = "Liên hệ";
        $meta_keywords = "Liên hệ";
        $meta_title = "TekTop";
        $url_canonical = $request->url();
    	 //--Seo
    	$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $contact = Contact::orderby('info_id','DESC')->get();


    	return view('pages.lienhe.contact')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)->with('slider',$slider)->with('category_post',$category_post)->with('contact',$contact)->with('min_price',$min_price)->with('max_price',$max_price)->with('edit_introductions',$edit_introductions);;
   }
   	public function add_information(){
   		$contact = Contact::where('info_id',1)->get();
      
      return view('admin.information.add_information')->with(compact('contact'));
   }
   public function update_info(Request $request, $info_id){
    $data = $request->all();
      $contact = Contact::find($info_id);
      $contact->info_contact = $data['info_contact']; 
      $contact->info_map = $data['info_map'];
      $contact->info_fanpage = $data['info_fanpage']; 
      $get_image = $request->file('info_image');
      $path = 'public/uploads/contact/';
      if($get_image){
        unlink($path.$contact->info_image);
        $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $contact->info_image = $new_image;

      }
      $contact->save();
      Toastr::success('Sủa liên hệ thành công','Success');
      return redirect()->back();
   }
  public function save_info(Request $request){
      // $data = $request->all();
    $data = $request->validate(
            [
                'info_contact'=>'required',
                'info_map'=>'required',
                'info_fanpage'=>'required',
                'info_image'=>'required'
                
            
            ],[
                'info_contact.required' => 'Mô tả dài 255 ký tự',
                'info_image.required'=>'Yêu cầu hình ảnh'
              
            ]

        );
      $contact = new Contact();
      $contact->info_contact = $data['info_contact']; 
      $contact->info_map = $data['info_map'];
      $contact->info_fanpage = $data['info_fanpage']; 
      $get_image = $request->file('info_image');
      $path = 'public/uploads/contact/';
      if($get_image){
        $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $contact->info_image = $new_image;

      }
      $contact->save();
      Toastr::success('Thêm liên hệ thành công','Success');
      return redirect()->back();

    }
    public function all_information(){
      $contact = Contact::orderBy('info_id','DESC')->get();
      
      return view('admin.information.all_information')->with(compact('contact'));
    }
   public function edit_information($info_id){   
        $contact = Contact::orderby('info_id','DESC')->get();

        return view('admin.information.edit_information')->with('contact',$contact);
      }
      public function delete_information($info_id){
           DB::table('tbl_information')->where('info_id',$info_id)->delete();
           Toastr::success('Xoá liên hệ thành công','Success');
         // Session::put('message','Xóa thương hiệu sản phẩm thành công');
        return Redirect::to('all-information');
      }

}
