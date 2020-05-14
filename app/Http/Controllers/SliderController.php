<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class SliderController extends Controller
{
    public function add_slider(){

      return view('/admin.add_slider');

    }
      public function save_slider(Request $request){
      	$data=array();
      	$data['publication_status'] = $request->publication_status;

     echo  $image = $request->file('slider_image'); echo "</br>";
         


             if ($image) {
               echo   $image_name = str_random(20);echo "</br>";



               echo   $ext =strtolower($image->getClientOriginalExtension());echo "</br>";



               echo   $image_full_name = $image_name . '.' . $ext;echo "</br>";


               echo  $upload_path = 'slider/';


               echo  $image_url = $upload_path . $image_full_name;echo "</br>";


               echo  $success = $image->move($upload_path, $image_full_name);echo "</br>";


               if ($success){
              echo  $data['slider_image'] =$image_url;



                DB::table('tbl_slider')->insert($data);
                Session::put('message', 'slider added Successfully!');
                return Redirect::to('add-slider');

              }
            }

            $data['slider_image'] ="";
            DB::table('tbl_slider')->insert($data);
            Session::put('message', 'slider added Successfull without image!');
            return Redirect::to('add-slider');

          

    }


    public function all_slider(){

          


             $all_slider_info = DB::table('tbl_slider')

          
             ->get();

          // echo "<pre>";
           // print_r($all_product_info);
           // echo "</pre>";
         //   exit();
             return view('admin.all_slider', ['all_slider_info' => $all_slider_info]);
           }



           public function unactive_slider($slider_id){


           	DB::table('tbl_slider')
           	->where('slider_id',$slider_id)
           	->update(['publication_status'=>0]);

           	Session::put('message','data unactivated successfully!!');

           	return Redirect::to('/all-slider');

           }

           public function active_slider($slider_id){


           	DB::table('tbl_slider')
           	->where('slider_id',$slider_id)
           	->update(['publication_status'=>1]);

           	Session::put('message','data activated successfully!!');

           	return Redirect::to('/all-slider');

           }

               public function delete_slider($slider_id){

            DB::table('tbl_slider')
            ->where('slider_id',$slider_id)
            ->delete();

            Session::put('message','slider deleted successfully');

            return Redirect::to('/all-slider');


          }


       

}
