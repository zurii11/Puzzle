<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\InstamojoController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\PublicSslCommerzPaymentController;
use App\Http\Controllers\OrderController;
use App\Order;
use App\BusinessSetting;
use App\Coupon;
use App\CouponUsage;
use Session;

class CheckoutController extends Controller
{

    public function __construct()
    {
        //
    }

    //check the selected payment gateway and redirect to that controller accordingly
    public function checkout(Request $request)
    {
        $orderController = new OrderController;
        $orderController->store($request);

        $request->session()->put('payment_type', 'cart_payment');

        if($request->session()->get('order_id') != null){
            if($request->payment_option == 'card_payment'){
                $order = Order::findOrFail($request->session()->get('order_id'));
                $_GET['order_id'] = $order->id;
                $order_info[0]['grand_total'] = $order->grand_total;  
                $data['merchant'] = '4299417D4E7DDDEDFB832A65E29A91CF';
                /////////////////////////////////////Start bog Vital  Information /////////////////////////////////
                
                $data['action'] = 'https://3dacq.georgiancard.ge/payment/start.wsm';
                    
                $txnid = $_GET['order_id'];
                
                $_paymentData['lang'] = 'KA';             
                $_paymentData['merch_id'] = '209E07990859F9C24757E229FE6D5287';
                $_paymentData['page_id'] = 'B1069DCF8E094A406F0A5C82684652CA';
                $_paymentData['bacl_url_s'] = 'https://puzzle.ge/cardpayment?result=success';
                $_paymentData['bacl_url_f'] = 'https://puzzle.ge/cardpayment?result=failed';
                $_paymentData['o.order_id'] = $txnid;
                $_paymentData['o.amount'] = (int)($order_info[0]['grand_total'] * 100);
                
                $secret_key   =  '5e728891a6794f8d361e740174d67740'; 
                $hashData = $secret_key;
                foreach($_paymentData as $key => $value) {   
                if (strlen($value) > 0) {  
                            $hashData .= '|'.$value;  
                
                }   
                }    
                if (strlen($hashData) > 0) {   
                    $hashvalue = strtoupper(md5($hashData));   
                }   
                $data['_paymentData'] = $_paymentData;
                 
                return redirect('https://3dacq.georgiancard.ge/payment/start.wsm?lang='.$data['_paymentData']['lang'].'&merch_id='.$data['_paymentData']['merch_id'].'&back_url_s='.$data['_paymentData']['bacl_url_s'].'&back_url_f='.$data['_paymentData']['bacl_url_f'].'&o.order_id='. $data['_paymentData']['o.order_id'].'&o.amount='. $data['_paymentData']['o.amount'].'&page_id='. $data['_paymentData']['page_id']);
                
            }
            elseif ($request->payment_option == 'stripe') {
                $stripe = new StripePaymentController;
                return $stripe->stripe();
            }
            elseif ($request->payment_option == 'sslcommerz') {
                $sslcommerz = new PublicSslCommerzPaymentController;
                return $sslcommerz->index($request);
            }
            elseif ($request->payment_option == 'instamojo') {
                $instamojo = new InstamojoController;
                return $instamojo->pay($request);
            }
            elseif ($request->payment_option == 'razorpay') {
                $razorpay = new RazorpayController;
                return $razorpay->payWithRazorpay($request);
            }
            elseif ($request->payment_option == 'paystack') {
                $paystack = new PaystackController;
                return $paystack->redirectToGateway($request);
            }
            elseif ($request->payment_option == 'voguepay') {
                $voguePay = new VoguePayController;
                return $voguePay->customer_showForm();
            }
            elseif ($request->payment_option == 'cash_on_delivery') {
                $order = Order::findOrFail($request->session()->get('order_id'));
                $commission_percentage = BusinessSetting::where('type', 'vendor_commission')->first()->value;
                foreach ($order->orderDetails as $key => $orderDetail) {
                    if($orderDetail->product->user->user_type == 'seller'){
                        $seller = $orderDetail->product->user->seller;
                        $seller->admin_to_pay = $seller->admin_to_pay - ($orderDetail->price*$commission_percentage)/100;
                        $seller->save();
                    }
                }

                $request->session()->put('cart', collect([]));  
                $request->session()->forget('order_id');
                $request->session()->forget('delivery_info');
                $request->session()->forget('coupon_id');
                $request->session()->forget('coupon_discount');

                flash("Your order has been placed successfully")->success();
            	return redirect()->route('home');
            }
            elseif ($request->payment_option == 'bank_transfer') {
                $order = Order::findOrFail($request->session()->get('order_id'));
                $commission_percentage = BusinessSetting::where('type', 'vendor_commission')->first()->value;
                foreach ($order->orderDetails as $key => $orderDetail) {
                    if($orderDetail->product->user->user_type == 'seller'){
                        $seller = $orderDetail->product->user->seller;
                        $seller->admin_to_pay = $seller->admin_to_pay - ($orderDetail->price*$commission_percentage)/100;
                        $seller->save();
                    }
                }

                $request->session()->put('cart', collect([]));  
                $request->session()->forget('order_id');
                $request->session()->forget('delivery_info');
                $request->session()->forget('coupon_id');
                $request->session()->forget('coupon_discount');

                flash("Your order has been placed successfully")->success();
            	return redirect()->route('home');
            }
            elseif ($request->payment_option == 'wallet') {
                $user = Auth::user();
                $user->balance -= Order::findOrFail($request->session()->get('order_id'))->grand_total;
                $user->save();
                return $this->checkout_done($request->session()->get('order_id'), null);
            }
        } 
    }

