<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use App\Order;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'desc')->get();
        return view('customers.index', compact('customers'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        Order::where('user_id', Customer::findOrFail($id)->user->id)->delete();
        User::destroy(Customer::findOrFail($id)->user->id);
        if(Customer::destroy($id)){
            flash(__('Customer has been deleted successfully'))->success();
            return redirect()->route('customers.index');
        }

        flash(__('Something went wrong'))->error();
        return back();
    }

    public function statuszero($id)
    {
        if( User::where('id', $id)->update(array('status' => '0')) ){
            flash(__('Customer status been successfully updates'))->success();
            return redirect()->route('customers.index');
        }
        
        flash(__('Something went wrong'))->error();
        return back();
    }    
    
    public function statustwo($id)
    {

        if( User::where('id', $id)->update(array('status' => '2')) ){
            flash(__('Customer status been successfully updates'))->success();
            return redirect()->route('customers.index');
        }
        
        flash(__('Something went wrong'))->error();
        return back();
    }    

    public function statusthree($id)
    {
        if( User::where('id', $id)->update(array('status' => '3')) ){
            flash(__('Customer status been successfully updates'))->success();
            return redirect()->route('customers.index');
        }
        
        flash(__('Something went wrong'))->error();
        return back();
    }
}
