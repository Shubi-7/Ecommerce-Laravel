<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class CheckoutController extends Controller
{

	public function login_check(){
		return view('pages.login');
	}
	public function customer_registration(Request $request){
		$data=array();
		$data['customer_name']=$request->customer_name;
		$data['customer_email']=$request->customer_email;
		$data['password']=md5($request->Password);
		$data['mobile_number']=$request->mobile_number;

		$customer_id=Db::table('tbl_customer')
		            ->insertGetId($data);
		            Session::put('customer_id',$customer_id);
		            Session::put('customer_name',$request->customer_name);
		return Redirect::to('/checkout');
	}
	public function checkout(){		
		return view('pages.checkout');
	}

		public function save_shiping_details(Request $request){
				$data=array();
				$data['shiping_email']=$request->shiping_email;
				$data['shiping_first_name']=$request->shiping_first_name;
				$data['shiping_last_name']=$request->shiping_last_name;
				$data['shiping_address']=$request->shiping_address;
				$data['shiping_mobile_number']=$request->shiping_mobile_number;		
				$data['shiping_city']=$request->shiping_city;
					$shiping_id=Db::table('tbl_shiping')
				            ->insertGetId($data);
				            Session::put('shiping_id',$shiping_id);
				return Redirect::to('/payment');
	}

		public function customer_login(Request $request){			
				$customer_email=$request->customer_email;
				$password=md5($request->password);			
					$results=Db::table('tbl_customer')
				            ->where('customer_email',$customer_email)
				            ->where('password',$password)
				            ->first();			            
				            if ($results){
				            	Session::put('customer_id',$results->customer_id);
				            	return Redirect::to('/checkout');
				            }else{
				            	 return Redirect::to('/login-check');
				            	
				            }      

		}

		public function payment(){
			return view('pages.payment');
		}

		public function customer_logout(){
         Session::flush();
         return Redirect::to('/');

		}

		public function order_place(Request $request){
          
          $payment_method=$request->payment_method;
          $customer_id=Session::get('customer_id');
          $shiping_id=Session::get('shiping_id');

          $pdata=array();
          $pdata['payment_method']=$payment_method;
          $pdata['payment_status']='pending';
          $payment_id=DB::table('tbl_payment')
                      ->insertGetId($pdata);
                      
            $odata=array();
            $odata['customer_id']=Session::get('customer_id');
            $odata['shiping_id']=Session::get('shiping_id');
            $odata['payment_id']=$payment_id;
            $odata['order_total']=Cart::total();
            $odata['order_status']='pending';

            $order_id=DB::table('tbl_order')
                     ->insertGetId($odata);

             $contents=Cart::content();
             $oddata=array();
             foreach ($contents as  $v_content) {
             $oddata['order_id']=$order_id;
             $oddata['product_id']=$v_content->id;
             $oddata['product_name']=$v_content->name;
             $oddata['product_price']=$v_content->price;
             $oddata['product_sales_quantity']=$v_content->qty;
                      DB::table('tbl_order_details')
                     ->insertGetId($oddata);            	
             }

             if ($payment_method=='handcash') {
             	Cart::destroy();
             	return view('pages.handcash');
             }elseif($payment_method=='cart'){
             	echo "cart";
             }elseif($payment_method=='bkash'){
             	echo "bkash";
             }else{
             	echo "not selected";
             }		
		}


		public function order_manage(){
			$this->AdminAuthCheck();

			 $all_order_info = DB::table('tbl_order')
             ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')         
             ->select('tbl_order.*' , 'tbl_customer.customer_name')
             ->get();
            /*echo "<pre>";
             print_r($all_order_info);
             echo "</pre>";*/

             return view('admin.order_manage',['all_order_info' => $all_order_info]);			
		}
		public function view_order($order_id){	
			Session::put('order_id',$order_id);
			  $order_by_id = DB::table('tbl_order')

			 ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
			 ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
			 ->join('tbl_shiping','tbl_order.shiping_id','=','tbl_shiping.shiping_id')

             ->select('tbl_order.*','tbl_customer.*','tbl_order_details.*','tbl_shiping.*')
             ->get();
            
            /* echo "<pre>";
             print_r($order_by_id);
             echo "</pre>";
              exit();*/

            /* var_dump($order_by_id);
             exit();*/

             $view_order=view('admin.view_order')
                        ->with('order_by_id',$order_by_id);
              return view('admin_layout')
                          ->with('admin.view_order',$view_order);          

            // return view('admin.view_order', ['order_by_id' => $order_by_id]);
			
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