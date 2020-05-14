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

    public function index()
    {
        return view('admin_login');
    }


    public function show_dashboard()
    {
        return view('admin.admin_dashboard');
    }

    public function dashboard(Request $request)
    {
        $admin_email=$request->admin_email;
        $admin_password=md5($request->admin_password);
        $result=DB::table('tbl_admin')
                ->where('admin_email',$admin_email)
                ->where('admin_password',$admin_password)
                ->first();
              if ($result){
                  Session::put('admin_name',$result->admin_name);
                  Session::put('admin_id',$result->admin_id);
                  return Redirect::to('dashboard');
              }else{

                        Session::put('message','Email or Password Invalid');
                        return Redirect::to('/admin');

              }

    }

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    // public function index()
    // {
    //     return view('admin.dashboard');
    // }
}
