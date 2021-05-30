<?php 

class ControllerPaymentBog extends CI_Controller {

public function index() {			
    	//$data['button_confirm'] = $this->language->get('button_confirm');
		$this->load->model('Crud_model');
		//$this->language->load('payment/bog');
		$order_info = $this->Crud_model->getsalebyid($_GET['order_id']);
		$data['merchant'] = 'ADC9ECB06DD96FEE7C86F77804851C8E'; //$this->config->get('bog_account_id');
		 /////////////////////////////////////Start bog Vital  Information /////////////////////////////////
		
		$data['action'] = 'https://3dacq.georgiancard.ge/payment/start.wsm';
			
		$txnid = $_GET['order_id'];
		
		$_paymentData['lang'] = 'KA';             
		$_paymentData['merch_id'] = '5CADFD7B11551E8DE2A22F66B163654D';
		$_paymentData['page_id'] = 'B1069DCF8E094A406F0A5C82684652CA';
		$_paymentData['bacl_url_s'] = 'https://sursati.ge/index.php/home/cart_checkout?order_id='.$txnid;
		$_paymentData['bacl_url_f'] = 'https://sursati.ge/index.php/home/cart_checkout?result=failed';
		$_paymentData['o.order_id'] = $txnid;
		$_paymentData['o.amount'] = (int)($order_info[0]['grand_total'] * 100);
		
		$secret_key   =  '23852y98fhauh4@@r23'; //$this->config->get('bog_secret_key');
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
		
		redirect('https://3dacq.georgiancard.ge/payment/start.wsm?lang='.$data['_paymentData']['lang'].'&merch_id='.$data['_paymentData']['merch_id'].'&back_url_s='.$data['_paymentData']['bacl_url_s'].'&back_url_f='.$data['_paymentData']['bacl_url_f'].'&preauth=Y&o.order_id='. $data['_paymentData']['o.order_id'].'&o.amount='. $data['_paymentData']['o.amount'].'&page_id='. $data['_paymentData']['page_id']);
	
		
	}

public function CheckPaymentAvail(){
	if (!isset($_SERVER['PHP_AUTH_USER'])) {
        //itxovs usernames da passwords tu ar aris mititebuli
        header("WWW-Authenticate: Basic realm=\"Private Area\"");
        header("HTTP/1.0 401 Unauthorized");
        print "Sorry - you need valid credentials to be granted access!\n";
        exit;
    } else {
        if (($_SERVER['PHP_AUTH_USER'] == 'AuthHttp577909116') && ($_SERVER['PHP_AUTH_PW'] == 'Gi@0gio@7#_0$')) {
      			
 			if(isset($_GET['o_order_id'])) {
			$this->load->helper('file');
			$file = 'file.txt';
			$current = $_GET['o_order_id'];
			file_put_contents($file, $current);
           	$orderId = $_GET['o_order_id'];
			$this->load->model('Crud_model'); // call this only if this model is not yet instantiated!
		    //$bog = $this->model_checkout_order->getOrder($orderId); // use the desired $orderId here
			$order_info = $this->Crud_model->getsalebyid($_GET['o_order_id']);
 		   	$merch_id = '5CADFD7B11551E8DE2A22F66B163654D';
				
							if($merch_id == '5CADFD7B11551E8DE2A22F66B163654D' and $_GET['o_order_id']){
								echo	'<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
								<payment-avail-response>
								<result>
								<code>1</code> 
								<desc>OK</desc>
								</result>

								<merchant-trx>'.$order_info[0]['sale_id'] .'</merchant-trx>
								<purchase>
								<shortDesc>სასურველი ინფორმაცია</shortDesc>
								<longDesc>სასურველი ინფორმაცია</longDesc>
								<account-amount>
								<id>ADC9ECB06DD96FEE7C86F77804851C8E</id>
								<amount>'.(int)($order_info[0]['grand_total'] * 100).'</amount>
								<currency>981</currency>
								<exponent>2</exponent>
								</account-amount>
								</purchase>
								</payment-avail-response>';					
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
        	if (($_SERVER['PHP_AUTH_USER'] == 'AuthHttp577909116') && ($_SERVER['PHP_AUTH_PW'] == 'Gi@0gio@7#_0$')) {

					if(isset($_GET['merch_id']) and isset($_GET['o_order_id']) and isset($_GET['o_amount'])) {
						$orderId = $_GET['o_order_id'];
						$this->load->model('Crud_model'); // call this only if this model is not yet instantiated!
						$order_info = $this->Crud_model->getsalebyid($_GET['o_order_id']); // use the desired $orderId here
		   				$merch_id = '5CADFD7B11551E8DE2A22F66B163654D';
						if(isset($_GET['result_code'])){						
						$this->crud_model->bankregisterresult($_GET['trx_id'],$_GET['o_order_id'],$_GET['result_code'],$_GET['p_rrn']);
						
						}
						if((int)($order_info[0]['grand_total'] * 100) == $_GET['o_amount'] and $merch_id == '5CADFD7B11551E8DE2A22F66B163654D' and $_GET['o_order_id'] == $order_info[0]['sale_id'] ){
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
?>