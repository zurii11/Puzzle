<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paypal;
use Redirect;
use App\Order;
use App\BusinessSetting;
use App\Seller;
use Session;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\WalletController;

class ControllerPaymentBog extends Controller
{

    public function index() {	 		
		//gansaxilvi $this->load->model('Crud_model');
        
        //gansaxilvi  $order_info = $this->Crud_model->getsalebyid($_GET['order_id']);
        $_GET['order_id'] = 1;
        $order_info[0]['grand_total'] = 5;  
        $data['merchant'] = '4299417D4E7DDDEDFB832A65E29A91CF'; //$this->config->get('bog_account_id');
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
		
		$secret_key   =  '5e728891a6794f8d361e740174d67740'; //$this->config->get('bog_secret_key');
		//ksort ($_paymentData);
		$hashData = $secret_key;
		//$keys = 'secret_key';
		foreach($_paymentData as $key => $value) {   
		  
		//create the hashing input leaving out any fields that has no value and by concatenating the values using a ‘|’ symbol.  
		  
		if (strlen($value) > 0) {  
		 	  	  	$hashData .= '|'.$value;  
		 	  	 // 	$keys .= '|'.$key;
		  
		}   
		}    
		// Create the secure hash and append it to the Post data  
		  
		if (strlen($hashData) > 0) {   
		    $hashvalue = strtoupper(md5($hashData));   
		}   
		//$data['_keys'] = $hashData;
		$data['_paymentData'] = $_paymentData;
		//$data['secure_hash'] = $hashvalue;
		
		return redirect('https://3dacq.georgiancard.ge/payment/start.wsm?lang='.$data['_paymentData']['lang'].'&merch_id='.$data['_paymentData']['merch_id'].'&back_url_s='.$data['_paymentData']['bacl_url_s'].'&back_url_f='.$data['_paymentData']['bacl_url_f'].'&o.order_id='. $data['_paymentData']['o.order_id'].'&o.amount='. $data['_paymentData']['o.amount'].'&page_id='. $data['_paymentData']['page_id']);
	}

    public function CheckPaymentAvail(){
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            //itxovs usernames da passwords tu ar aris mititebuli
            header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            print "Sorry - you need valid credentials to be granted access!\n";
            exit;
        } else {
            if (($_SERVER['PHP_AUTH_USER'] == 'AuthHttp591193301') && ($_SERVER['PHP_AUTH_PW'] == 'Pu@z@zle#_0$')) {
  
                 if(isset($_GET['o_order_id'])) {
                    header('Content-Type', 'application/xml; charset=ISO-8859-1');   
                    $order_info = \App\Order::where('id', $_GET['o_order_id'])->get();
                    //var_dump($order_info[0]->id);
                    //echo $order_info->grand_total;  
                    $merch_id = '209E07990859F9C24757E229FE6D5287';
                    
                        if($merch_id == '209E07990859F9C24757E229FE6D5287' and $_GET['o_order_id']){
                                    $example = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
                                    <payment-avail-response>
                                    <result>
                                    <code>1</code>
                                    <desc>OK</desc>
                                    </result>
                                    <merchant-trx>'.$order_info[0]->id.'</merchant-trx>
                                    <purchase>
                                    <shortDesc>sasurveli informacia</shortDesc>
                                    <longDesc>sasurveli informacia</longDesc>
                                    <account-amount>
                                    <id>4299417D4E7DDDEDFB832A65E29A91CF</id>
                                    <amount>'.(int)($order_info[0]->grand_total*100).'</amount>
                                    <currency>981</currency>
                                    <exponent>2</exponent>
                                    </account-amount>
                                    </purchase>
                                    </payment-avail-response>';		
                                    //$example = str_replace("\0", "", $example);
                                    //$example = preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/', '', $example);
                                    //echo htmlspecialchars_decode($example, ENT_NOQUOTES);
                                    echo $example;		
                                }
                                else{
                                    echo '<payment-avail-response>
                                    <result>
                                    <code>2</code> 
                                    <desc>Unable to accept this payment</desc>
                                    </result>
                                    </payment-avail-response>';
                                   }
                            
                      } else {
                             echo 'failed!';
                             }
    
            } else {
                //tu arasworad sheiyvana useri da paroli tavidan stxovs sheyvanas
                header("WWW-Authenticate: Basic realm=\"Private Area\"");
                header("HTTP/1.0 401 Unauthorized");
                print "Sorry - you need valid credentials to be granted access!\n";
                exit;
                    }
               }
    }

    public function registerPayment(){
		
        if (!isset($_SERVER['PHP_AUTH_USER'])) {
       //itxovs usernames da passwords tu ar aris mititebuli
       header("WWW-Authenticate: Basic realm=\"Private Area\"");
       header("HTTP/1.0 401 Unauthorized");
       print "Sorry - you need valid credentials to be granted access!\n";
       exit;
       } else {
           if (($_SERVER['PHP_AUTH_USER'] == 'AuthHttp591193301') && ($_SERVER['PHP_AUTH_PW'] == 'Pu@z@zle#_0$')) {

                   if(isset($_GET['merch_id']) and isset($_GET['o_order_id']) and isset($_GET['o_amount'])) {
                       $orderId = $_GET['o_order_id'];
                       
                       $grand_total = \App\Order::where('id', $orderId)->first()->grand_total; 

                       $merch_id = '209E07990859F9C24757E229FE6D5287';
                       if(isset($_GET['result_code']) && $_GET['result_code'] == 1){		

                        \App\Order::where('id', $orderId)->update(
                            array(
                            'payment_status' =>  'paid',
                            'payment_details' =>  $_GET['result_code']
                            )
                            );

                        \App\OrderDetail::where('order_id', $orderId)->update(
                            array(
                            'payment_status' =>  'paid'
                            )
                            );
                       
                       }else{
                        \App\Order::where('id', $orderId)->update(
                            array(
                            'payment_status' =>  'unpaid',
                            'payment_details' =>  $_GET['result_code']
                            )
                            );

                        \App\OrderDetail::where('order_id', $orderId)->update(
                            array(
                            'payment_status' =>  'unpaid'
                            )
                            );  
                       }

                       if((int)($grand_total * 100) == $_GET['o_amount'] and $merch_id == '209E07990859F9C24757E229FE6D5287'){
                               echo '<register-payment-response>
                                 <result>
                               <code>1</code>
                               <desc>OK</desc>
                                 </result>
                               </register-payment-response>
                               ';
                          }
                          else{
                              echo '<register-payment-response>
                             <result>
                           <code>2</code>
                           <desc>Temporary unavailable</desc>
                           </result>
                           </register-payment-response>';
                              }
       
                   } else {
                           echo 'failed!';
                           }
           } else {
               //tu arasworad sheiyvana useri da paroli tavidan stxovs sheyvanas
               header("WWW-Authenticate: Basic realm=\"Private Area\"");
               header("HTTP/1.0 401 Unauthorized");
               print "Sorry - you need valid credentials to be granted access!\n";
               exit;
           }
   }
    }
    private function cleanString($str){
        return preg_replace('/[^A-Za-z0-9\-]/', '', $str);
        }

}
