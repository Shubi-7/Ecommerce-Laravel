<?php
          namespace App\Http\Controllers;
          use Illuminate\Http\Request;
          use DB;
          use App\Http\Requests;
          use Session;
          use Illuminate\Support\Facades\Redirect;
         // use Illuminate\Http\UploadedFile; 
          session_start();

          class productsController extends Controller
          {
           public function add_product(){
             return view('admin.add_product');
           }

           public function all_product(){

          //  $this->AdminAuthCheck(); 


             $all_product_info = DB::table('tbl_products')
             ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
             ->join('tbl_manufactue','tbl_products.manufacture_id','=','tbl_manufactue.manufacture_id')
            // ->select('tbl_products','tbl_products.category_name','=','tbl_manufactue.manufacture_name')

            ->select('tbl_products.*' , 'tbl_category.category_name', 'tbl_manufactue.manufacture_name')
             ->get();

          // echo "<pre>";
           // print_r($all_product_info);
           // echo "</pre>";
         //   exit();
             return view('admin.all_product', ['all_product_info' => $all_product_info]);
           }




           public function save_product(Request $request){

             $data=array();

             $data['product_name']=$request->product_name;
             $data['category_id']=$request->category_id;
             $data['manufacture_id']=$request->manufacture_id;
             $data['product_short_description']=strip_tags($request->product_short_description);
             $data['product_long_description']=strip_tags($request->product_long_description);
             $data['product_price']=$request->product_price;
             $data['product_size']=$request->product_size;
             $data['product_color']=$request->product_color;
             $data['publication_status']=$request->publication_status;

             echo  $image = $request->file('product_image'); echo "</br>";


             if ($image) {
               echo   $image_name = str_random(20);echo "</br>";


               echo   $ext =strtolower($image->getClientOriginalExtension());echo "</br>";


               echo   $image_full_name = $image_name . '.' . $ext;echo "</br>";

               echo  $upload_path = 'images/';

               echo  $image_url = $upload_path . $image_full_name;echo "</br>";

               echo  $success = $image->move($upload_path, $image_full_name);echo "</br>";

               if ($success){
                $data['product_image'] =$image_url;

                DB::table('tbl_products')->insert($data);
                Session::put('message', 'product added Successfully!');
                return Redirect::to('add-product');

              }
            }

            $data['product_image'] ="";
            DB::table('tbl_products')->insert($data);
            Session::put('message', 'product added Successfull without image!');
            return Redirect::to('add-product');

          }


          public function unactive_product($product_id){


            DB::table('tbl_products')
            ->where('product_id',$product_id)
            ->update(['publication_status'=>0]);

            Session::put('message','data unactivated successfully!!');

            return Redirect::to('/all-product');

          }

          public function active_product($product_id){


            DB::table('tbl_products')
              ->where('product_id',$product_id)
            ->update(['publication_status'=>1]);

            Session::put('message','data activated successfully!!');

            return Redirect::to('/all-product');

          }

          public function delete_product($product_id){

            DB::table('tbl_products')
            ->where('product_id',$product_id)
            ->delete();

            Session::put('message','product deleted successfully');

            return Redirect::to('/all-product');


          }

          public function edit_product($product_id){


            $edit_product_info= DB::table('tbl_products')
           ->where('product_id',$product_id)
          ->first();
           return view('admin.edit_product', ['edit_product_info' => $edit_product_info]);
         }


       


         public function update_product(Request $request,$product_id){

             $data=array();
             $data['product_id']=$request->product_id; 
             $data['product_name']=$request->product_name;
             $data['category_id']=$request->category_id;
             $data['manufacture_id']=$request->manufacture_id;
             $data['product_short_description']=strip_tags($request->product_short_description);
             $data['product_long_description']=strip_tags($request->product_long_description);
             $data['product_price']=$request->product_price;
             $data['product_size']=$request->product_size;
             $data['product_color']=$request->product_color;
             $data['publication_status']=$request->publication_status;
             

             if(empty($data['category_id'])){
              $data['category_id']="";

             }
              if(empty($data['manufacture_id'])){
              $data['manufacture_id']="";

             }

             echo  $image = $request->file('product_image'); echo "</br>";


             if ($image) {
               echo   $image_name = str_random(20);echo "</br>";


               echo   $ext =strtolower($image->getClientOriginalExtension());echo "</br>";


               echo   $image_full_name = $image_name . '.' . $ext;echo "</br>";

               echo  $upload_path = 'images/';

               echo  $image_url = $upload_path . $image_full_name;echo "</br>";

               echo  $success = $image->move($upload_path, $image_full_name);echo "</br>";

               if ($success){
                $data['product_image'] =$image_url;

                DB::table('tbl_products')
                ->where('product_id',$product_id)
                ->update($data);
                Session::put('message', 'product updated with image Successfully!');
                return Redirect::to('add-product');

              }
            }

            $data['product_image'] ="";
            DB::table('tbl_products')->where('product_id',$product_id)->update($data);
            Session::put('message', 'product updated Successfull without image!');
            return Redirect::to('add-product');

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


                                                  


                                              