    //redirects to this method after a successfull checkout
    public function checkout_done($order_id, $payment)
    {
        $order = Order::findOrFail($order_id);
        $order->payment_status = 'paid';
        $order->payment_details = $payment;
        $order->save();

        $commission_percentage = BusinessSetting::where('type', 'vendor_commission')->first()->value;
        foreach ($order->orderDetails as $key => $orderDetail) {
            $orderDetail->payment_status = 'paid';
            $orderDetail->save();
            if($orderDetail->product->user->user_type == 'seller'){
                $seller = $orderDetail->product->user->seller;
                $seller->admin_to_pay = $seller->admin_to_pay + ($orderDetail->price*(100-$commission_percentage))/100;
                $seller->save();
            }
        }

        Session::put('cart', collect([]));
        Session::forget('order_id');
        Session::forget('payment_type');
        Session::forget('delivery_info');
        Session::forget('coupon_id');
        Session::forget('coupon_discount');

        flash(__('Payment completed'))->success();
        return redirect()->route('home');
    }

    public function get_shipping_info(Request $request)
    {
       
        if(Auth::check()){
            if(Session::has('cart') && count(Session::get('cart')) > 0){
                $categories = Category::all();
                return view('frontend.shipping_info', compact('categories'));
            }
            flash(__('Your cart is empty'))->success();
            return back();
            }else{
            flash(__('Login First'))->success();
            return back();
            }


    }

    public function store_shipping_info(Request $request)
    {
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['country'] = $request->country;
        $data['city'] = $request->city;
        $data['postal_code'] = $request->postal_code;
        $data['phone'] = $request->phone;
        $data['checkout_type'] = $request->checkout_type;

        $shipping_info = $data;
        $request->session()->put('shipping_info', $shipping_info);

        $subtotal = 0;
        $tax = 0;
        $shipping = 0;
        foreach (Session::get('cart') as $key => $cartItem){
            $subtotal += $cartItem['price']*$cartItem['quantity'];
            $tax += $cartItem['tax']*$cartItem['quantity'];
            $shipping += $cartItem['shipping']*$cartItem['quantity'];
        }

        $total = $subtotal + $tax + $shipping;

        if(Session::has('coupon_discount')){
                $total -= Session::get('coupon_discount');
        }

        //return view('frontend.delivery_info');
        return view('frontend.payment_select', compact('total'));
    }

