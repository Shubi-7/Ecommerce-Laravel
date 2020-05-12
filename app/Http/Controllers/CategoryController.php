<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.add_category');
    }

    public function all_category(){
        //$this->AdminAuthCheck();
  
            $all_category_info = DB::table('tbl_category')->get();
  
          return view('admin.all_category', ['all_category_info' => $all_category_info]);
   
  
      } 
        
    
    public function save_category(Request $request){
  
          $data=array();
          $data['category_id']=$request->category_id;
          $data['category_name']=$request->category_name;
          $data['category_description']=strip_tags($request->category_description);
          $data['publication_status']=$request->publication_status;
         
            DB::table('tbl_category')->insert($data);
            Session::put('message','Category added Successfully');
            return Redirect::to('/add-category');
        
  
  
      }  
  
    public function unactive_category($category_id){
  
             DB::table('tbl_category')
             ->where('category_id',$category_id)
             ->update(['publication_status'=>0]);
  
             Session::put('message','Data Unactivated Successfully!!');
  
             return Redirect::to('/all-category');
  
      }
  
         public function active_category($category_id){
  
  
             DB::table('tbl_category')
             ->where('category_id',$category_id)
             ->update(['publication_status'=>1]);
  
             Session::put('message','Data Activated Successfully!!');
  
             return Redirect::to('/all-category');
  
      }
  
            public function edit_category($category_id){
  
         
           $edit_category_info= DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->first();
  
            
  
            return view('admin.edit_category', ['edit_category_info' => $edit_category_info]);
        
  
  
      }
  
          public function update_category(Request $request,$category_id){
  
  
          $data=array();
             $data['category_id']=$request->category_id;
             $data['category_name']=$request->category_name;
             $data['category_description']=strip_tags($request->category_description);
         
         
            DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update($data);
  
            Session::put('message','Category updated successfully');
  
            return Redirect::to('/all-category');
         
  
      }
  
              public function delete_category($category_id){
  
            DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->delete();
  
            Session::put('message','Category deleted successfully');
  
            return Redirect::to('/all-category');
         
  
      }
  
  
      public function AdminAuthCheck(){
  
        $admin_id=Session::get('admin_id');
        if ($admin_id){
  
          return;
        }else{
  
          return Redirect::to('/admin')->send();
        }
      }
}
