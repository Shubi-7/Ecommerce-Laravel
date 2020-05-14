<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;


session_start();
class HomeController extends Controller
{
    public function index(){



        $all_published_product = DB::table('tbl_products')
        ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
        ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
       
       ->select('tbl_products.*','tbl_category.category_name', 'tbl_manufacture.manufacture_name')
       ->limit(18)
       ->get();


       //echo "<pre>"; print_r($all_published_product); echo "</pre>"; die;


        return view('pages.home_content', ['all_published_product' => $all_published_product]);
      }


      public function show_product_by_category($category_id){

       $category_by_product = DB::table('tbl_products')
       ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
      // ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')           
       ->select('tbl_products.*' , 'tbl_category.category_name')
       ->where('tbl_products.category_id',$category_id)
       ->limit(9)
       ->get();

    
        return view('pages.category_by_product', ['category_by_product' => $category_by_product]);


      }
        

       

          public function product_details_by_id($product_id){

       $product_by_details_releted_post = DB::table('tbl_products')                  
                      
       ->get();

      



       $product_by_details = DB::table('tbl_products')
       ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
       ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')           
       ->select('tbl_products.*' , 'tbl_category.category_name','tbl_manufacture.manufacture_name')
       ->where('tbl_products.product_id',$product_id)
       ->where('tbl_products.publication_status',1)
    
       ->first();

       
         // echo "<pre>"; print_r($product_id); echo "</pre>"; die;

       //$product_id=$product_by_details->category_id;
     



   
        return view('pages.product_details', ['product_by_details' => $product_by_details,'product_by_details_releted_post' => $product_by_details_releted_post]);


      }
}
