<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    public function all_manufacture(){
        //$this->AdminAuthCheck(); 
    
            $all_manufacture_info = DB::table('tbl_manufactue')->get();
    
            return view('admin.all_manufacrure', ['all_manufacture_info' => $all_manufacture_info]);
            
        }
    
    public function add_manufacture(){
        return view('admin.add_manufacture'); 
    }

        
    public function save_manufacture(Request $request){

        $data=array();
        $data['manufacture_id']=$request->manufacture_id;
        $data['manufacture_name']=$request->manufacture_name;
        $data['manufacture_description']=strip_tags($request->manufacture_description);
        $data['publication_status']=$request->publication_status;
    
        DB::table('tbl_manufactue')->insert($data);

        Session::put('message','manufacture added successfully');

        return Redirect::to('/add-manufacture');    
    } 


    public function unactive_manufacture($manufacture_id){

        DB::table('tbl_manufactue')
        ->where('manufacture_id',$manufacture_id)
        ->update(['publication_status'=>0]);
        Session::put('message','data unactivated successfully!!');
        return Redirect::to('/all-manufacture');

    }

    public function active_manufacture($manufacture_id){
        DB::table('tbl_manufactue')
        ->where('manufacture_id',$manufacture_id)
        ->update(['publication_status'=>1]);
        Session::put('message','data activated successfully!!');
        return Redirect::to('/all-manufacture');
    }

        public function edit_manufacture($manufacture_id){      
        $edit_manufacture_info= DB::table('tbl_manufactue')
        ->where('manufacture_id',$manufacture_id)
        ->first();      

        return view('admin.edit_manufacture', ['edit_manufacture_info' => $edit_manufacture_info]);

    }

        public function update_manufacture(Request $request,$manufacture_id){


        $data=array();
        $data['manufacture_id']=$request->manufacture_id;
        $data['manufacture_name']=$request->manufacture_name;
        $data['manufacture_description']=strip_tags($request->manufacture_description);
    
    
        DB::table('tbl_manufactue')
        ->where('manufacture_id',$manufacture_id)
        ->update($data);

        Session::put('message','manufacture updated successfully');

        return Redirect::to('/all-manufacture');
    

    }

            public function delete_manufacture($manufacture_id){

        DB::table('tbl_manufactue')
        ->where('manufacture_id',$manufacture_id)
        ->delete();

        Session::put('message','manufacture deleted successfully');

        return Redirect::to('/all-manufacture');
    

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
