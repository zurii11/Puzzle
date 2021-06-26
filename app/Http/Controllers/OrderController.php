<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Fina;
use App\Order;
use App\Product;
use App\Color;
use App\OrderDetail;
use App\CouponUsage;
use Auth;
use Session;
use DB;
use PDF;
use Mail;
use App\Mail\InvoiceEmailManager;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource to seller.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders')
                    ->orderBy('code', 'desc')
                    ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                    ->where('order_details.seller_id', Auth::user()->id)
                    ->select('orders.id')
                    ->distinct()
                    ->paginate(9);

        foreach ($orders as $key => $value) {
            $order = \App\Order::find($value->id);
            $order->viewed = 1;
            $order->save();
        }

        return view('frontend.seller.orders', compact('orders'));
    }

    /**
     * Display a listing of the resource to admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_orders(Request $request)
    {
        $orders = DB::table('orders')
                    ->orderBy('code', 'desc')
                    ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                    ->where('order_details.seller_id', Auth::user()->id)
                    ->select('orders.id')
                    ->distinct()
                    ->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Display a listing of the sales to admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function sales(Request $request)
    {
        $orders = Order::orderBy('code', 'desc')->get();
        return view('sales.index', compact('orders'));
    }


    public function order_index(Request $request)
    {
        if (Auth::user()->user_type == 'staff') {
            //$orders = Order::where('pickup_point_id', Auth::user()->staff->pick_up_point->id)->get();
            $orders = DB::table('orders')
                        ->orderBy('code', 'desc')
                        ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                        ->where('order_details.pickup_point_id', Auth::user()->staff->pick_up_point->id)
                        ->select('orders.id')
                        ->distinct()
                        ->get();

            return view('pickup_point.orders.index', compact('orders'));
        }
        else{
            //$orders = Order::where('shipping_type', 'Pick-up Point')->get();
            $orders = DB::table('orders')
                        ->orderBy('code', 'desc')
                        ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                        ->where('order_details.shipping_type', 'pickup_point')
                        ->select('orders.id')
                        ->distinct()
                        ->get();

            return view('pickup_point.orders.index', compact('orders'));
        }
    }

    public function pickup_point_order_sales_show($id)
    {
        if (Auth::user()->user_type == 'staff') {
            $order = Order::findOrFail(decrypt($id));
            return view('pickup_point.orders.show', compact('order'));
        }
        else{
            $order = Order::findOrFail(decrypt($id));
            return view('pickup_point.orders.show', compact('order'));
        }
    }

    /**
     * Display a single sale to admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function sales_show($id)
    {
        $order = Order::findOrFail(decrypt($id));
        return view('sales.show', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;
        if(Auth::check()){
            $order->user_id = Auth::user()->id;
        }
        else{
            $order->guest_id = mt_rand(100000, 999999);
        }
        
        $order->shipping_address = json_encode($request->session()->get('shipping_info'));

        // if (Session::get('delivery_info')['shipping_type'] == 'Home Delivery') {
        //     $order->shipping_type = Session::get('delivery_info')['shipping_type'];
        // }
        // elseif (Session::get('delivery_info')['shipping_type'] == 'Pick-up Point') {
        //     $order->shipping_type = Session::get('delivery_info')['shipping_type'];
        //     $order->pickup_point_id = Session::get('delivery_info')['pickup_point_id'];
        // }

        $order->payment_type = $request->payment_option;
        $order->delivery_viewed = '0';
        $order->payment_status_viewed = '0';
        $order->code = date('Ymd-his');
        $order->date = strtotime('now');

        if($order->save()){
            $subtotal = 0;
            $tax = 0;
            $shipping = 0;
            foreach (Session::get('cart') as $key => $cartItem){
                $product = Product::find($cartItem['id']);

                $cartItem['shipping_type'] = 'home_delivery';

                if ($cartItem['shipping_type'] == 'home_delivery') {
                    $subtotal += $cartItem['price']*$cartItem['quantity'];
                    $tax += $cartItem['tax']*$cartItem['quantity'];
                    $shipping += \App\Product::find($cartItem['id'])->shipping_cost*$cartItem['quantity'];
                }
 
                $product_variation = null;
                if(isset($cartItem['color'])){
                    $product_variation .= Color::where('code', $cartItem['color'])->first()->name;
                }
                foreach (json_decode($product->choice_options) as $choice){
                    $str = $choice->name; // example $str =  choice_0
                    if ($product_variation != null) {
                        $product_variation .= '-'.str_replace(' ', '', $cartItem[$str]);
                    }
                    else {
                        $product_variation .= str_replace(' ', '', $cartItem[$str]);
                    }
                }

                if($product_variation != null){
                    $variations = json_decode($product->variations);
                    $variations->$product_variation->qty -= $cartItem['quantity'];
                    $product->variations = json_encode($variations);
                    $product->save();
                }
                else {
                    $product->current_stock -= $cartItem['quantity'];
                    $product->save();
                }

                $order_detail = new OrderDetail;
                $order_detail->order_id  =$order->id;
                $order_detail->seller_id = $product->user_id;
                $order_detail->product_id = $product->id;
                $order_detail->variation = $product_variation;
                $order_detail->price = $cartItem['price'] * $cartItem['quantity'];
                $order_detail->tax = $cartItem['tax'] * $cartItem['quantity'];
                $order_detail->shipping_type = $cartItem['shipping_type'];

                if ($cartItem['shipping_type'] == 'home_delivery') {
                    $order_detail->shipping_cost = \App\Product::find($cartItem['id'])->shipping_cost*$cartItem['quantity'];
                }
                else{
                    $order_detail->shipping_cost = 0;
                    $order_detail->pickup_point_id = $cartItem['pickup_point'];
                }

                $order_detail->quantity = $cartItem['quantity'];
                $order_detail->save();

                $product->num_of_sale++;
                $product->save();
            }

            $order->grand_total = $subtotal + $tax + $shipping;

            if(Session::has('coupon_discount')){
                $order->grand_total -= Session::get('coupon_discount');
                $order->coupon_discount = Session::get('coupon_discount');

                $coupon_usage = new CouponUsage;
                $coupon_usage->user_id = Auth::user()->id;
                $coupon_usage->coupon_id = Session::get('coupon_id');
                $coupon_usage->save();
            }

            $order->save();

            //stores the pdf for invoice
            $pdf = PDF::setOptions([
                            'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
                            'logOutputFile' => storage_path('logs/log.htm'),
                            'tempDir' => storage_path('logs/')
                        ])->loadView('invoices.customer_invoice', compact('order'));
            $output = $pdf->output();
    		file_put_contents('public/invoices/'.'Order#'.$order->code.'.pdf', $output);

            $array['view'] = 'emails.invoice';
            $array['subject'] = 'Order Placed - '.$order->code;
            $array['from'] = env('MAIL_USERNAME');
            $array['content'] = 'Hi. Your order has been placed';
            $array['file'] = 'public/invoices/Order#'.$order->code.'.pdf';
            $array['file_name'] = 'Order#'.$order->code.'.pdf';

            //sends email to customer with the invoice pdf attached
            // if(env('MAIL_USERNAME') != null && env('MAIL_PASSWORD') != null){
            //     Mail::to($request->session()->get('shipping_info')['email'])->queue(new InvoiceEmailManager($array));
            // }
            unlink($array['file']);

            $request->session()->put('order_id', $order->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail(decrypt($id));
        $order->viewed = 1;
        $order->save();
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        if($order != null){
            foreach($order->orderDetails as $key => $orderDetail){
                $orderDetail->delete();
            }
            $order->delete();
            flash('Order has been deleted successfully')->success();
        }
        else{
            flash('Something went wrong')->error();
        }
        return back();
    }

    public function order_details(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        //$order->viewed = 1;
        $order->save();
        return view('frontend.partials.order_details_seller', compact('order'));
    }

    public function update_delivery_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->delivery_viewed = '0';
        $order->save();
		
		$generalsetting = \App\GeneralSetting::first();
		
		$Fina = new Fina();
		$token = $Fina->gettoken(); 		
		
		$personal_id = DB::table('users')
                        ->where('email', json_decode($order->shipping_address)->email)
                        ->select('*')
                        ->distinct()
                        ->get();
						
	  
		
		$ifthereiscustumer = $Fina->getCustomersByCode($token,$personal_id[0]->usertype_id);
		if(isset($ifthereiscustumer->contragents[0]->id)){
			$cutomer = $ifthereiscustumer->contragents[0]->id;
		}else{
		
		if($personal_id[0]->profile_type == 2){
			$is_company = true;
		}else{
			$is_company = false;
		}
		
		
		$savecutomerpost = array(
			"id" => 0, 
			"code" => $personal_id[0]->usertype_id,
			"name" => $personal_id[0]->name,
			"group_id" => 5,
			"address" => $personal_id[0]->address,
			"phone" => $personal_id[0]->phone,
			"email" => $personal_id[0]->email,
			"vat_type" => 1,
			"is_resident" => true,
			"is_company" => $is_company,
			"cons_period" => 30
		); 
		$savecutomerpost = json_encode($savecutomerpost);	
		$resultsavecutomer = $Fina->saveCustomer($token,$savecutomerpost);
		$cutomer = $resultsavecutomer->id;
		}
		
        if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'seller'){
            foreach($order->orderDetails->where('seller_id', Auth::user()->id) as $key => $orderDetail){
                $orderDetail->delivery_status = $request->status;
                $orderDetail->save();
            }
        }
        else{
            foreach($order->orderDetails->where('seller_id', \App\User::where('user_type', 'admin')->first()->id) as $key => $orderDetail){
                $orderDetail->delivery_status = $request->status;
                $orderDetail->save();
            }
        }
		
		$products = array(); 
		$grand_total = 0;
		foreach ($order->orderDetails->where('seller_id', Auth::user()->id) as $key => $orderDetail){
			$products[] = array(
				"id" => $orderDetail->product->finaid,
				"quantity" => $orderDetail->quantity,
				"price" => $orderDetail->price
			); 	
			$grand_total = $grand_total + $orderDetail->price;
		}
		$purpose = $request->order_id;
		$post = array(
			"id" => 0, 
			"date" => date("Y-m-dDh:i:s"), 
			"num_pfx" => "", 
			"doc_num" => 0, 
			"purpose" => $purpose, 
			"amount" => $grand_total, 
			"currency" => "GEL", 
			"rate" => 1, 
			"store" => 1, 
			"user" => 1, 
			"project" => 1, 
			"customer" => $cutomer, 
			"is_vat" => true, 
			"pay_type" => 0, 
			"tr_start" => $generalsetting->address, 
			"tr_end" => json_decode($order->shipping_address)->address, 
			"reserved" => true, 
			"products" => $products
		); 
		if ($request->status == 'on_delivery') {
		//$Fina->saveDocCustomerOrder($token,$post);
		}
        //return var_dump($request->status);
        return 0;
    }
	
    public function orderinfina(Request $request)
    {
		$Fina = new Fina();
		$token = $Fina->gettoken(); 
		
		$products[] = array(
			"id" => $request->product_id,
			"sub_id" => "0",
			"quantity" => $request->quantity,
			"price" => $request->purchase_price
		); 
				
		$post = array(
			"id" => 0, 
			"date" => date("Y-m-dDh:i:s"), 
			"num_pfx" => "", 
			"doc_num" => "", 
			"purpose" => "შეყიდვა ვებ-გვერდისთვის",
			"amount" => $request->purchase_price * $request->quantity,
			"currency" => "GEL",
			"rate" => "1",
			"store" => "1",
			"user" => "1",
			"staff" => "1",
			"vendor" => $request->fina_vendor,
			"is_vat" => "true", 
			"make_entry" => "false", 
			"w_num" => "", 
			"i_num" => "", 
			"products" => $products
		); 
		
		$post = json_encode($post);		
		$result = $Fina->saveDocProductIn($token,$post); 
		
		return var_dump($result);
    }

    public function update_payment_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->payment_status_viewed = '0';
        $order->save();

        if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'seller'){
            foreach($order->orderDetails->where('seller_id', Auth::user()->id) as $key => $orderDetail){
                $orderDetail->payment_status = $request->status;
                $orderDetail->save();
            }
        }
        else{
            foreach($order->orderDetails->where('seller_id', \App\User::where('user_type', 'admin')->first()->id) as $key => $orderDetail){
                $orderDetail->payment_status = $request->status;
                $orderDetail->save();
            }
        }

        $status = 'paid';
        foreach($order->orderDetails as $key => $orderDetail){
            if($orderDetail->payment_status != 'paid'){
                $status = 'unpaid';
            }
        }
        $order->payment_status = $status;
        $order->save();
        return 1;
    }
}
