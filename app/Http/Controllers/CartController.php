<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\SubSubCategory;
use App\Category;
use App\Carts;
use Session;
use Auth;
use App\Color;

class CartController extends Controller
{
    public function index(Request $request)
    {
        //dd($cart->all());
        $categories = Category::all();
        return view('frontend.view_cart', compact('categories'));
    }

    public function showCartModal(Request $request)
    {
        $product = Product::find($request->id);
        return view('frontend.partials.addToCart', compact('product'));
    }

    public function updateNavCart(Request $request)
    {
        return view('frontend.partials.cart');
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);

        $data = array();
        $data['id'] = $product->id;
        $str = '';
        $tax = 0;

        //check the color enabled or disabled for the product
        if($request->has('color')){
            $data['color'] = $request['color'];
            $str = Color::where('code', $request['color'])->first()->name;
        }

        //Gets all the choice values of customer choice option and generate a string like Black-S-Cotton
        foreach (json_decode(Product::find($request->id)->choice_options) as $key => $choice) {
            $data[$choice->name] = $request[$choice->name];
            if($str != null){
                $str .= '-'.str_replace(' ', '', $request[$choice->name]);
            }
            else{
                $str .= str_replace(' ', '', $request[$choice->name]);
            }
        }

        //Check the string and decreases quantity for the stock
        if($str != null){
            $variations = json_decode($product->variations);
            $price = $variations->$str->price;

        }
        else{
            $price = $product->unit_price;

            if(Auth::user() !== null && Auth::user()->status == '2'){
                if($product->unit_price_s1_type == 'amount'){
                    $price =  $product->unit_price_s1;
                }elseif($product->unit_price_s1_type == 'percent'){
                    $price = $product->unit_price - ($product->unit_price*$product->unit_price_s1/100) ;
                }
            }elseif(Auth::user() !== null && Auth::user()->status == '3'){
                if($product->unit_price_s2_type == 'amount'){
                    $price = $product->unit_price_s2;
                }elseif($product->unit_price_s2_type == 'percent'){
                    $price = $product->unit_price - ($product->unit_price*$product->unit_price_s2/100) ;
                }
            }
        }

        //discount calculation based on flash deal and regular discount
        //calculation of taxes
        $flash_deal = \App\FlashDeal::where('status', 1)->first();
        if ($flash_deal != null && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first() != null) {
            $flash_deal_product = \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first();
            if($flash_deal_product->discount_type == 'percent'){
                $price -= ($price*$flash_deal_product->discount)/100;
            }
            elseif($flash_deal_product->discount_type == 'amount'){
                $price -= $flash_deal_product->discount;
            }
        }
        else{
            if($product->discount_type == 'percent'){
                $price -= ($price*$product->discount)/100;
            }
            elseif($product->discount_type == 'amount'){
                $price -= $product->discount;
            }
        }

        if($product->tax_type == 'percent'){
            $tax = ($price*$product->tax)/100;
            //$price += $tax;
        }
        elseif($product->tax_type == 'amount'){
            $tax = $product->tax;
            //$price += $tax;
        }

        $data['quantity'] = $request['quantity'];
        $data['price'] = $price;
        $data['tax'] = $tax;
        $data['shipping'] = 0;

        //$data['shipping_type'] = $product->shipping_type;

        // if($product->shipping_type == 'free'){
        //
        // }
        // else{
        //     $data['shipping'] = $product->shipping_cost;
        // }
        if (Auth::check()) {
            $cart = Carts::where('user_id', Auth::user()->id)->where('product_id', $request->id)->first();
            if ($cart == null) {
                $cart = new Carts;
                $cart->user_id = Auth::user()->id;
                $cart->product_id = $data['id'];
                $cart->quantity = $data['quantity'];
                $cart->price = $data['price'];
                $cart->tax = $data['tax'];
                $cart->shipping = $data['shipping'];

                if(array_key_exists('color', $data)) {
                    $cart->color = $data['color'];
                }

                $cart->save();
            }
        }
        else if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart', collect([]));
            $hasItem = false;
            foreach ($cart as $key => $cartItem) {
                if($cartItem['id'] == $data['id']) {
                    $hasItem = true;
                    break;
                } else {
                    $hasItem = false;
                }
            }

            if (!$hasItem) {
                $cart->push($data);
            }
        }
        else {
            $cart = collect([$data]);
            $request->session()->put('cart', $cart);
        }

        return view('frontend.partials.addedToCart', compact('product', 'data'));
    }

    //removes from Cart
    public function removeFromCart(Request $request)
    {
        if (Auth::check()) {
            $cart = Carts::where('id', $request->key)->first();
            if ($cart != null) {
                Carts::destroy($request->key);
            }
        } else if($request->session()->has('cart')){
            $cart = $request->session()->get('cart', collect([]));
            $cart->forget($request->key);
            $request->session()->put('cart', $cart);
        }

        return view('frontend.partials.cart_details');;
    }

    //updated the quantity for a cart item
    public function updateQuantity(Request $request)
    {
        $cart = $request->session()->get('cart', collect([]));
        $cart = $cart->map(function ($object, $key) use ($request) {
            if($key == $request->key){
                $object['quantity'] = $request->quantity;
            }
            return $object;
        });
        $request->session()->put('cart', $cart);

        return view('frontend.partials.cart_details');
    }
}