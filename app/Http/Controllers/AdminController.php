<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
session_start();

class AdminController extends Controller
{

    public function index(){
    

        return view('admin_login');
 
    }
 

     public function dashboard(Request $request){
 
         echo $admin_email=$request->admin_email;
         echo $admin_password=md5($request->admin_password);
 
         $result=DB::table('tbl_admin')
         ->where('admin_email',$admin_email)
         ->where('admin_password',$admin_password)
         ->first();
 
         if($result){
 
             session::put('admin_name',$result->admin_name);
             session::put('admin_id',$result->admin_id);
             return Redirect::to('/dashboardd');
         }else{
             session::put('message','Email or Password Invalid');
             return Redirect::to('/admin');
         }
         
    }
}