    public function store_delivery_info(Request $request)
    {
        //dd($request->all());

        $subtotal = 0;
        $tax = 0;
        $shipping = 0;

        $cart = $request->session()->get('cart', collect([]));
        $cart = $cart->map(function ($object, $key) use ($request, $subtotal, $shipping, $tax) {

            $subtotal += $object['price']*$object['quantity'];
            $tax += $object['tax']*$object['quantity'];

            if(\App\Product::find($object['id'])->added_by == 'admin'){
                if($request['shipping_type_admin'] == 'home_delivery'){
                    $object['shipping_type'] = 'home_delivery';
                    $object['shipping'] = \App\Product::find($object['id'])->shipping_cost;
                    $shipping += \App\Product::find($object['id'])->shipping_cost*$object['quantity'];
                }
                else{
                    $object['shipping_type'] = 'pickup_point';
                    $object['pickup_point'] = $request->pickup_point_id_admin;
                }
            }
            else{
                if($request['shipping_type_'.\App\Product::find($object['id'])->user_id] == 'home_delivery'){
                    $object['shipping_type'] = 'home_delivery';
                    $object['shipping'] = \App\Product::find($object['id'])->shipping_cost;
                    $shipping += \App\Product::find($object['id'])->shipping_cost*$object['quantity'];
                }
                else{
                    $object['shipping_type'] = 'pickup_point';
                    $object['pickup_point'] = $request['pickup_point_id_'.\App\Product::find($object['id'])->user_id];
                }
            }
            return $object;
        });

        $total = $subtotal + $tax + $shipping;

        $request->session()->put('cart', $cart);

        //dd($cart);

        if(Session::has('coupon_discount')){
                $total -= Session::get('coupon_discount');
        }

        return view('frontend.payment_select', compact('total'));
    }

    public function get_payment_info(Request $request)
    {
        $subtotal = 0;
        $tax = 0;
        $shipping = 0;
        foreach (Session::get('cart') as $key => $cartItem){
            $subtotal += $cartItem['price']*$cartItem['quantity'];
            $tax += $cartItem['tax']*$cartItem['quantity'];
            $shipping += $cartItem['shipping']*$cartItem['quantity'];
        }

        $total = $subtotal + $tax + $shipping;

        if(Session::has('coupon_discount')){
                $total -= Session::get('coupon_discount');
        }

        return view('frontend.payment_select', compact('total'));
    }

    public function apply_coupon_code(Request $request){
        //dd($request->all());
        $coupon = Coupon::where('code', $request->code)->first();

        if($coupon != null){
             if(strtotime(date('d-m-Y')) >= $coupon->start_date && strtotime(date('d-m-Y')) <= $coupon->end_date){
                if(CouponUsage::where('user_id', Auth::user()->id)->where('coupon_id', $coupon->id)->first() == null){
                    $coupon_details = json_decode($coupon->details);

                    if ($coupon->type == 'cart_base')
                    {
                        $subtotal = 0;
                        $tax = 0;
                        $shipping = 0;
                        foreach (Session::get('cart') as $key => $cartItem)
                        {
                            $subtotal += $cartItem['price']*$cartItem['quantity'];
                            $tax += $cartItem['tax']*$cartItem['quantity'];
                            $shipping += $cartItem['shipping']*$cartItem['quantity'];
                        }
                        $sum = $subtotal+$tax+$shipping;

                        if ($sum > $coupon_details->min_buy) {
                            if ($coupon->discount_type == 'percent') {
                                $coupon_discount =  ($sum * $coupon->discount)/100;
                                if ($coupon_discount > $coupon_details->max_discount) {
                                    $coupon_discount = $coupon_details->max_discount;
                                }
                            }
                            elseif ($coupon->discount_type == 'amount') {
                                $coupon_discount = $coupon->discount;
                            }
                            $request->session()->put('coupon_id', $coupon->id);
                            $request->session()->put('coupon_discount', $coupon_discount);
                            flash('Coupon has been applied')->success();
                        }
                    }
                    elseif ($coupon->type == 'product_base')
                    {
                        $coupon_discount = 0;
                        foreach (Session::get('cart') as $key => $cartItem){
                            foreach ($coupon_details as $key => $coupon_detail) {
                                if($coupon_detail->product_id == $cartItem['id']){
                                    if ($coupon->discount_type == 'percent') {
                                        $coupon_discount += $cartItem['price']*$coupon->discount/100;
                                    }
                                    elseif ($coupon->discount_type == 'amount') {
                                        $coupon_discount += $coupon->discount;
                                    }
                                }
                            }
                        }
                        $request->session()->put('coupon_id', $coupon->id);
                        $request->session()->put('coupon_discount', $coupon_discount);
                        flash('Coupon has been applied')->success();
                    }
                }
                else{
                    flash('You already used this coupon!')->warning();
                }
            }
            else{
                flash('Coupon expired!')->warning();
            }
        }
        else {
            flash('Invalid coupon!')->warning();
        }
        return back();
    }

    public function remove_coupon_code(Request $request){
        $request->session()->forget('coupon_id');
        $request->session()->forget('coupon_discount');
        return back();
    }
}
