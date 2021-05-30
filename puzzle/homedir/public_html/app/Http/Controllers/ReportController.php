<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Fina;
use App\Product;
use App\Seller;
use App\User;
use DB;

class ReportController extends Controller
{
    public function stock_report(Request $request)
    {
        if($request->has('category_id')){
            $products = Product::where('category_id', $request->category_id)->get();
        }
        else{
            $products = Product::all();
        }
        return view('reports.stock_report', compact('products'));
    }
	
    public function stock_report_fina(Request $request)
    {
		$Fina = new Fina();
		$token = $Fina->gettoken(); 
		$result = array();
        $products = Product::all();
		foreach($products as $productlist){
		
		$countsold = 0;
		$orderedproductquantity = DB::table('order_details')
                    ->where('product_id', $productlist->id)
                    ->where('delivery_status', 'on_review')
                    ->select('quantity')
                    ->get();
		
		foreach ($orderedproductquantity as $orderedproductquantitylist){
			$countsold = $countsold + $orderedproductquantitylist->quantity;
		}
		
		$finavendorresult = $Fina->getVendorsByCode($token,$productlist->fina_vendor); 
		if(isset($finavendorresult->contragents[0]->name)){
			$finvendorshow = $finavendorresult->contragents[0]->name;
			$finvendorshowid = $finavendorresult->contragents[0]->id;
		}else{
			$finvendorshow = 'მომწოდებელი არ არის მიმაგრებული';
			$finvendorshowid = 0;
		}
		
		$postproductforqty = array(
		"prods" => [$productlist->finaid], 
		"store" => 0,
		"price" => 3
		);  
		$postproductforqty = json_encode($postproductforqty);
		
		$finaquantity = $Fina->getProductsRestAdvance($token,$postproductforqty); 
		
		
		if($countsold > $finaquantity) {
		
		$result[] = array(
			'id' => $productlist->id,
			'name' => $productlist->name,
			'finaid' => $productlist->finaid,
			'productsoltquantity' => $countsold,
			'fina_vendor' => $finvendorshow,
			'purchase_price' => $productlist->purchase_price,
			'vendor_id' => $finvendorshowid,
			'finaquantity' => $finaquantity
		);	
		
		}
		
		} 		
					
        return view('reports.stock_report_fina', compact('result'));
    }

    public function in_house_sale_report(Request $request)
    {
        if($request->has('category_id')){
            $products = Product::where('category_id', $request->category_id)->orderBy('num_of_sale', 'desc')->get();
        }
        else{
            $products = Product::orderBy('num_of_sale', 'desc')->get();
        }
        return view('reports.in_house_sale_report', compact('products'));
    }

    public function seller_report(Request $request)
    {
        if($request->has('verification_status')){
            $sellers = Seller::where('verification_status', $request->verification_status)->get();
        }
        else{
            $sellers = Seller::all();
        }
        return view('reports.seller_report', compact('sellers'));
    }

    public function seller_sale_report(Request $request)
    {
        if($request->has('verification_status')){
            $sellers = Seller::where('verification_status', $request->verification_status)->get();
        }
        else{
            $sellers = Seller::all();
        }
        return view('reports.seller_sale_report', compact('sellers'));
    }

    public function wish_report(Request $request)
    {
        if($request->has('category_id')){
            $products = Product::where('category_id', $request->category_id)->get();
        }
        else{
            $products = Product::all();
        }
        return view('reports.wish_report', compact('products'));
    }
}
